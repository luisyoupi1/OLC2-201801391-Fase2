<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../src/Compiler/Arm64Emitter.php';
require_once __DIR__ . '/../src/Compiler/Arm64Generator.php';
require_once __DIR__ . '/../src/Compiler/GolampiCompiler.php';

use Src\Compiler\GolampiCompiler;

header('Content-Type: application/json; charset=utf-8');

try {
    // Leer JSON enviado por app.js
    $rawInput = file_get_contents('php://input');
    $json = json_decode($rawInput, true);

    $code = $json['code'] ?? ($_POST['code'] ?? '');

    if (trim($code) === '') {
        throw new Exception("No se proporcionó código.");
    }

    $compiler = new GolampiCompiler();
    $result = $compiler->compileSource($code);

    // Guardar program.s
    $outputDir = __DIR__ . '/../storage/outputs';

    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    $filePath = $outputDir . '/program.s';

    if (file_put_contents($filePath, $result['asm']) === false) {
        throw new Exception("No se pudo guardar program.s en: " . $filePath);
    }

    echo json_encode([
        'success' => true,
        'output' => $result['asm'],
        'asm' => $result['asm'],
        'symbols' => $result['symbols'] ?? [],
        'errors' => [],
        'file' => $filePath
    ]);

} catch (Throwable $e) {
    echo json_encode([
        'success' => false,
        'output' => '',
        'asm' => '',
        'symbols' => [],
        'errors' => [
            [
                'type' => 'Semántico',
                'line' => 0,
                'column' => 0,
                'message' => $e->getMessage()
            ]
        ]
    ]);
}