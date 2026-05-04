<?php

require_once __DIR__ . '/../../generated/grammar/GolampiVisitor.php';
require_once __DIR__ . '/../../generated/grammar/GolampiBaseVisitor.php';
require_once __DIR__ . '/../Semantics/SymbolTable.php';
require_once __DIR__ . '/../Semantics/SemanticError.php';
require_once __DIR__ . '/BreakSignal.php';
require_once __DIR__ . '/ContinueSignal.php';
require_once __DIR__ . '/ReturnSignal.php';

class GolampiInterpreter extends GolampiBaseVisitor
{
    private string $output = '';
    private SymbolTable $symbolTable;
    private array $functions = [];
    private array $errors = [];
    private int $blockCounter = 0;
    private int $switchDepth = 0;
    private int $loopDepth = 0;
    private int $callDepth = 0;
    private ?string $currentFunction = null;

    public function __construct()
    {
        $this->symbolTable = new SymbolTable();
    }

    public function getOutput(): string
    {
        return $this->output;
    }

    public function getSymbolTable(): array
    {
        return $this->symbolTable->all();
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    private function addError(string $message, $context = null): void
    {
        $line = 0;
        $column = 0;

        if ($context !== null && method_exists($context, 'getStart')) {
            $start = $context->getStart();
            if ($start !== null) {
                $line = $start->getLine();
                $column = $start->getCharPositionInLine();
            }
        }

        $this->errors[] = new SemanticError('Semántico', $message, $line, $column);
    }

    private function getContextPosition($context): array
    {
        $line = 0;
        $column = 0;

        if ($context !== null && method_exists($context, 'getStart')) {
            $start = $context->getStart();
            if ($start !== null) {
                $line = $start->getLine();
                $column = $start->getCharPositionInLine();
            }
        }

        return [$line, $column];
    }

    private function parseArrayType(string $declaredType): ?array
    {
        if (preg_match('/^\[(\d+)\](.+)$/', $declaredType, $matches)) {
            return [
                'size' => (int)$matches[1],
                'elementType' => trim($matches[2]),
            ];
        }

        return null;
    }

    private function isArrayType(string $declaredType): bool
    {
        return $this->parseArrayType($declaredType) !== null;
    }


    private function isPointerType(string $declaredType): bool
    {
        return str_starts_with($declaredType, '*');
    }

    private function getPointerInnerType(string $declaredType): string
    {
        return ltrim($declaredType, '*');
    }

    private function isPointerValue($value): bool
    {
        return is_array($value) && (($value['kind'] ?? null) === 'pointer');
    }

    private function dereferencePointerValue($value)
    {
        if (!$this->isPointerValue($value)) {
            throw new Exception("No se puede dereferenciar un valor que no es puntero");
        }

        $symbol = $this->symbolTable->get($value['ref']);
        return $symbol->value;
    }

    private function getVarDeclaredType($context): string
    {
        if (method_exists($context, 'dataType') && $context->dataType() !== null) {
            return $context->dataType()->getText();
        }

        if (method_exists($context, 'typeSpec') && $context->typeSpec() !== null) {
            return $context->typeSpec()->getText();
        }

        throw new Exception("No se pudo determinar el tipo declarado");
    }

    private function getIdTexts($idListCtx): array
    {
        $ids = [];
        foreach ($idListCtx->ID() as $idToken) {
            $ids[] = $idToken->getText();
        }
        return $ids;
    }

    private function evalExprContexts(array $exprContexts): array
    {
        $values = [];
        foreach ($exprContexts as $exprCtx) {
            $values[] = $this->visit($exprCtx);
        }
        return $values;
    }

    private function expandEvaluatedValues(array $values): array
    {
        $expanded = [];

        foreach ($values as $value) {
            if (is_array($value) && ($value['kind'] ?? null) === 'multi_return') {
                foreach ($value['values'] as $innerValue) {
                    $expanded[] = $innerValue;
                }
            } else {
                $expanded[] = $value;
            }
        }

        return $expanded;
    }

    private function getLvalueTargets($lvalueListCtx): array
    {
        $targets = [];

        foreach ($lvalueListCtx->lvalue() as $lvalueCtx) {
            $isPointer = $lvalueCtx->getChild(0)->getText() === '*';
            $targets[] = [
                'id' => $lvalueCtx->ID()->getText(),
                'indexes' => $this->getArrayIndexes($lvalueCtx->expr()),
                'isPointer' => $isPointer,
            ];
        }

        return $targets;
    }

    private function getDeclaredReturnTypes($functionDecl): array
    {
        if (!method_exists($functionDecl, 'returnTypes') || $functionDecl->returnTypes() === null) {
            return [];
        }

        $types = [];
        foreach ($functionDecl->returnTypes()->dataType() as $typeCtx) {
            $types[] = $typeCtx->getText();
        }

        return $types;
    }

    private function buildMultiReturnValue(array $values): array
    {
        return [
            'kind' => 'multi_return',
            'values' => $values,
        ];
    }

    private function defaultValueForType(string $type)
    {
        return match ($type) {
            'int32' => 0,
            'float32' => 0.0,
            'bool' => false,
            'string' => '',
            'rune' => "\0",
            default => null,
        };
    }

    private function defaultValueForDeclaredType(string $declaredType)
    {
        if ($this->isArrayType($declaredType)) {
            $parsed = $this->parseArrayType($declaredType);
            $values = [];

            for ($i = 0; $i < $parsed['size']; $i++) {
                $values[] = $this->defaultValueForDeclaredType($parsed['elementType']);
            }

            return [
                'kind' => 'array',
                'elementType' => $parsed['elementType'],
                'size' => $parsed['size'],
                'values' => $values,
            ];
        }

        return $this->defaultValueForType($declaredType);
    }

    private function inferType($value): string
    {
        if (is_int($value)) {
            return 'int32';
        }

        if (is_float($value)) {
            return 'float32';
        }

        if (is_string($value)) {
            return strlen($value) === 1 ? 'rune' : 'string';
        }

        if (is_bool($value)) {
            return 'bool';
        }

        if ($value === null) {
            return 'nil';
        }

        return 'unknown';
    }

    private function inferDetailedType($value): string
    {
        if ($this->isPointerValue($value)) {
            return '*' . $value['refType'];
        }

        if (is_array($value) && ($value['kind'] ?? null) === 'array') {
            return '[' . $value['size'] . ']' . $value['elementType'];
        }

        return $this->inferType($value);
    }

    private function isCompatibleType(string $declaredType, $value): bool
    {
        if ($value === null) {
            return false;
        }

        return match ($declaredType) {
            'int32' => is_int($value),
            'float32' => is_float($value) || is_int($value),
            'bool' => is_bool($value),
            'string' => is_string($value),
            'rune' => is_string($value) && strlen($value) === 1,
            default => false,
        };
    }

    private function isCompatibleDeclaredType(string $declaredType, $value): bool
    {
        if ($declaredType === 'void') {
            return $value === null;
        }

        if ($this->isPointerType($declaredType)) {
            if (!$this->isPointerValue($value)) {
                return false;
            }

            return $value['refType'] === $this->getPointerInnerType($declaredType);
        }

        if ($this->isArrayType($declaredType)) {
            if (!is_array($value) || ($value['kind'] ?? null) !== 'array') {
                return false;
            }

            $actualType = '[' . $value['size'] . ']' . $value['elementType'];
            return $actualType === $declaredType;
        }

        return $this->isCompatibleType($declaredType, $value);
    }

    private function normalizeValueForType(string $declaredType, $value)
    {
        return match ($declaredType) {
            'float32' => (float)$value,
            'int32' => (int)$value,
            'rune' => is_string($value) ? substr($value, 0, 1) : $value,
            'string' => (string)$value,
            default => $value,
        };
    }

    private function normalizeValueForDeclaredType(string $declaredType, $value)
    {
        if ($this->isPointerType($declaredType) || $this->isArrayType($declaredType)) {
            return $value;
        }

        return $this->normalizeValueForType($declaredType, $value);
    }

    private function formatValue($value): string
    {
        if ($this->isPointerValue($value)) {
            return '&' . $value['ref'];
        }

        if (is_array($value) && ($value['kind'] ?? null) === 'array') {
            $items = array_map(fn($v) => $this->formatValue($v), $value['values']);
            return '[' . implode(', ', $items) . ']';
        }

        if (is_array($value) && ($value['kind'] ?? null) === 'raw_array') {
            $items = array_map(fn($v) => $this->formatValue($v), $value['values']);
            return '{' . implode(', ', $items) . '}';
        }

        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        }

        if ($value === null) {
            return 'nil';
        }

        return (string)$value;
    }

