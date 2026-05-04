# Manual Técnico - Golampi Compiler

## 1. Introducción

Golampi Compiler es un compilador académico desarrollado en PHP para procesar un lenguaje con sintaxis similar a Golang. El proyecto implementa análisis léxico, análisis sintáctico, análisis semántico, generación de reportes y generación de código ensamblador ARM64.

Este manual técnico describe la estructura interna del proyecto, la gramática formal utilizada, el flujo de procesamiento, la tabla de símbolos y el funcionamiento general del compilador.

## 2. Tecnologías utilizadas

El proyecto utiliza las siguientes tecnologías:

- PHP como lenguaje principal de implementación.
- ANTLR4 para la generación del lexer, parser y visitor.
- HTML, CSS y JavaScript para la interfaz gráfica.
- Apache2 como servidor web.
- Composer para manejo de dependencias PHP.
- ARM64 como arquitectura objetivo.
- QEMU para ejecutar binarios ARM64.

## 3. Estructura general del proyecto

La estructura principal del proyecto es:

```txt
golampi-interpreter/
├── generated/
│   └── grammar/
├── grammar/
│   └── Golampi.g4
├── public/
│   ├── index.php
│   ├── run.php
│   ├── app.js
│   └── style.css
├── src/
│   ├── Compiler/
│   │   ├── GolampiCompiler.php
│   │   ├── Arm64Emitter.php
│   │   ├── Arm64Generator.php
│   │   └── Arm64Runtime.php
│   ├── Interpreter/
│   ├── Reports/
│   └── Semantics/
├── storage/
│   ├── outputs/
│   └── reports/
├── vendor/
├── composer.json
└── composer.lock
```

## 4. Descripción de carpetas

### 4.1. grammar/

Contiene la gramática formal del lenguaje Golampi.

Archivo principal:

```txt
Golampi.g4
```

### 4.2. generated/

Contiene los archivos generados por ANTLR4. Entre ellos se encuentran los componentes del análisis léxico y sintáctico:

- Lexer.
- Parser.
- Visitor.
- BaseVisitor.

### 4.3. public/

Contiene los archivos visibles desde el navegador.

Archivos principales:

- `index.php`: interfaz principal.
- `run.php`: punto de entrada entre el frontend y el compilador.
- `app.js`: lógica del frontend.
- `style.css`: estilos de la interfaz.

### 4.4. src/Compiler/

Contiene la lógica principal de compilación.

Archivos principales:

- `GolampiCompiler.php`: clase principal del compilador.
- `Arm64Emitter.php`: emisión de instrucciones ARM64.
- `Arm64Generator.php`: generación del código ensamblador.
- `Arm64Runtime.php`: rutinas auxiliares para ejecución e impresión.

### 4.5. storage/outputs/

Contiene los archivos generados por el compilador:

```txt
program.s
program.o
program
program.out
```

### 4.6. storage/reports/

Contiene los reportes generados durante el análisis:

- Reporte de errores.
- Tabla de símbolos.

## 5. Arquitectura del sistema

El sistema utiliza una arquitectura web monolítica. El navegador se comunica con el backend PHP mediante solicitudes HTTP. El backend ejecuta el proceso completo de compilación y devuelve los resultados a la interfaz.

Separación lógica del sistema:

```txt
Frontend Web
    ↓
Backend PHP
    ↓
ANTLR4 Lexer y Parser
    ↓
Análisis Semántico
    ↓
Generación ARM64
    ↓
Archivo program.s
    ↓
Validación con QEMU
```

## 6. Flujo de procesamiento

El proceso de compilación se realiza en las siguientes fases:

1. Recepción del código fuente desde la interfaz.
2. Preparación del texto de entrada.
3. Análisis léxico.
4. Análisis sintáctico.
5. Registro de funciones.
6. Validación semántica.
7. Registro de variables, constantes y parámetros.
8. Evaluación de expresiones.
9. Generación de instrucciones ARM64.
10. Escritura del archivo `program.s`.
11. Generación del reporte de errores.
12. Generación de la tabla de símbolos.

