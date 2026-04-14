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

    <!-- ── Tabla de referencia de etiquetas ────────────────────────────
         Sidebar fija a la derecha. Solo visible en pantallas ≥ 1024px.
         ─────────────────────────────────────────────────────────────── -->
    <aside class="char-ref">
        <h3>Etiquetas usadas</h3>
        <table>
            <thead>
                <tr><th>Tag / Atrib.</th><th>Función</th></tr>
            </thead>
            <tbody>
                <tr><td>&lt;form&gt;</td><td>Contenedor del formulario</td></tr>
                <tr><td>action=</td><td>Archivo PHP que recibe los datos</td></tr>
                <tr><td>method="post"</td><td>Datos en el cuerpo, no en la URL</td></tr>
                <tr><td>&lt;label&gt;</td><td>Etiqueta asociada a un campo</td></tr>
                <tr><td>for=</td><td>Conecta el label con su input por id</td></tr>
                <tr><td>&lt;input type="text"&gt;</td><td>Campo de texto de una línea</td></tr>
                <tr><td>&lt;input type="email"&gt;</td><td>Campo de email (valida formato)</td></tr>
                <tr><td>&lt;input type="date"&gt;</td><td>Selector de fecha (calendario)</td></tr>
                <tr><td>&lt;textarea&gt;</td><td>Área de texto multilínea</td></tr>
                <tr><td>&lt;select&gt;</td><td>Lista desplegable de opciones</td></tr>
                <tr><td>&lt;option&gt;</td><td>Opción dentro del select</td></tr>
                <tr><td>&lt;button type="submit"&gt;</td><td>Envía el formulario</td></tr>
                <tr><td>required</td><td>Campo obligatorio antes de enviar</td></tr>
                <tr><td>placeholder=</td><td>Texto de ejemplo dentro del campo</td></tr>
            </tbody>
        </table>
    </aside>

</body>
</html>
