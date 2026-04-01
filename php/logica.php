<?php
/* =============================================
   ARCHIVO: php/logica.php
   Procesa los datos enviados desde formulario.php
   y los muestra al usuario en una página de confirmación.
   ============================================= */

// Verifica que el formulario fue enviado correctamente antes de procesar nada
if (!isset($_POST['nombre'])) {
    die("Error: no se recibieron datos del formulario.");
}

// htmlspecialchars() convierte caracteres especiales (<, >, ", &) en entidades HTML
// para evitar ataques XSS (cross-site scripting). ENT_QUOTES protege comillas simples y dobles.
$nombre  = htmlspecialchars($_POST['nombre'],  ENT_QUOTES, 'UTF-8');
$email   = htmlspecialchars($_POST['email'],   ENT_QUOTES, 'UTF-8');
$fecha   = htmlspecialchars($_POST['date'],    ENT_QUOTES, 'UTF-8');
$mensaje = htmlspecialchars($_POST['mensaje'], ENT_QUOTES, 'UTF-8');
$opcion  = htmlspecialchars($_POST['opciones'],ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<!-- lang="es": indica que el contenido de esta página está en español -->
<html lang="es">
<head>
    <!-- UTF-8: permite acentos y caracteres especiales -->
    <meta charset="UTF-8">
    <!-- viewport: la página se adapta al tamaño de la pantalla del dispositivo -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conecta el CSS compartido para que esta página tenga el mismo estilo que el resto del sitio -->
    <link rel="stylesheet" href="../assets/style/style.css">
    <title>Formulario enviado</title>
</head>
<body>

    <!-- header con nav: barra de navegación para volver a cualquier sección del sitio -->
    <header>
        <nav>
            <ul>
                <li><a href="../index.html">Inicio</a></li>
                <li><a href="../listas.html">Listas</a></li>
                <li><a href="../peliculas.html">Películas</a></li>
                <li><a href="../series.html">Series</a></li>
                <li><a href="../sobre_mi.html">Sobre mí</a></li>
                <li><a href="../tablas.html">Tablas</a></li>
                <li><a href="../formulario.php">Formulario</a></li>
            </ul>
        </nav>
    </header>

    <!-- main: muestra el resumen de los datos que el usuario acaba de enviar -->
    <main>
        <!-- Caja de confirmación: le indica al usuario que el formulario se recibió bien -->
        <div class="confirmacion">
            <h1>¡Formulario enviado!</h1>
            <p>Estos son los datos que recibimos:</p>

            <!-- dl: lista de definiciones; ideal para mostrar pares clave-valor -->
            <dl>
                <dt>Nombre</dt>
                <dd><?php echo $nombre; ?></dd>

                <dt>Email</dt>
                <dd><?php echo $email; ?></dd>

                <dt>Fecha</dt>
                <dd><?php echo $fecha; ?></dd>

                <dt>Mensaje</dt>
                <dd><?php echo $mensaje; ?></dd>

                <dt>Opción seleccionada</dt>
                <dd><?php echo $opcion; ?></dd>
            </dl>

            <!-- Enlace para volver al formulario sin tener que usar el botón "atrás" del navegador -->
            <a class="btn-volver" href="../formulario.php">← Volver al formulario</a>
        </div>
    </main>

    <!-- footer: pie de página con el mismo estilo que el resto del sitio -->
    <footer>
        Derechos Reservados Producciones h777
    </footer>

</body>
</html>
