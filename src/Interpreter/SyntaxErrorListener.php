<?php

use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;

class SyntaxErrorListener extends BaseErrorListener
{
    private array $errors = [];

    public function syntaxError(
        $recognizer,
        $offendingSymbol,
        $line,
        $charPositionInLine,
        $msg,
        $e
    ): void {
        $this->errors[] = [
            'type' => 'Sintáctico',
            'message' => $msg,
            'line' => (int)$line,
            'column' => (int)$charPositionInLine
        ];
    }

    public function getErrors(): array
    {
        return $this->errors;
    }

    public function hasErrors(): bool
    {
        return count($this->errors) > 0;
    }
}