<?php

require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../generated/grammar/GolampiLexer.php';
require_once __DIR__ . '/../generated/grammar/GolampiParser.php';

use Antlr\Antlr4\Runtime\InputStream;
use Antlr\Antlr4\Runtime\CommonTokenStream;

$code = 'fmt.Println("Hola mundo")';

$input = InputStream::fromString($code);
$lexer = new GolampiLexer($input);
$tokens = new CommonTokenStream($lexer);
$parser = new GolampiParser($tokens);

$tree = $parser->program();

echo "Parser ejecutado correctamente";