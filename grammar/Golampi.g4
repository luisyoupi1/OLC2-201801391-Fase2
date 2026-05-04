grammar Golampi;

program
    : functionDecl* EOF
    ;

functionDecl
    : 'func' ID '(' paramList? ')' returnTypes? block
    ;

paramList
    : param (',' param)*
    ;

param
    : ID dataType
    ;

returnTypes
    : dataType
    | '(' dataType (',' dataType)* ')'
    ;

dataType
    : typeSpec
    | arrayType
    | pointerType
    ;

statement
    : varDecl
    | constDecl
    | shortVarDecl
    | assignStmt
    | compoundAssignStmt
    | incStmt
    | printStmt
    | ifStmt
    | switchStmt
    | forStmt
    | breakStmt
    | continueStmt
    | returnStmt
    | exprStmt
    ;

idList
    : ID (',' ID)*
    ;

lvalueList
    : lvalue (',' lvalue)*
    ;

exprList
    : expr (',' expr)* ','?
    ;

block
    : '{' statement* '}'
    ;

lvalue
    : '*' ID
    | ID ('[' expr ']')*
    ;

arrayAccess
    : ID ('[' expr ']')+
    ;

varDecl
    : 'var' ID dataType '=' arrayLiteral ';'?                 # ArrayVarDecl
    | 'var' idList dataType ('=' exprList)? ';'?              # TypedVarDecl
    ;

constDecl
    : 'const' ID dataType '=' expr ';'?
    ;

shortVarDecl
    : idList ':=' exprList ';'?
    ;

assignStmt
    : lvalueList '=' exprList ';'?
    ;

compoundAssignStmt
    : ID op=('+='|'-='|'*='|'/=') expr ';'?
    ;

incStmt
    : ID '++' ';'?
    ;

printStmt
    : 'fmt.Println' '(' exprList? ')' ';'?
    ;

ifStmt
    : 'if' expr block ('else' block)?
    ;

switchStmt
    : 'switch' expr '{' switchCase* defaultCase? '}'
    ;

switchCase
    : 'case' exprList ':' statement*
    ;

defaultCase
    : 'default' ':' statement*
    ;

forStmt
    : 'for' expr block                                                      # ForCondStmt
    | 'for' forInit? ';' forCondition? ';' forUpdate? block                 # ForClassicStmt
    | 'for' block                                                           # ForInfiniteStmt
    ;

forInit
    : varDeclNoSemi
    | shortVarDeclNoSemi
    | assignNoSemi
    | compoundAssignNoSemi
    ;

forCondition
    : expr
    ;

forUpdate
    : assignNoSemi
    | compoundAssignNoSemi
    | incNoSemi
    | expr
    ;

varDeclNoSemi
    : 'var' idList dataType ('=' exprList)?
    ;

shortVarDeclNoSemi
    : idList ':=' exprList
    ;

assignNoSemi
    : lvalueList '=' exprList
    ;

compoundAssignNoSemi
    : ID op=('+='|'-='|'*='|'/=') expr
    ;

incNoSemi
    : ID '++'
    ;

breakStmt
    : 'break' ';'?
    ;

continueStmt
    : 'continue' ';'?
    ;

returnStmt
    : 'return' exprList? ';'?
    ;
    
exprStmt
    : expr ';'?
    ;

typeSpec
    : 'int32'
    | 'float32'
    | 'bool'
    | 'string'
    | 'rune'
    ;

pointerType
    : '*' dataType
    ;

arrayType
    : '[' INT ']' dataType
    ;

arrayLiteral
    : arrayType '{' arrayElements? '}'
    ;

arrayElements
    : arrayElement (',' arrayElement)* ','?
    ;

arrayElement
    : expr
    | nestedArrayLiteral
    ;

nestedArrayLiteral
    : '{' arrayElements? '}'
    ;

expr
    : '-' expr                                         # UnaryMinusExpr
    | '&' ID                                           # AddrOfExpr
    | '*' expr                                         # DerefExpr
    | '!' expr                                         # NotExpr
    | expr op=('*'|'/'|'%') expr                       # MulDivExpr
    | expr op=('+'|'-') expr                           # AddSubExpr
    | expr op=('>'|'<'|'>='|'<='|'=='|'!=') expr       # RelExpr
    | expr op=('&&'|'||') expr                         # LogicExpr
    | builtinCall                                      # BuiltinExpr
    | ID '(' argList? ')'                              # CallExpr
    | arrayAccess                                      # ArrayAccessExpr
    | arrayLiteral                                     # ArrayLiteralExpr
    | nestedArrayLiteral                               # NestedArrayLiteralExpr
    | FLOAT                                            # FloatExpr
    | INT                                              # IntExpr
    | BOOL                                             # BoolExpr
    | STRING                                           # StringExpr
    | RUNE                                             # RuneExpr
    | 'nil'                                            # NilExpr
    | ID                                               # IdExpr
    | '(' expr ')'                                     # ParenExpr
    ;
    
builtinCall
    : 'len' '(' expr ')'
    | 'typeOf' '(' expr ')'
    | 'now' '(' ')'
    | 'substr' '(' expr ',' expr ',' expr ')'
    | 'int32' '(' expr ')'
    | 'float32' '(' expr ')'
    | 'string' '(' expr ')'
    | 'bool' '(' expr ')'
    | 'rune' '(' expr ')'
    ;

argList
    : expr (',' expr)* ','?
    ;

BOOL
    : 'true'
    | 'false'
    ;

RUNE
    : '\'' (~['\\] | '\\' .) '\''
    ;

ID
    : [a-zA-Z_][a-zA-Z0-9_]*
    ;

FLOAT
    : [0-9]+ '.' [0-9]+
    ;

INT
    : [0-9]+
    ;

STRING
    : '"' (~["\\] | '\\' .)* '"'
    ;

LINE_COMMENT
    : '//' ~[\r\n]* -> skip
    ;

BLOCK_COMMENT
    : '/*' .*? '*/' -> skip
    ;

WS
    : [ \t\r\n]+ -> skip
    ;