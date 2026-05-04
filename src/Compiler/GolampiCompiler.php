<?php

namespace Src\Compiler;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../generated/grammar/GolampiLexer.php';
require_once __DIR__ . '/../../generated/grammar/GolampiParser.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;
use Exception;

class GolampiCompiler
{
    private array $currentFunctions = [];

    public function compileSource(string $code): array
    {
        $input = InputStream::fromString($code);
        $lexer = new \GolampiLexer($input);
        $tokens = new CommonTokenStream($lexer);
        $parser = new \GolampiParser($tokens);
        $tree = $parser->program();

        $generator = new Arm64Generator();
        $result = $this->compileProgram($tree, $generator, $code);

        return [
            'success' => true,
            'asm' => $result['asm'],
            'symbols' => $result['symbols'],
            'errors' => [],
        ];
    }

    private function compileProgram($programCtx, Arm64Generator $generator, string $sourceCode): array
    {
        foreach ($programCtx->children ?? [] as $child) {
            if (method_exists($child, 'ID') && $child->ID() !== null) {
                if ($child->ID()->getText() === 'main') {
                    return $this->compileMain($sourceCode, $generator);
                }
            }
        }

        throw new Exception("No se encontró la función main()");
    }

    private function compileMain(string $sourceCode, Arm64Generator $generator): array
    {
        $sourceCode = $this->removeComments($sourceCode);
        $functions = $this->extractFunctions($sourceCode);
        $this->currentFunctions = $functions;

        $body = $this->extractMainBody($sourceCode);
        $variables = [];
        $symbols = [];

        $lines = $this->prepareLines($body);
        $index = 0;

        $prints = $this->processLines($lines, $index, $variables, $symbols, $functions);

        if (empty($prints)) {
            throw new Exception("No se encontró fmt.Println(...) en main()");
        }

        return [
            'asm' => $generator->generatePrintLines($prints),
            'symbols' => $symbols
        ];
    }

    private function processLines(array $lines, int &$index, array &$variables, array &$symbols, array $functions = []): array
    {
        $prints = [];

        while ($index < count($lines)) {
            $line = trim($lines[$index]);
            $index++;

            if ($line === '' || $line === '{') {
                continue;
            }

            if ($line === '}') {
                break;
            }

            if ($this->handleConst($line, $variables, $symbols)) continue;
            if ($this->handleArrayDeclaration($line, $variables, $symbols)) continue;
            if ($this->handleVarDeclaration($line, $variables, $symbols)) continue;

            if (preg_match('/^for(?:\s+(.*))?$/', $line, $m)) {
                $header = trim($m[1] ?? '');
                $forBlock = $this->readBracedBlock($lines, $index);
                $prints = array_merge($prints, $this->executeForLoop($header, $forBlock, $variables, $symbols, $functions));
                continue;
            }

            if ($this->handleShortDeclaration($line, $variables, $symbols)) continue;
            if ($this->handleArrayAssignment($line, $variables)) continue;
            if ($this->handleAssignment($line, $variables)) continue;

            if (preg_match('/^fmt\.Println\((.*)\)$/', $line, $m)) {
                $prints[] = $this->buildPrintLine($m[1], $variables);
                continue;
            }

            if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\((.*)\)$/', $line, $m)) {
                $prints = array_merge($prints, $this->executeFunctionCall($m[1], $m[2], $variables, $symbols, $functions));
                continue;
            }

            if (preg_match('/^if\s+(.+)$/', $line, $m)) {
                $condition = $this->evalExpr($m[1], $variables);
                $trueBlock = $this->readBracedBlock($lines, $index);

                $falseBlock = [];
                $this->skipEmptyLines($lines, $index);

                if ($index < count($lines) && trim($lines[$index]) === 'else') {
                    $index++;
                    $falseBlock = $this->readBracedBlock($lines, $index);
                }

                $subIndex = 0;

                if ($this->toBool($condition)) {
                    $prints = array_merge($prints, $this->processLines($trueBlock, $subIndex, $variables, $symbols, $functions));
                } else {
                    $prints = array_merge($prints, $this->processLines($falseBlock, $subIndex, $variables, $symbols, $functions));
                }

                continue;
            }

            if (preg_match('/^switch\s+(.+)$/', $line, $m)) {
                $switchValue = $this->evalExpr($m[1], $variables);
                $switchBlock = $this->readBracedBlock($lines, $index);
                $selectedBlock = $this->selectSwitchCase($switchBlock, $switchValue, $variables);

                $subIndex = 0;
                $prints = array_merge($prints, $this->processLines($selectedBlock, $subIndex, $variables, $symbols, $functions));
                continue;
            }
        }

