<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intérprete Golampi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Intérprete Golampi</h1>
        <p class="subtitle">Proyecto de Organización de Lenguajes y Compiladores 2</p>

        <div class="toolbar">
            <button type="button" onclick="nuevoArchivo()">Nuevo / Limpiar</button>
            <button type="button" onclick="document.getElementById('fileInput').click()">Cargar archivo</button>
            <button type="button" onclick="guardarCodigo()">Guardar código</button>
            <button type="button" onclick="ejecutarCodigo()">Ejecutar / Analizar</button>
            <button type="button" onclick="limpiarConsola()">Limpiar consola</button>
        </div>

        <input type="file" id="fileInput" accept=".txt,.golampi,.go,.gp" hidden>

        <section class="panel">
            <h2>Editor de código</h2>
            <textarea id="code" placeholder='Escribe tu código aquí...'>func main() {
    fmt.Println("Hola mundo");
}</textarea>
        </section>

        <section class="panel">
            <h2>Consola de salida</h2>
            <pre id="output"></pre>
        </section>

        <section class="panel">
            <h2>Tabla de símbolos</h2>
            <pre id="symbols"></pre>
        </section>

        <section class="panel">
            <h2>Tabla de errores</h2>
            <pre id="errors"></pre>
        </section>

        <section class="panel reports">
            <h2>Reportes</h2>
            <div class="report-buttons">
                <button type="button" onclick="descargarResultado()">Descargar resultado</button>
                <button type="button" onclick="descargarErrores()">Descargar errores</button>
                <button type="button" onclick="descargarSimbolos()">Descargar tabla de símbolos</button>
            </div>
        </section>
    </div>

    <script src="app.js"></script>
</body>
</html>