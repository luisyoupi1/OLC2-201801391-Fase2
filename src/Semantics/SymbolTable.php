<?php

require_once __DIR__ . '/Symbol.php';

class SymbolTable
{
    private array $scopes = [];
    private array $scopeStack = [];
    private array $history = [];

    public function __construct()
    {
        $this->enterScope('global');
    }

    public function enterScope(string $scopeName): void
    {
        $this->scopes[$scopeName] = $this->scopes[$scopeName] ?? [];
        $this->scopeStack[] = $scopeName;
    }

    public function exitScope(): void
    {
        array_pop($this->scopeStack);
    }

    public function currentScope(): string
    {
        return $this->scopeStack[count($this->scopeStack) - 1];
    }

    public function define(
        string $id,
        string $type,
        $value,
        int $line = 0,
        int $column = 0,
        bool $isConst = false
    ): void {
        $scope = $this->currentScope();

        if (isset($this->scopes[$scope][$id])) {
            throw new Exception("La variable '$id' ya fue declarada en el ámbito '$scope'");
        }

        $symbol = new Symbol($id, $type, $value, $scope, $line, $column, $isConst);

        $this->scopes[$scope][$id] = $symbol;
        $this->history[] = $symbol;
    }

    public function assign(string $id, $value, string $type): void
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            $scope = $this->scopeStack[$i];

            if (isset($this->scopes[$scope][$id])) {
                if ($this->scopes[$scope][$id]->isConst) {
                    throw new Exception("No se puede modificar la constante '$id'");
                }

                $this->scopes[$scope][$id]->value = $value;
                $this->scopes[$scope][$id]->type = $type;
                return;
            }
        }

        throw new Exception("Variable no declarada: $id");
    }

    public function get(string $id): Symbol
    {
        for ($i = count($this->scopeStack) - 1; $i >= 0; $i--) {
            $scope = $this->scopeStack[$i];

            if (isset($this->scopes[$scope][$id])) {
                return $this->scopes[$scope][$id];
            }
        }

        throw new Exception("Variable no declarada: $id");
    }

    public function all(): array
    {
        return $this->history;
    }
}