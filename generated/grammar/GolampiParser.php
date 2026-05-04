<?php

/*
 * Generated from grammar/Golampi.g4 by ANTLR 4.13.1
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class GolampiParser extends Parser
	{
		public const T__0 = 1, T__1 = 2, T__2 = 3, T__3 = 4, T__4 = 5, T__5 = 6, 
               T__6 = 7, T__7 = 8, T__8 = 9, T__9 = 10, T__10 = 11, T__11 = 12, 
               T__12 = 13, T__13 = 14, T__14 = 15, T__15 = 16, T__16 = 17, 
               T__17 = 18, T__18 = 19, T__19 = 20, T__20 = 21, T__21 = 22, 
               T__22 = 23, T__23 = 24, T__24 = 25, T__25 = 26, T__26 = 27, 
               T__27 = 28, T__28 = 29, T__29 = 30, T__30 = 31, T__31 = 32, 
               T__32 = 33, T__33 = 34, T__34 = 35, T__35 = 36, T__36 = 37, 
               T__37 = 38, T__38 = 39, T__39 = 40, T__40 = 41, T__41 = 42, 
               T__42 = 43, T__43 = 44, T__44 = 45, T__45 = 46, T__46 = 47, 
               T__47 = 48, T__48 = 49, T__49 = 50, T__50 = 51, T__51 = 52, 
               T__52 = 53, T__53 = 54, BOOL = 55, RUNE = 56, ID = 57, FLOAT = 58, 
               INT = 59, STRING = 60, LINE_COMMENT = 61, BLOCK_COMMENT = 62, 
               WS = 63;

		public const RULE_program = 0, RULE_functionDecl = 1, RULE_paramList = 2, 
               RULE_param = 3, RULE_returnTypes = 4, RULE_dataType = 5, 
               RULE_statement = 6, RULE_idList = 7, RULE_lvalueList = 8, 
               RULE_exprList = 9, RULE_block = 10, RULE_lvalue = 11, RULE_arrayAccess = 12, 
               RULE_varDecl = 13, RULE_constDecl = 14, RULE_shortVarDecl = 15, 
               RULE_assignStmt = 16, RULE_compoundAssignStmt = 17, RULE_incStmt = 18, 
               RULE_printStmt = 19, RULE_ifStmt = 20, RULE_switchStmt = 21, 
               RULE_switchCase = 22, RULE_defaultCase = 23, RULE_forStmt = 24, 
               RULE_forInit = 25, RULE_forCondition = 26, RULE_forUpdate = 27, 
               RULE_varDeclNoSemi = 28, RULE_shortVarDeclNoSemi = 29, RULE_assignNoSemi = 30, 
               RULE_compoundAssignNoSemi = 31, RULE_incNoSemi = 32, RULE_breakStmt = 33, 
               RULE_continueStmt = 34, RULE_returnStmt = 35, RULE_exprStmt = 36, 
               RULE_typeSpec = 37, RULE_pointerType = 38, RULE_arrayType = 39, 
               RULE_arrayLiteral = 40, RULE_arrayElements = 41, RULE_arrayElement = 42, 
               RULE_nestedArrayLiteral = 43, RULE_expr = 44, RULE_builtinCall = 45, 
               RULE_argList = 46;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'functionDecl', 'paramList', 'param', 'returnTypes', 'dataType', 
			'statement', 'idList', 'lvalueList', 'exprList', 'block', 'lvalue', 'arrayAccess', 
			'varDecl', 'constDecl', 'shortVarDecl', 'assignStmt', 'compoundAssignStmt', 
			'incStmt', 'printStmt', 'ifStmt', 'switchStmt', 'switchCase', 'defaultCase', 
			'forStmt', 'forInit', 'forCondition', 'forUpdate', 'varDeclNoSemi', 'shortVarDeclNoSemi', 
			'assignNoSemi', 'compoundAssignNoSemi', 'incNoSemi', 'breakStmt', 'continueStmt', 
			'returnStmt', 'exprStmt', 'typeSpec', 'pointerType', 'arrayType', 'arrayLiteral', 
			'arrayElements', 'arrayElement', 'nestedArrayLiteral', 'expr', 'builtinCall', 
			'argList'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'func'", "'('", "')'", "','", "'{'", "'}'", "'*'", "'['", "']'", 
		    "'var'", "'='", "';'", "'const'", "':='", "'+='", "'-='", "'*='", 
		    "'/='", "'++'", "'fmt.Println'", "'if'", "'else'", "'switch'", "'case'", 
		    "':'", "'default'", "'for'", "'break'", "'continue'", "'return'", 
		    "'int32'", "'float32'", "'bool'", "'string'", "'rune'", "'-'", "'&'", 
		    "'!'", "'/'", "'%'", "'+'", "'>'", "'<'", "'>='", "'<='", "'=='", 
		    "'!='", "'&&'", "'||'", "'nil'", "'len'", "'typeOf'", "'now'", "'substr'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    null, null, null, null, null, null, null, null, null, null, null, 
		    "BOOL", "RUNE", "ID", "FLOAT", "INT", "STRING", "LINE_COMMENT", "BLOCK_COMMENT", 
		    "WS"
		];

		private const SERIALIZED_ATN =
			[4, 1, 63, 541, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 2, 44, 7, 44, 2, 45, 7, 45, 2, 46, 7, 46, 1, 0, 5, 0, 96, 
		    8, 0, 10, 0, 12, 0, 99, 9, 0, 1, 0, 1, 0, 1, 1, 1, 1, 1, 1, 1, 1, 
		    3, 1, 107, 8, 1, 1, 1, 1, 1, 3, 1, 111, 8, 1, 1, 1, 1, 1, 1, 2, 1, 
		    2, 1, 2, 5, 2, 118, 8, 2, 10, 2, 12, 2, 121, 9, 2, 1, 3, 1, 3, 1, 
		    3, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 5, 4, 131, 8, 4, 10, 4, 12, 4, 134, 
		    9, 4, 1, 4, 1, 4, 3, 4, 138, 8, 4, 1, 5, 1, 5, 1, 5, 3, 5, 143, 8, 
		    5, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 6, 1, 
		    6, 1, 6, 1, 6, 1, 6, 3, 6, 159, 8, 6, 1, 7, 1, 7, 1, 7, 5, 7, 164, 
		    8, 7, 10, 7, 12, 7, 167, 9, 7, 1, 8, 1, 8, 1, 8, 5, 8, 172, 8, 8, 
		    10, 8, 12, 8, 175, 9, 8, 1, 9, 1, 9, 1, 9, 5, 9, 180, 8, 9, 10, 9, 
		    12, 9, 183, 9, 9, 1, 9, 3, 9, 186, 8, 9, 1, 10, 1, 10, 5, 10, 190, 
		    8, 10, 10, 10, 12, 10, 193, 9, 10, 1, 10, 1, 10, 1, 11, 1, 11, 1, 
		    11, 1, 11, 1, 11, 1, 11, 1, 11, 5, 11, 204, 8, 11, 10, 11, 12, 11, 
		    207, 9, 11, 3, 11, 209, 8, 11, 1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 
		    4, 12, 216, 8, 12, 11, 12, 12, 12, 217, 1, 13, 1, 13, 1, 13, 1, 13, 
		    1, 13, 1, 13, 3, 13, 226, 8, 13, 1, 13, 1, 13, 1, 13, 1, 13, 1, 13, 
		    3, 13, 233, 8, 13, 1, 13, 3, 13, 236, 8, 13, 3, 13, 238, 8, 13, 1, 
		    14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 3, 14, 246, 8, 14, 1, 15, 1, 
		    15, 1, 15, 1, 15, 3, 15, 252, 8, 15, 1, 16, 1, 16, 1, 16, 1, 16, 3, 
		    16, 258, 8, 16, 1, 17, 1, 17, 1, 17, 1, 17, 3, 17, 264, 8, 17, 1, 
		    18, 1, 18, 1, 18, 3, 18, 269, 8, 18, 1, 19, 1, 19, 1, 19, 3, 19, 274, 
		    8, 19, 1, 19, 1, 19, 3, 19, 278, 8, 19, 1, 20, 1, 20, 1, 20, 1, 20, 
		    1, 20, 3, 20, 285, 8, 20, 1, 21, 1, 21, 1, 21, 1, 21, 5, 21, 291, 
		    8, 21, 10, 21, 12, 21, 294, 9, 21, 1, 21, 3, 21, 297, 8, 21, 1, 21, 
		    1, 21, 1, 22, 1, 22, 1, 22, 1, 22, 5, 22, 305, 8, 22, 10, 22, 12, 
		    22, 308, 9, 22, 1, 23, 1, 23, 1, 23, 5, 23, 313, 8, 23, 10, 23, 12, 
		    23, 316, 9, 23, 1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 3, 24, 324, 
		    8, 24, 1, 24, 1, 24, 3, 24, 328, 8, 24, 1, 24, 1, 24, 3, 24, 332, 
		    8, 24, 1, 24, 1, 24, 1, 24, 3, 24, 337, 8, 24, 1, 25, 1, 25, 1, 25, 
		    1, 25, 3, 25, 343, 8, 25, 1, 26, 1, 26, 1, 27, 1, 27, 1, 27, 1, 27, 
		    3, 27, 351, 8, 27, 1, 28, 1, 28, 1, 28, 1, 28, 1, 28, 3, 28, 358, 
		    8, 28, 1, 29, 1, 29, 1, 29, 1, 29, 1, 30, 1, 30, 1, 30, 1, 30, 1, 
		    31, 1, 31, 1, 31, 1, 31, 1, 32, 1, 32, 1, 32, 1, 33, 1, 33, 3, 33, 
		    377, 8, 33, 1, 34, 1, 34, 3, 34, 381, 8, 34, 1, 35, 1, 35, 3, 35, 
		    385, 8, 35, 1, 35, 3, 35, 388, 8, 35, 1, 36, 1, 36, 3, 36, 392, 8, 
		    36, 1, 37, 1, 37, 1, 38, 1, 38, 1, 38, 1, 39, 1, 39, 1, 39, 1, 39, 
		    1, 39, 1, 40, 1, 40, 1, 40, 3, 40, 407, 8, 40, 1, 40, 1, 40, 1, 41, 
		    1, 41, 1, 41, 5, 41, 414, 8, 41, 10, 41, 12, 41, 417, 9, 41, 1, 41, 
		    3, 41, 420, 8, 41, 1, 42, 1, 42, 3, 42, 424, 8, 42, 1, 43, 1, 43, 
		    3, 43, 428, 8, 43, 1, 43, 1, 43, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 
		    1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 3, 44, 445, 
		    8, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 
		    44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 3, 44, 462, 8, 44, 1, 
		    44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 1, 44, 
		    1, 44, 1, 44, 5, 44, 476, 8, 44, 10, 44, 12, 44, 479, 9, 44, 1, 45, 
		    1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 
		    45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 
		    1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 
		    45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 
		    1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 1, 45, 3, 45, 528, 
		    8, 45, 1, 46, 1, 46, 1, 46, 5, 46, 533, 8, 46, 10, 46, 12, 46, 536, 
		    9, 46, 1, 46, 3, 46, 539, 8, 46, 1, 46, 0, 1, 88, 47, 0, 2, 4, 6, 
		    8, 10, 12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 
		    42, 44, 46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 
		    76, 78, 80, 82, 84, 86, 88, 90, 92, 0, 6, 1, 0, 15, 18, 1, 0, 31, 
		    35, 2, 0, 7, 7, 39, 40, 2, 0, 36, 36, 41, 41, 1, 0, 42, 47, 1, 0, 
		    48, 49, 591, 0, 97, 1, 0, 0, 0, 2, 102, 1, 0, 0, 0, 4, 114, 1, 0, 
		    0, 0, 6, 122, 1, 0, 0, 0, 8, 137, 1, 0, 0, 0, 10, 142, 1, 0, 0, 0, 
		    12, 158, 1, 0, 0, 0, 14, 160, 1, 0, 0, 0, 16, 168, 1, 0, 0, 0, 18, 
		    176, 1, 0, 0, 0, 20, 187, 1, 0, 0, 0, 22, 208, 1, 0, 0, 0, 24, 210, 
		    1, 0, 0, 0, 26, 237, 1, 0, 0, 0, 28, 239, 1, 0, 0, 0, 30, 247, 1, 
		    0, 0, 0, 32, 253, 1, 0, 0, 0, 34, 259, 1, 0, 0, 0, 36, 265, 1, 0, 
		    0, 0, 38, 270, 1, 0, 0, 0, 40, 279, 1, 0, 0, 0, 42, 286, 1, 0, 0, 
		    0, 44, 300, 1, 0, 0, 0, 46, 309, 1, 0, 0, 0, 48, 336, 1, 0, 0, 0, 
		    50, 342, 1, 0, 0, 0, 52, 344, 1, 0, 0, 0, 54, 350, 1, 0, 0, 0, 56, 
		    352, 1, 0, 0, 0, 58, 359, 1, 0, 0, 0, 60, 363, 1, 0, 0, 0, 62, 367, 
		    1, 0, 0, 0, 64, 371, 1, 0, 0, 0, 66, 374, 1, 0, 0, 0, 68, 378, 1, 
		    0, 0, 0, 70, 382, 1, 0, 0, 0, 72, 389, 1, 0, 0, 0, 74, 393, 1, 0, 
		    0, 0, 76, 395, 1, 0, 0, 0, 78, 398, 1, 0, 0, 0, 80, 403, 1, 0, 0, 
		    0, 82, 410, 1, 0, 0, 0, 84, 423, 1, 0, 0, 0, 86, 425, 1, 0, 0, 0, 
		    88, 461, 1, 0, 0, 0, 90, 527, 1, 0, 0, 0, 92, 529, 1, 0, 0, 0, 94, 
		    96, 3, 2, 1, 0, 95, 94, 1, 0, 0, 0, 96, 99, 1, 0, 0, 0, 97, 95, 1, 
		    0, 0, 0, 97, 98, 1, 0, 0, 0, 98, 100, 1, 0, 0, 0, 99, 97, 1, 0, 0, 
		    0, 100, 101, 5, 0, 0, 1, 101, 1, 1, 0, 0, 0, 102, 103, 5, 1, 0, 0, 
		    103, 104, 5, 57, 0, 0, 104, 106, 5, 2, 0, 0, 105, 107, 3, 4, 2, 0, 
		    106, 105, 1, 0, 0, 0, 106, 107, 1, 0, 0, 0, 107, 108, 1, 0, 0, 0, 
		    108, 110, 5, 3, 0, 0, 109, 111, 3, 8, 4, 0, 110, 109, 1, 0, 0, 0, 
		    110, 111, 1, 0, 0, 0, 111, 112, 1, 0, 0, 0, 112, 113, 3, 20, 10, 0, 
		    113, 3, 1, 0, 0, 0, 114, 119, 3, 6, 3, 0, 115, 116, 5, 4, 0, 0, 116, 
		    118, 3, 6, 3, 0, 117, 115, 1, 0, 0, 0, 118, 121, 1, 0, 0, 0, 119, 
		    117, 1, 0, 0, 0, 119, 120, 1, 0, 0, 0, 120, 5, 1, 0, 0, 0, 121, 119, 
		    1, 0, 0, 0, 122, 123, 5, 57, 0, 0, 123, 124, 3, 10, 5, 0, 124, 7, 
		    1, 0, 0, 0, 125, 138, 3, 10, 5, 0, 126, 127, 5, 2, 0, 0, 127, 132, 
		    3, 10, 5, 0, 128, 129, 5, 4, 0, 0, 129, 131, 3, 10, 5, 0, 130, 128, 
		    1, 0, 0, 0, 131, 134, 1, 0, 0, 0, 132, 130, 1, 0, 0, 0, 132, 133, 
		    1, 0, 0, 0, 133, 135, 1, 0, 0, 0, 134, 132, 1, 0, 0, 0, 135, 136, 
		    5, 3, 0, 0, 136, 138, 1, 0, 0, 0, 137, 125, 1, 0, 0, 0, 137, 126, 
		    1, 0, 0, 0, 138, 9, 1, 0, 0, 0, 139, 143, 3, 74, 37, 0, 140, 143, 
		    3, 78, 39, 0, 141, 143, 3, 76, 38, 0, 142, 139, 1, 0, 0, 0, 142, 140, 
		    1, 0, 0, 0, 142, 141, 1, 0, 0, 0, 143, 11, 1, 0, 0, 0, 144, 159, 3, 
		    26, 13, 0, 145, 159, 3, 28, 14, 0, 146, 159, 3, 30, 15, 0, 147, 159, 
		    3, 32, 16, 0, 148, 159, 3, 34, 17, 0, 149, 159, 3, 36, 18, 0, 150, 
		    159, 3, 38, 19, 0, 151, 159, 3, 40, 20, 0, 152, 159, 3, 42, 21, 0, 
		    153, 159, 3, 48, 24, 0, 154, 159, 3, 66, 33, 0, 155, 159, 3, 68, 34, 
		    0, 156, 159, 3, 70, 35, 0, 157, 159, 3, 72, 36, 0, 158, 144, 1, 0, 
		    0, 0, 158, 145, 1, 0, 0, 0, 158, 146, 1, 0, 0, 0, 158, 147, 1, 0, 
		    0, 0, 158, 148, 1, 0, 0, 0, 158, 149, 1, 0, 0, 0, 158, 150, 1, 0, 
		    0, 0, 158, 151, 1, 0, 0, 0, 158, 152, 1, 0, 0, 0, 158, 153, 1, 0, 
		    0, 0, 158, 154, 1, 0, 0, 0, 158, 155, 1, 0, 0, 0, 158, 156, 1, 0, 
		    0, 0, 158, 157, 1, 0, 0, 0, 159, 13, 1, 0, 0, 0, 160, 165, 5, 57, 
		    0, 0, 161, 162, 5, 4, 0, 0, 162, 164, 5, 57, 0, 0, 163, 161, 1, 0, 
		    0, 0, 164, 167, 1, 0, 0, 0, 165, 163, 1, 0, 0, 0, 165, 166, 1, 0, 
		    0, 0, 166, 15, 1, 0, 0, 0, 167, 165, 1, 0, 0, 0, 168, 173, 3, 22, 
		    11, 0, 169, 170, 5, 4, 0, 0, 170, 172, 3, 22, 11, 0, 171, 169, 1, 
		    0, 0, 0, 172, 175, 1, 0, 0, 0, 173, 171, 1, 0, 0, 0, 173, 174, 1, 
		    0, 0, 0, 174, 17, 1, 0, 0, 0, 175, 173, 1, 0, 0, 0, 176, 181, 3, 88, 
		    44, 0, 177, 178, 5, 4, 0, 0, 178, 180, 3, 88, 44, 0, 179, 177, 1, 
		    0, 0, 0, 180, 183, 1, 0, 0, 0, 181, 179, 1, 0, 0, 0, 181, 182, 1, 
		    0, 0, 0, 182, 185, 1, 0, 0, 0, 183, 181, 1, 0, 0, 0, 184, 186, 5, 
		    4, 0, 0, 185, 184, 1, 0, 0, 0, 185, 186, 1, 0, 0, 0, 186, 19, 1, 0, 
		    0, 0, 187, 191, 5, 5, 0, 0, 188, 190, 3, 12, 6, 0, 189, 188, 1, 0, 
		    0, 0, 190, 193, 1, 0, 0, 0, 191, 189, 1, 0, 0, 0, 191, 192, 1, 0, 
		    0, 0, 192, 194, 1, 0, 0, 0, 193, 191, 1, 0, 0, 0, 194, 195, 5, 6, 
		    0, 0, 195, 21, 1, 0, 0, 0, 196, 197, 5, 7, 0, 0, 197, 209, 5, 57, 
		    0, 0, 198, 205, 5, 57, 0, 0, 199, 200, 5, 8, 0, 0, 200, 201, 3, 88, 
		    44, 0, 201, 202, 5, 9, 0, 0, 202, 204, 1, 0, 0, 0, 203, 199, 1, 0, 
		    0, 0, 204, 207, 1, 0, 0, 0, 205, 203, 1, 0, 0, 0, 205, 206, 1, 0, 
		    0, 0, 206, 209, 1, 0, 0, 0, 207, 205, 1, 0, 0, 0, 208, 196, 1, 0, 
		    0, 0, 208, 198, 1, 0, 0, 0, 209, 23, 1, 0, 0, 0, 210, 215, 5, 57, 
		    0, 0, 211, 212, 5, 8, 0, 0, 212, 213, 3, 88, 44, 0, 213, 214, 5, 9, 
		    0, 0, 214, 216, 1, 0, 0, 0, 215, 211, 1, 0, 0, 0, 216, 217, 1, 0, 
		    0, 0, 217, 215, 1, 0, 0, 0, 217, 218, 1, 0, 0, 0, 218, 25, 1, 0, 0, 
		    0, 219, 220, 5, 10, 0, 0, 220, 221, 5, 57, 0, 0, 221, 222, 3, 10, 
		    5, 0, 222, 223, 5, 11, 0, 0, 223, 225, 3, 80, 40, 0, 224, 226, 5, 
		    12, 0, 0, 225, 224, 1, 0, 0, 0, 225, 226, 1, 0, 0, 0, 226, 238, 1, 
		    0, 0, 0, 227, 228, 5, 10, 0, 0, 228, 229, 3, 14, 7, 0, 229, 232, 3, 
		    10, 5, 0, 230, 231, 5, 11, 0, 0, 231, 233, 3, 18, 9, 0, 232, 230, 
		    1, 0, 0, 0, 232, 233, 1, 0, 0, 0, 233, 235, 1, 0, 0, 0, 234, 236, 
		    5, 12, 0, 0, 235, 234, 1, 0, 0, 0, 235, 236, 1, 0, 0, 0, 236, 238, 
		    1, 0, 0, 0, 237, 219, 1, 0, 0, 0, 237, 227, 1, 0, 0, 0, 238, 27, 1, 
		    0, 0, 0, 239, 240, 5, 13, 0, 0, 240, 241, 5, 57, 0, 0, 241, 242, 3, 
		    10, 5, 0, 242, 243, 5, 11, 0, 0, 243, 245, 3, 88, 44, 0, 244, 246, 
		    5, 12, 0, 0, 245, 244, 1, 0, 0, 0, 245, 246, 1, 0, 0, 0, 246, 29, 
		    1, 0, 0, 0, 247, 248, 3, 14, 7, 0, 248, 249, 5, 14, 0, 0, 249, 251, 
		    3, 18, 9, 0, 250, 252, 5, 12, 0, 0, 251, 250, 1, 0, 0, 0, 251, 252, 
		    1, 0, 0, 0, 252, 31, 1, 0, 0, 0, 253, 254, 3, 16, 8, 0, 254, 255, 
		    5, 11, 0, 0, 255, 257, 3, 18, 9, 0, 256, 258, 5, 12, 0, 0, 257, 256, 
		    1, 0, 0, 0, 257, 258, 1, 0, 0, 0, 258, 33, 1, 0, 0, 0, 259, 260, 5, 
		    57, 0, 0, 260, 261, 7, 0, 0, 0, 261, 263, 3, 88, 44, 0, 262, 264, 
		    5, 12, 0, 0, 263, 262, 1, 0, 0, 0, 263, 264, 1, 0, 0, 0, 264, 35, 
		    1, 0, 0, 0, 265, 266, 5, 57, 0, 0, 266, 268, 5, 19, 0, 0, 267, 269, 
		    5, 12, 0, 0, 268, 267, 1, 0, 0, 0, 268, 269, 1, 0, 0, 0, 269, 37, 
		    1, 0, 0, 0, 270, 271, 5, 20, 0, 0, 271, 273, 5, 2, 0, 0, 272, 274, 
		    3, 18, 9, 0, 273, 272, 1, 0, 0, 0, 273, 274, 1, 0, 0, 0, 274, 275, 
		    1, 0, 0, 0, 275, 277, 5, 3, 0, 0, 276, 278, 5, 12, 0, 0, 277, 276, 
		    1, 0, 0, 0, 277, 278, 1, 0, 0, 0, 278, 39, 1, 0, 0, 0, 279, 280, 5, 
		    21, 0, 0, 280, 281, 3, 88, 44, 0, 281, 284, 3, 20, 10, 0, 282, 283, 
		    5, 22, 0, 0, 283, 285, 3, 20, 10, 0, 284, 282, 1, 0, 0, 0, 284, 285, 
		    1, 0, 0, 0, 285, 41, 1, 0, 0, 0, 286, 287, 5, 23, 0, 0, 287, 288, 
		    3, 88, 44, 0, 288, 292, 5, 5, 0, 0, 289, 291, 3, 44, 22, 0, 290, 289, 
		    1, 0, 0, 0, 291, 294, 1, 0, 0, 0, 292, 290, 1, 0, 0, 0, 292, 293, 
		    1, 0, 0, 0, 293, 296, 1, 0, 0, 0, 294, 292, 1, 0, 0, 0, 295, 297, 
		    3, 46, 23, 0, 296, 295, 1, 0, 0, 0, 296, 297, 1, 0, 0, 0, 297, 298, 
		    1, 0, 0, 0, 298, 299, 5, 6, 0, 0, 299, 43, 1, 0, 0, 0, 300, 301, 5, 
		    24, 0, 0, 301, 302, 3, 18, 9, 0, 302, 306, 5, 25, 0, 0, 303, 305, 
		    3, 12, 6, 0, 304, 303, 1, 0, 0, 0, 305, 308, 1, 0, 0, 0, 306, 304, 
		    1, 0, 0, 0, 306, 307, 1, 0, 0, 0, 307, 45, 1, 0, 0, 0, 308, 306, 1, 
		    0, 0, 0, 309, 310, 5, 26, 0, 0, 310, 314, 5, 25, 0, 0, 311, 313, 3, 
		    12, 6, 0, 312, 311, 1, 0, 0, 0, 313, 316, 1, 0, 0, 0, 314, 312, 1, 
		    0, 0, 0, 314, 315, 1, 0, 0, 0, 315, 47, 1, 0, 0, 0, 316, 314, 1, 0, 
		    0, 0, 317, 318, 5, 27, 0, 0, 318, 319, 3, 88, 44, 0, 319, 320, 3, 
		    20, 10, 0, 320, 337, 1, 0, 0, 0, 321, 323, 5, 27, 0, 0, 322, 324, 
		    3, 50, 25, 0, 323, 322, 1, 0, 0, 0, 323, 324, 1, 0, 0, 0, 324, 325, 
		    1, 0, 0, 0, 325, 327, 5, 12, 0, 0, 326, 328, 3, 52, 26, 0, 327, 326, 
		    1, 0, 0, 0, 327, 328, 1, 0, 0, 0, 328, 329, 1, 0, 0, 0, 329, 331, 
		    5, 12, 0, 0, 330, 332, 3, 54, 27, 0, 331, 330, 1, 0, 0, 0, 331, 332, 
		    1, 0, 0, 0, 332, 333, 1, 0, 0, 0, 333, 337, 3, 20, 10, 0, 334, 335, 
		    5, 27, 0, 0, 335, 337, 3, 20, 10, 0, 336, 317, 1, 0, 0, 0, 336, 321, 
		    1, 0, 0, 0, 336, 334, 1, 0, 0, 0, 337, 49, 1, 0, 0, 0, 338, 343, 3, 
		    56, 28, 0, 339, 343, 3, 58, 29, 0, 340, 343, 3, 60, 30, 0, 341, 343, 
		    3, 62, 31, 0, 342, 338, 1, 0, 0, 0, 342, 339, 1, 0, 0, 0, 342, 340, 
		    1, 0, 0, 0, 342, 341, 1, 0, 0, 0, 343, 51, 1, 0, 0, 0, 344, 345, 3, 
		    88, 44, 0, 345, 53, 1, 0, 0, 0, 346, 351, 3, 60, 30, 0, 347, 351, 
		    3, 62, 31, 0, 348, 351, 3, 64, 32, 0, 349, 351, 3, 88, 44, 0, 350, 
		    346, 1, 0, 0, 0, 350, 347, 1, 0, 0, 0, 350, 348, 1, 0, 0, 0, 350, 
		    349, 1, 0, 0, 0, 351, 55, 1, 0, 0, 0, 352, 353, 5, 10, 0, 0, 353, 
		    354, 3, 14, 7, 0, 354, 357, 3, 10, 5, 0, 355, 356, 5, 11, 0, 0, 356, 
		    358, 3, 18, 9, 0, 357, 355, 1, 0, 0, 0, 357, 358, 1, 0, 0, 0, 358, 
		    57, 1, 0, 0, 0, 359, 360, 3, 14, 7, 0, 360, 361, 5, 14, 0, 0, 361, 
		    362, 3, 18, 9, 0, 362, 59, 1, 0, 0, 0, 363, 364, 3, 16, 8, 0, 364, 
		    365, 5, 11, 0, 0, 365, 366, 3, 18, 9, 0, 366, 61, 1, 0, 0, 0, 367, 
		    368, 5, 57, 0, 0, 368, 369, 7, 0, 0, 0, 369, 370, 3, 88, 44, 0, 370, 
		    63, 1, 0, 0, 0, 371, 372, 5, 57, 0, 0, 372, 373, 5, 19, 0, 0, 373, 
		    65, 1, 0, 0, 0, 374, 376, 5, 28, 0, 0, 375, 377, 5, 12, 0, 0, 376, 
		    375, 1, 0, 0, 0, 376, 377, 1, 0, 0, 0, 377, 67, 1, 0, 0, 0, 378, 380, 
		    5, 29, 0, 0, 379, 381, 5, 12, 0, 0, 380, 379, 1, 0, 0, 0, 380, 381, 
		    1, 0, 0, 0, 381, 69, 1, 0, 0, 0, 382, 384, 5, 30, 0, 0, 383, 385, 
		    3, 18, 9, 0, 384, 383, 1, 0, 0, 0, 384, 385, 1, 0, 0, 0, 385, 387, 
		    1, 0, 0, 0, 386, 388, 5, 12, 0, 0, 387, 386, 1, 0, 0, 0, 387, 388, 
		    1, 0, 0, 0, 388, 71, 1, 0, 0, 0, 389, 391, 3, 88, 44, 0, 390, 392, 
		    5, 12, 0, 0, 391, 390, 1, 0, 0, 0, 391, 392, 1, 0, 0, 0, 392, 73, 
		    1, 0, 0, 0, 393, 394, 7, 1, 0, 0, 394, 75, 1, 0, 0, 0, 395, 396, 5, 
		    7, 0, 0, 396, 397, 3, 10, 5, 0, 397, 77, 1, 0, 0, 0, 398, 399, 5, 
		    8, 0, 0, 399, 400, 5, 59, 0, 0, 400, 401, 5, 9, 0, 0, 401, 402, 3, 
		    10, 5, 0, 402, 79, 1, 0, 0, 0, 403, 404, 3, 78, 39, 0, 404, 406, 5, 
		    5, 0, 0, 405, 407, 3, 82, 41, 0, 406, 405, 1, 0, 0, 0, 406, 407, 1, 
		    0, 0, 0, 407, 408, 1, 0, 0, 0, 408, 409, 5, 6, 0, 0, 409, 81, 1, 0, 
		    0, 0, 410, 415, 3, 84, 42, 0, 411, 412, 5, 4, 0, 0, 412, 414, 3, 84, 
		    42, 0, 413, 411, 1, 0, 0, 0, 414, 417, 1, 0, 0, 0, 415, 413, 1, 0, 
		    0, 0, 415, 416, 1, 0, 0, 0, 416, 419, 1, 0, 0, 0, 417, 415, 1, 0, 
		    0, 0, 418, 420, 5, 4, 0, 0, 419, 418, 1, 0, 0, 0, 419, 420, 1, 0, 
		    0, 0, 420, 83, 1, 0, 0, 0, 421, 424, 3, 88, 44, 0, 422, 424, 3, 86, 
		    43, 0, 423, 421, 1, 0, 0, 0, 423, 422, 1, 0, 0, 0, 424, 85, 1, 0, 
		    0, 0, 425, 427, 5, 5, 0, 0, 426, 428, 3, 82, 41, 0, 427, 426, 1, 0, 
		    0, 0, 427, 428, 1, 0, 0, 0, 428, 429, 1, 0, 0, 0, 429, 430, 5, 6, 
		    0, 0, 430, 87, 1, 0, 0, 0, 431, 432, 6, 44, -1, 0, 432, 433, 5, 36, 
		    0, 0, 433, 462, 3, 88, 44, 21, 434, 435, 5, 37, 0, 0, 435, 462, 5, 
		    57, 0, 0, 436, 437, 5, 7, 0, 0, 437, 462, 3, 88, 44, 19, 438, 439, 
		    5, 38, 0, 0, 439, 462, 3, 88, 44, 18, 440, 462, 3, 90, 45, 0, 441, 
		    442, 5, 57, 0, 0, 442, 444, 5, 2, 0, 0, 443, 445, 3, 92, 46, 0, 444, 
		    443, 1, 0, 0, 0, 444, 445, 1, 0, 0, 0, 445, 446, 1, 0, 0, 0, 446, 
		    462, 5, 3, 0, 0, 447, 462, 3, 24, 12, 0, 448, 462, 3, 80, 40, 0, 449, 
		    462, 3, 86, 43, 0, 450, 462, 5, 58, 0, 0, 451, 462, 5, 59, 0, 0, 452, 
		    462, 5, 55, 0, 0, 453, 462, 5, 60, 0, 0, 454, 462, 5, 56, 0, 0, 455, 
		    462, 5, 50, 0, 0, 456, 462, 5, 57, 0, 0, 457, 458, 5, 2, 0, 0, 458, 
		    459, 3, 88, 44, 0, 459, 460, 5, 3, 0, 0, 460, 462, 1, 0, 0, 0, 461, 
		    431, 1, 0, 0, 0, 461, 434, 1, 0, 0, 0, 461, 436, 1, 0, 0, 0, 461, 
		    438, 1, 0, 0, 0, 461, 440, 1, 0, 0, 0, 461, 441, 1, 0, 0, 0, 461, 
		    447, 1, 0, 0, 0, 461, 448, 1, 0, 0, 0, 461, 449, 1, 0, 0, 0, 461, 
		    450, 1, 0, 0, 0, 461, 451, 1, 0, 0, 0, 461, 452, 1, 0, 0, 0, 461, 
		    453, 1, 0, 0, 0, 461, 454, 1, 0, 0, 0, 461, 455, 1, 0, 0, 0, 461, 
		    456, 1, 0, 0, 0, 461, 457, 1, 0, 0, 0, 462, 477, 1, 0, 0, 0, 463, 
		    464, 10, 17, 0, 0, 464, 465, 7, 2, 0, 0, 465, 476, 3, 88, 44, 18, 
		    466, 467, 10, 16, 0, 0, 467, 468, 7, 3, 0, 0, 468, 476, 3, 88, 44, 
		    17, 469, 470, 10, 15, 0, 0, 470, 471, 7, 4, 0, 0, 471, 476, 3, 88, 
		    44, 16, 472, 473, 10, 14, 0, 0, 473, 474, 7, 5, 0, 0, 474, 476, 3, 
		    88, 44, 15, 475, 463, 1, 0, 0, 0, 475, 466, 1, 0, 0, 0, 475, 469, 
		    1, 0, 0, 0, 475, 472, 1, 0, 0, 0, 476, 479, 1, 0, 0, 0, 477, 475, 
		    1, 0, 0, 0, 477, 478, 1, 0, 0, 0, 478, 89, 1, 0, 0, 0, 479, 477, 1, 
		    0, 0, 0, 480, 481, 5, 51, 0, 0, 481, 482, 5, 2, 0, 0, 482, 483, 3, 
		    88, 44, 0, 483, 484, 5, 3, 0, 0, 484, 528, 1, 0, 0, 0, 485, 486, 5, 
		    52, 0, 0, 486, 487, 5, 2, 0, 0, 487, 488, 3, 88, 44, 0, 488, 489, 
		    5, 3, 0, 0, 489, 528, 1, 0, 0, 0, 490, 491, 5, 53, 0, 0, 491, 492, 
		    5, 2, 0, 0, 492, 528, 5, 3, 0, 0, 493, 494, 5, 54, 0, 0, 494, 495, 
		    5, 2, 0, 0, 495, 496, 3, 88, 44, 0, 496, 497, 5, 4, 0, 0, 497, 498, 
		    3, 88, 44, 0, 498, 499, 5, 4, 0, 0, 499, 500, 3, 88, 44, 0, 500, 501, 
		    5, 3, 0, 0, 501, 528, 1, 0, 0, 0, 502, 503, 5, 31, 0, 0, 503, 504, 
		    5, 2, 0, 0, 504, 505, 3, 88, 44, 0, 505, 506, 5, 3, 0, 0, 506, 528, 
		    1, 0, 0, 0, 507, 508, 5, 32, 0, 0, 508, 509, 5, 2, 0, 0, 509, 510, 
		    3, 88, 44, 0, 510, 511, 5, 3, 0, 0, 511, 528, 1, 0, 0, 0, 512, 513, 
		    5, 34, 0, 0, 513, 514, 5, 2, 0, 0, 514, 515, 3, 88, 44, 0, 515, 516, 
		    5, 3, 0, 0, 516, 528, 1, 0, 0, 0, 517, 518, 5, 33, 0, 0, 518, 519, 
		    5, 2, 0, 0, 519, 520, 3, 88, 44, 0, 520, 521, 5, 3, 0, 0, 521, 528, 
		    1, 0, 0, 0, 522, 523, 5, 35, 0, 0, 523, 524, 5, 2, 0, 0, 524, 525, 
		    3, 88, 44, 0, 525, 526, 5, 3, 0, 0, 526, 528, 1, 0, 0, 0, 527, 480, 
		    1, 0, 0, 0, 527, 485, 1, 0, 0, 0, 527, 490, 1, 0, 0, 0, 527, 493, 
		    1, 0, 0, 0, 527, 502, 1, 0, 0, 0, 527, 507, 1, 0, 0, 0, 527, 512, 
		    1, 0, 0, 0, 527, 517, 1, 0, 0, 0, 527, 522, 1, 0, 0, 0, 528, 91, 1, 
		    0, 0, 0, 529, 534, 3, 88, 44, 0, 530, 531, 5, 4, 0, 0, 531, 533, 3, 
		    88, 44, 0, 532, 530, 1, 0, 0, 0, 533, 536, 1, 0, 0, 0, 534, 532, 1, 
		    0, 0, 0, 534, 535, 1, 0, 0, 0, 535, 538, 1, 0, 0, 0, 536, 534, 1, 
		    0, 0, 0, 537, 539, 5, 4, 0, 0, 538, 537, 1, 0, 0, 0, 538, 539, 1, 
		    0, 0, 0, 539, 93, 1, 0, 0, 0, 56, 97, 106, 110, 119, 132, 137, 142, 
		    158, 165, 173, 181, 185, 191, 205, 208, 217, 225, 232, 235, 237, 245, 
		    251, 257, 263, 268, 273, 277, 284, 292, 296, 306, 314, 323, 327, 331, 
		    336, 342, 350, 357, 376, 380, 384, 387, 391, 406, 415, 419, 423, 427, 
		    444, 461, 475, 477, 527, 534, 538];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.1', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "Golampi.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function program(): Context\ProgramContext
		{
		    $localContext = new Context\ProgramContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_program);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(97);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__0) {
		        	$this->setState(94);
		        	$this->functionDecl();
		        	$this->setState(99);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(100);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function functionDecl(): Context\FunctionDeclContext
		{
		    $localContext = new Context\FunctionDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_functionDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(102);
		        $this->match(self::T__0);
		        $this->setState(103);
		        $this->match(self::ID);
		        $this->setState(104);
		        $this->match(self::T__1);
		        $this->setState(106);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ID) {
		        	$this->setState(105);
		        	$this->paramList();
		        }
		        $this->setState(108);
		        $this->match(self::T__2);
		        $this->setState(110);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 66571993476) !== 0)) {
		        	$this->setState(109);
		        	$this->returnTypes();
		        }
		        $this->setState(112);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function paramList(): Context\ParamListContext
		{
		    $localContext = new Context\ParamListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_paramList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(114);
		        $this->param();
		        $this->setState(119);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(115);
		        	$this->match(self::T__3);
		        	$this->setState(116);
		        	$this->param();
		        	$this->setState(121);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function param(): Context\ParamContext
		{
		    $localContext = new Context\ParamContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_param);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(122);
		        $this->match(self::ID);
		        $this->setState(123);
		        $this->dataType();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnTypes(): Context\ReturnTypesContext
		{
		    $localContext = new Context\ReturnTypesContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_returnTypes);

		    try {
		        $this->setState(137);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__6:
		            case self::T__7:
		            case self::T__30:
		            case self::T__31:
		            case self::T__32:
		            case self::T__33:
		            case self::T__34:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(125);
		            	$this->dataType();
		            	break;

		            case self::T__1:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(126);
		            	$this->match(self::T__1);
		            	$this->setState(127);
		            	$this->dataType();
		            	$this->setState(132);
		            	$this->errorHandler->sync($this);

		            	$_la = $this->input->LA(1);
		            	while ($_la === self::T__3) {
		            		$this->setState(128);
		            		$this->match(self::T__3);
		            		$this->setState(129);
		            		$this->dataType();
		            		$this->setState(134);
		            		$this->errorHandler->sync($this);
		            		$_la = $this->input->LA(1);
		            	}
		            	$this->setState(135);
		            	$this->match(self::T__2);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function dataType(): Context\DataTypeContext
		{
		    $localContext = new Context\DataTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_dataType);

		    try {
		        $this->setState(142);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__30:
		            case self::T__31:
		            case self::T__32:
		            case self::T__33:
		            case self::T__34:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(139);
		            	$this->typeSpec();
		            	break;

		            case self::T__7:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(140);
		            	$this->arrayType();
		            	break;

		            case self::T__6:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(141);
		            	$this->pointerType();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function statement(): Context\StatementContext
		{
		    $localContext = new Context\StatementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_statement);

		    try {
		        $this->setState(158);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 7, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(144);
		        	    $this->varDecl();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(145);
		        	    $this->constDecl();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(146);
		        	    $this->shortVarDecl();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(147);
		        	    $this->assignStmt();
		        	break;

		        	case 5:
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(148);
		        	    $this->compoundAssignStmt();
		        	break;

		        	case 6:
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(149);
		        	    $this->incStmt();
		        	break;

		        	case 7:
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(150);
		        	    $this->printStmt();
		        	break;

		        	case 8:
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(151);
		        	    $this->ifStmt();
		        	break;

		        	case 9:
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(152);
		        	    $this->switchStmt();
		        	break;

		        	case 10:
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(153);
		        	    $this->forStmt();
		        	break;

		        	case 11:
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(154);
		        	    $this->breakStmt();
		        	break;

		        	case 12:
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(155);
		        	    $this->continueStmt();
		        	break;

		        	case 13:
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(156);
		        	    $this->returnStmt();
		        	break;

		        	case 14:
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(157);
		        	    $this->exprStmt();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function idList(): Context\IdListContext
		{
		    $localContext = new Context\IdListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_idList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(160);
		        $this->match(self::ID);
		        $this->setState(165);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(161);
		        	$this->match(self::T__3);
		        	$this->setState(162);
		        	$this->match(self::ID);
		        	$this->setState(167);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function lvalueList(): Context\LvalueListContext
		{
		    $localContext = new Context\LvalueListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_lvalueList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(168);
		        $this->lvalue();
		        $this->setState(173);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__3) {
		        	$this->setState(169);
		        	$this->match(self::T__3);
		        	$this->setState(170);
		        	$this->lvalue();
		        	$this->setState(175);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function exprList(): Context\ExprListContext
		{
		    $localContext = new Context\ExprListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_exprList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(176);
		        $this->recursiveExpr(0);
		        $this->setState(181);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 10, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(177);
		        		$this->match(self::T__3);
		        		$this->setState(178);
		        		$this->recursiveExpr(0); 
		        	}

		        	$this->setState(183);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 10, $this->ctx);
		        }
		        $this->setState(185);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__3) {
		        	$this->setState(184);
		        	$this->match(self::T__3);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function block(): Context\BlockContext
		{
		    $localContext = new Context\BlockContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(187);
		        $this->match(self::T__4);
		        $this->setState(191);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2304717658939991460) !== 0)) {
		        	$this->setState(188);
		        	$this->statement();
		        	$this->setState(193);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(194);
		        $this->match(self::T__5);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function lvalue(): Context\LvalueContext
		{
		    $localContext = new Context\LvalueContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_lvalue);

		    try {
		        $this->setState(208);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__6:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(196);
		            	$this->match(self::T__6);
		            	$this->setState(197);
		            	$this->match(self::ID);
		            	break;

		            case self::ID:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(198);
		            	$this->match(self::ID);
		            	$this->setState(205);
		            	$this->errorHandler->sync($this);

		            	$_la = $this->input->LA(1);
		            	while ($_la === self::T__7) {
		            		$this->setState(199);
		            		$this->match(self::T__7);
		            		$this->setState(200);
		            		$this->recursiveExpr(0);
		            		$this->setState(201);
		            		$this->match(self::T__8);
		            		$this->setState(207);
		            		$this->errorHandler->sync($this);
		            		$_la = $this->input->LA(1);
		            	}
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayAccess(): Context\ArrayAccessContext
		{
		    $localContext = new Context\ArrayAccessContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_arrayAccess);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(210);
		        $this->match(self::ID);
		        $this->setState(215); 
		        $this->errorHandler->sync($this);

		        $alt = 1;

		        do {
		        	switch ($alt) {
		        	case 1:
		        		$this->setState(211);
		        		$this->match(self::T__7);
		        		$this->setState(212);
		        		$this->recursiveExpr(0);
		        		$this->setState(213);
		        		$this->match(self::T__8);
		        		break;
		        	default:
		        		throw new NoViableAltException($this);
		        	}

		        	$this->setState(217); 
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 15, $this->ctx);
		        } while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function varDecl(): Context\VarDeclContext
		{
		    $localContext = new Context\VarDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_varDecl);

		    try {
		        $this->setState(237);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 19, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\ArrayVarDeclContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(219);
		        	    $this->match(self::T__9);
		        	    $this->setState(220);
		        	    $this->match(self::ID);
		        	    $this->setState(221);
		        	    $this->dataType();
		        	    $this->setState(222);
		        	    $this->match(self::T__10);
		        	    $this->setState(223);
		        	    $this->arrayLiteral();
		        	    $this->setState(225);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__11) {
		        	    	$this->setState(224);
		        	    	$this->match(self::T__11);
		        	    }
		        	break;

		        	case 2:
		        	    $localContext = new Context\TypedVarDeclContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(227);
		        	    $this->match(self::T__9);
		        	    $this->setState(228);
		        	    $this->idList();
		        	    $this->setState(229);
		        	    $this->dataType();
		        	    $this->setState(232);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__10) {
		        	    	$this->setState(230);
		        	    	$this->match(self::T__10);
		        	    	$this->setState(231);
		        	    	$this->exprList();
		        	    }
		        	    $this->setState(235);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::T__11) {
		        	    	$this->setState(234);
		        	    	$this->match(self::T__11);
		        	    }
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function constDecl(): Context\ConstDeclContext
		{
		    $localContext = new Context\ConstDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_constDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(239);
		        $this->match(self::T__12);
		        $this->setState(240);
		        $this->match(self::ID);
		        $this->setState(241);
		        $this->dataType();
		        $this->setState(242);
		        $this->match(self::T__10);
		        $this->setState(243);
		        $this->recursiveExpr(0);
		        $this->setState(245);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(244);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function shortVarDecl(): Context\ShortVarDeclContext
		{
		    $localContext = new Context\ShortVarDeclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_shortVarDecl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(247);
		        $this->idList();
		        $this->setState(248);
		        $this->match(self::T__13);
		        $this->setState(249);
		        $this->exprList();
		        $this->setState(251);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(250);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assignStmt(): Context\AssignStmtContext
		{
		    $localContext = new Context\AssignStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_assignStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(253);
		        $this->lvalueList();
		        $this->setState(254);
		        $this->match(self::T__10);
		        $this->setState(255);
		        $this->exprList();
		        $this->setState(257);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(256);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function compoundAssignStmt(): Context\CompoundAssignStmtContext
		{
		    $localContext = new Context\CompoundAssignStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_compoundAssignStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(259);
		        $this->match(self::ID);
		        $this->setState(260);

		        $localContext->op = $this->input->LT(1);
		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 491520) !== 0))) {
		        	    $localContext->op = $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		        $this->setState(261);
		        $this->recursiveExpr(0);
		        $this->setState(263);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(262);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function incStmt(): Context\IncStmtContext
		{
		    $localContext = new Context\IncStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_incStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(265);
		        $this->match(self::ID);
		        $this->setState(266);
		        $this->match(self::T__18);
		        $this->setState(268);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(267);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function printStmt(): Context\PrintStmtContext
		{
		    $localContext = new Context\PrintStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_printStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(270);
		        $this->match(self::T__19);
		        $this->setState(271);
		        $this->match(self::T__1);
		        $this->setState(273);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2304717656915181988) !== 0)) {
		        	$this->setState(272);
		        	$this->exprList();
		        }
		        $this->setState(275);
		        $this->match(self::T__2);
		        $this->setState(277);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(276);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function ifStmt(): Context\IfStmtContext
		{
		    $localContext = new Context\IfStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_ifStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(279);
		        $this->match(self::T__20);
		        $this->setState(280);
		        $this->recursiveExpr(0);
		        $this->setState(281);
		        $this->block();
		        $this->setState(284);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__21) {
		        	$this->setState(282);
		        	$this->match(self::T__21);
		        	$this->setState(283);
		        	$this->block();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchStmt(): Context\SwitchStmtContext
		{
		    $localContext = new Context\SwitchStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_switchStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(286);
		        $this->match(self::T__22);
		        $this->setState(287);
		        $this->recursiveExpr(0);
		        $this->setState(288);
		        $this->match(self::T__4);
		        $this->setState(292);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::T__23) {
		        	$this->setState(289);
		        	$this->switchCase();
		        	$this->setState(294);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(296);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__25) {
		        	$this->setState(295);
		        	$this->defaultCase();
		        }
		        $this->setState(298);
		        $this->match(self::T__5);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchCase(): Context\SwitchCaseContext
		{
		    $localContext = new Context\SwitchCaseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_switchCase);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(300);
		        $this->match(self::T__23);
		        $this->setState(301);
		        $this->exprList();
		        $this->setState(302);
		        $this->match(self::T__24);
		        $this->setState(306);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2304717658939991460) !== 0)) {
		        	$this->setState(303);
		        	$this->statement();
		        	$this->setState(308);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function defaultCase(): Context\DefaultCaseContext
		{
		    $localContext = new Context\DefaultCaseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_defaultCase);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(309);
		        $this->match(self::T__25);
		        $this->setState(310);
		        $this->match(self::T__24);
		        $this->setState(314);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2304717658939991460) !== 0)) {
		        	$this->setState(311);
		        	$this->statement();
		        	$this->setState(316);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forStmt(): Context\ForStmtContext
		{
		    $localContext = new Context\ForStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_forStmt);

		    try {
		        $this->setState(336);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 35, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\ForCondStmtContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(317);
		        	    $this->match(self::T__26);
		        	    $this->setState(318);
		        	    $this->recursiveExpr(0);
		        	    $this->setState(319);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $localContext = new Context\ForClassicStmtContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(321);
		        	    $this->match(self::T__26);
		        	    $this->setState(323);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 144115188075857024) !== 0)) {
		        	    	$this->setState(322);
		        	    	$this->forInit();
		        	    }
		        	    $this->setState(325);
		        	    $this->match(self::T__11);
		        	    $this->setState(327);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2304717656915181988) !== 0)) {
		        	    	$this->setState(326);
		        	    	$this->forCondition();
		        	    }
		        	    $this->setState(329);
		        	    $this->match(self::T__11);
		        	    $this->setState(331);
		        	    $this->errorHandler->sync($this);

		        	    switch ($this->getInterpreter()->adaptivePredict($this->input, 34, $this->ctx)) {
		        	        case 1:
		        	    	    $this->setState(330);
		        	    	    $this->forUpdate();
		        	    	break;
		        	    }
		        	    $this->setState(333);
		        	    $this->block();
		        	break;

		        	case 3:
		        	    $localContext = new Context\ForInfiniteStmtContext($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(334);
		        	    $this->match(self::T__26);
		        	    $this->setState(335);
		        	    $this->block();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forInit(): Context\ForInitContext
		{
		    $localContext = new Context\ForInitContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 50, self::RULE_forInit);

		    try {
		        $this->setState(342);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 36, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(338);
		        	    $this->varDeclNoSemi();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(339);
		        	    $this->shortVarDeclNoSemi();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(340);
		        	    $this->assignNoSemi();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(341);
		        	    $this->compoundAssignNoSemi();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forCondition(): Context\ForConditionContext
		{
		    $localContext = new Context\ForConditionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_forCondition);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(344);
		        $this->recursiveExpr(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forUpdate(): Context\ForUpdateContext
		{
		    $localContext = new Context\ForUpdateContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_forUpdate);

		    try {
		        $this->setState(350);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 37, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(346);
		        	    $this->assignNoSemi();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(347);
		        	    $this->compoundAssignNoSemi();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(348);
		        	    $this->incNoSemi();
		        	break;

		        	case 4:
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(349);
		        	    $this->recursiveExpr(0);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function varDeclNoSemi(): Context\VarDeclNoSemiContext
		{
		    $localContext = new Context\VarDeclNoSemiContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_varDeclNoSemi);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(352);
		        $this->match(self::T__9);
		        $this->setState(353);
		        $this->idList();
		        $this->setState(354);
		        $this->dataType();
		        $this->setState(357);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__10) {
		        	$this->setState(355);
		        	$this->match(self::T__10);
		        	$this->setState(356);
		        	$this->exprList();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function shortVarDeclNoSemi(): Context\ShortVarDeclNoSemiContext
		{
		    $localContext = new Context\ShortVarDeclNoSemiContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_shortVarDeclNoSemi);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(359);
		        $this->idList();
		        $this->setState(360);
		        $this->match(self::T__13);
		        $this->setState(361);
		        $this->exprList();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assignNoSemi(): Context\AssignNoSemiContext
		{
		    $localContext = new Context\AssignNoSemiContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_assignNoSemi);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(363);
		        $this->lvalueList();
		        $this->setState(364);
		        $this->match(self::T__10);
		        $this->setState(365);
		        $this->exprList();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function compoundAssignNoSemi(): Context\CompoundAssignNoSemiContext
		{
		    $localContext = new Context\CompoundAssignNoSemiContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 62, self::RULE_compoundAssignNoSemi);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(367);
		        $this->match(self::ID);
		        $this->setState(368);

		        $localContext->op = $this->input->LT(1);
		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 491520) !== 0))) {
		        	    $localContext->op = $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		        $this->setState(369);
		        $this->recursiveExpr(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function incNoSemi(): Context\IncNoSemiContext
		{
		    $localContext = new Context\IncNoSemiContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 64, self::RULE_incNoSemi);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(371);
		        $this->match(self::ID);
		        $this->setState(372);
		        $this->match(self::T__18);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function breakStmt(): Context\BreakStmtContext
		{
		    $localContext = new Context\BreakStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 66, self::RULE_breakStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(374);
		        $this->match(self::T__27);
		        $this->setState(376);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(375);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function continueStmt(): Context\ContinueStmtContext
		{
		    $localContext = new Context\ContinueStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 68, self::RULE_continueStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(378);
		        $this->match(self::T__28);
		        $this->setState(380);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(379);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function returnStmt(): Context\ReturnStmtContext
		{
		    $localContext = new Context\ReturnStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 70, self::RULE_returnStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(382);
		        $this->match(self::T__29);
		        $this->setState(384);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 41, $this->ctx)) {
		            case 1:
		        	    $this->setState(383);
		        	    $this->exprList();
		        	break;
		        }
		        $this->setState(387);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(386);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function exprStmt(): Context\ExprStmtContext
		{
		    $localContext = new Context\ExprStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 72, self::RULE_exprStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(389);
		        $this->recursiveExpr(0);
		        $this->setState(391);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__11) {
		        	$this->setState(390);
		        	$this->match(self::T__11);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function typeSpec(): Context\TypeSpecContext
		{
		    $localContext = new Context\TypeSpecContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 74, self::RULE_typeSpec);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(393);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 66571993088) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function pointerType(): Context\PointerTypeContext
		{
		    $localContext = new Context\PointerTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 76, self::RULE_pointerType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(395);
		        $this->match(self::T__6);
		        $this->setState(396);
		        $this->dataType();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayType(): Context\ArrayTypeContext
		{
		    $localContext = new Context\ArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 78, self::RULE_arrayType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(398);
		        $this->match(self::T__7);
		        $this->setState(399);
		        $this->match(self::INT);
		        $this->setState(400);
		        $this->match(self::T__8);
		        $this->setState(401);
		        $this->dataType();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral(): Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 80, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(403);
		        $this->arrayType();
		        $this->setState(404);
		        $this->match(self::T__4);
		        $this->setState(406);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2304717656915181988) !== 0)) {
		        	$this->setState(405);
		        	$this->arrayElements();
		        }
		        $this->setState(408);
		        $this->match(self::T__5);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayElements(): Context\ArrayElementsContext
		{
		    $localContext = new Context\ArrayElementsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 82, self::RULE_arrayElements);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(410);
		        $this->arrayElement();
		        $this->setState(415);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 45, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(411);
		        		$this->match(self::T__3);
		        		$this->setState(412);
		        		$this->arrayElement(); 
		        	}

		        	$this->setState(417);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 45, $this->ctx);
		        }
		        $this->setState(419);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__3) {
		        	$this->setState(418);
		        	$this->match(self::T__3);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayElement(): Context\ArrayElementContext
		{
		    $localContext = new Context\ArrayElementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 84, self::RULE_arrayElement);

		    try {
		        $this->setState(423);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 47, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(421);
		        	    $this->recursiveExpr(0);
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(422);
		        	    $this->nestedArrayLiteral();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function nestedArrayLiteral(): Context\NestedArrayLiteralContext
		{
		    $localContext = new Context\NestedArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 86, self::RULE_nestedArrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(425);
		        $this->match(self::T__4);
		        $this->setState(427);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2304717656915181988) !== 0)) {
		        	$this->setState(426);
		        	$this->arrayElements();
		        }
		        $this->setState(429);
		        $this->match(self::T__5);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expr(): Context\ExprContext
		{
			return $this->recursiveExpr(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpr(int $precedence): Context\ExprContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\ExprContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 88;
			$this->enterRecursionRule($localContext, 88, self::RULE_expr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$this->setState(461);
				$this->errorHandler->sync($this);

				switch ($this->getInterpreter()->adaptivePredict($this->input, 50, $this->ctx)) {
					case 1:
					    $localContext = new Context\UnaryMinusExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;

					    $this->setState(432);
					    $this->match(self::T__35);
					    $this->setState(433);
					    $this->recursiveExpr(21);
					break;

					case 2:
					    $localContext = new Context\AddrOfExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(434);
					    $this->match(self::T__36);
					    $this->setState(435);
					    $this->match(self::ID);
					break;

					case 3:
					    $localContext = new Context\DerefExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(436);
					    $this->match(self::T__6);
					    $this->setState(437);
					    $this->recursiveExpr(19);
					break;

					case 4:
					    $localContext = new Context\NotExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(438);
					    $this->match(self::T__37);
					    $this->setState(439);
					    $this->recursiveExpr(18);
					break;

					case 5:
					    $localContext = new Context\BuiltinExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(440);
					    $this->builtinCall();
					break;

					case 6:
					    $localContext = new Context\CallExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(441);
					    $this->match(self::ID);
					    $this->setState(442);
					    $this->match(self::T__1);
					    $this->setState(444);
					    $this->errorHandler->sync($this);
					    $_la = $this->input->LA(1);

					    if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 2304717656915181988) !== 0)) {
					    	$this->setState(443);
					    	$this->argList();
					    }
					    $this->setState(446);
					    $this->match(self::T__2);
					break;

					case 7:
					    $localContext = new Context\ArrayAccessExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(447);
					    $this->arrayAccess();
					break;

					case 8:
					    $localContext = new Context\ArrayLiteralExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(448);
					    $this->arrayLiteral();
					break;

					case 9:
					    $localContext = new Context\NestedArrayLiteralExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(449);
					    $this->nestedArrayLiteral();
					break;

					case 10:
					    $localContext = new Context\FloatExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(450);
					    $this->match(self::FLOAT);
					break;

					case 11:
					    $localContext = new Context\IntExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(451);
					    $this->match(self::INT);
					break;

					case 12:
					    $localContext = new Context\BoolExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(452);
					    $this->match(self::BOOL);
					break;

					case 13:
					    $localContext = new Context\StringExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(453);
					    $this->match(self::STRING);
					break;

					case 14:
					    $localContext = new Context\RuneExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(454);
					    $this->match(self::RUNE);
					break;

					case 15:
					    $localContext = new Context\NilExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(455);
					    $this->match(self::T__49);
					break;

					case 16:
					    $localContext = new Context\IdExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(456);
					    $this->match(self::ID);
					break;

					case 17:
					    $localContext = new Context\ParenExprContext($localContext);
					    $this->ctx = $localContext;
					    $previousContext = $localContext;
					    $this->setState(457);
					    $this->match(self::T__1);
					    $this->setState(458);
					    $this->recursiveExpr(0);
					    $this->setState(459);
					    $this->match(self::T__2);
					break;
				}
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(477);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 52, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$this->setState(475);
						$this->errorHandler->sync($this);

						switch ($this->getInterpreter()->adaptivePredict($this->input, 51, $this->ctx)) {
							case 1:
							    $localContext = new Context\MulDivExprContext(new Context\ExprContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expr);
							    $this->setState(463);

							    if (!($this->precpred($this->ctx, 17))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 17)");
							    }
							    $this->setState(464);

							    $localContext->op = $this->input->LT(1);
							    $_la = $this->input->LA(1);

							    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 1649267441792) !== 0))) {
							    	    $localContext->op = $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(465);
							    $this->recursiveExpr(18);
							break;

							case 2:
							    $localContext = new Context\AddSubExprContext(new Context\ExprContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expr);
							    $this->setState(466);

							    if (!($this->precpred($this->ctx, 16))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 16)");
							    }
							    $this->setState(467);

							    $localContext->op = $this->input->LT(1);
							    $_la = $this->input->LA(1);

							    if (!($_la === self::T__35 || $_la === self::T__40)) {
							    	    $localContext->op = $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(468);
							    $this->recursiveExpr(17);
							break;

							case 3:
							    $localContext = new Context\RelExprContext(new Context\ExprContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expr);
							    $this->setState(469);

							    if (!($this->precpred($this->ctx, 15))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 15)");
							    }
							    $this->setState(470);

							    $localContext->op = $this->input->LT(1);
							    $_la = $this->input->LA(1);

							    if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 277076930199552) !== 0))) {
							    	    $localContext->op = $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(471);
							    $this->recursiveExpr(16);
							break;

							case 4:
							    $localContext = new Context\LogicExprContext(new Context\ExprContext($parentContext, $parentState));
							    $this->pushNewRecursionContext($localContext, $startState, self::RULE_expr);
							    $this->setState(472);

							    if (!($this->precpred($this->ctx, 14))) {
							        throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 14)");
							    }
							    $this->setState(473);

							    $localContext->op = $this->input->LT(1);
							    $_la = $this->input->LA(1);

							    if (!($_la === self::T__47 || $_la === self::T__48)) {
							    	    $localContext->op = $this->errorHandler->recoverInline($this);
							    } else {
							    	if ($this->input->LA(1) === Token::EOF) {
							    	    $this->matchedEOF = true;
							        }

							    	$this->errorHandler->reportMatch($this);
							    	$this->consume();
							    }
							    $this->setState(474);
							    $this->recursiveExpr(15);
							break;
						} 
					}

					$this->setState(479);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 52, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function builtinCall(): Context\BuiltinCallContext
		{
		    $localContext = new Context\BuiltinCallContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 90, self::RULE_builtinCall);

		    try {
		        $this->setState(527);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::T__50:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(480);
		            	$this->match(self::T__50);
		            	$this->setState(481);
		            	$this->match(self::T__1);
		            	$this->setState(482);
		            	$this->recursiveExpr(0);
		            	$this->setState(483);
		            	$this->match(self::T__2);
		            	break;

		            case self::T__51:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(485);
		            	$this->match(self::T__51);
		            	$this->setState(486);
		            	$this->match(self::T__1);
		            	$this->setState(487);
		            	$this->recursiveExpr(0);
		            	$this->setState(488);
		            	$this->match(self::T__2);
		            	break;

		            case self::T__52:
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(490);
		            	$this->match(self::T__52);
		            	$this->setState(491);
		            	$this->match(self::T__1);
		            	$this->setState(492);
		            	$this->match(self::T__2);
		            	break;

		            case self::T__53:
		            	$this->enterOuterAlt($localContext, 4);
		            	$this->setState(493);
		            	$this->match(self::T__53);
		            	$this->setState(494);
		            	$this->match(self::T__1);
		            	$this->setState(495);
		            	$this->recursiveExpr(0);
		            	$this->setState(496);
		            	$this->match(self::T__3);
		            	$this->setState(497);
		            	$this->recursiveExpr(0);
		            	$this->setState(498);
		            	$this->match(self::T__3);
		            	$this->setState(499);
		            	$this->recursiveExpr(0);
		            	$this->setState(500);
		            	$this->match(self::T__2);
		            	break;

		            case self::T__30:
		            	$this->enterOuterAlt($localContext, 5);
		            	$this->setState(502);
		            	$this->match(self::T__30);
		            	$this->setState(503);
		            	$this->match(self::T__1);
		            	$this->setState(504);
		            	$this->recursiveExpr(0);
		            	$this->setState(505);
		            	$this->match(self::T__2);
		            	break;

		            case self::T__31:
		            	$this->enterOuterAlt($localContext, 6);
		            	$this->setState(507);
		            	$this->match(self::T__31);
		            	$this->setState(508);
		            	$this->match(self::T__1);
		            	$this->setState(509);
		            	$this->recursiveExpr(0);
		            	$this->setState(510);
		            	$this->match(self::T__2);
		            	break;

		            case self::T__33:
		            	$this->enterOuterAlt($localContext, 7);
		            	$this->setState(512);
		            	$this->match(self::T__33);
		            	$this->setState(513);
		            	$this->match(self::T__1);
		            	$this->setState(514);
		            	$this->recursiveExpr(0);
		            	$this->setState(515);
		            	$this->match(self::T__2);
		            	break;

		            case self::T__32:
		            	$this->enterOuterAlt($localContext, 8);
		            	$this->setState(517);
		            	$this->match(self::T__32);
		            	$this->setState(518);
		            	$this->match(self::T__1);
		            	$this->setState(519);
		            	$this->recursiveExpr(0);
		            	$this->setState(520);
		            	$this->match(self::T__2);
		            	break;

		            case self::T__34:
		            	$this->enterOuterAlt($localContext, 9);
		            	$this->setState(522);
		            	$this->match(self::T__34);
		            	$this->setState(523);
		            	$this->match(self::T__1);
		            	$this->setState(524);
		            	$this->recursiveExpr(0);
		            	$this->setState(525);
		            	$this->match(self::T__2);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function argList(): Context\ArgListContext
		{
		    $localContext = new Context\ArgListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 92, self::RULE_argList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(529);
		        $this->recursiveExpr(0);
		        $this->setState(534);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 54, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(530);
		        		$this->match(self::T__3);
		        		$this->setState(531);
		        		$this->recursiveExpr(0); 
		        	}

		        	$this->setState(536);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 54, $this->ctx);
		        }
		        $this->setState(538);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::T__3) {
		        	$this->setState(537);
		        	$this->match(self::T__3);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
		{
			switch ($ruleIndex) {
					case 44:
						return $this->sempredExpr($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredExpr(?Context\ExprContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 17);

			    case 1:
			        return $this->precpred($this->ctx, 16);

			    case 2:
			        return $this->precpred($this->ctx, 15);

			    case 3:
			        return $this->precpred($this->ctx, 14);
			}

			return true;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use GolampiParser;
	use GolampiVisitor;
	use GolampiListener;

	class ProgramContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_program;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::EOF, 0);
	    }

	    /**
	     * @return array<FunctionDeclContext>|FunctionDeclContext|null
	     */
	    public function functionDecl(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(FunctionDeclContext::class);
	    	}

	        return $this->getTypedRuleContext(FunctionDeclContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterProgram($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitProgram($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitProgram($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FunctionDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_functionDecl;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function paramList(): ?ParamListContext
	    {
	    	return $this->getTypedRuleContext(ParamListContext::class, 0);
	    }

	    public function returnTypes(): ?ReturnTypesContext
	    {
	    	return $this->getTypedRuleContext(ReturnTypesContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterFunctionDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitFunctionDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitFunctionDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParamListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_paramList;
	    }

	    /**
	     * @return array<ParamContext>|ParamContext|null
	     */
	    public function param(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ParamContext::class);
	    	}

	        return $this->getTypedRuleContext(ParamContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParamList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParamList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParamList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParamContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_param;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function dataType(): ?DataTypeContext
	    {
	    	return $this->getTypedRuleContext(DataTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParam($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParam($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParam($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnTypesContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_returnTypes;
	    }

	    /**
	     * @return array<DataTypeContext>|DataTypeContext|null
	     */
	    public function dataType(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(DataTypeContext::class);
	    	}

	        return $this->getTypedRuleContext(DataTypeContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterReturnTypes($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitReturnTypes($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitReturnTypes($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DataTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_dataType;
	    }

	    public function typeSpec(): ?TypeSpecContext
	    {
	    	return $this->getTypedRuleContext(TypeSpecContext::class, 0);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function pointerType(): ?PointerTypeContext
	    {
	    	return $this->getTypedRuleContext(PointerTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDataType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDataType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDataType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StatementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_statement;
	    }

	    public function varDecl(): ?VarDeclContext
	    {
	    	return $this->getTypedRuleContext(VarDeclContext::class, 0);
	    }

	    public function constDecl(): ?ConstDeclContext
	    {
	    	return $this->getTypedRuleContext(ConstDeclContext::class, 0);
	    }

	    public function shortVarDecl(): ?ShortVarDeclContext
	    {
	    	return $this->getTypedRuleContext(ShortVarDeclContext::class, 0);
	    }

	    public function assignStmt(): ?AssignStmtContext
	    {
	    	return $this->getTypedRuleContext(AssignStmtContext::class, 0);
	    }

	    public function compoundAssignStmt(): ?CompoundAssignStmtContext
	    {
	    	return $this->getTypedRuleContext(CompoundAssignStmtContext::class, 0);
	    }

	    public function incStmt(): ?IncStmtContext
	    {
	    	return $this->getTypedRuleContext(IncStmtContext::class, 0);
	    }

	    public function printStmt(): ?PrintStmtContext
	    {
	    	return $this->getTypedRuleContext(PrintStmtContext::class, 0);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

	    public function switchStmt(): ?SwitchStmtContext
	    {
	    	return $this->getTypedRuleContext(SwitchStmtContext::class, 0);
	    }

	    public function forStmt(): ?ForStmtContext
	    {
	    	return $this->getTypedRuleContext(ForStmtContext::class, 0);
	    }

	    public function breakStmt(): ?BreakStmtContext
	    {
	    	return $this->getTypedRuleContext(BreakStmtContext::class, 0);
	    }

	    public function continueStmt(): ?ContinueStmtContext
	    {
	    	return $this->getTypedRuleContext(ContinueStmtContext::class, 0);
	    }

	    public function returnStmt(): ?ReturnStmtContext
	    {
	    	return $this->getTypedRuleContext(ReturnStmtContext::class, 0);
	    }

	    public function exprStmt(): ?ExprStmtContext
	    {
	    	return $this->getTypedRuleContext(ExprStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStatement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStatement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStatement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IdListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_idList;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GolampiParser::ID);
	    	}

	        return $this->getToken(GolampiParser::ID, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIdList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIdList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIdList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LvalueListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_lvalueList;
	    }

	    /**
	     * @return array<LvalueContext>|LvalueContext|null
	     */
	    public function lvalue(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(LvalueContext::class);
	    	}

	        return $this->getTypedRuleContext(LvalueContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterLvalueList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitLvalueList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitLvalueList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExprListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_exprList;
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BlockContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_block;
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LvalueContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_lvalue;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterLvalue($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitLvalue($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitLvalue($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayAccessContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayAccess;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayAccess($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayAccess($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayAccess($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VarDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_varDecl;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class ArrayVarDeclContext extends VarDeclContext
	{
		public function __construct(VarDeclContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function dataType(): ?DataTypeContext
	    {
	    	return $this->getTypedRuleContext(DataTypeContext::class, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayVarDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayVarDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayVarDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class TypedVarDeclContext extends VarDeclContext
	{
		public function __construct(VarDeclContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function dataType(): ?DataTypeContext
	    {
	    	return $this->getTypedRuleContext(DataTypeContext::class, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterTypedVarDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitTypedVarDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitTypedVarDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ConstDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_constDecl;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function dataType(): ?DataTypeContext
	    {
	    	return $this->getTypedRuleContext(DataTypeContext::class, 0);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterConstDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitConstDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitConstDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ShortVarDeclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_shortVarDecl;
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterShortVarDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitShortVarDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitShortVarDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_assignStmt;
	    }

	    public function lvalueList(): ?LvalueListContext
	    {
	    	return $this->getTypedRuleContext(LvalueListContext::class, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAssignStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAssignStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAssignStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CompoundAssignStmtContext extends ParserRuleContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_compoundAssignStmt;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterCompoundAssignStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitCompoundAssignStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitCompoundAssignStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IncStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_incStmt;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIncStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIncStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIncStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PrintStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_printStmt;
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterPrintStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitPrintStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitPrintStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IfStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_ifStmt;
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

	    /**
	     * @return array<BlockContext>|BlockContext|null
	     */
	    public function block(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BlockContext::class);
	    	}

	        return $this->getTypedRuleContext(BlockContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIfStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIfStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIfStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_switchStmt;
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

	    /**
	     * @return array<SwitchCaseContext>|SwitchCaseContext|null
	     */
	    public function switchCase(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(SwitchCaseContext::class);
	    	}

	        return $this->getTypedRuleContext(SwitchCaseContext::class, $index);
	    }

	    public function defaultCase(): ?DefaultCaseContext
	    {
	    	return $this->getTypedRuleContext(DefaultCaseContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterSwitchStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitSwitchStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitSwitchStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchCaseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_switchCase;
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterSwitchCase($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitSwitchCase($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitSwitchCase($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DefaultCaseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_defaultCase;
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDefaultCase($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDefaultCase($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDefaultCase($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forStmt;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class ForClassicStmtContext extends ForStmtContext
	{
		public function __construct(ForStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

	    public function forInit(): ?ForInitContext
	    {
	    	return $this->getTypedRuleContext(ForInitContext::class, 0);
	    }

	    public function forCondition(): ?ForConditionContext
	    {
	    	return $this->getTypedRuleContext(ForConditionContext::class, 0);
	    }

	    public function forUpdate(): ?ForUpdateContext
	    {
	    	return $this->getTypedRuleContext(ForUpdateContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForClassicStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForClassicStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForClassicStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ForCondStmtContext extends ForStmtContext
	{
		public function __construct(ForStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForCondStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForCondStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForCondStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ForInfiniteStmtContext extends ForStmtContext
	{
		public function __construct(ForStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForInfiniteStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForInfiniteStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForInfiniteStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForInitContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forInit;
	    }

	    public function varDeclNoSemi(): ?VarDeclNoSemiContext
	    {
	    	return $this->getTypedRuleContext(VarDeclNoSemiContext::class, 0);
	    }

	    public function shortVarDeclNoSemi(): ?ShortVarDeclNoSemiContext
	    {
	    	return $this->getTypedRuleContext(ShortVarDeclNoSemiContext::class, 0);
	    }

	    public function assignNoSemi(): ?AssignNoSemiContext
	    {
	    	return $this->getTypedRuleContext(AssignNoSemiContext::class, 0);
	    }

	    public function compoundAssignNoSemi(): ?CompoundAssignNoSemiContext
	    {
	    	return $this->getTypedRuleContext(CompoundAssignNoSemiContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForInit($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForInit($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForInit($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForConditionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forCondition;
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForCondition($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForCondition($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForCondition($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForUpdateContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_forUpdate;
	    }

	    public function assignNoSemi(): ?AssignNoSemiContext
	    {
	    	return $this->getTypedRuleContext(AssignNoSemiContext::class, 0);
	    }

	    public function compoundAssignNoSemi(): ?CompoundAssignNoSemiContext
	    {
	    	return $this->getTypedRuleContext(CompoundAssignNoSemiContext::class, 0);
	    }

	    public function incNoSemi(): ?IncNoSemiContext
	    {
	    	return $this->getTypedRuleContext(IncNoSemiContext::class, 0);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterForUpdate($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitForUpdate($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitForUpdate($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class VarDeclNoSemiContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_varDeclNoSemi;
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function dataType(): ?DataTypeContext
	    {
	    	return $this->getTypedRuleContext(DataTypeContext::class, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterVarDeclNoSemi($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitVarDeclNoSemi($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitVarDeclNoSemi($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ShortVarDeclNoSemiContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_shortVarDeclNoSemi;
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterShortVarDeclNoSemi($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitShortVarDeclNoSemi($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitShortVarDeclNoSemi($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignNoSemiContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_assignNoSemi;
	    }

	    public function lvalueList(): ?LvalueListContext
	    {
	    	return $this->getTypedRuleContext(LvalueListContext::class, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAssignNoSemi($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAssignNoSemi($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAssignNoSemi($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CompoundAssignNoSemiContext extends ParserRuleContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_compoundAssignNoSemi;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterCompoundAssignNoSemi($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitCompoundAssignNoSemi($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitCompoundAssignNoSemi($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IncNoSemiContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_incNoSemi;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIncNoSemi($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIncNoSemi($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIncNoSemi($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BreakStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_breakStmt;
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBreakStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBreakStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBreakStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ContinueStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_continueStmt;
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterContinueStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitContinueStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitContinueStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ReturnStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_returnStmt;
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterReturnStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitReturnStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitReturnStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExprStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_exprStmt;
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterExprStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitExprStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitExprStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypeSpecContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_typeSpec;
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterTypeSpec($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitTypeSpec($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitTypeSpec($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PointerTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_pointerType;
	    }

	    public function dataType(): ?DataTypeContext
	    {
	    	return $this->getTypedRuleContext(DataTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterPointerType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitPointerType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitPointerType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayType;
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INT, 0);
	    }

	    public function dataType(): ?DataTypeContext
	    {
	    	return $this->getTypedRuleContext(DataTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayLiteral;
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function arrayElements(): ?ArrayElementsContext
	    {
	    	return $this->getTypedRuleContext(ArrayElementsContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayElementsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayElements;
	    }

	    /**
	     * @return array<ArrayElementContext>|ArrayElementContext|null
	     */
	    public function arrayElement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArrayElementContext::class);
	    	}

	        return $this->getTypedRuleContext(ArrayElementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayElements($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayElements($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayElements($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayElementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_arrayElement;
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

	    public function nestedArrayLiteral(): ?NestedArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(NestedArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayElement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayElement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayElement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class NestedArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_nestedArrayLiteral;
	    }

	    public function arrayElements(): ?ArrayElementsContext
	    {
	    	return $this->getTypedRuleContext(ArrayElementsContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterNestedArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitNestedArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitNestedArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExprContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_expr;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class BoolExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function BOOL(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::BOOL, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBoolExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBoolExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBoolExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class StringExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::STRING, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterStringExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitStringExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitStringExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class FloatExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function FLOAT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::FLOAT, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterFloatExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitFloatExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitFloatExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NilExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterNilExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitNilExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitNilExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IdExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIdExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIdExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIdExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DerefExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterDerefExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitDerefExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitDerefExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class RelExprContext extends ExprContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterRelExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitRelExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitRelExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class LogicExprContext extends ExprContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterLogicExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitLogicExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitLogicExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ArrayAccessExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayAccess(): ?ArrayAccessContext
	    {
	    	return $this->getTypedRuleContext(ArrayAccessContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayAccessExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayAccessExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayAccessExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NestedArrayLiteralExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function nestedArrayLiteral(): ?NestedArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(NestedArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterNestedArrayLiteralExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitNestedArrayLiteralExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitNestedArrayLiteralExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class RuneExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function RUNE(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::RUNE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterRuneExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitRuneExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitRuneExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class MulDivExprContext extends ExprContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterMulDivExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitMulDivExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitMulDivExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AddrOfExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAddrOfExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAddrOfExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAddrOfExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ArrayLiteralExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArrayLiteralExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArrayLiteralExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArrayLiteralExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class CallExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::ID, 0);
	    }

	    public function argList(): ?ArgListContext
	    {
	    	return $this->getTypedRuleContext(ArgListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterCallExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitCallExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitCallExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NotExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterNotExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitNotExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitNotExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IntExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(GolampiParser::INT, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterIntExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitIntExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitIntExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ParenExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterParenExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitParenExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitParenExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AddSubExprContext extends ExprContext
	{
		/**
		 * @var Token|null $op
		 */
		public $op;

		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterAddSubExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitAddSubExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitAddSubExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class BuiltinExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function builtinCall(): ?BuiltinCallContext
	    {
	    	return $this->getTypedRuleContext(BuiltinCallContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBuiltinExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBuiltinExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBuiltinExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class UnaryMinusExprContext extends ExprContext
	{
		public function __construct(ExprContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expr(): ?ExprContext
	    {
	    	return $this->getTypedRuleContext(ExprContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterUnaryMinusExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitUnaryMinusExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitUnaryMinusExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BuiltinCallContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_builtinCall;
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterBuiltinCall($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitBuiltinCall($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitBuiltinCall($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArgListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GolampiParser::RULE_argList;
	    }

	    /**
	     * @return array<ExprContext>|ExprContext|null
	     */
	    public function expr(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExprContext::class);
	    	}

	        return $this->getTypedRuleContext(ExprContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->enterArgList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GolampiListener) {
			    $listener->exitArgList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GolampiVisitor) {
			    return $visitor->visitArgList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}