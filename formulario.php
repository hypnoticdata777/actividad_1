<!-- ================================================================
     TABLA DE ETIQUETAS USADAS EN ESTA PÁGINA
     ================================================================
     Etiqueta / Atrib.        Función
     ──────────────────────   ──────────────────────────────────────
     <!DOCTYPE html>          Declara que el documento es HTML5
     <html>                   Elemento raíz que envuelve todo el documento
     lang=                    Idioma del contenido (es = español)
     <head>                   Configuración del documento (no visible)
     <meta charset>           UTF-8: permite acentos, ñ y caracteres especiales
     <meta viewport>          Adapta la página al ancho del dispositivo
     content=                 Valor del meta tag
     <link rel>               Conecta el HTML con un archivo externo (CSS)
     href=                    Ruta del archivo CSS o página de destino
     <title>                  Texto que aparece en la pestaña del navegador
     <body>                   Todo el contenido visible de la página
     <header>                 Cabecera con la barra de navegación
     <nav>                    Bloque semántico de navegación
     <ul>                     Lista sin orden (usada como menú)
     <li>                     Ítem de lista
     <a>                      Enlace a otra página
     class="active"           Subraya en dorado el enlace de la página actual
     <main>                   Área de contenido principal
     <h1>                     Título principal (solo uno por página)
     <form>                   Contenedor del formulario
     action=                  Archivo PHP que recibe los datos al enviar
     method="post"            Los datos van en el cuerpo, no visibles en la URL
     <label>                  Etiqueta visual asociada a un campo
     for=                     Conecta el <label> con su <input> por id
     <input type="text">      Campo de texto de una sola línea
     <input type="email">     Campo de email (el navegador valida el formato)
     <input type="date">      Selector de fecha con calendario visual
     id=                      Identificador único del campo
     name=                    Nombre del campo; PHP lo usa para leer el valor
     placeholder=             Texto de ejemplo dentro del campo vacío
     required                 El navegador bloquea el envío si está vacío
     <textarea>               Área de texto de múltiples líneas
     <select>                 Lista desplegable de opciones
     <option>                 Una opción dentro del <select>
     value=                   Valor interno del option enviado al servidor
     <button type="submit">   Envía el formulario al archivo en action=
     <section>                Agrupa el formulario para mantener estructura consistente con el sitio
     <h2>                     Subtítulo de sección (color azul via main section h2 en style.css)
     <footer>                 Pie de página
     <script>                 Bloque de JavaScript ejecutado en el navegador (cliente)
     document.querySelector() Busca y devuelve el primer elemento que coincida con el selector CSS dado
     addEventListener         Escucha un evento (submit) y ejecuta una función al dispararse
     e.preventDefault()       Cancela el comportamiento por defecto del evento (detiene el envío del form)
     document.getElementById() Busca y devuelve el elemento HTML que tenga ese id
     .value                   Lee el texto actual escrito dentro de un input o seleccionado en un select
     .trim()                  Elimina los espacios en blanco al inicio y al final de un string
     .length                  Propiedad que devuelve el número de caracteres de un string
     alert()                  Muestra un cuadro emergente con un mensaje; el usuario debe cerrarlo
     RegExp / regex           Expresión regular: patrón de texto para validar un formato (ej: email)
     .test()                  Verifica si un string cumple el patrón de la expresión regular; devuelve true/false
     new Date()               Crea un objeto de fecha con la fecha y hora actual del sistema
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

        <!-- ── Sección del formulario de contacto ───────────────────────
             Envuelve el formulario en <section> igual que el resto de
             páginas del sitio. El form tiene su propio centrado y layout
             definidos en style.css (max-width, flex-column, gap).
             action="php/logica.php" → envía los datos a ese archivo PHP.
             method="post"           → los datos viajan en el cuerpo de la
             solicitud, no en la URL (más seguro que method="get").
             required en cada campo  → el navegador bloquea el envío si
             algún campo está vacío.
             ─────────────────────────────────────────────────────────── -->
        <section>

            <h2>Contacto</h2>

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

        </section>

    </main>

    <!-- ── FOOTER ──────────────────────────────────────────────────────
         Pie de página idéntico en todas las páginas del sitio.
         ─────────────────────────────────────────────────────────────── -->
    <footer>
        Derechos Reservados Producciones h777
    </footer>

    <!-- ── SCRIPT DE VALIDACIÓN ──────────────────────────────────────────
         Se ejecuta en el navegador antes de enviar el formulario.
         Intercepta el evento submit y valida cada campo manualmente
         para dar mensajes de error más claros que los del navegador.
         ─────────────────────────────────────────────────────────────── -->
    <script>
    /* ================================================================
       VALIDACIÓN DEL FORMULARIO CON JAVASCRIPT
       Intercepta el submit antes de enviarlo al servidor.
       Valida que los campos no estén vacíos o mal formados
       y muestra mensajes de error personalizados al usuario.
       ================================================================ */
    document.querySelector('form').addEventListener('submit', function (e) {

        // Obtiene los valores de cada campo
        const nombre  = document.getElementById('nombre').value.trim();
        const email   = document.getElementById('email').value.trim();
        const fecha   = document.getElementById('date').value;
        const mensaje = document.getElementById('mensaje').value.trim();
        const opcion  = document.getElementById('opciones').value;

        // Validación: ningún campo puede estar vacío
        if (!nombre || !email || !fecha || !mensaje || !opcion) {
            e.preventDefault(); // detiene el envío del formulario
            alert('Por favor completa todos los campos antes de enviar.');
            return;
        }

        // Validación: el nombre debe tener al menos 2 caracteres
        if (nombre.length < 2) {
            e.preventDefault();
            alert('El nombre debe tener al menos 2 caracteres.');
            return;
        }

        // Validación: formato básico de email (debe contener @ y .)
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            e.preventDefault();
            alert('Por favor ingresa un email válido.');
            return;
        }

        // Validación: la fecha no puede ser en el futuro
        const hoy        = new Date();
        const fechaInput = new Date(fecha);
        if (fechaInput > hoy) {
            e.preventDefault();
            alert('La fecha no puede ser en el futuro.');
            return;
        }

        // Validación: el mensaje debe tener al menos 10 caracteres
        if (mensaje.length < 10) {
            e.preventDefault();
            alert('El mensaje debe tener al menos 10 caracteres.');
            return;
        }
    });
</script>
     
</body>
</html>
