<?php

/*
 * Generated from grammar/Golampi.g4 by ANTLR 4.13.1
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see GolampiParser}.
 */
interface GolampiVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see GolampiParser::program()}.
	 *
	 * @param Context\ProgramContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitProgram(Context\ProgramContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::functionDecl()}.
	 *
	 * @param Context\FunctionDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFunctionDecl(Context\FunctionDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::paramList()}.
	 *
	 * @param Context\ParamListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParamList(Context\ParamListContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::param()}.
	 *
	 * @param Context\ParamContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParam(Context\ParamContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::returnTypes()}.
	 *
	 * @param Context\ReturnTypesContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturnTypes(Context\ReturnTypesContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::dataType()}.
	 *
	 * @param Context\DataTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDataType(Context\DataTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::statement()}.
	 *
	 * @param Context\StatementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStatement(Context\StatementContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::idList()}.
	 *
	 * @param Context\IdListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIdList(Context\IdListContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::lvalueList()}.
	 *
	 * @param Context\LvalueListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLvalueList(Context\LvalueListContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::exprList()}.
	 *
	 * @param Context\ExprListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExprList(Context\ExprListContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::block()}.
	 *
	 * @param Context\BlockContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBlock(Context\BlockContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::lvalue()}.
	 *
	 * @param Context\LvalueContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLvalue(Context\LvalueContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayAccess()}.
	 *
	 * @param Context\ArrayAccessContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayAccess(Context\ArrayAccessContext $context);

	/**
	 * Visit a parse tree produced by the `ArrayVarDecl` labeled alternative
	 * in {@see GolampiParser::varDecl()}.
	 *
	 * @param Context\ArrayVarDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayVarDecl(Context\ArrayVarDeclContext $context);

	/**
	 * Visit a parse tree produced by the `TypedVarDecl` labeled alternative
	 * in {@see GolampiParser::varDecl()}.
	 *
	 * @param Context\TypedVarDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypedVarDecl(Context\TypedVarDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::constDecl()}.
	 *
	 * @param Context\ConstDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitConstDecl(Context\ConstDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::shortVarDecl()}.
	 *
	 * @param Context\ShortVarDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitShortVarDecl(Context\ShortVarDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::assignStmt()}.
	 *
	 * @param Context\AssignStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssignStmt(Context\AssignStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::compoundAssignStmt()}.
	 *
	 * @param Context\CompoundAssignStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCompoundAssignStmt(Context\CompoundAssignStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::incStmt()}.
	 *
	 * @param Context\IncStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIncStmt(Context\IncStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::printStmt()}.
	 *
	 * @param Context\PrintStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPrintStmt(Context\PrintStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::ifStmt()}.
	 *
	 * @param Context\IfStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIfStmt(Context\IfStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::switchStmt()}.
	 *
	 * @param Context\SwitchStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSwitchStmt(Context\SwitchStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::switchCase()}.
	 *
	 * @param Context\SwitchCaseContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSwitchCase(Context\SwitchCaseContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::defaultCase()}.
	 *
	 * @param Context\DefaultCaseContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDefaultCase(Context\DefaultCaseContext $context);

	/**
	 * Visit a parse tree produced by the `ForCondStmt` labeled alternative
	 * in {@see GolampiParser::forStmt()}.
	 *
	 * @param Context\ForCondStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForCondStmt(Context\ForCondStmtContext $context);

	/**
	 * Visit a parse tree produced by the `ForClassicStmt` labeled alternative
	 * in {@see GolampiParser::forStmt()}.
	 *
	 * @param Context\ForClassicStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForClassicStmt(Context\ForClassicStmtContext $context);

	/**
	 * Visit a parse tree produced by the `ForInfiniteStmt` labeled alternative
	 * in {@see GolampiParser::forStmt()}.
	 *
	 * @param Context\ForInfiniteStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForInfiniteStmt(Context\ForInfiniteStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::forInit()}.
	 *
	 * @param Context\ForInitContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForInit(Context\ForInitContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::forCondition()}.
	 *
	 * @param Context\ForConditionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForCondition(Context\ForConditionContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::forUpdate()}.
	 *
	 * @param Context\ForUpdateContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForUpdate(Context\ForUpdateContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::varDeclNoSemi()}.
	 *
	 * @param Context\VarDeclNoSemiContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitVarDeclNoSemi(Context\VarDeclNoSemiContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::shortVarDeclNoSemi()}.
	 *
	 * @param Context\ShortVarDeclNoSemiContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitShortVarDeclNoSemi(Context\ShortVarDeclNoSemiContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::assignNoSemi()}.
	 *
	 * @param Context\AssignNoSemiContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssignNoSemi(Context\AssignNoSemiContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::compoundAssignNoSemi()}.
	 *
	 * @param Context\CompoundAssignNoSemiContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCompoundAssignNoSemi(Context\CompoundAssignNoSemiContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::incNoSemi()}.
	 *
	 * @param Context\IncNoSemiContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIncNoSemi(Context\IncNoSemiContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::breakStmt()}.
	 *
	 * @param Context\BreakStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBreakStmt(Context\BreakStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::continueStmt()}.
	 *
	 * @param Context\ContinueStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitContinueStmt(Context\ContinueStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::returnStmt()}.
	 *
	 * @param Context\ReturnStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturnStmt(Context\ReturnStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::exprStmt()}.
	 *
	 * @param Context\ExprStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExprStmt(Context\ExprStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::typeSpec()}.
	 *
	 * @param Context\TypeSpecContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypeSpec(Context\TypeSpecContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::pointerType()}.
	 *
	 * @param Context\PointerTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPointerType(Context\PointerTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayType()}.
	 *
	 * @param Context\ArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayType(Context\ArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayLiteral()}.
	 *
	 * @param Context\ArrayLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteral(Context\ArrayLiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayElements()}.
	 *
	 * @param Context\ArrayElementsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayElements(Context\ArrayElementsContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::arrayElement()}.
	 *
	 * @param Context\ArrayElementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayElement(Context\ArrayElementContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::nestedArrayLiteral()}.
	 *
	 * @param Context\NestedArrayLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNestedArrayLiteral(Context\NestedArrayLiteralContext $context);

	/**
	 * Visit a parse tree produced by the `BoolExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\BoolExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBoolExpr(Context\BoolExprContext $context);

	/**
	 * Visit a parse tree produced by the `StringExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\StringExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitStringExpr(Context\StringExprContext $context);

	/**
	 * Visit a parse tree produced by the `FloatExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\FloatExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFloatExpr(Context\FloatExprContext $context);

	/**
	 * Visit a parse tree produced by the `NilExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\NilExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNilExpr(Context\NilExprContext $context);

	/**
	 * Visit a parse tree produced by the `IdExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\IdExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIdExpr(Context\IdExprContext $context);

	/**
	 * Visit a parse tree produced by the `DerefExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\DerefExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDerefExpr(Context\DerefExprContext $context);

	/**
	 * Visit a parse tree produced by the `RelExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\RelExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRelExpr(Context\RelExprContext $context);

	/**
	 * Visit a parse tree produced by the `LogicExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\LogicExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLogicExpr(Context\LogicExprContext $context);

	/**
	 * Visit a parse tree produced by the `ArrayAccessExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\ArrayAccessExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayAccessExpr(Context\ArrayAccessExprContext $context);

	/**
	 * Visit a parse tree produced by the `NestedArrayLiteralExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\NestedArrayLiteralExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNestedArrayLiteralExpr(Context\NestedArrayLiteralExprContext $context);

	/**
	 * Visit a parse tree produced by the `RuneExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\RuneExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRuneExpr(Context\RuneExprContext $context);

	/**
	 * Visit a parse tree produced by the `MulDivExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\MulDivExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMulDivExpr(Context\MulDivExprContext $context);

	/**
	 * Visit a parse tree produced by the `AddrOfExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\AddrOfExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAddrOfExpr(Context\AddrOfExprContext $context);

	/**
	 * Visit a parse tree produced by the `ArrayLiteralExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\ArrayLiteralExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteralExpr(Context\ArrayLiteralExprContext $context);

	/**
	 * Visit a parse tree produced by the `CallExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\CallExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCallExpr(Context\CallExprContext $context);

	/**
	 * Visit a parse tree produced by the `NotExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\NotExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNotExpr(Context\NotExprContext $context);

	/**
	 * Visit a parse tree produced by the `IntExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\IntExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIntExpr(Context\IntExprContext $context);

	/**
	 * Visit a parse tree produced by the `ParenExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\ParenExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParenExpr(Context\ParenExprContext $context);

	/**
	 * Visit a parse tree produced by the `AddSubExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\AddSubExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAddSubExpr(Context\AddSubExprContext $context);

	/**
	 * Visit a parse tree produced by the `BuiltinExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\BuiltinExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBuiltinExpr(Context\BuiltinExprContext $context);

	/**
	 * Visit a parse tree produced by the `UnaryMinusExpr` labeled alternative
	 * in {@see GolampiParser::expr()}.
	 *
	 * @param Context\UnaryMinusExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnaryMinusExpr(Context\UnaryMinusExprContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::builtinCall()}.
	 *
	 * @param Context\BuiltinCallContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBuiltinCall(Context\BuiltinCallContext $context);

	/**
	 * Visit a parse tree produced by {@see GolampiParser::argList()}.
	 *
	 * @param Context\ArgListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArgList(Context\ArgListContext $context);
}