<?php

namespace Src\Compiler;

class Arm64Emitter
{
    private array $data = [];
    private array $text = [];

    public function addData(string $line): void
    {
        $this->data[] = $line;
    }

    public function addText(string $line): void
    {
        $this->text[] = $line;
    }

    public function addTextBlock(array $lines): void
    {
        foreach ($lines as $line) {
            $this->text[] = $line;
        }
    }

    public function render(): string
    {
        $out = [];

        if (!empty($this->data)) {
            $out[] = ".section .data";
            foreach ($this->data as $line) {
                $out[] = $line;
            }
            $out[] = "";
        }

        $out[] = ".section .text";
        $out[] = ".global _start";
        $out[] = "";

        foreach ($this->text as $line) {
            $out[] = $line;
        }

        return implode(PHP_EOL, $out) . PHP_EOL;
    }
}