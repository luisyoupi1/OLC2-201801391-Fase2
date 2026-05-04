<?php

class Symbol
{
    public string $id;
    public string $type;
    public $value;
    public string $scope;
    public int $line;
    public int $column;
    public bool $isConst;

    public function __construct(
        string $id,
        string $type,
        $value,
        string $scope,
        int $line = 0,
        int $column = 0,
        bool $isConst = false
    ) {
        $this->id = $id;
        $this->type = $type;
        $this->value = $value;
        $this->scope = $scope;
        $this->line = $line;
        $this->column = $column;
        $this->isConst = $isConst;
    }
}