## 7. Gramática formal de Golampi

La gramática formal se encuentra en:

```txt
grammar/Golampi.g4
```

ANTLR4 utiliza esta gramática para generar los analizadores necesarios.

Comando utilizado para regenerar los archivos de ANTLR:

```bash
cd /var/www/html/golampi-interpreter
sudo java -jar /home/luisyoupi/Documents/antlr/antlr-4.13.1-complete.jar -Dlanguage=PHP -visitor -o generated grammar/Golampi.g4
```

Después de regenerar se recomienda ejecutar:

```bash
composer dump-autoload
sudo systemctl restart apache2
```

## 8. Elementos principales de la gramática

### 8.1. Identificadores

Un identificador puede iniciar con una letra o guion bajo. Después puede contener letras, números o guion bajo.

Forma general:

```txt
identifier = letter { letter | digit }
letter     = unicode_letter | "_"
digit      = unicode_digit
```

### 8.2. Comentarios

El lenguaje soporta comentarios de una línea y multilínea.

```go
// Comentario de una línea
```

```go
/*
Comentario multilínea
*/
```

### 8.3. Tipos primitivos

Tipos soportados:

```txt
int32
float32
bool
rune
string
```

### 8.4. Variables

Declaración larga:

```go
var x int32 = 10
var y int32
```

Declaración corta:

```go
x := 10
```

Declaración múltiple:

```go
var a, b int32 = 1, 2
x, y := 34, 68
```

### 8.5. Constantes

```go
const max int32 = 100
const pi float32 = 3.14
```

### 8.6. Arreglos

Arreglo simple:

```go
var a [5]int32
```

Arreglo inicializado:

```go
var b [3]int32 = [3]int32{1, 2, 3}
```

Matriz:

```go
var mat [2][2]int32 = [2][2]int32{
    {1, 2},
    {3, 4},
}
```

Cubo:

```go
var cubo [2][2][2]int32
```

### 8.7. Funciones

Función sin retorno:

```go
func imprimirArbol() {
    fmt.Println("Arbol")
}
```

Función con retorno:

```go
func suma(a int32, b int32) int32 {
    return a + b
}
```

Función con múltiples retornos:

```go
func dividir(a int32, b int32) (int32, bool) {
    if b == 0 {
        return 0, false
    }
    return a / b, true
}
```

Función con parámetro por referencia:

```go
func intercambioValores(a *int32, b *int32) {
    temp := *a
    *a = *b
    *b = temp
}
```

## 9. Análisis léxico

El análisis léxico identifica los tokens del lenguaje. Entre los tokens principales se encuentran:

- Palabras reservadas.
- Identificadores.
- Literales enteros.
- Literales flotantes.
- Literales booleanos.
- Cadenas.
- Runas.
- Operadores.
- Símbolos de agrupación.

Los comentarios son ignorados por el compilador y no afectan la generación del código.

## 10. Análisis sintáctico

El análisis sintáctico valida que el programa cumpla con la estructura definida en la gramática.

Construcciones reconocidas:

- Declaraciones de variables.
- Declaraciones de constantes.
- Asignaciones.
- Bloques.
- Condicionales.
- Ciclos.
- Switch.
- Funciones.
- Llamadas a funciones.
- Arreglos.
- Matrices.
- Expresiones.

## 11. Análisis semántico

El análisis semántico valida el significado del programa.

Validaciones principales:

- Variables declaradas antes de utilizarse.
- Compatibilidad de tipos en asignaciones.
- Compatibilidad de tipos en operaciones.
- Existencia de funciones llamadas.
- Cantidad correcta de argumentos.
- Parámetros por valor y por referencia.
- Uso correcto de arreglos y matrices.
- Retornos compatibles con la firma de función.
- Existencia de la función `main`.

