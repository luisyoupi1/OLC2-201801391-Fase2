<?php

/*
 * Generated from grammar/Golampi.g4 by ANTLR 4.13.1
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see GolampiParser}.
 */
interface GolampiListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see GolampiParser::program()}.
	 * @param $context The parse tree.
	 */
	public function enterProgram(Context\ProgramContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::program()}.
	 * @param $context The parse tree.
	 */
	public function exitProgram(Context\ProgramContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::functionDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterFunctionDecl(Context\FunctionDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::functionDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitFunctionDecl(Context\FunctionDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::paramList()}.
	 * @param $context The parse tree.
	 */
	public function enterParamList(Context\ParamListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::paramList()}.
	 * @param $context The parse tree.
	 */
	public function exitParamList(Context\ParamListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::param()}.
	 * @param $context The parse tree.
	 */
	public function enterParam(Context\ParamContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::param()}.
	 * @param $context The parse tree.
	 */
	public function exitParam(Context\ParamContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::returnTypes()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnTypes(Context\ReturnTypesContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::returnTypes()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnTypes(Context\ReturnTypesContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::dataType()}.
	 * @param $context The parse tree.
	 */
	public function enterDataType(Context\DataTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::dataType()}.
	 * @param $context The parse tree.
	 */
	public function exitDataType(Context\DataTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterStatement(Context\StatementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitStatement(Context\StatementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::idList()}.
	 * @param $context The parse tree.
	 */
	public function enterIdList(Context\IdListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::idList()}.
	 * @param $context The parse tree.
	 */
	public function exitIdList(Context\IdListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::lvalueList()}.
	 * @param $context The parse tree.
	 */
	public function enterLvalueList(Context\LvalueListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::lvalueList()}.
	 * @param $context The parse tree.
	 */
	public function exitLvalueList(Context\LvalueListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::exprList()}.
	 * @param $context The parse tree.
	 */
	public function enterExprList(Context\ExprListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::exprList()}.
	 * @param $context The parse tree.
	 */
	public function exitExprList(Context\ExprListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::block()}.
	 * @param $context The parse tree.
	 */
	public function enterBlock(Context\BlockContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::block()}.
	 * @param $context The parse tree.
	 */
	public function exitBlock(Context\BlockContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::lvalue()}.
	 * @param $context The parse tree.
	 */
	public function enterLvalue(Context\LvalueContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::lvalue()}.
	 * @param $context The parse tree.
	 */
	public function exitLvalue(Context\LvalueContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::arrayAccess()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayAccess(Context\ArrayAccessContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::arrayAccess()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayAccess(Context\ArrayAccessContext $context): void;
	/**
	 * Enter a parse tree produced by the `ArrayVarDecl`
	 * labeled alternative in {@see GolampiParser::varDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayVarDecl(Context\ArrayVarDeclContext $context): void;
	/**
	 * Exit a parse tree produced by the `ArrayVarDecl` labeled alternative
	 * in {@see GolampiParser::varDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayVarDecl(Context\ArrayVarDeclContext $context): void;
	/**
	 * Enter a parse tree produced by the `TypedVarDecl`
	 * labeled alternative in {@see GolampiParser::varDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterTypedVarDecl(Context\TypedVarDeclContext $context): void;
	/**
	 * Exit a parse tree produced by the `TypedVarDecl` labeled alternative
	 * in {@see GolampiParser::varDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitTypedVarDecl(Context\TypedVarDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::constDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterConstDecl(Context\ConstDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::constDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitConstDecl(Context\ConstDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::shortVarDecl()}.
	 * @param $context The parse tree.
	 */
	public function enterShortVarDecl(Context\ShortVarDeclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::shortVarDecl()}.
	 * @param $context The parse tree.
	 */
	public function exitShortVarDecl(Context\ShortVarDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::assignStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterAssignStmt(Context\AssignStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::assignStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitAssignStmt(Context\AssignStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::compoundAssignStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterCompoundAssignStmt(Context\CompoundAssignStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::compoundAssignStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitCompoundAssignStmt(Context\CompoundAssignStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::incStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterIncStmt(Context\IncStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::incStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitIncStmt(Context\IncStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::printStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterPrintStmt(Context\PrintStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::printStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitPrintStmt(Context\PrintStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitIfStmt(Context\IfStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchStmt(Context\SwitchStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchStmt(Context\SwitchStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::switchCase()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchCase(Context\SwitchCaseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::switchCase()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchCase(Context\SwitchCaseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::defaultCase()}.
	 * @param $context The parse tree.
	 */
	public function enterDefaultCase(Context\DefaultCaseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::defaultCase()}.
	 * @param $context The parse tree.
	 */
	public function exitDefaultCase(Context\DefaultCaseContext $context): void;
	/**
	 * Enter a parse tree produced by the `ForCondStmt`
	 * labeled alternative in {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForCondStmt(Context\ForCondStmtContext $context): void;
	/**
	 * Exit a parse tree produced by the `ForCondStmt` labeled alternative
	 * in {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForCondStmt(Context\ForCondStmtContext $context): void;
	/**
	 * Enter a parse tree produced by the `ForClassicStmt`
	 * labeled alternative in {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForClassicStmt(Context\ForClassicStmtContext $context): void;
	/**
	 * Exit a parse tree produced by the `ForClassicStmt` labeled alternative
	 * in {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForClassicStmt(Context\ForClassicStmtContext $context): void;
	/**
	 * Enter a parse tree produced by the `ForInfiniteStmt`
	 * labeled alternative in {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForInfiniteStmt(Context\ForInfiniteStmtContext $context): void;
	/**
	 * Exit a parse tree produced by the `ForInfiniteStmt` labeled alternative
	 * in {@see GolampiParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForInfiniteStmt(Context\ForInfiniteStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::forInit()}.
	 * @param $context The parse tree.
	 */
	public function enterForInit(Context\ForInitContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::forInit()}.
	 * @param $context The parse tree.
	 */
	public function exitForInit(Context\ForInitContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::forCondition()}.
	 * @param $context The parse tree.
	 */
	public function enterForCondition(Context\ForConditionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::forCondition()}.
	 * @param $context The parse tree.
	 */
	public function exitForCondition(Context\ForConditionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::forUpdate()}.
	 * @param $context The parse tree.
	 */
	public function enterForUpdate(Context\ForUpdateContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::forUpdate()}.
	 * @param $context The parse tree.
	 */
	public function exitForUpdate(Context\ForUpdateContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::varDeclNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function enterVarDeclNoSemi(Context\VarDeclNoSemiContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::varDeclNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function exitVarDeclNoSemi(Context\VarDeclNoSemiContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::shortVarDeclNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function enterShortVarDeclNoSemi(Context\ShortVarDeclNoSemiContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::shortVarDeclNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function exitShortVarDeclNoSemi(Context\ShortVarDeclNoSemiContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::assignNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function enterAssignNoSemi(Context\AssignNoSemiContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::assignNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function exitAssignNoSemi(Context\AssignNoSemiContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::compoundAssignNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function enterCompoundAssignNoSemi(Context\CompoundAssignNoSemiContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::compoundAssignNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function exitCompoundAssignNoSemi(Context\CompoundAssignNoSemiContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::incNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function enterIncNoSemi(Context\IncNoSemiContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::incNoSemi()}.
	 * @param $context The parse tree.
	 */
	public function exitIncNoSemi(Context\IncNoSemiContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::breakStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitBreakStmt(Context\BreakStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::continueStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitContinueStmt(Context\ContinueStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::returnStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnStmt(Context\ReturnStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::exprStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterExprStmt(Context\ExprStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::exprStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitExprStmt(Context\ExprStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::typeSpec()}.
	 * @param $context The parse tree.
	 */
	public function enterTypeSpec(Context\TypeSpecContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::typeSpec()}.
	 * @param $context The parse tree.
	 */
	public function exitTypeSpec(Context\TypeSpecContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::pointerType()}.
	 * @param $context The parse tree.
	 */
	public function enterPointerType(Context\PointerTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::pointerType()}.
	 * @param $context The parse tree.
	 */
	public function exitPointerType(Context\PointerTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::arrayElements()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayElements(Context\ArrayElementsContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::arrayElements()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayElements(Context\ArrayElementsContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::arrayElement()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayElement(Context\ArrayElementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::arrayElement()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayElement(Context\ArrayElementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::nestedArrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterNestedArrayLiteral(Context\NestedArrayLiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::nestedArrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitNestedArrayLiteral(Context\NestedArrayLiteralContext $context): void;
	/**
	 * Enter a parse tree produced by the `BoolExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterBoolExpr(Context\BoolExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `BoolExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitBoolExpr(Context\BoolExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `StringExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterStringExpr(Context\StringExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `StringExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitStringExpr(Context\StringExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `FloatExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterFloatExpr(Context\FloatExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `FloatExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitFloatExpr(Context\FloatExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `NilExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterNilExpr(Context\NilExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `NilExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitNilExpr(Context\NilExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `IdExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterIdExpr(Context\IdExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `IdExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitIdExpr(Context\IdExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `DerefExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterDerefExpr(Context\DerefExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `DerefExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitDerefExpr(Context\DerefExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `RelExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterRelExpr(Context\RelExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `RelExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitRelExpr(Context\RelExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `LogicExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterLogicExpr(Context\LogicExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `LogicExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitLogicExpr(Context\LogicExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `ArrayAccessExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayAccessExpr(Context\ArrayAccessExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `ArrayAccessExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayAccessExpr(Context\ArrayAccessExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `NestedArrayLiteralExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterNestedArrayLiteralExpr(Context\NestedArrayLiteralExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `NestedArrayLiteralExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitNestedArrayLiteralExpr(Context\NestedArrayLiteralExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `RuneExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterRuneExpr(Context\RuneExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `RuneExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitRuneExpr(Context\RuneExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `MulDivExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterMulDivExpr(Context\MulDivExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `MulDivExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitMulDivExpr(Context\MulDivExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `AddrOfExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterAddrOfExpr(Context\AddrOfExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `AddrOfExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitAddrOfExpr(Context\AddrOfExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `ArrayLiteralExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayLiteralExpr(Context\ArrayLiteralExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `ArrayLiteralExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayLiteralExpr(Context\ArrayLiteralExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `CallExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterCallExpr(Context\CallExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `CallExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitCallExpr(Context\CallExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `NotExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterNotExpr(Context\NotExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `NotExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitNotExpr(Context\NotExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `IntExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterIntExpr(Context\IntExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `IntExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitIntExpr(Context\IntExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `ParenExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterParenExpr(Context\ParenExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `ParenExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitParenExpr(Context\ParenExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `AddSubExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterAddSubExpr(Context\AddSubExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `AddSubExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitAddSubExpr(Context\AddSubExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `BuiltinExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterBuiltinExpr(Context\BuiltinExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `BuiltinExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitBuiltinExpr(Context\BuiltinExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `UnaryMinusExpr`
	 * labeled alternative in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function enterUnaryMinusExpr(Context\UnaryMinusExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `UnaryMinusExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 * @param $context The parse tree.
	 */
	public function exitUnaryMinusExpr(Context\UnaryMinusExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::builtinCall()}.
	 * @param $context The parse tree.
	 */
	public function enterBuiltinCall(Context\BuiltinCallContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::builtinCall()}.
	 * @param $context The parse tree.
	 */
	public function exitBuiltinCall(Context\BuiltinCallContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GolampiParser::argList()}.
	 * @param $context The parse tree.
	 */
	public function enterArgList(Context\ArgListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GolampiParser::argList()}.
	 * @param $context The parse tree.
	 */
	public function exitArgList(Context\ArgListContext $context): void;
}