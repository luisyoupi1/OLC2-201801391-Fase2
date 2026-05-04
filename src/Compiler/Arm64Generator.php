<?php

namespace Src\Compiler;

class Arm64Generator
{
    private Arm64Emitter $emitter;
    private int $labelCounter = 0;
    private int $printCounter = 0;

    public function __construct()
    {
        $this->emitter = new Arm64Emitter();
    }

    public function generateMultiplePrints(array $values): string
    {
        $lines = array_map(fn($v) => (string)$v, $values);
        return $this->generatePrintLines($lines);
    }

    public function generatePrintLines(array $lines): string
    {
        $this->emitter->addText("_start:");

        foreach ($lines as $line) {
            $this->emitPrintLine((string)$line);
        }

        $this->emitExit();

        return $this->emitter->render();
    }

    public function generateMixedFlow(
        array $beforePrints,
        array $condition,
        array $truePrints,
        array $falsePrints,
        array $afterPrints = []
    ): string {
        $this->emitter->addText("_start:");

        foreach ($beforePrints as $line) {
            $this->emitPrintLine((string)$line);
        }

        $id = $this->labelCounter++;
        $elseLabel = "L_else_" . $id;
        $endLabel = "L_end_if_" . $id;

        $this->emitter->addText("    # if {$condition['left']} {$condition['op']} {$condition['right']}");
        $this->emitter->addText("    mov x9, #{$condition['left']}");
        $this->emitter->addText("    mov x10, #{$condition['right']}");
        $this->emitter->addText("    cmp x9, x10");
        $this->emitter->addText("    " . $this->inverseBranch($condition['op']) . " {$elseLabel}");

        foreach ($truePrints as $line) {
            $this->emitPrintLine((string)$line);
        }

        $this->emitter->addText("    b {$endLabel}");
        $this->emitter->addText("{$elseLabel}:");

        foreach ($falsePrints as $line) {
            $this->emitPrintLine((string)$line);
        }

        $this->emitter->addText("{$endLabel}:");

        foreach ($afterPrints as $line) {
            $this->emitPrintLine((string)$line);
        }

        $this->emitExit();

        return $this->emitter->render();
    }

    private function emitPrintLine(string $line): void
    {
        $id = $this->printCounter++;
        $label = "msg_" . $id;

        $raw = $line . "\n";
        $text = $this->escapeAsmString($raw);
        $length = strlen($raw);

        $this->emitter->addData($label . ': .ascii "' . $text . '"');

        $this->emitter->addText("    mov x0, #1");
        $this->emitter->addText("    adrp x1, {$label}");
        $this->emitter->addText("    add x1, x1, :lo12:{$label}");
        $this->emitter->addText("    mov x2, #{$length}");
        $this->emitter->addText("    mov x8, #64");
        $this->emitter->addText("    svc #0");
    }

    private function emitExit(): void
    {
        $this->emitter->addText("    mov x0, #0");
        $this->emitter->addText("    mov x8, #93");
        $this->emitter->addText("    svc #0");
    }

    private function inverseBranch(string $op): string
    {
        return match ($op) {
            '>' => 'b.le',
            '>=' => 'b.lt',
            '<' => 'b.ge',
            '<=' => 'b.gt',
            '==' => 'b.ne',
            '!=' => 'b.eq',
            default => 'b',
        };
    }

    private function escapeAsmString(string $text): string
    {
        return str_replace(
            ["\\", "\"", "\n", "\t"],
            ["\\\\", "\\\"", "\\n", "\\t"],
            $text
        );
    }
}