<!-- Le dice al navegador que este documento está en HTML5 -->
<!DOCTYPE html>

<!-- lang="es": indica que el contenido está en español (corrige el valor anterior "en") -->
<html lang="es">

<!-- head: configuración de la página, no visible para el usuario -->
<head>
    <!-- UTF-8: permite usar acentos y caracteres especiales -->
    <meta charset="UTF-8">
    <!-- viewport: adapta la página a cualquier tamaño de pantalla -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Conecta con el CSS compartido que da estilo a todo el sitio -->
    <link rel="stylesheet" href="assets/style/style.css">
    <!-- Título que aparece en la pestaña del navegador -->
    <title>Formulario</title>
</head>

<!-- body: todo lo que aparece visualmente en la página va aquí dentro -->
<body>

    <!-- header: zona superior con el menú de navegación -->
    <header>
        <!-- nav: menú de navegación para moverse entre todas las páginas del sitio -->
        <nav>
            <!-- ul: lista sin orden usada como menú de enlace -->
            <ul>
                <!-- Cada li es un ítem del menú; <a href="..."> lleva a otra página al hacer clic -->
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

    <!-- main: contenido principal de la página -->
    <main>

        <!-- h1: título principal de esta página -->
        <h1>Formulario</h1>

        <!-- form: contenedor del formulario. action indica a qué archivo PHP enviar los datos.
             method="post" envía los datos de forma segura, sin exponerlos en la URL -->
        <form action="php/logica.php" method="post">

            <!-- Campo de texto para el nombre completo del usuario -->
            <label for="nombre">Nombre</label>
            <!-- placeholder: texto de ejemplo que desaparece al escribir; ayuda al usuario a saber qué poner -->
            <input type="text" id="nombre" name="nombre" placeholder="Ej: María García" required>

            <!-- Campo de email: el navegador valida automáticamente que tenga formato de correo -->
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Ej: correo@ejemplo.com" required>

            <!-- Campo de fecha: muestra un selector de calendario en la mayoría de navegadores -->
            <label for="date">Fecha</label>
            <input type="date" name="date" id="date" required>

            <!-- Área de texto para mensajes largos; más cómoda que un input de una línea -->
            <label for="mensaje">Mensaje</label>
            <textarea name="mensaje" id="mensaje" placeholder="Escribe tu mensaje aquí..." required></textarea>

            <!-- select: lista desplegable que permite elegir una opción entre varias -->
            <label for="opciones">Opciones</label>
            <select name="opciones" id="opciones" required>
                <!-- La primera opción vacía obliga al usuario a elegir conscientemente una opción -->
                <option value="">Selecciona una opción</option>
                <option value="opcion 1">Opción 1</option>
                <option value="opcion 2">Opción 2</option>
                <option value="opcion 3">Opción 3</option>
            </select>

            <!-- button type="submit": envía el formulario al archivo PHP indicado en action -->
            <button type="submit">Enviar</button>

        </form>

    </main>

    <!-- footer: pie de página con información de derechos -->
    <footer>
        Derechos Reservados Producciones h777
    </footer>

</body>
</html>
