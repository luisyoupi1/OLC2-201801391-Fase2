let ultimoResultado = '';
let ultimosErrores = '';
let ultimosSimbolos = '';

async function ejecutarCodigo() {
    const code = document.getElementById('code').value;
    const output = document.getElementById('output');
    const symbols = document.getElementById('symbols');
    const errors = document.getElementById('errors');

    output.textContent = 'Procesando...';
    symbols.textContent = '';
    errors.textContent = '';

    ultimoResultado = '';
    ultimosErrores = '';
    ultimosSimbolos = '';

    try {
        const response = await fetch('run.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ code })
        });

        const data = await response.json();

        output.textContent = data.output || '';

        if (data.symbols && data.symbols.length > 0) {
            ultimosSimbolos = data.symbols
                .map((s, i) =>
                    `${i + 1}. ID: ${s.id} | Tipo: ${s.type} | Valor: ${formatearValor(s.value)} | Ámbito: ${s.scope} | Línea: ${s.line} | Columna: ${s.column} | Constante: ${s.isConst ? 'sí' : 'no'}`
                )
                .join('\n');
            symbols.textContent = ultimosSimbolos;
        } else {
            ultimosSimbolos = 'Sin símbolos.';
            symbols.textContent = ultimosSimbolos;
        }

        if (data.errors && data.errors.length > 0) {
            ultimosErrores = data.errors
                .map((e, i) =>
                    `${i + 1}. ${e.type} | Línea: ${e.line} | Columna: ${e.column} | ${e.message}`
                )
                .join('\n');
            errors.textContent = ultimosErrores;
        } else {
            ultimosErrores = 'Sin errores.';
            errors.textContent = ultimosErrores;
        }

        ultimoResultado = data.output || '';
        if (ultimoResultado.trim() === '') {
            ultimoResultado = 'Sin salida.';
        }

    } catch (error) {
        output.textContent = 'Error al conectar con el servidor: ' + error.message;
        symbols.textContent = '';
        errors.textContent = '';
        ultimoResultado = 'Error al conectar con el servidor: ' + error.message;
        ultimosSimbolos = '';
        ultimosErrores = '';
    }
}

function formatearValor(valor) {
    if (valor === null || valor === undefined || valor === '') {
        return 'null';
    }
    return String(valor);
}

function nuevoArchivo() {
    document.getElementById('code').value = '';
    limpiarConsola();
}

function limpiarConsola() {
    document.getElementById('output').textContent = '';
    document.getElementById('symbols').textContent = '';
    document.getElementById('errors').textContent = '';
    ultimoResultado = '';
    ultimosErrores = '';
    ultimosSimbolos = '';
}

function guardarCodigo() {
    const code = document.getElementById('code').value;
    descargarArchivo(code, 'codigo_golampi.txt', 'text/plain;charset=utf-8');
}

function descargarResultado() {
    const contenido = ultimoResultado || 'Sin resultado disponible.';
    descargarArchivo(contenido, 'resultado_golampi.txt', 'text/plain;charset=utf-8');
}

function descargarErrores() {
    const contenido = ultimosErrores || 'Sin errores disponibles.';
    descargarArchivo(contenido, 'errores_golampi.txt', 'text/plain;charset=utf-8');
}

function descargarSimbolos() {
    const contenido = ultimosSimbolos || 'Sin tabla de símbolos disponible.';
    descargarArchivo(contenido, 'tabla_simbolos_golampi.txt', 'text/plain;charset=utf-8');
}

function descargarArchivo(contenido, nombre, tipo) {
    const blob = new Blob([contenido], { type: tipo });
    const url = URL.createObjectURL(blob);

    const enlace = document.createElement('a');
    enlace.href = url;
    enlace.download = nombre;
    document.body.appendChild(enlace);
    enlace.click();
    document.body.removeChild(enlace);

    URL.revokeObjectURL(url);
}

document.addEventListener('DOMContentLoaded', function () {
    const fileInput = document.getElementById('fileInput');
    if (fileInput) {
        fileInput.addEventListener('change', function (event) {
            const archivo = event.target.files[0];
            if (!archivo) return;

            const lector = new FileReader();
            lector.onload = function (e) {
                document.getElementById('code').value = e.target.result;
            };
            lector.readAsText(archivo);

            event.target.value = '';
        });
    }
});