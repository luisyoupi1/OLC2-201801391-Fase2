<?php

namespace Src\Compiler;

class Arm64Runtime
{
    private function isWindows(): bool
    {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }

    private function getCommands(): array
    {
        if ($this->isWindows()) {
            // Si estás usando WSL
            return [
                'as' => 'wsl aarch64-linux-gnu-as',
                'ld' => 'wsl aarch64-linux-gnu-ld',
                'run' => 'wsl qemu-aarch64'
            ];
        }

        // Linux (Lubuntu / Ubuntu)
        return [
            'as' => 'aarch64-linux-gnu-as',
            'ld' => 'aarch64-linux-gnu-ld',
            'run' => 'qemu-aarch64'
        ];
    }

    public function assemble(string $asmPath, string $objPath): array
    {
        $cmds = $this->getCommands();

        $cmd = $cmds['as'] . ' ' . escapeshellarg($asmPath) . ' -o ' . escapeshellarg($objPath) . ' 2>&1';
        exec($cmd, $output, $code);

        return [
            'success' => $code === 0,
            'output' => implode(PHP_EOL, $output),
        ];
    }

    public function link(string $objPath, string $outPath): array
    {
        $cmds = $this->getCommands();

        $cmd = $cmds['ld'] . ' ' . escapeshellarg($objPath) . ' -o ' . escapeshellarg($outPath) . ' 2>&1';
        exec($cmd, $output, $code);

        return [
            'success' => $code === 0,
            'output' => implode(PHP_EOL, $output),
        ];
    }

    public function run(string $binPath): array
    {
        $cmds = $this->getCommands();

        $cmd = $cmds['run'] . ' ' . escapeshellarg($binPath) . ' 2>&1';
        exec($cmd, $output, $code);

        return [
            'success' => $code === 0,
            'output' => implode(PHP_EOL, $output),
        ];
    }
}