        return $prints;
    }

    private function executeFunctionCall(string $funcName, string $argsText, array &$variables, array &$symbols, array $functions): array
    {
        if (!isset($functions[$funcName])) {
            throw new Exception("Función no declarada: " . $funcName);
        }

        $functionData = $functions[$funcName];
        $params = $functionData['params'];
        $argExprs = trim($argsText) === '' ? [] : $this->splitArgs($argsText);

        if (count($params) !== count($argExprs)) {
            throw new Exception("Cantidad incorrecta de argumentos en función: " . $funcName);
        }

        $localVariables = $variables;
        $references = [];

        foreach ($params as $idx => $param) {
            $argText = trim($argExprs[$idx]);

            if (($param['byRef'] ?? false) === true) {
                if (!preg_match('/^&([a-zA-Z_][a-zA-Z0-9_]*)$/', $argText, $refMatch)) {
                    throw new Exception("Se esperaba referencia con &: " . $argText);
                }

                $originalName = $refMatch[1];

                if (!isset($variables[$originalName])) {
                    throw new Exception("Variable no declarada: " . $originalName);
                }

                $localVariables[$param['name']] = $variables[$originalName];
                $references[$param['name']] = $originalName;

                $symbols[] = [
                    'id' => $param['name'],
                    'type' => $param['type'] === 'array'
                        ? '[' . ($param['size'] ?? 0) . ']' . ($param['subtype'] ?? '')
                        : $param['type'],
                    'value' => $param['type'] === 'array' ? 'array-ref' : $this->formatValue($variables[$originalName]),
                    'scope' => $funcName,
                    'line' => 0,
                    'column' => 0,
                    'isConst' => false
                ];

                continue;
            }

            $argValue = $this->evalExpr($argText, $variables);
            $argValue['type'] = $param['type'];

            $localVariables[$param['name']] = $argValue;

            $symbols[] = [
                'id' => $param['name'],
                'type' => $param['type'],
                'value' => $this->formatValue($argValue),
                'scope' => $funcName,
                'line' => 0,
                'column' => 0,
                'isConst' => false
            ];
        }

        $funcLines = $this->prepareLines($functionData['body']);
        $funcIndex = 0;

        $prints = $this->processLines($funcLines, $funcIndex, $localVariables, $symbols, $functions);

        foreach ($references as $localName => $originalName) {
            $variables[$originalName] = $localVariables[$localName];
        }

        return $prints;
    }

    private function executeFunctionReturn(string $funcName, string $argsText, array $variables): array
    {
        if (!isset($this->currentFunctions[$funcName])) {
            throw new Exception("Función no declarada: " . $funcName);
        }

        $functionData = $this->currentFunctions[$funcName];
        $params = $functionData['params'];
        $argExprs = trim($argsText) === '' ? [] : $this->splitArgs($argsText);

        if (count($params) !== count($argExprs)) {
            throw new Exception("Cantidad incorrecta de argumentos en función: " . $funcName);
        }

        $localVariables = $variables;

        foreach ($params as $idx => $param) {
            $argValue = $this->evalExpr($argExprs[$idx], $variables);
            $argValue['type'] = $param['type'];
            $localVariables[$param['name']] = $argValue;
        }

        $funcLines = $this->prepareLines($functionData['body']);
        $idx = 0;

        while ($idx < count($funcLines)) {
            $line = trim($funcLines[$idx]);
            $idx++;

            if ($line === '' || $line === '{' || $line === '}') {
                continue;
            }

            $dummySymbols = [];
            if ($this->handleArrayDeclaration($line, $localVariables, $dummySymbols)) continue;

            $dummySymbols = [];
            if ($this->handleVarDeclaration($line, $localVariables, $dummySymbols)) continue;

            $dummySymbols = [];
            if ($this->handleShortDeclaration($line, $localVariables, $dummySymbols)) continue;

            if ($this->handleArrayAssignment($line, $localVariables)) continue;
            if ($this->handleAssignment($line, $localVariables)) continue;

            if (preg_match('/^return\s+(.+)$/', $line, $m)) {
                return $this->buildReturnValue($m[1], $localVariables);
            }

            if (preg_match('/^if\s+(.+)$/', $line, $m)) {
                $condition = $this->evalExpr($m[1], $localVariables);
                $trueBlock = $this->readBracedBlock($funcLines, $idx);

                $falseBlock = [];
                $this->skipEmptyLines($funcLines, $idx);

                if ($idx < count($funcLines) && trim($funcLines[$idx]) === 'else') {
                    $idx++;
                    $falseBlock = $this->readBracedBlock($funcLines, $idx);
                }

                $selected = $this->toBool($condition) ? $trueBlock : $falseBlock;

                foreach ($selected as $selectedLine) {
                    $selectedLine = trim($selectedLine);

                    $dummySymbols = [];
                    if ($this->handleArrayDeclaration($selectedLine, $localVariables, $dummySymbols)) continue;

                    $dummySymbols = [];
                    if ($this->handleVarDeclaration($selectedLine, $localVariables, $dummySymbols)) continue;

                    $dummySymbols = [];
                    if ($this->handleShortDeclaration($selectedLine, $localVariables, $dummySymbols)) continue;

                    if ($this->handleArrayAssignment($selectedLine, $localVariables)) continue;
                    if ($this->handleAssignment($selectedLine, $localVariables)) continue;

                    if (preg_match('/^return\s+(.+)$/', $selectedLine, $rm)) {
                        return $this->buildReturnValue($rm[1], $localVariables);
                    }
                }
            }
        }

        throw new Exception("La función no retorna valor: " . $funcName);
    }

    private function buildReturnValue(string $returnText, array $variables): array
    {
        $returnExprs = $this->splitArgs($returnText);

        if (count($returnExprs) === 1) {
            return $this->evalExpr($returnExprs[0], $variables);
        }

        $values = [];

        foreach ($returnExprs as $expr) {
            $values[] = $this->evalExpr($expr, $variables);
        }

        return [
            'type' => 'multi',
            'values' => $values
        ];
    }

    private function executeForLoop(string $header, array $block, array &$variables, array &$symbols, array $functions = []): array
    {
        $prints = [];
        $guard = 0;

        if ($header === '') {
            while (true) {
                $guard++;
                if ($guard > 1000) throw new Exception("Bucle infinito sin break");

                $result = $this->processLoopBlock($block, $variables, $symbols, $functions);
                $prints = array_merge($prints, $result['prints']);

                if ($result['control'] === 'break') break;
                if ($result['control'] === 'continue') continue;
            }

            return $prints;
        }

        if (str_contains($header, ';')) {
            $parts = array_map('trim', explode(';', $header));

            if (count($parts) !== 3) throw new Exception("For clásico inválido");

            [$init, $condition, $update] = $parts;

            if (!$this->handleShortDeclaration($init, $variables, $symbols)) {
                if (!$this->handleAssignment($init, $variables)) {
                    throw new Exception("Inicialización de for inválida: " . $init);
                }
            }

            while ($this->toBool($this->evalExpr($condition, $variables))) {
                $guard++;
                if ($guard > 1000) throw new Exception("Bucle for excedió el límite de seguridad");

                $result = $this->processLoopBlock($block, $variables, $symbols, $functions);
                $prints = array_merge($prints, $result['prints']);

                if ($result['control'] === 'break') break;

                $this->handleAssignment($update, $variables);

                if ($result['control'] === 'continue') continue;
            }

            return $prints;
        }

        while ($this->toBool($this->evalExpr($header, $variables))) {
            $guard++;
            if ($guard > 1000) throw new Exception("Bucle for excedió el límite de seguridad");

            $result = $this->processLoopBlock($block, $variables, $symbols, $functions);
            $prints = array_merge($prints, $result['prints']);

            if ($result['control'] === 'break') break;
            if ($result['control'] === 'continue') continue;
        }

        return $prints;
    }

    private function processLoopBlock(array $block, array &$variables, array &$symbols, array $functions = []): array
    {
        $prints = [];
        $index = 0;

        while ($index < count($block)) {
            $line = trim($block[$index]);
            $index++;

            if ($line === '' || $line === '{' || $line === '}') continue;

            if ($line === 'break') return ['prints' => $prints, 'control' => 'break'];
            if ($line === 'continue') return ['prints' => $prints, 'control' => 'continue'];

            if ($this->handleConst($line, $variables, $symbols)) continue;
            if ($this->handleArrayDeclaration($line, $variables, $symbols)) continue;
            if ($this->handleVarDeclaration($line, $variables, $symbols)) continue;

            if (preg_match('/^for(?:\s+(.*))?$/', $line, $m)) {
                $header = trim($m[1] ?? '');
                $forBlock = $this->readBracedBlock($block, $index);
                $prints = array_merge($prints, $this->executeForLoop($header, $forBlock, $variables, $symbols, $functions));
                continue;
            }

            if ($this->handleShortDeclaration($line, $variables, $symbols)) continue;
            if ($this->handleArrayAssignment($line, $variables)) continue;
            if ($this->handleAssignment($line, $variables)) continue;

            if (preg_match('/^fmt\.Println\((.*)\)$/', $line, $m)) {
                $prints[] = $this->buildPrintLine($m[1], $variables);
                continue;
            }

            if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\((.*)\)$/', $line, $m)) {
                $prints = array_merge($prints, $this->executeFunctionCall($m[1], $m[2], $variables, $symbols, $functions));
                continue;
            }

            if (preg_match('/^if\s+(.+)$/', $line, $m)) {
                $condition = $this->evalExpr($m[1], $variables);
                $trueBlock = $this->readBracedBlock($block, $index);

                $falseBlock = [];
                $this->skipEmptyLines($block, $index);

                if ($index < count($block) && trim($block[$index]) === 'else') {
                    $index++;
                    $falseBlock = $this->readBracedBlock($block, $index);
                }

                if ($this->toBool($condition)) {
                    $result = $this->processLoopBlock($trueBlock, $variables, $symbols, $functions);
                } else {
                    $result = $this->processLoopBlock($falseBlock, $variables, $symbols, $functions);
                }

                $prints = array_merge($prints, $result['prints']);

                if ($result['control'] !== null) return ['prints' => $prints, 'control' => $result['control']];

                continue;
            }

            if (preg_match('/^switch\s+(.+)$/', $line, $m)) {
                $switchValue = $this->evalExpr($m[1], $variables);
                $switchBlock = $this->readBracedBlock($block, $index);
                $selectedBlock = $this->selectSwitchCase($switchBlock, $switchValue, $variables);

                $subIndex = 0;
                $prints = array_merge($prints, $this->processLines($selectedBlock, $subIndex, $variables, $symbols, $functions));
                continue;
            }
        }

        return ['prints' => $prints, 'control' => null];
    }

    private function selectSwitchCase(array $switchBlock, array $switchValue, array $variables): array
    {
        $cases = [];
        $default = [];
        $currentKey = null;
        $currentLines = [];

        foreach ($switchBlock as $line) {
            $line = trim($line);

            if (preg_match('/^case\s+(.+):$/', $line, $m)) {
                if ($currentKey !== null) {
                    if ($currentKey === '_default_') $default = $currentLines;
                    else $cases[$currentKey] = $currentLines;
                }

                $currentKey = trim($m[1]);
                $currentLines = [];
                continue;
            }

            if (preg_match('/^default:$/', $line)) {
                if ($currentKey !== null) {
                    if ($currentKey === '_default_') $default = $currentLines;
                    else $cases[$currentKey] = $currentLines;
                }

                $currentKey = '_default_';
                $currentLines = [];
                continue;
            }

            if ($currentKey !== null) $currentLines[] = $line;
        }

        if ($currentKey !== null) {
            if ($currentKey === '_default_') $default = $currentLines;
            else $cases[$currentKey] = $currentLines;
        }

        foreach ($cases as $caseExpr => $caseLines) {
            $caseValue = $this->evalExpr($caseExpr, $variables);
            if ($caseValue['value'] == $switchValue['value']) return $caseLines;
        }

        return $default;
    }

    private function readBracedBlock(array $lines, int &$index): array
    {
        $this->skipEmptyLines($lines, $index);

        if ($index >= count($lines) || trim($lines[$index]) !== '{') {
            throw new Exception("Se esperaba bloque con llaves");
        }

        $index++;
        $level = 1;
        $block = [];

        while ($index < count($lines)) {
            $line = trim($lines[$index]);
            $index++;

            if ($line === '{') {
                $level++;
                $block[] = $line;
                continue;
            }

            if ($line === '}') {
                $level--;
                if ($level === 0) break;
                $block[] = $line;
                continue;
            }

            $block[] = $line;
        }

        return $block;
    }

    private function skipEmptyLines(array $lines, int &$index): void
    {
        while ($index < count($lines) && trim($lines[$index]) === '') {
            $index++;
        }
    }

    private function handleConst(string $line, array &$variables, array &$symbols): bool
    {
        if (!preg_match('/^const\s+([a-zA-Z_][a-zA-Z0-9_]*)\s+(int32|float32|bool|rune|string)\s*=\s*(.+)$/', $line, $m)) return false;

        $name = $m[1];
        $type = $m[2];
        $expr = trim($m[3]);

        if (isset($variables[$name])) throw new Exception("Identificador ya declarado: " . $name);

        $value = $this->evalExpr($expr, $variables);
        $value['type'] = $type;
        $value['const'] = true;

        $variables[$name] = $value;

        $symbols[] = [
            'id' => $name,
            'type' => $type,
            'value' => $this->formatValue($value),
            'scope' => 'main',
            'line' => 0,
            'column' => 0,
            'isConst' => true
        ];

        return true;
    }

    private function handleArrayDeclaration(string $line, array &$variables, array &$symbols): bool
    {
        // Matriz sin inicializar: var matrizNoInit [2][2]int32
        if (preg_match('/^var\s+([a-zA-Z_][a-zA-Z0-9_]*)\s+\[(\d+)\]\[(\d+)\](int32|float32|bool|rune|string)$/', $line, $m)) {
            $name = $m[1];
            $rows = (int)$m[2];
            $cols = (int)$m[3];
            $type = $m[4];

            if (isset($variables[$name])) throw new Exception("Variable ya declarada: " . $name);

            $variables[$name] = $this->buildMatrixValue($rows, $cols, $type, '', $variables);

            $symbols[] = [
                'id' => $name,
                'type' => '[' . $rows . '][' . $cols . ']' . $type,
                'value' => 'matrix',
                'scope' => 'main',
                'line' => 0,
                'column' => 0,
                'isConst' => false
            ];

            return true;
        }

        // Matriz inicializada: var matriz [2][2]int32 = [2][2]int32{{1, 2}, {3, 4}}
        if (preg_match('/^var\s+([a-zA-Z_][a-zA-Z0-9_]*)\s+\[(\d+)\]\[(\d+)\](int32|float32|bool|rune|string)\s*=\s*\[(\d+)\]\[(\d+)\]\4\{(.*)\}$/', $line, $m)) {
            $name = $m[1];
            $rows = (int)$m[2];
            $cols = (int)$m[3];
            $type = $m[4];
            $valuesText = trim($m[7]);

            if (isset($variables[$name])) throw new Exception("Variable ya declarada: " . $name);

            $variables[$name] = $this->buildMatrixValue($rows, $cols, $type, $valuesText, $variables);

            $symbols[] = [
                'id' => $name,
                'type' => '[' . $rows . '][' . $cols . ']' . $type,
                'value' => 'matrix',
                'scope' => 'main',
                'line' => 0,
                'column' => 0,
                'isConst' => false
            ];

            return true;
        }

        // Arreglo 1D sin inicializar: var arreglo [5]int32
        if (preg_match('/^var\s+([a-zA-Z_][a-zA-Z0-9_]*)\s+\[(\d+)\](int32|float32|bool|rune|string)$/', $line, $m)) {
            $name = $m[1];
            $size = (int)$m[2];
            $type = $m[3];

            if (isset($variables[$name])) throw new Exception("Variable ya declarada: " . $name);

            $variables[$name] = $this->buildArrayValue($size, $type, '', $variables);

            $symbols[] = [
                'id' => $name,
                'type' => '[' . $size . ']' . $type,
                'value' => 'array',
                'scope' => 'main',
                'line' => 0,
                'column' => 0,
                'isConst' => false
            ];

            return true;
        }

        // Arreglo 1D inicializado: var arreglo [4]int32 = [4]int32{1, 2, 3, 4}
        if (preg_match('/^var\s+([a-zA-Z_][a-zA-Z0-9_]*)\s+\[(\d+)\](int32|float32|bool|rune|string)\s*=\s*\[(\d+)\]\3\{(.*)\}$/', $line, $m)) {
            $name = $m[1];
            $size = (int)$m[2];
            $type = $m[3];
            $valuesText = trim($m[5]);

            if (isset($variables[$name])) throw new Exception("Variable ya declarada: " . $name);

            $variables[$name] = $this->buildArrayValue($size, $type, $valuesText, $variables);

            $symbols[] = [
                'id' => $name,
                'type' => '[' . $size . ']' . $type,
                'value' => 'array',
                'scope' => 'main',
                'line' => 0,
                'column' => 0,
                'isConst' => false
            ];

            return true;
        }

        return false;
    }

    private function buildArrayValue(int $size, string $type, string $valuesText, array $variables): array
    {
        $items = trim($valuesText) === '' ? [] : $this->splitArgs($valuesText);
        $values = [];

        foreach ($items as $item) {
            $value = $this->evalExpr($item, $variables);
            $value['type'] = $type;
            $values[] = $value;
        }

        while (count($values) < $size) {
            $values[] = $this->defaultValue($type);
        }

        return [
            'type' => 'array',
            'subtype' => $type,
            'size' => $size,
            'values' => array_slice($values, 0, $size)
        ];
    }

    private function buildMatrixValue(int $rows, int $cols, string $type, string $valuesText, array $variables): array
    {
        $rowTexts = trim($valuesText) === '' ? [] : $this->splitMatrixRows($valuesText);
        $matrixValues = [];

        for ($r = 0; $r < $rows; $r++) {
            $rowValues = [];

            if (isset($rowTexts[$r])) {
                $cleanRow = trim($rowTexts[$r]);
                $cleanRow = trim($cleanRow, '{} ');
                $items = $cleanRow === '' ? [] : $this->splitArgs($cleanRow);

                foreach ($items as $item) {
                    $value = $this->evalExpr($item, $variables);
                    $value['type'] = $type;
                    $rowValues[] = $value;
                }
            }

            while (count($rowValues) < $cols) {
                $rowValues[] = $this->defaultValue($type);
            }

            $matrixValues[] = array_slice($rowValues, 0, $cols);
        }

        return [
            'type' => 'matrix',
            'subtype' => $type,
            'rows' => $rows,
            'cols' => $cols,
            'values' => $matrixValues
        ];
    }

    private function handleVarDeclaration(string $line, array &$variables, array &$symbols): bool
    {
        if (!preg_match('/^var\s+(.+?)\s+(int32|float32|bool|rune|string)(?:\s*=\s*(.+))?$/', $line, $m)) return false;

        $ids = array_map('trim', explode(',', $m[1]));
        $type = $m[2];
        $exprList = $m[3] ?? null;
        $values = [];

        if ($exprList !== null) {
            $exprs = $this->splitArgs($exprList);
            if (count($ids) !== count($exprs)) throw new Exception("La cantidad de variables y expresiones no coincide");

            foreach ($exprs as $expr) {
                $value = $this->evalExpr($expr, $variables);
                $value['type'] = $type;
                $values[] = $value;
            }
        } else {
            foreach ($ids as $_) $values[] = $this->defaultValue($type);
        }

        foreach ($ids as $i => $id) {
            if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $id)) throw new Exception("Identificador inválido: " . $id);
            if (isset($variables[$id])) throw new Exception("Variable ya declarada: " . $id);

            $variables[$id] = $values[$i];

            $symbols[] = [
                'id' => $id,
                'type' => $type,
                'value' => $this->formatValue($values[$i]),
                'scope' => 'main',
                'line' => 0,
                'column' => 0,
                'isConst' => false
            ];
        }

        return true;
    }

    private function handleShortDeclaration(string $line, array &$variables, array &$symbols): bool
    {
        if (!preg_match('/^(.+?)\s*:=\s*(.+)$/', $line, $m)) return false;

        $ids = array_map('trim', explode(',', $m[1]));
        $exprs = $this->splitArgs($m[2]);

        if (count($ids) > 1 && count($exprs) === 1) {
            $value = $this->evalExpr($exprs[0], $variables);

            if (($value['type'] ?? '') !== 'multi') throw new Exception("La cantidad de variables y expresiones no coincide");
            if (count($ids) !== count($value['values'])) throw new Exception("La cantidad de variables y retornos no coincide");

            foreach ($ids as $i => $id) {
                if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $id)) throw new Exception("Identificador inválido: " . $id);

                $variables[$id] = $value['values'][$i];

                $symbols[] = [
                    'id' => $id,
                    'type' => $value['values'][$i]['type'],
                    'value' => $this->formatValue($value['values'][$i]),
                    'scope' => 'main',
                    'line' => 0,
                    'column' => 0,
                    'isConst' => false
                ];
            }

            return true;
        }

        if (count($ids) !== count($exprs)) throw new Exception("La cantidad de variables y expresiones no coincide");

        foreach ($ids as $i => $id) {
            if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $id)) throw new Exception("Identificador inválido: " . $id);

            $value = $this->evalExpr($exprs[$i], $variables);
            $variables[$id] = $value;

            $symbols[] = [
                'id' => $id,
                'type' => $value['type'],
                'value' => $this->formatValue($value),
                'scope' => 'main',
                'line' => 0,
                'column' => 0,
                'isConst' => false
            ];
        }

        return true;
    }

    private function handleArrayAssignment(string $line, array &$variables): bool
    {
        if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\[([^\[\]]+)\]\[([^\[\]]+)\]\s=\s*(.+)$/', $line, $m)) {
            $name = $m[1];
            $row = (int)$this->evalExpr($m[2], $variables)['value'];
            $col = (int)$this->evalExpr($m[3], $variables)['value'];
            $valueExpr = $m[4];

            if (!isset($variables[$name]) || $variables[$name]['type'] !== 'matrix') throw new Exception("Matriz no declarada: " . $name);
            if ($row < 0 || $row >= $variables[$name]['rows']) throw new Exception("Fila fuera de rango: " . $name . "[" . $row . "]");
            if ($col < 0 || $col >= $variables[$name]['cols']) throw new Exception("Columna fuera de rango: " . $name . "[" . $row . "][" . $col . "]");

            $value = $this->evalExpr($valueExpr, $variables);
            $value['type'] = $variables[$name]['subtype'];
            $variables[$name]['values'][$row][$col] = $value;

            return true;
        }

        if (!preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\[([^\[\]]+)\]\s=\s*(.+)$/', $line, $m)) return false;

        $name = $m[1];
        $index = (int)$this->evalExpr($m[2], $variables)['value'];
        $valueExpr = $m[3];

        if (!isset($variables[$name]) || $variables[$name]['type'] !== 'array') throw new Exception("Arreglo no declarado: " . $name);
        if ($index < 0 || $index >= $variables[$name]['size']) throw new Exception("Índice fuera de rango: " . $name . "[" . $index . "]");

        $value = $this->evalExpr($valueExpr, $variables);
        $value['type'] = $variables[$name]['subtype'];
        $variables[$name]['values'][$index] = $value;

        return true;
    }

    private function handleAssignment(string $line, array &$variables): bool
    {
        if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\+\+$/', $line, $m)) {
            $name = $m[1];
            if (!isset($variables[$name])) throw new Exception("Variable no declarada: " . $name);
            if (($variables[$name]['const'] ?? false) === true) throw new Exception("No se puede modificar constante: " . $name);
            $variables[$name]['value'] = (int)$variables[$name]['value'] + 1;
            return true;
        }

        if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)--$/', $line, $m)) {
            $name = $m[1];
            if (!isset($variables[$name])) throw new Exception("Variable no declarada: " . $name);
            if (($variables[$name]['const'] ?? false) === true) throw new Exception("No se puede modificar constante: " . $name);
            $variables[$name]['value'] = (int)$variables[$name]['value'] - 1;
            return true;
        }

        if (!preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\s(\+=|-=|\=|\/=|=)\s(.+)$/', $line, $m)) return false;

        $name = $m[1];
        $op = $m[2];
        $expr = $m[3];

        if (!isset($variables[$name])) throw new Exception("Variable no declarada: " . $name);
        if (($variables[$name]['const'] ?? false) === true) throw new Exception("No se puede modificar constante: " . $name);

        $right = $this->evalExpr($expr, $variables);

        if ($op === '=') {
            $right['type'] = $variables[$name]['type'];
            $variables[$name] = $right;
            return true;
        }

        $left = $variables[$name];
        $leftNum = (float)$left['value'];
        $rightNum = (float)$right['value'];

        $result = match ($op) {
            '+=' => $leftNum + $rightNum,
            '-=' => $leftNum - $rightNum,
            '*=' => $leftNum * $rightNum,
            '/=' => $rightNum == 0 ? throw new Exception("División entre cero") : $leftNum / $rightNum,
            default => $rightNum
        };

        $variables[$name] = [
            'type' => $left['type'],
            'value' => $left['type'] === 'int32' ? (int)$result : $result
        ];

        return true;
    }

    private function buildPrintLine(string $argsText, array $variables): string
    {
        $args = $this->splitArgs($argsText);
        $parts = [];

        foreach ($args as $arg) {
            if (trim($arg) === '') continue;
            $parts[] = $this->formatValue($this->evalExpr($arg, $variables));
        }

        return implode(' ', $parts);
    }

    private function evalExpr(string $expr, array $variables): array
    {
        $expr = trim($expr);

        while ($this->isWrappedByParentheses($expr)) {
            $expr = trim(substr($expr, 1, -1));
        }

        if ($expr === 'nil') return ['type' => 'nil', 'value' => null];
        if (preg_match('/^"(.*)"$/s', $expr, $m)) return ['type' => 'string', 'value' => stripcslashes($m[1])];
        if (preg_match("/^'(.)'$/s", $expr, $m)) return ['type' => 'rune', 'value' => ord($m[1])];
        if ($expr === 'true' || $expr === 'false') return ['type' => 'bool', 'value' => $expr === 'true'];
        if (preg_match('/^-?\d+\.\d+$/', $expr)) return ['type' => 'float32', 'value' => (float)$expr];
        if (preg_match('/^-?\d+$/', $expr)) return ['type' => 'int32', 'value' => (int)$expr];

        // Literal de matriz en declaración corta: matriz := [2][2]int32{{1, 2}, {3, 4}}
        if (preg_match('/^\[(\d+)\]\[(\d+)\](int32|float32|bool|rune|string)\{(.*)\}$/', $expr, $m)) {
            return $this->buildMatrixValue((int)$m[1], (int)$m[2], $m[3], trim($m[4]), $variables);
        }

        // Literal de arreglo en declaración corta: arr := [4]int32{1, 2, 3, 4}
        if (preg_match('/^\[(\d+)\](int32|float32|bool|rune|string)\{(.*)\}$/', $expr, $m)) {
            return $this->buildArrayValue((int)$m[1], $m[2], trim($m[3]), $variables);
        }

        if (isset($variables[$expr])) return $variables[$expr];

        if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\[([^\[\]]+)\]\[([^\[\]]+)\]$/', $expr, $m)) {
            $name = $m[1];
            $row = (int)$this->evalExpr($m[2], $variables)['value'];
            $col = (int)$this->evalExpr($m[3], $variables)['value'];

            if (!isset($variables[$name]) || $variables[$name]['type'] !== 'matrix') throw new Exception("Matriz no declarada: " . $name);
            if ($row < 0 || $row >= $variables[$name]['rows']) throw new Exception("Fila fuera de rango: " . $name . "[" . $row . "]");
            if ($col < 0 || $col >= $variables[$name]['cols']) throw new Exception("Columna fuera de rango: " . $name . "[" . $row . "][" . $col . "]");

            return $variables[$name]['values'][$row][$col];
        }

        if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\[([^\[\]]+)\]$/', $expr, $m)) {
            $name = $m[1];
            $index = (int)$this->evalExpr($m[2], $variables)['value'];

            if (!isset($variables[$name]) || $variables[$name]['type'] !== 'array') throw new Exception("Arreglo no declarado: " . $name);
            if ($index < 0 || $index >= $variables[$name]['size']) throw new Exception("Índice fuera de rango: " . $name . "[" . $index . "]");

            return $variables[$name]['values'][$index];
        }

        if (preg_match('/^len\((.*)\)$/', $expr, $m)) {
            $value = $this->evalExpr(trim($m[1]), $variables);

            if ($value['type'] === 'string') return ['type' => 'int32', 'value' => strlen($value['value'])];
            if ($value['type'] === 'array') return ['type' => 'int32', 'value' => $value['size']];
            if ($value['type'] === 'matrix') return ['type' => 'int32', 'value' => $value['rows']];

            throw new Exception("len no soporta tipo: " . $value['type']);
        }

        if (preg_match('/^substr\((.*)\)$/', $expr, $m)) {
            $args = $this->splitArgs($m[1]);
            if (count($args) !== 3) throw new Exception("substr requiere 3 argumentos");

            $text = $this->evalExpr($args[0], $variables);
            $start = $this->evalExpr($args[1], $variables);
            $length = $this->evalExpr($args[2], $variables);

            if ($text['type'] !== 'string') throw new Exception("substr requiere string como primer argumento");

            return [
                'type' => 'string',
                'value' => substr($text['value'], (int)$start['value'], (int)$length['value'])
            ];
        }

        if (preg_match('/^typeOf\((.*)\)$/', $expr, $m)) {
            $value = $this->evalExpr(trim($m[1]), $variables);
            return ['type' => 'string', 'value' => $value['type']];
        }

        if (preg_match('/^now\(\)$/', $expr)) {
            return ['type' => 'string', 'value' => date('Y-m-d H:i:s')];
        }

        if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\((.*)\)$/', $expr, $m)) {
            return $this->executeFunctionReturn($m[1], $m[2], $variables);
        }

        if (str_starts_with($expr, '!')) {
            $v = $this->evalExpr(substr($expr, 1), $variables);
            return ['type' => 'bool', 'value' => !$this->toBool($v)];
        }

        $pos = $this->findTopLevelOperator($expr, ['||']);
        if ($pos !== -1) {
            $left = $this->evalExpr(substr($expr, 0, $pos), $variables);
            if ($this->toBool($left)) return ['type' => 'bool', 'value' => true];

            $right = $this->evalExpr(substr($expr, $pos + 2), $variables);
            return ['type' => 'bool', 'value' => $this->toBool($right)];
        }

        $pos = $this->findTopLevelOperator($expr, ['&&']);
        if ($pos !== -1) {
            $left = $this->evalExpr(substr($expr, 0, $pos), $variables);
            if (!$this->toBool($left)) return ['type' => 'bool', 'value' => false];

            $right = $this->evalExpr(substr($expr, $pos + 2), $variables);
            return ['type' => 'bool', 'value' => $this->toBool($right)];
        }

        foreach (['>=', '<=', '==', '!=', '>', '<'] as $op) {
            $pos = $this->findTopLevelOperator($expr, [$op]);

            if ($pos !== -1) {
                $left = $this->evalExpr(substr($expr, 0, $pos), $variables);
                $right = $this->evalExpr(substr($expr, $pos + strlen($op)), $variables);

                $lv = $left['value'];
                $rv = $right['value'];

                $result = match ($op) {
                    '>=' => $lv >= $rv,
                    '<=' => $lv <= $rv,
                    '==' => $lv == $rv,
                    '!=' => $lv != $rv,
                    '>' => $lv > $rv,
                    '<' => $lv < $rv,
                };

                return ['type' => 'bool', 'value' => $result];
            }
        }

        $pos = $this->findMainOperator($expr, ['+', '-']);
        if ($pos !== -1) {
            $op = $expr[$pos];
            $left = $this->evalExpr(substr($expr, 0, $pos), $variables);
            $right = $this->evalExpr(substr($expr, $pos + 1), $variables);

            if ($op === '+' && ($left['type'] === 'string' || $right['type'] === 'string')) {
                return ['type' => 'string', 'value' => $this->formatValue($left) . $this->formatValue($right)];
            }

            $value = $op === '+' ? $left['value'] + $right['value'] : $left['value'] - $right['value'];
            $type = ($left['type'] === 'float32' || $right['type'] === 'float32') ? 'float32' : 'int32';

            return ['type' => $type, 'value' => $type === 'int32' ? (int)$value : $value];
        }

        $pos = $this->findMainOperator($expr, ['*', '/', '%']);
        if ($pos !== -1) {
            $op = $expr[$pos];
            $left = $this->evalExpr(substr($expr, 0, $pos), $variables);
            $right = $this->evalExpr(substr($expr, $pos + 1), $variables);

            if (($op === '/' || $op === '%') && (float)$right['value'] == 0) {
                throw new Exception($op === '/' ? "División entre cero" : "Módulo entre cero");
            }

            $value = match ($op) {
                '*' => $left['value'] * $right['value'],
                '/' => $left['type'] === 'int32' && $right['type'] === 'int32'
                    ? intdiv((int)$left['value'], (int)$right['value'])
                    : $left['value'] / $right['value'],
                '%' => (int)$left['value'] % (int)$right['value'],
            };

            $type = ($left['type'] === 'float32' || $right['type'] === 'float32') ? 'float32' : 'int32';

            return ['type' => $type, 'value' => $type === 'int32' ? (int)$value : $value];
        }

        if (preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $expr)) throw new Exception("Variable no declarada: " . $expr);

        throw new Exception("Expresión no soportada: " . $expr);
    }

    private function defaultValue(string $type): array
    {
        return match ($type) {
            'int32' => ['type' => 'int32', 'value' => 0],
            'float32' => ['type' => 'float32', 'value' => 0.0],
            'bool' => ['type' => 'bool', 'value' => false],
            'rune' => ['type' => 'rune', 'value' => 0],
            'string' => ['type' => 'string', 'value' => ''],
            default => ['type' => $type, 'value' => null],
        };
    }

    private function formatValue(array $value): string
    {
        return match ($value['type']) {
            'bool' => $value['value'] ? 'true' : 'false',
            'nil' => '<nil>',
            'float32' => ((float)$value['value'] == 0.0) ? '0' : rtrim(rtrim((string)$value['value'], '0'), '.'),
            'array' => 'array',
            'matrix' => 'matrix',
            default => (string)$value['value'],
        };
    }

    private function toBool(array $value): bool
    {
        return (bool)$value['value'];
    }

    private function splitArgs(string $text): array
    {
        $args = [];
        $current = '';
        $levelParen = 0;
        $levelBracket = 0;
        $levelBrace = 0;
        $inString = false;
        $inRune = false;
        $length = strlen($text);

        for ($i = 0; $i < $length; $i++) {
            $ch = $text[$i];

            if ($ch === '"' && !$inRune && ($i === 0 || $text[$i - 1] !== '\\')) {
                $inString = !$inString;
            } elseif ($ch === "'" && !$inString && ($i === 0 || $text[$i - 1] !== '\\')) {
                $inRune = !$inRune;
            } elseif (!$inString && !$inRune) {
                if ($ch === '(') $levelParen++;
                if ($ch === ')') $levelParen--;
                if ($ch === '[') $levelBracket++;
                if ($ch === ']') $levelBracket--;
                if ($ch === '{') $levelBrace++;
                if ($ch === '}') $levelBrace--;

                if ($ch === ',' && $levelParen === 0 && $levelBracket === 0 && $levelBrace === 0) {
                    $args[] = trim($current);
                    $current = '';
                    continue;
                }
            }

            $current .= $ch;
        }

        if (trim($current) !== '') $args[] = trim($current);

        return $args;
    }

    private function prepareLines(string $body): array
    {
        $rawLines = preg_split('/\R+/', $body);
        $lines = [];

        foreach ($rawLines as $line) {
            $line = trim($line);
            $line = rtrim($line, ';');

            if ($line === '') continue;

            if ($line === '} else {') {
                $lines[] = '}';
                $lines[] = 'else';
                $lines[] = '{';
                continue;
            }

            if ($line === '} else') {
                $lines[] = '}';
                $lines[] = 'else';
                continue;
            }

            if (preg_match('/^else\s*\{$/', $line)) {
                $lines[] = 'else';
                $lines[] = '{';
                continue;
            }

            if (preg_match('/^(if|for|switch)\b(.+)?\{$/', $line)) {
                $lineWithoutBrace = trim(substr($line, 0, -1));
                $lines[] = $lineWithoutBrace;
                $lines[] = '{';
                continue;
            }

            if ($line === '{' || $line === '}') {
                $lines[] = $line;
                continue;
            }

            $lines[] = $line;
        }

        return $lines;
    }

    private function removeComments(string $code): string
    {
        $code = preg_replace('/\/\.?\*\//s', '', $code);
        return preg_replace('/\/\/.*$/m', '', $code);
    }

    private function extractFunctions(string $code): array
    {
        $functions = [];

        if (!preg_match_all('/func\s+([a-zA-Z_][a-zA-Z0-9_]*)\s*\(([^)]*)\)\s*([^{}]*)\{/', $code, $matches, PREG_OFFSET_CAPTURE)) {
            return $functions;
        }

        foreach ($matches[1] as $i => $match) {
            $name = $match[0];

            if ($name === 'main') continue;

            $paramsText = trim($matches[2][$i][0]);
            $returnText = trim($matches[3][$i][0]);
            $params = $this->parseFunctionParams($paramsText);

            $funcStart = $matches[0][$i][1];
            $bracePos = strpos($code, '{', $funcStart);

            if ($bracePos === false) continue;

            $level = 0;
            $bodyStart = $bracePos + 1;
            $length = strlen($code);

            for ($j = $bracePos; $j < $length; $j++) {
                if ($code[$j] === '{') {
                    $level++;
                } elseif ($code[$j] === '}') {
                    $level--;

                    if ($level === 0) {
                        $functions[$name] = [
                            'params' => $params,
                            'return' => $returnText,
                            'body' => substr($code, $bodyStart, $j - $bodyStart),
                        ];
                        break;
                    }
                }
            }
        }

        return $functions;
    }

    private function parseFunctionParams(string $paramsText): array
    {
        $params = [];

        if ($paramsText === '') return $params;

        $parts = $this->splitArgs($paramsText);

        foreach ($parts as $part) {
            $part = trim($part);

            if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\s+\*(int32|float32|bool|rune|string)$/', $part, $m)) {
                $params[] = [
                    'name' => $m[1],
                    'type' => $m[2],
                    'byRef' => true,
                ];
                continue;
            }

            if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\s+\*\[(\d+)\](int32|float32|bool|rune|string)$/', $part, $m)) {
                $params[] = [
                    'name' => $m[1],
                    'type' => 'array',
                    'subtype' => $m[3],
                    'size' => (int)$m[2],
                    'byRef' => true,
                ];
                continue;
            }

            if (preg_match('/^([a-zA-Z_][a-zA-Z0-9_]*)\s+(int32|float32|bool|rune|string)$/', $part, $m)) {
                $params[] = [
                    'name' => $m[1],
                    'type' => $m[2],
                    'byRef' => false,
                ];
                continue;
            }

            throw new Exception("Parámetro de función no soportado: " . $part);
        }

        return $params;
    }

    private function extractMainBody(string $code): string
    {
        $pos = strpos($code, 'func main');

        if ($pos === false) throw new Exception("No se encontró la función main()");

        $startBrace = strpos($code, '{', $pos);

        if ($startBrace === false) throw new Exception("main() no tiene bloque");

        $level = 0;
        $length = strlen($code);
        $bodyStart = $startBrace + 1;

        for ($i = $startBrace; $i < $length; $i++) {
            if ($code[$i] === '{') {
                $level++;
            } elseif ($code[$i] === '}') {
                $level--;

                if ($level === 0) return substr($code, $bodyStart, $i - $bodyStart);
            }
        }

        throw new Exception("Bloque main() incompleto");
    }

    private function isWrappedByParentheses(string $expr): bool
    {
        if (strlen($expr) < 2 || $expr[0] !== '(' || substr($expr, -1) !== ')') return false;

        $level = 0;

        for ($i = 0; $i < strlen($expr); $i++) {
            if ($expr[$i] === '(') $level++;
            elseif ($expr[$i] === ')') $level--;

            if ($level === 0 && $i < strlen($expr) - 1) return false;
        }

        return $level === 0;
    }

    private function findTopLevelOperator(string $expr, array $operators): int
    {
        $levelParen = 0;
        $levelBracket = 0;
        $inString = false;
        $inRune = false;

        for ($i = strlen($expr) - 1; $i >= 0; $i--) {
            $ch = $expr[$i];

            if ($ch === '"' && !$inRune && ($i === 0 || $expr[$i - 1] !== '\\')) $inString = !$inString;
            if ($ch === "'" && !$inString && ($i === 0 || $expr[$i - 1] !== '\\')) $inRune = !$inRune;

            if ($inString || $inRune) continue;

            if ($ch === ')') {
                $levelParen++;
                continue;
            }

            if ($ch === '(') {
                $levelParen--;
                continue;
            }

            if ($ch === ']') {
                $levelBracket++;
                continue;
            }

            if ($ch === '[') {
                $levelBracket--;
                continue;
            }

            if ($levelParen === 0 && $levelBracket === 0) {
                foreach ($operators as $op) {
                    $start = $i - strlen($op) + 1;

                    if ($start >= 0 && substr($expr, $start, strlen($op)) === $op) {
                        return $start;
                    }
                }
            }
        }

        return -1;
    }

    private function findMainOperator(string $expr, array $operators): int
    {
        $levelParen = 0;
        $levelBracket = 0;
        $inString = false;
        $inRune = false;

        for ($i = strlen($expr) - 1; $i >= 0; $i--) {
            $ch = $expr[$i];

            if ($ch === '"' && !$inRune && ($i === 0 || $expr[$i - 1] !== '\\')) $inString = !$inString;
            if ($ch === "'" && !$inString && ($i === 0 || $expr[$i - 1] !== '\\')) $inRune = !$inRune;

            if ($inString || $inRune) continue;

            if ($ch === ')') {
                $levelParen++;
                continue;
            }

            if ($ch === '(') {
                $levelParen--;
                continue;
            }

            if ($ch === ']') {
                $levelBracket++;
                continue;
            }

            if ($ch === '[') {
                $levelBracket--;
                continue;
            }

            if ($levelParen === 0 && $levelBracket === 0 && in_array($ch, $operators, true)) {
                if ($i === 0) continue;
                return $i;
            }
        }

        return -1;
    }

    private function splitMatrixRows(string $text): array
    {
        $rows = [];
        $current = '';
        $level = 0;
        $inString = false;
        $inRune = false;
        $length = strlen($text);

        for ($i = 0; $i < $length; $i++) {
            $ch = $text[$i];

            if ($ch === '"' && !$inRune && ($i === 0 || $text[$i - 1] !== '\\')) {
                $inString = !$inString;
            } elseif ($ch === "'" && !$inString && ($i === 0 || $text[$i - 1] !== '\\')) {
                $inRune = !$inRune;
            } elseif (!$inString && !$inRune) {
                if ($ch === '{') $level++;
                if ($ch === '}') $level--;

                if ($ch === ',' && $level === 0) {
                    if (trim($current) !== '') $rows[] = trim($current);
                    $current = '';
                    continue;
                }
            }

            $current .= $ch;
        }

        if (trim($current) !== '') $rows[] = trim($current);

        return $rows;
    }
}