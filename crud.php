<?php
/* ================================================================
   TABLA DE ETIQUETAS Y CONCEPTOS USADOS EN ESTE ARCHIVO
   ================================================================
   Etiqueta / Concepto      Función
   ──────────────────────   ──────────────────────────────────────
   <?php ?>                 Bloque de código ejecutado en el servidor
                            antes de enviar la página al navegador
   $variable                Variable PHP; el $ identifica que es una variable
   array asociativo []      Lista de pares clave => valor (como un objeto)
   count()                  Función PHP que cuenta los elementos de un array
   foreach                  Ciclo que recorre cada elemento del array uno por uno
   foreach ... as $reg      La parte "as $reg" toma cada elemento y lo guarda en $reg
   foreach ... :            Sintaxis alternativa de foreach; en vez de { } usa : y endforeach
   endforeach               Cierra el bloque foreach cuando se usó la sintaxis con :
   $reg['clave']            Accede al valor de una clave en el array asociativo
   htmlspecialchars()       Convierte < > " & en entidades HTML para prevenir XSS
   ENT_QUOTES               Parámetro que protege también comillas simples y dobles
   echo                     Imprime el valor de una variable o expresión en el HTML
   <!DOCTYPE html>          Declara que el documento es HTML5
   <html>                   Elemento raíz que envuelve todo el documento
   lang=                    Idioma del contenido (es = español)
   <head>                   Configuración del documento (no visible)
   <meta charset>           UTF-8: permite acentos, ñ y caracteres especiales
   <meta viewport>          Adapta la página al ancho del dispositivo
   <link rel>               Conecta el HTML con un archivo externo (CSS)
   href=                    Ruta del archivo CSS o página de destino
   <title>                  Texto que aparece en la pestaña del navegador
   <body>                   Todo el contenido visible de la página
   <header>                 Cabecera con la barra de navegación
   <nav>                    Bloque semántico de navegación
   <ul>                     Lista sin orden (usada como menú)
   <li>                     Ítem de lista
   <a>                      Enlace a otra página
   <main>                   Área de contenido principal
   <h1>                     Título principal (solo uno por página)
   <section>                Agrupa el contenido principal de la página
   <p>                      Párrafo de texto
   <strong>                 Texto en negrita / énfasis fuerte
   <table>                  Tabla de datos
   <thead>                  Sección de encabezados de la tabla
   <tbody>                  Sección del cuerpo generada dinámicamente con PHP
   <tr>                     Fila de la tabla
   <th>                     Celda de encabezado (fondo azul en CSS)
   <td>                     Celda de dato
   <footer>                 Pie de página
   ================================================================

   PÁGINA: CRUD PHP | crud.php
   ================================================================
   Qué ve el usuario:
   Una tabla generada completamente en el servidor con PHP.
   Muestra registros de películas y series con su categoría
   y la persona asignada. Demuestra el ciclo foreach de PHP
   y el uso de htmlspecialchars() para salida segura.

   Estructura:
     <header>  → barra de navegación superior
     <main>    → contador de registros + tabla generada con PHP
     <footer>  → pie de página con derechos
   ================================================================ */

// Array de datos — simula una fuente de datos del servidor
// En un sistema real, estos datos vendrían de una base de datos (MySQL)
$registros = [
    ['id' => 1, 'titulo' => 'Duelo de Titanes',   'categoria' => 'Película', 'asignado' => 'Carlos'],
    ['id' => 2, 'titulo' => 'Breaking Bad',        'categoria' => 'Serie',    'asignado' => 'Eduardo'],
    ['id' => 3, 'titulo' => 'The Matrix',          'categoria' => 'Película', 'asignado' => 'Mariana'],
    ['id' => 4, 'titulo' => 'Game of Thrones',     'categoria' => 'Serie',    'asignado' => 'Rafael'],
    ['id' => 5, 'titulo' => 'Talladega Nights',    'categoria' => 'Película', 'asignado' => 'Carlos'],
];

// Cuenta los registros para mostrarlo en la página
$total = count($registros);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>CRUD PHP</title>
</head>
<body>

    <!-- ── HEADER ──────────────────────────────────────────────────────
         Barra de navegación del sitio. crud.php no está en el menú
         principal, por eso ningún enlace lleva class="active".
         ─────────────────────────────────────────────────────────────── -->
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="listas.html">Listas</a></li>
                <li><a href="peliculas.html">Películas</a></li>
                <li><a href="series.html">Series</a></li>
                <li><a href="sobre_mi.html">Sobre mí</a></li>
                <li><a href="tablas.html">Tablas</a></li>
                <li><a href="formulario.php">Formulario</a></li>
            </ul>
        </nav>
    </header>

    <!-- ── MAIN ────────────────────────────────────────────────────────
         Contenido principal: contador de registros y tabla generada
         dinámicamente con PHP a partir del array $registros.
         ─────────────────────────────────────────────────────────────── -->
    <main>
        <h1>Tabla generada con PHP</h1>

        <!-- ── Sección de tabla dinámica ────────────────────────────────
             PHP recorre el array $registros con foreach y genera una
             <tr> por cada elemento. htmlspecialchars() protege cada
             valor contra XSS antes de imprimirlo en el HTML.
             ─────────────────────────────────────────────────────────── -->
        <section>
            <!-- PHP imprime el total de registros dinámicamente -->
            <p>Total de registros: <strong><?php echo $total; ?></strong></p>

            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Categoría</th>
                        <th>Asignado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registros as $reg): ?>
                    <!-- PHP genera una fila por cada elemento del array -->
                    <tr>
                        <td><?php echo htmlspecialchars($reg['id'],        ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($reg['titulo'],    ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($reg['categoria'], ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php echo htmlspecialchars($reg['asignado'],  ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>

    <!-- ── FOOTER ──────────────────────────────────────────────────────
         Pie de página idéntico en todas las páginas del sitio.
         ─────────────────────────────────────────────────────────────── -->
    <footer>
        Derechos Reservados Producciones h777
    </footer>

</body>
</html>