## 12. Tabla de símbolos

La tabla de símbolos almacena información sobre los identificadores reconocidos durante el análisis.

Campos principales:

| Campo | Descripción |
|---|---|
| Identificador | Nombre del símbolo declarado. |
| Tipo | Tipo del símbolo. |
| Ámbito | Entorno donde fue declarado. |
| Valor | Valor asociado, si aplica. |
| Línea | Línea de declaración o uso. |
| Columna | Columna de declaración o uso. |

Ejemplo:

| Identificador | Tipo | Ámbito | Valor |
|---|---|---|---|
| resultado | int32 | main | 10 |
| imprimirArbol | function | global | - |
| matriz | matrix | main | - |
| cubo | cube | main | - |

## 13. Reporte de errores

El compilador registra errores para que puedan ser consultados desde la interfaz.

Tipos de errores:

- Léxicos.
- Sintácticos.
- Semánticos.

Formato utilizado:

```txt
Tipo | Línea | Columna | Descripción
```

Ejemplo:

```txt
Semántico | Línea: 0 | Columna: 0 | Función no declarada: imprimirArbol
```

## 14. Generación de código ARM64

El compilador genera código ensamblador ARM64 en el archivo:

```txt
storage/outputs/program.s
```

El código generado incluye:

- Sección `.data`.
- Sección `.text`.
- Etiqueta global `_start`.
- Instrucciones aritméticas.
- Instrucciones de comparación.
- Saltos condicionales.
- Etiquetas.
- Syscalls de Linux.
- Rutinas de impresión.
- Finalización del programa.

## 15. Convenciones ARM64 utilizadas

El compilador trabaja con la arquitectura AArch64.

Elementos principales:

- Registros `x0` a `x7` para parámetros.
- Registro `x0` para retorno principal.
- Registro `x29` como frame pointer.
- Registro `x30` como link register.
- Registro `sp` como stack pointer.

Ejemplos de instrucciones utilizadas:

```asm
mov x0, #10
add x1, x0, #5
sub x2, x1, #1
mul x3, x1, x2
sdiv x4, x3, x2
cmp x1, x2
b.eq etiqueta
```

## 16. Ejecución con QEMU

Después de generar `program.s`, el programa se valida con:

```bash
cd /var/www/html/golampi-interpreter/storage/outputs && aarch64-linux-gnu-as program.s -o program.o && aarch64-linux-gnu-ld program.o -o program && qemu-aarch64 ./program
```

Flujo de validación:

1. `aarch64-linux-gnu-as` convierte `program.s` en `program.o`.
2. `aarch64-linux-gnu-ld` enlaza `program.o` y genera el ejecutable `program`.
3. `qemu-aarch64` ejecuta el binario ARM64 en Linux.

## 17. Funciones principales del compilador

### 17.1. GolampiCompiler.php

Archivo principal del proceso de compilación. Se encarga de:

- Recibir código fuente.
- Registrar funciones.
- Procesar sentencias.
- Evaluar expresiones.
- Validar tipos.
- Generar código ARM64.
- Guardar reportes.

### 17.2. Arm64Emitter.php

Construye instrucciones ARM64 de forma ordenada.

### 17.3. Arm64Generator.php

Administra la generación del archivo ensamblador.

### 17.4. Arm64Runtime.php

Contiene rutinas auxiliares utilizadas durante la generación o ejecución del código.

## 18. Diagrama de flujo de procesamiento

```txt
+-----------------------+
| Código fuente Golampi |
+----------+------------+
           |
           v
+-----------------------+
| Interfaz Web          |
+----------+------------+
           |
           v
+-----------------------+
| run.php               |
+----------+------------+
           |
           v
+-----------------------+
| GolampiCompiler.php   |
+----------+------------+
           |
           v
+-----------------------+
| ANTLR4 Lexer/Parser   |
+----------+------------+
           |
           v
+-----------------------+
| Análisis Semántico    |
+----------+------------+
           |
           v
+-----------------------+
| Tabla de Símbolos     |
+----------+------------+
           |
           v
+-----------------------+
| Generación ARM64      |
+----------+------------+
           |
           v
+-----------------------+
| program.s             |
+----------+------------+
           |
           v
+-----------------------+
| QEMU                  |
+-----------------------+
```

