<!-- ================================================================
     TABLA DE ETIQUETAS USADAS EN ESTA PÁGINA
     ================================================================
     Etiqueta / Atrib.        Función
     ──────────────────────   ──────────────────────────────────────
     <form>                   Contenedor del formulario
     action=                  Archivo PHP que recibe los datos al enviar
     method="post"            Los datos viajan en el cuerpo de la
                              solicitud, no visibles en la URL
     <label>                  Etiqueta visual asociada a un campo
     for=                     Conecta el <label> con su <input> por id
     <input type="text">      Campo de texto de una sola línea
     <input type="email">     Campo de email (el navegador valida formato)
     <input type="date">      Selector de fecha con calendario visual
     <textarea>               Área de texto de múltiples líneas
     <select>                 Lista desplegable de opciones
     <option>                 Una opción dentro del <select>
     <button type="submit">   Envía el formulario al archivo en action=
     required                 El navegador bloquea el envío si está vacío
     placeholder=             Texto de ejemplo dentro del campo
     ================================================================ -->
<!-- Le dice al navegador que este documento está en HTML5 -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <title>Formulario</title>
</head>

<body>

    <!-- ── HEADER ──────────────────────────────────────────────────────
         Barra de navegación del sitio. class="active" en "Formulario"
         lo subraya en dorado para indicar la página actual.
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
                <li><a href="formulario.php" class="active">Formulario</a></li>
            </ul>
        </nav>
    </header>

    <!-- ── MAIN ────────────────────────────────────────────────────────
         Contenido principal de esta página.
         ─────────────────────────────────────────────────────────────── -->
    <main>

        <h1>Formulario</h1>

        <!-- ── Formulario de contacto ───────────────────────────────────
             action="php/logica.php" → envía los datos a ese archivo PHP.
             method="post"           → los datos viajan en el cuerpo de la
             solicitud, no en la URL (más seguro que method="get").
             required en cada campo  → el navegador bloquea el envío si
             algún campo está vacío.
             ─────────────────────────────────────────────────────────── -->
        <form action="php/logica.php" method="post">

            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" placeholder="Ej: María García" required>

            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Ej: correo@ejemplo.com" required>

            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" required>

            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>

            <label for="opciones">Opciones</label>
            <select name="opciones" id="opciones" required>
                <option value="">Selecciona una opción</option>
                <option value="opcion 1">Opción 1</option>
                <option value="opcion 2">Opción 2</option>
                <option value="opcion 3">Opción 3</option>
            </select>

            <button type="submit">Enviar</button>

        </form>

    </main>

    <!-- ── FOOTER ──────────────────────────────────────────────────────
         Pie de página idéntico en todas las páginas del sitio.
         ─────────────────────────────────────────────────────────────── -->
    <footer>
        Derechos Reservados Producciones h777
    </footer>

</body>
</html>
