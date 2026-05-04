# Manual de Usuario - Golampi Compiler

## 1. Introducción

Golampi Compiler es una aplicación web que permite escribir, cargar, guardar y compilar programas escritos en el lenguaje Golampi. El sistema genera código ensamblador ARM64 y permite consultar los reportes producidos durante el análisis del código fuente.

El objetivo de este manual es explicar, paso a paso, cómo instalar, abrir y utilizar la herramienta, además de cómo interpretar los reportes de errores y tabla de símbolos.

## 2. Requisitos del sistema

Para utilizar correctamente la herramienta se recomienda trabajar en una distribución Linux, ya que la calificación del proyecto se realiza en este entorno.

Se necesita tener instalado:

- Apache2.
- PHP.
- Composer.
- Java.
- ANTLR4.
- Herramientas de compilación ARM64:
  - `aarch64-linux-gnu-as`
  - `aarch64-linux-gnu-ld`
- QEMU:
  - `qemu-aarch64`

## 3. Ubicación del proyecto

La carpeta principal de desarrollo del proyecto se encuentra en:

```bash
/home/luisyoupi/Documents/golampi-interpreter
```

La versión servida por Apache se encuentra en:

```bash
/var/www/html/golampi-interpreter
```

## 4. Iniciar la aplicación

Para iniciar o reiniciar el servidor Apache se utiliza el siguiente comando:

```bash
sudo systemctl restart apache2
```

Luego se abre el navegador y se ingresa a:

```txt
http://localhost/golampi-interpreter/public/
```

## 5. Descripción de la interfaz

La interfaz gráfica está formada por un editor de código, una barra de acciones, una consola de salida y un panel de reportes.

### 5.1. Editor de código

Es el área donde se escribe o carga el código fuente en lenguaje Golampi. El editor permite trabajar con código multilínea y mantiene el contenido que será enviado al compilador.

### 5.2. Barra de acciones

La barra de acciones permite ejecutar las operaciones principales del sistema.

Opciones principales:

- **Nuevo / Limpiar:** limpia el editor y la consola.
- **Cargar:** permite seleccionar un archivo de código fuente desde el equipo.
- **Guardar:** descarga el contenido actual del editor.
- **Compilar:** envía el código al backend para realizar el proceso de compilación.
- **Limpiar consola:** borra los resultados mostrados en pantalla.

### 5.3. Consola de salida

La consola muestra el resultado del proceso de compilación. Cuando la compilación es correcta, se muestra el código ensamblador ARM64 generado o el mensaje correspondiente. Cuando existe un error, se muestra un resumen del problema detectado.

### 5.4. Panel de reportes

El panel de reportes permite consultar o descargar los artefactos generados durante la compilación:

- Reporte de errores.
- Tabla de símbolos.
- Código ARM64 generado.

## 6. Cómo compilar un archivo

Para compilar un programa se deben seguir estos pasos:

1. Abrir la aplicación en el navegador.
2. Presionar el botón **Cargar**.
3. Seleccionar un archivo `.go`.
4. Verificar que el contenido aparezca en el editor.
5. Presionar el botón **Compilar**.
6. Revisar la consola de salida.
7. Consultar los reportes generados.
8. Verificar que se haya creado el archivo `program.s`.

Archivos de prueba utilizados:

```txt
archivo1_basico.go
archivo2_intermedio.go
archivo3_funciones.go
archivo4_arreglos1d.go
archivo5_arreglos_ndim.go
```

## 7. Ejecución del programa generado con QEMU

Después de compilar correctamente desde la interfaz, se puede validar el archivo ensamblador ARM64 desde terminal con el siguiente comando:

```bash
cd /var/www/html/golampi-interpreter/storage/outputs && aarch64-linux-gnu-as program.s -o program.o && aarch64-linux-gnu-ld program.o -o program && qemu-aarch64 ./program
```

Este comando realiza tres acciones:

1. Ensambla el archivo `program.s`.
2. Enlaza el archivo objeto `program.o`.
3. Ejecuta el binario ARM64 usando `qemu-aarch64`.

## 8. Archivos generados

Los archivos de salida se generan en:

```bash
/var/www/html/golampi-interpreter/storage/outputs
```

Archivos principales:

```txt
program.s
program.o
program
program.out
```

El archivo más importante es `program.s`, porque contiene el código ensamblador ARM64 generado por el compilador.

## 9. Reporte de errores