    private function executeForPart($ctx): void
    {
        if ($ctx === null) {
            return;
        }

        $this->visit($ctx);
    }

    private function convertElementToDeclaredType(string $elementType, $value)
    {
        if ($value === null) {
            throw new Exception("Elemento inválido en arreglo");
        }

        if (is_array($value) && ($value['kind'] ?? null) === 'array') {
            if (!$this->isCompatibleDeclaredType($elementType, $value)) {
                throw new Exception("Tipo incompatible en arreglo. Se esperaba $elementType");
            }
            return $value;
        }

        if (is_array($value) && ($value['kind'] ?? null) === 'raw_array') {
            $parsed = $this->parseArrayType($elementType);

            if ($parsed === null) {
                throw new Exception("No se esperaba un arreglo anidado en este contexto");
            }

            return $this->makeArrayValue($parsed['elementType'], $parsed['size'], $value['values']);
        }

        if (!$this->isCompatibleDeclaredType($elementType, $value)) {
            throw new Exception("Tipo incompatible en arreglo. Se esperaba $elementType");
        }

        return $this->normalizeValueForDeclaredType($elementType, $value);
    }

    private function makeArrayValue(string $elementType, int $size, array $values): array
    {
        if (count($values) > $size) {
            throw new Exception("El arreglo excede el tamaño declarado");
        }

        $normalized = [];
        foreach ($values as $value) {
            $normalized[] = $this->convertElementToDeclaredType($elementType, $value);
        }

        while (count($normalized) < $size) {
            $normalized[] = $this->defaultValueForDeclaredType($elementType);
        }

        return [
            'kind' => 'array',
            'elementType' => $elementType,
            'size' => $size,
            'values' => $normalized,
        ];
    }