## 19. Diagrama de clases general

```txt
+---------------------+
| GolampiCompiler     |
+---------------------+
| - variables         |
| - constants         |
| - functions         |
| - errors            |
| - symbols           |
+---------------------+
| + compile()         |
| + parseProgram()    |
| + executeMain()     |
| + evalExpression()  |
| + registerFunction()|
+----------+----------+
           |
           v
+---------------------+
| Arm64Generator      |
+---------------------+
| + generate()        |
| + writeProgram()    |
+----------+----------+
           |
           v
+---------------------+
| Arm64Emitter        |
+---------------------+
| + emit()            |
| + label()           |
| + instruction()     |
+----------+----------+
           |
           v
+---------------------+
| Arm64Runtime        |
+---------------------+
| + print helpers     |
| + runtime helpers   |
+---------------------+
```

## 20. Funcionalidades implementadas

El compilador implementa:

- Variables de tipo `int32`, `float32`, `bool`, `rune` y `string`.
- Declaración larga y corta.
- Declaración múltiple.
- Constantes.
- Manejo de `nil`.
- Comentarios.
- Operadores aritméticos.
- Operadores relacionales.
- Operadores lógicos.
- Corto circuito.
- Operadores de asignación.
- Sentencias `if` e `if else`.
- `switch`, `case` y `default`.
- Ciclos `for`.
- `break` y `continue`.
- Funciones sin parámetros.
- Funciones con parámetros.
- Parámetros por referencia.
- Funciones recursivas.
- Retorno simple.
- Retorno múltiple.
- Arreglos unidimensionales.
- Matrices.
- Cubos.
- Funciones embebidas.

## 21. Funciones embebidas

Funciones soportadas:

```txt
fmt.Println()
len()
now()
substr()
typeOf()
```

Descripción:

- `fmt.Println()`: imprime uno o más valores.
- `len()`: retorna la longitud de una cadena o arreglo.
- `now()`: retorna fecha y hora actual.
- `substr()`: obtiene una subcadena.
- `typeOf()`: retorna el tipo de una variable o expresión.

## 22. Pruebas realizadas

Se probaron los siguientes archivos de calificación:

```txt
archivo1_basico.go
archivo2_intermedio.go
archivo3_funciones.go
archivo4_arreglos1d.go
archivo5_arreglos_ndim.go
```

Cada archivo fue probado desde la interfaz web y validado mediante QEMU.

## 23. Comandos útiles

### Validar sintaxis del compilador

```bash
cd /home/luisyoupi/Documents/golampi-interpreter
php -l src/Compiler/GolampiCompiler.php
```

### Copiar cambios hacia Apache

```bash
sudo cp /home/luisyoupi/Documents/golampi-interpreter/src/Compiler/GolampiCompiler.php /var/www/html/golampi-interpreter/src/Compiler/GolampiCompiler.php
```

### Reiniciar Apache

```bash
sudo systemctl restart apache2
```

### Ver errores de Apache

```bash
sudo tail -n 80 /var/log/apache2/error.log
```

### Ejecutar salida ARM64

```bash
cd /var/www/html/golampi-interpreter/storage/outputs && aarch64-linux-gnu-as program.s -o program.o && aarch64-linux-gnu-ld program.o -o program && qemu-aarch64 ./program
```

## 24. Conclusión técnica

Golampi Compiler implementa un flujo completo de compilación para un lenguaje académico inspirado en Golang. El sistema permite analizar código fuente, validar su semántica, generar código ensamblador ARM64, producir reportes formales y comprobar el resultado mediante QEMU.