El reporte de errores muestra los problemas encontrados durante el análisis del código fuente.

Los errores pueden ser:

- Léxicos.
- Sintácticos.
- Semánticos.

Cada error muestra:

- Tipo de error.
- Línea.
- Columna.
- Descripción.

Ejemplo:

```txt
Semántico | Línea: 0 | Columna: 0 | Variable no declarada: x
```

Este reporte ayuda a identificar rápidamente qué parte del programa debe corregirse.

## 10. Tabla de símbolos

La tabla de símbolos muestra los identificadores reconocidos durante el análisis del programa.

Puede incluir:

- Variables.
- Constantes.
- Funciones.
- Parámetros.
- Arreglos.
- Matrices.
- Cubos.

Información mostrada:

- Identificador.
- Tipo.
- Ámbito.
- Valor.
- Línea.
- Columna.

Ejemplo:

```txt
Identificador: resultado
Tipo: int32
Ámbito: main
Valor: 10
```

## 11. Funcionalidades soportadas

La herramienta soporta las siguientes funcionalidades del lenguaje Golampi:

- Declaración larga de variables.
- Declaración corta de variables.
- Declaración múltiple.
- Asignación de variables.
- Declaración de constantes.
- Manejo de `nil`.
- Comentarios de una línea.
- Comentarios multilínea.
- Operaciones aritméticas.
- Operaciones relacionales.
- Operaciones lógicas.
- Restricción de corto circuito.
- Operadores de asignación.
- `if`.
- `if else`.
- `switch`, `case` y `default`.
- `for` clásico.
- `for` condicional.
- `for` infinito.
- `break`.
- `continue`.
- Funciones sin parámetros.
- Funciones con parámetros.
- Funciones por referencia.
- Funciones recursivas.
- Retorno simple.
- Retorno múltiple.
- Arreglos unidimensionales.
- Arreglos multidimensionales.
- Matrices.
- Cubos.
- Funciones embebidas.

## 12. Funciones embebidas

El compilador soporta las siguientes funciones embebidas:

```txt
fmt.Println()
len()
now()
substr()
typeOf()
```

### 12.1. fmt.Println()

Imprime uno o más valores en consola.

### 12.2. len()

Retorna la longitud de una cadena o arreglo.

### 12.3. now()

Retorna la fecha y hora actual del sistema.

### 12.4. substr()

Retorna una subcadena a partir de una cadena, posición inicial y longitud.

### 12.5. typeOf()

Retorna el tipo de una variable o expresión.

## 13. Solución de problemas comunes

### 13.1. Error JSON.parse unexpected end of data

Este error normalmente aparece cuando el backend PHP se detiene por un error interno. Para revisar el error real se debe ejecutar:

```bash
sudo tail -n 80 /var/log/apache2/error.log
```

### 13.2. Validar errores de sintaxis PHP

Para validar el archivo principal del compilador:

```bash
cd /home/luisyoupi/Documents/golampi-interpreter
php -l src/Compiler/GolampiCompiler.php
```

### 13.3. Copiar cambios al servidor Apache

Cuando se modifica el archivo del compilador en la carpeta de desarrollo, se debe copiar a la carpeta servida por Apache:

```bash
sudo cp /home/luisyoupi/Documents/golampi-interpreter/src/Compiler/GolampiCompiler.php /var/www/html/golampi-interpreter/src/Compiler/GolampiCompiler.php
sudo systemctl restart apache2
```

### 13.4. Verificar ejecución con QEMU

Si el archivo compila, pero se desea verificar la salida final, se ejecuta:

```bash
cd /var/www/html/golampi-interpreter/storage/outputs && aarch64-linux-gnu-as program.s -o program.o && aarch64-linux-gnu-ld program.o -o program && qemu-aarch64 ./program
```

## 14. Recomendaciones finales

- Probar primero archivos pequeños.
- Revisar la consola después de cada compilación.
- Consultar el reporte de errores si la compilación falla.
- Verificar la tabla de símbolos para confirmar declaraciones y ámbitos.
- Ejecutar con QEMU únicamente cuando el archivo `program.s` se haya generado correctamente.
- Reiniciar Apache cuando se realicen cambios importantes en el backend.

## 15. Conclusión

Golampi Compiler permite compilar código escrito en lenguaje Golampi hacia ensamblador ARM64. La herramienta integra una interfaz gráfica, generación de reportes y validación con QEMU, por lo que permite comprobar el funcionamiento del compilador en un entorno Linux.
