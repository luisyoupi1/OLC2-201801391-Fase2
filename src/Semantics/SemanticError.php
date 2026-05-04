<?php

class SemanticError
{
    public string $type;
    public string $message;
    public int $line;
    public int $column;

    public function __construct(string $type, string $message, int $line = 0, int $column = 0)
    {
        $this->type = $type;
        $this->message = $message;
        $this->line = $line;
        $this->column = $column;
    }
}