    private function getArrayIndexes(array $exprContexts): array
    {
        $indexes = [];

        foreach ($exprContexts as $exprCtx) {
            $index = $this->visit($exprCtx);

            if (!is_int($index)) {
                throw new Exception("El índice del arreglo debe ser int32");
            }

            $indexes[] = $index;
        }

        return $indexes;
    }

    private function getNestedArrayValue($value, array $indexes)
    {
        $current = $value;

        foreach ($indexes as $index) {
            if (!is_array($current) || ($current['kind'] ?? null) !== 'array') {
                throw new Exception("Acceso inválido a arreglo multidimensional");
            }

            if ($index < 0 || $index >= count($current['values'])) {
                throw new Exception("Índice fuera de rango en arreglo");
            }

            $current = $current['values'][$index];
        }

        return $current;
    }

    private function assignNestedArrayValue(&$current, array $indexes, $newValue): void
    {
        if (!is_array($current) || ($current['kind'] ?? null) !== 'array') {
            throw new Exception("Asignación inválida en arreglo multidimensional");
        }

        $index = array_shift($indexes);

        if (!is_int($index)) {
            throw new Exception("El índice del arreglo debe ser int32");
        }

        if ($index < 0 || $index >= count($current['values'])) {
            throw new Exception("Índice fuera de rango en arreglo");
        }

        if (count($indexes) === 0) {
            $elementType = $current['elementType'];
            $current['values'][$index] = $this->convertElementToDeclaredType($elementType, $newValue);
            return;
        }

        $this->assignNestedArrayValue($current['values'][$index], $indexes, $newValue);
    }

