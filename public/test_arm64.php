<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../generated/grammar/GolampiLexer.php';
require_once __DIR__ . '/../generated/grammar/GolampiParser.php';
require_once __DIR__ . '/../generated/grammar/GolampiVisitor.php';
require_once __DIR__ . '/../generated/grammar/GolampiBaseVisitor.php';

require_once __DIR__ . '/../src/Compiler/Arm64Emitter.php';
require_once __DIR__ . '/../src/Compiler/Arm64Generator.php';
require_once __DIR__ . '/../src/Compiler/GolampiCompiler.php';

use Src\Compiler\GolampiCompiler;

$inputCode = "
func main() {
    var x int32 = 2 + 3
    fmt.Println(x)
}
";

try {
    $compiler = new GolampiCompiler();
    $result = $compiler->compileSource($inputCode);

    $asm = $result['asm'];

    $outputDir = __DIR__ . '/../storage/outputs';
    if (!is_dir($outputDir)) {
        mkdir($outputDir, 0777, true);
    }

    file_put_contents($outputDir . '/program.s', $asm);

    echo "<h2>ASM generado</h2>";
    echo "<pre>" . htmlspecialchars($asm) . "</pre>";

} catch (Throwable $e) {
    echo "<h2>Error</h2>";
    echo "<pre>" . htmlspecialchars($e->getMessage()) . "</pre>";
}