    public function visitProgram($context)
    {
        $mainCount = 0;

        foreach ($context->functionDecl() as $functionDecl) {
            $name = $functionDecl->ID()->getText();

            if (isset($this->functions[$name])) {
                $this->addError("La función '$name' ya fue declarada", $functionDecl);
                continue;
            }

            if ($name === 'main') {
                $mainCount++;
            }

            $this->functions[$name] = $functionDecl;
        }

        if ($mainCount === 0) {
            $this->addError("No se encontró la función main()", $context);
            return null;
        }

        if ($mainCount > 1) {
            $this->addError("Debe existir una y solo una función main()", $context);
            return null;
        }

        $mainDecl = $this->functions['main'];

        if ($mainDecl->paramList() !== null && count($mainDecl->paramList()->param()) > 0) {
            $this->addError("La función main() no puede recibir parámetros", $mainDecl);
            return null;
        }

        if (method_exists($mainDecl, 'returnTypes') && $mainDecl->returnTypes() !== null) {
            $this->addError("La función main() no puede declarar tipo de retorno", $mainDecl);
            return null;
        }

        try {
            $this->callFunction('main', [], $context);
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

        private function callFunction(string $name, array $args, $context = null)
    {
        if (!isset($this->functions[$name])) {
            throw new Exception("La función '$name' no existe");
        }

        $functionDecl = $this->functions[$name];
        $scopeName = 'func_' . $name . '_' . (++$this->callDepth);

        $previousFunction = $this->currentFunction;
        $this->currentFunction = $name;

        $this->symbolTable->enterScope($scopeName);

        try {
            $paramsNode = $functionDecl->paramList();
            $params = $paramsNode ? $paramsNode->param() : [];

            if (count($params) !== count($args)) {
                throw new Exception("La función '$name' esperaba " . count($params) . " parámetro(s)");
            }

            foreach ($params as $index => $paramCtx) {
                $paramName = $paramCtx->ID()->getText();
                $paramType = $paramCtx->dataType()->getText();
                [$line, $column] = $this->getContextPosition($paramCtx);

                $argValue = $args[$index];

                if (!$this->isCompatibleDeclaredType($paramType, $argValue)) {
                    throw new Exception("Tipo incompatible en parámetro '$paramName' de la función '$name'. Se esperaba $paramType");
                }

                $argValue = $this->normalizeValueForDeclaredType($paramType, $argValue);
                $this->symbolTable->define($paramName, $paramType, $argValue, $line, $column, false);
            }

            $declaredReturnTypes = $this->getDeclaredReturnTypes($functionDecl);

            try {
                $this->visit($functionDecl->block());

                if (count($declaredReturnTypes) > 0) {
                    throw new Exception("La función '$name' debe retornar " . count($declaredReturnTypes) . " valor(es)");
                }

                return null;
            } catch (ReturnSignal $returnSignal) {
                $returnValue = $returnSignal->value;

                if (count($declaredReturnTypes) === 0) {
                    if ($returnValue !== null) {
                        throw new Exception("La función '$name' no debe retornar valores");
                    }
                    return null;
                }

                if (count($declaredReturnTypes) === 1) {
                    if (!$this->isCompatibleDeclaredType($declaredReturnTypes[0], $returnValue)) {
                        $actualType = $this->inferDetailedType($returnValue);
                        throw new Exception("Retorno inválido en función '$name'. Se esperaba {$declaredReturnTypes[0]} y se obtuvo $actualType");
                    }

                    return $this->normalizeValueForDeclaredType($declaredReturnTypes[0], $returnValue);
                }

                if (!is_array($returnValue) || ($returnValue['kind'] ?? null) !== 'multi_return') {
                    throw new Exception("La función '$name' debe retornar " . count($declaredReturnTypes) . " valor(es)");
                }

                $returnedValues = $returnValue['values'];

                if (count($returnedValues) !== count($declaredReturnTypes)) {
                    throw new Exception("La función '$name' debe retornar " . count($declaredReturnTypes) . " valor(es)");
                }

                $normalized = [];
                foreach ($declaredReturnTypes as $i => $declaredType) {
                    $singleValue = $returnedValues[$i];

                    if (!$this->isCompatibleDeclaredType($declaredType, $singleValue)) {
                        $actualType = $this->inferDetailedType($singleValue);
                        throw new Exception("Retorno inválido en función '$name'. Se esperaba $declaredType y se obtuvo $actualType");
                    }

                    $normalized[] = $this->normalizeValueForDeclaredType($declaredType, $singleValue);
                }

                return $this->buildMultiReturnValue($normalized);
            }
        } finally {
            $this->symbolTable->exitScope();
            $this->currentFunction = $previousFunction;
        }
    }

    public function visitBlock($context)
    {
        $scopeName = 'block_' . (++$this->blockCounter);
        $this->symbolTable->enterScope($scopeName);

        try {
            foreach ($context->statement() as $statement) {
                $this->visit($statement);
            }
        } finally {
            $this->symbolTable->exitScope();
        }

        return null;
    }

        public function visitTypedVarDecl($context)
    {
        try {
            $ids = $this->getIdTexts($context->idList());
            $declaredType = $this->getVarDeclaredType($context);
            [$line, $column] = $this->getContextPosition($context);

            $values = [];

            if ($context->exprList() !== null) {
                $rawValues = $this->evalExprContexts($context->exprList()->expr());
                $values = $this->expandEvaluatedValues($rawValues);

                if (count($ids) !== count($values)) {
                    throw new Exception("La cantidad de identificadores y expresiones no coincide");
                }
            } else {
                foreach ($ids as $_) {
                    $values[] = $this->defaultValueForDeclaredType($declaredType);
                }
            }

            foreach ($ids as $index => $id) {
                $value = $values[$index];

                if (!$this->isCompatibleDeclaredType($declaredType, $value)) {
                    throw new Exception("Tipo incompatible en declaración de '$id'. Se esperaba $declaredType");
                }

                $value = $this->normalizeValueForDeclaredType($declaredType, $value);
                $this->symbolTable->define($id, $declaredType, $value, $line, $column, false);
            }
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

    public function visitArrayVarDecl($context)
    {
        try {
            $id = $context->ID()->getText();
            $declaredType = $this->getVarDeclaredType($context);
            $arrayValue = $this->visit($context->arrayLiteral());
            [$line, $column] = $this->getContextPosition($context);

            if (!$this->isCompatibleDeclaredType($declaredType, $arrayValue)) {
                throw new Exception("Tipo incompatible en declaración de arreglo '$id'. Se esperaba $declaredType");
            }

            $this->symbolTable->define($id, $declaredType, $arrayValue, $line, $column, false);
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

    public function visitConstDecl($context)
    {
        try {
            $id = $context->ID()->getText();
            $declaredType = $context->dataType()->getText();
            $value = $this->visit($context->expr());
            [$line, $column] = $this->getContextPosition($context);

            if (!$this->isCompatibleDeclaredType($declaredType, $value)) {
                throw new Exception("Tipo incompatible en constante '$id'. Se esperaba $declaredType");
            }

            $value = $this->normalizeValueForDeclaredType($declaredType, $value);
            $this->symbolTable->define($id, $declaredType, $value, $line, $column, true);
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

        public function visitShortVarDecl($context)
    {
        try {
            $ids = $this->getIdTexts($context->idList());
            [$line, $column] = $this->getContextPosition($context);

            $rawValues = [];
            foreach ($context->exprList()->expr() as $exprCtx) {
                $rawValues[] = $this->visit($exprCtx);
            }

            $values = $this->expandEvaluatedValues($rawValues);

            if (count($ids) !== count($values)) {
                throw new Exception("La cantidad de identificadores y expresiones no coincide");
            }

            foreach ($ids as $index => $id) {
                $value = $values[$index];
                $type = $this->inferDetailedType($value);

                if ($type === 'unknown') {
                    throw new Exception("Expresión inválida en declaración corta");
                }

                $this->symbolTable->define($id, $type, $value, $line, $column, false);
            }
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

    public function visitVarDeclNoSemi($context)
    {
        return $this->visitTypedVarDecl($context);
    }

    public function visitShortVarDeclNoSemi($context)
    {
        return $this->visitShortVarDecl($context);
    }

        public function visitAssignStmt($context)
    {
        try {
            $targets = $this->getLvalueTargets($context->lvalueList());

            $rawValues = [];
            foreach ($context->exprList()->expr() as $exprCtx) {
                $rawValues[] = $this->visit($exprCtx);
            }

            $values = $this->expandEvaluatedValues($rawValues);

            if (count($targets) !== count($values)) {
                throw new Exception("La cantidad de destinos y expresiones no coincide");
            }

            foreach ($targets as $index => $target) {
                $id = $target['id'];
                $indexes = $target['indexes'];
                $symbol = $this->symbolTable->get($id);
                $value = $values[$index];

                if ($target['isPointer']) {
                    $pointerValue = $symbol->value;

                    if (!$this->isPointerValue($pointerValue)) {
                        throw new Exception("No es un puntero válido");
                    }

                    $realId = $pointerValue['ref'];
                    $realSymbol = $this->symbolTable->get($realId);

                    if (!$this->isCompatibleDeclaredType($realSymbol->type, $value)) {
                        throw new Exception("Tipo incompatible en asignación para '$realId'. Se esperaba {$realSymbol->type}");
                    }

                    $value = $this->normalizeValueForDeclaredType($realSymbol->type, $value);
                    $this->symbolTable->assign($realId, $value, $realSymbol->type);
                    continue;
                }

                if (count($indexes) === 0) {
                    if (!$this->isCompatibleDeclaredType($symbol->type, $value)) {
                        throw new Exception("Tipo incompatible en asignación para '$id'. Se esperaba {$symbol->type}");
                    }

                    $value = $this->normalizeValueForDeclaredType($symbol->type, $value);
                    $this->symbolTable->assign($id, $value, $symbol->type);
                    continue;
                }

                $containerValue = $symbol->value;
                $containerType = $symbol->type;

                if ($this->isPointerType($symbol->type)) {
                    if (!$this->isPointerValue($symbol->value)) {
                        throw new Exception("No es un puntero válido");
                    }

                    $realId = $symbol->value['ref'];
                    $realSymbol = $this->symbolTable->get($realId);
                    $containerValue = $realSymbol->value;
                    $containerType = $realSymbol->type;
                }

                $this->assignNestedArrayValue($containerValue, $indexes, $value);

                if ($this->isPointerType($symbol->type)) {
                    $realId = $symbol->value['ref'];
                    $realSymbol = $this->symbolTable->get($realId);
                    $this->symbolTable->assign($realId, $containerValue, $realSymbol->type);
                } else {
                    $this->symbolTable->assign($id, $containerValue, $containerType);
                }
            }
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

    public function visitAssignNoSemi($context)
    {
        return $this->visitAssignStmt($context);
    }

    public function visitCompoundAssignStmt($context)
    {
        try {
            $id = $context->ID()->getText();
            $symbol = $this->symbolTable->get($id);
            $right = $this->visit($context->expr());
            $op = $context->op->getText();
            $left = $symbol->value;

            if (is_array($left) && ($left['kind'] ?? null) === 'array') {
                throw new Exception("No se permite asignación compuesta sobre arreglos");
            }

            $result = null;

            switch ($op) {
                case '+=':
                    if (is_string($left) || is_string($right)) {
                        $result = (string)$left . (string)$right;
                    } else {
                        $result = $left + $right;
                    }
                    break;
                case '-=':
                    $result = $left - $right;
                    break;
                case '*=':
                    $result = $left * $right;
                    break;
                case '/=':
                    if ($right == 0) {
                        throw new Exception("División entre cero");
                    }
                    $result = $left / $right;
                    break;
            }

            if (!$this->isCompatibleDeclaredType($symbol->type, $result)) {
                throw new Exception("Tipo incompatible en asignación compuesta para '$id'");
            }

            $result = $this->normalizeValueForDeclaredType($symbol->type, $result);
            $this->symbolTable->assign($id, $result, $symbol->type);
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

    public function visitCompoundAssignNoSemi($context)
    {
        return $this->visitCompoundAssignStmt($context);
    }

    public function visitIncStmt($context)
    {
        try {
            $id = $context->ID()->getText();
            $symbol = $this->symbolTable->get($id);

            if ($symbol->type !== 'int32' && $symbol->type !== 'float32') {
                throw new Exception("El operador ++ solo puede usarse con int32 o float32");
            }

            $newValue = $symbol->value + 1;
            $newValue = $this->normalizeValueForDeclaredType($symbol->type, $newValue);
            $this->symbolTable->assign($id, $newValue, $symbol->type);
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

    public function visitIncNoSemi($context)
    {
        return $this->visitIncStmt($context);
    }

    public function visitForInit($context)
    {
        if ($context->varDeclNoSemi() !== null) {
            return $this->visit($context->varDeclNoSemi());
        }

        if ($context->shortVarDeclNoSemi() !== null) {
            return $this->visit($context->shortVarDeclNoSemi());
        }

        if ($context->assignNoSemi() !== null) {
            return $this->visit($context->assignNoSemi());
        }

        if ($context->compoundAssignNoSemi() !== null) {
            return $this->visit($context->compoundAssignNoSemi());
        }

        return null;
    }

    public function visitForUpdate($context)
    {
        if ($context->assignNoSemi() !== null) {
            return $this->visit($context->assignNoSemi());
        }

        if ($context->compoundAssignNoSemi() !== null) {
            return $this->visit($context->compoundAssignNoSemi());
        }

        if ($context->incNoSemi() !== null) {
            return $this->visit($context->incNoSemi());
        }

        if ($context->expr() !== null) {
            return $this->visit($context->expr());
        }

        return null;
    }

    public function visitPrintStmt($context)
    {
        try {
            $parts = [];

            if ($context->exprList() !== null) {
                foreach ($context->exprList()->expr() as $exprCtx) {
                    $value = $this->visit($exprCtx);
                    $parts[] = $this->formatValue($value);
                }
            }

            $this->output .= implode(' ', $parts) . PHP_EOL;
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        }

        return null;
    }

    public function visitIfStmt($context)
    {
        $condition = $this->visit($context->expr());

        if (!is_bool($condition)) {
            throw new Exception("La condición del if debe ser booleana");
        }

        if ($condition) {
            $this->visit($context->block(0));
        } elseif ($context->block(1) !== null) {
            $this->visit($context->block(1));
        }

        return null;
    }

    public function visitSwitchStmt($context)
    {
        try {
            $switchValue = $this->visit($context->expr());
            $matched = false;
            $this->switchDepth++;

            foreach ($context->switchCase() as $caseCtx) {
                $caseMatched = false;

                foreach ($caseCtx->exprList()->expr() as $exprCtx) {
                    $caseValue = $this->visit($exprCtx);

                    if ($switchValue == $caseValue) {
                        $caseMatched = true;
                        break;
                    }
                }

                if ($caseMatched) {
                    $matched = true;

                    try {
                        foreach ($caseCtx->statement() as $stmt) {
                            $this->visit($stmt);
                        }
                    } catch (BreakSignal $e) {
                    }

                    break;
                }
            }

            if (!$matched && $context->defaultCase() !== null) {
                try {
                    foreach ($context->defaultCase()->statement() as $stmt) {
                        $this->visit($stmt);
                    }
                } catch (BreakSignal $e) {
                }
            }
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        } finally {
            $this->switchDepth--;
        }

        return null;
    }

    public function visitForCondStmt($context)
    {
        $this->loopDepth++;

        try {
            while (true) {
                $condition = $this->visit($context->expr());

                if (!is_bool($condition)) {
                    throw new Exception("La condición del for debe ser booleana");
                }

                if (!$condition) {
                    break;
                }

                try {
                    $this->visit($context->block());
                } catch (ContinueSignal $e) {
                    continue;
                } catch (BreakSignal $e) {
                    break;
                }
            }
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        } finally {
            $this->loopDepth--;
        }

        return null;
    }

    public function visitForClassicStmt($context)
    {
        $this->loopDepth++;

        try {
            if ($context->forInit() !== null) {
                $this->executeForPart($context->forInit());
            }

            while (true) {
                if ($context->forCondition() !== null) {
                    $condition = $this->visit($context->forCondition()->expr());

                    if (!is_bool($condition)) {
                        throw new Exception("La condición del for debe ser booleana");
                    }

                    if (!$condition) {
                        break;
                    }
                }

                try {
                    $this->visit($context->block());
                } catch (ContinueSignal $e) {
                    if ($context->forUpdate() !== null) {
                        $this->executeForPart($context->forUpdate());
                    }
                    continue;
                } catch (BreakSignal $e) {
                    break;
                }

                if ($context->forUpdate() !== null) {
                    $this->executeForPart($context->forUpdate());
                }
            }
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        } finally {
            $this->loopDepth--;
        }

        return null;
    }

    public function visitForInfiniteStmt($context)
    {
        $this->loopDepth++;

        try {
            while (true) {
                try {
                    $this->visit($context->block());
                } catch (ContinueSignal $e) {
                    continue;
                } catch (BreakSignal $e) {
                    break;
                }
            }
        } catch (Throwable $e) {
            $this->addError($e->getMessage(), $context);
        } finally {
            $this->loopDepth--;
        }

        return null;
    }

    public function visitBreakStmt($context)
    {
        if ($this->loopDepth <= 0 && $this->switchDepth <= 0) {
            throw new Exception("break solo puede usarse dentro de un for o switch");
        }

        throw new BreakSignal();
    }

    public function visitContinueStmt($context)
    {
        if ($this->loopDepth <= 0) {
            throw new Exception("continue solo puede usarse dentro de un for");
        }

        throw new ContinueSignal();
    }

        public function visitReturnStmt($context)
    {
        if ($this->currentFunction === 'main' && $context->exprList() !== null) {
            throw new Exception("La función main() no puede retornar valores");
        }

        if ($context->exprList() === null) {
            throw new ReturnSignal(null);
        }

        $values = [];
        foreach ($context->exprList()->expr() as $exprCtx) {
            $values[] = $this->visit($exprCtx);
        }

        if (count($values) === 1) {
            throw new ReturnSignal($values[0]);
        }

        throw new ReturnSignal($this->buildMultiReturnValue($values));
    }

    public function visitExprStmt($context)
    {
        $this->visit($context->expr());
        return null;
    }

    public function visitBuiltinExpr($context)
    {
        return $this->visit($context->builtinCall());
    }

    public function visitBuiltinCall($context)
    {
        $name = $context->getChild(0)->getText();

        if ($name === 'now') {
            return date('Y-m-d H:i:s');
        }

        if ($name === 'len') {
            $value = $this->visit($context->expr(0));

            if (is_string($value)) {
                return strlen($value);
            }

            if (is_array($value) && ($value['kind'] ?? null) === 'array') {
                return count($value['values']);
            }

            throw new Exception("len solo acepta string o arreglo");
        }

        if ($name === 'typeOf') {
            $value = $this->visit($context->expr(0));
            return $this->inferDetailedType($value);
        }

        if ($name === 'substr') {
            $source = $this->visit($context->expr(0));
            $start = $this->visit($context->expr(1));
            $length = $this->visit($context->expr(2));

            if (!is_string($source)) {
                throw new Exception("substr requiere que el primer parámetro sea string");
            }

            if (!is_int($start) || !is_int($length)) {
                throw new Exception("substr requiere índices int32");
            }

            if ($start < 0 || $length < 0) {
                throw new Exception("substr no acepta índices negativos");
            }

            if ($start > strlen($source)) {
                throw new Exception("Índice inicial fuera de rango en substr");
            }

            if (($start + $length) > strlen($source)) {
                throw new Exception("La longitud solicitada excede el tamaño del string en substr");
            }

            return substr($source, $start, $length);
        }

        throw new Exception("Builtin no reconocido");
    }

    public function visitCallExpr($context)
    {
        $functionName = $context->ID()->getText();

        if ($functionName === 'main') {
            throw new Exception("La función main() no puede ser llamada explícitamente");
        }

        $args = [];

        if ($context->argList() !== null) {
            foreach ($context->argList()->expr() as $exprCtx) {
                $args[] = $this->visit($exprCtx);
            }
        }

        return $this->callFunction($functionName, $args, $context);
    }

    public function visitArrayLiteralExpr($context)
    {
        return $this->visit($context->arrayLiteral());
    }

    public function visitNestedArrayLiteralExpr($context)
    {
        return $this->visit($context->nestedArrayLiteral());
    }

    public function visitNestedArrayLiteral($context)
    {
        $values = [];

        if ($context->arrayElements() !== null) {
            foreach ($context->arrayElements()->arrayElement() as $elementCtx) {
                $values[] = $this->visit($elementCtx);
            }
        }

        return [
            'kind' => 'raw_array',
            'values' => $values,
        ];
    }

    public function visitArrayElement($context)
    {
        if ($context->expr() !== null) {
            return $this->visit($context->expr());
        }

        return $this->visit($context->nestedArrayLiteral());
    }

    public function visitArrayLiteral($context)
    {
        $size = (int)$context->arrayType()->INT()->getText();
        $elementType = $context->arrayType()->dataType()->getText();
        $values = [];

        if ($context->arrayElements() !== null) {
            foreach ($context->arrayElements()->arrayElement() as $elementCtx) {
                $values[] = $this->visit($elementCtx);
            }
        }

        return $this->makeArrayValue($elementType, $size, $values);
    }

    public function visitArrayAccessExpr($context)
    {
        $arrayCtx = method_exists($context, 'arrayAccess') ? $context->arrayAccess() : $context;
        $id = $arrayCtx->ID()->getText();
        $symbol = $this->symbolTable->get($id);
        $indexes = $this->getArrayIndexes($arrayCtx->expr());

        $arrayValue = $symbol->value;

        if ($this->isPointerType($symbol->type)) {
            $arrayValue = $this->dereferencePointerValue($arrayValue);
        }

        return $this->getNestedArrayValue($arrayValue, $indexes);
    }

    public function visitAddrOfExpr($context)
    {
        $id = $context->ID()->getText();
        $symbol = $this->symbolTable->get($id);

        $refType = $symbol->type;
        if ($refType === 'array') {
            $refType = $this->inferDetailedType($symbol->value);
        }

        return [
            'kind' => 'pointer',
            'ref' => $id,
            'refType' => $refType,
        ];
    }

    public function visitDerefExpr($context)
    {
        $value = $this->visit($context->expr());

        return $this->dereferencePointerValue($value);
    }


    public function visitUnaryMinusExpr($context)
    {
        $value = $this->visit($context->expr());

        if (is_int($value) || is_float($value)) {
            return -$value;
        }

        throw new Exception("El operador '-' solo se puede aplicar a números");
    }

    public function visitIntExpr($context)
    {
        return (int)$context->INT()->getText();
    }

    public function visitFloatExpr($context)
    {
        return (float)$context->FLOAT()->getText();
    }

    public function visitBoolExpr($context)
    {
        return $context->BOOL()->getText() === 'true';
    }

    public function visitStringExpr($context)
    {
        $text = $context->STRING()->getText();
        $text = substr($text, 1, -1);
        return stripcslashes($text);
    }

    public function visitRuneExpr($context)
    {
        $text = $context->RUNE()->getText();
        $text = substr($text, 1, -1);
        return stripcslashes($text);
    }

    public function visitNilExpr($context)
    {
        return null;
    }

    public function visitIdExpr($context)
    {
        $id = $context->ID()->getText();
        return $this->symbolTable->get($id)->value;
    }

    public function visitParenExpr($context)
    {
        return $this->visit($context->expr());
    }

    public function visitNotExpr($context)
    {
        $value = $this->visit($context->expr());

        if (!is_bool($value)) {
            throw new Exception("El operador ! solo acepta booleanos");
        }

        return !$value;
    }

    public function visitAddSubExpr($context)
    {
        $left = $this->visit($context->expr(0));
        $right = $this->visit($context->expr(1));
        $op = $context->op->getText();

        if ((is_string($left) || is_string($right)) && $op !== '+') {
            throw new Exception("Solo se permite concatenar strings con +");
        }

        if ($left === null || $right === null) {
            throw new Exception("No se puede operar con nil");
        }

        if (
            (is_array($left) && in_array(($left['kind'] ?? null), ['array', 'raw_array', 'pointer'], true)) ||
            (is_array($right) && in_array(($right['kind'] ?? null), ['array', 'raw_array', 'pointer'], true))
        ) {
            throw new Exception("No se puede operar aritméticamente con arreglos o punteros");
        }

        if ($op === '+') {
            if (is_string($left) || is_string($right)) {
                return (string)$left . (string)$right;
            }
            return $left + $right;
        }

        return $left - $right;
    }

public function visitMulDivExpr($context)
{
    $left = $this->visit($context->expr(0));
    $right = $this->visit($context->expr(1));
    $op = $context->op->getText();

    if ($left === null || $right === null) {
        throw new Exception("No se puede operar con nil");
    }

    if (is_array($left) || is_array($right)) {
        throw new Exception("No se puede operar aritméticamente con arreglos o punteros");
    }

    if (!is_int($left) && !is_float($left)) {
        throw new Exception("Operación aritmética inválida");
    }

    if (!is_int($right) && !is_float($right)) {
        throw new Exception("Operación aritmética inválida");
    }

    if ($op === '*') {
        return $left * $right;
    }

if ($op === '/') {
    if ($right == 0) {
        throw new Exception("División entre cero");
    }

   
    if (is_numeric($left) && is_numeric($right) &&
        intval($left) == $left && intval($right) == $right) {

        return intdiv(intval($left), intval($right));
    }

   
    return floatval($left) / floatval($right);
    }

    if ($op === '%') {
        if ($right == 0) {
            throw new Exception("Módulo entre cero");
        }

        if (!is_int($left) || !is_int($right)) {
            throw new Exception("El operador % solo acepta int32");
        }

        return $left % $right;
    }

    throw new Exception("Operador aritmético no válido");
}

    public function visitRelExpr($context)
    {
        $left = $this->visit($context->expr(0));
        $right = $this->visit($context->expr(1));
        $op = $context->op->getText();

        if (($op === '==' || $op === '!=') && ($left === null || $right === null)) {
            return $op === '==' ? $left === $right : $left !== $right;
        }

        if ($left === null || $right === null) {
            throw new Exception("No se puede comparar con nil");
        }

        if (
            (is_array($left) && in_array(($left['kind'] ?? null), ['array', 'raw_array', 'pointer'], true)) ||
            (is_array($right) && in_array(($right['kind'] ?? null), ['array', 'raw_array', 'pointer'], true))
        ) {
            throw new Exception("No se puede comparar arreglos o punteros");
        }

        return match ($op) {
            '>' => $left > $right,
            '<' => $left < $right,
            '>=' => $left >= $right,
            '<=' => $left <= $right,
            '==' => $left == $right,
            '!=' => $left != $right,
        };
    }

    public function visitLogicExpr($context)
    {
        $op = $context->op->getText();
        $left = $this->visit($context->expr(0));

        if (!is_bool($left)) {
            throw new Exception("Los operadores lógicos solo aceptan booleanos");
        }

        if ($op === '&&') {
            if ($left === false) {
                return false;
            }

            $right = $this->visit($context->expr(1));

            if (!is_bool($right)) {
                throw new Exception("Los operadores lógicos solo aceptan booleanos");
            }

            return $left && $right;
        }

        if ($op === '||') {
            if ($left === true) {
                return true;
            }

            $right = $this->visit($context->expr(1));

            if (!is_bool($right)) {
                throw new Exception("Los operadores lógicos solo aceptan booleanos");
            }

            return $left || $right;
        }

        throw new Exception("Operador lógico no válido");
    }
}