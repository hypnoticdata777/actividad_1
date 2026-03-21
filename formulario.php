<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
    <stylesheet></stylesheet>
    <title>Formulario</title>
</head>
<body>
    <header>
        <h1>Formulario</h1>
        <nav>
            <ul>
                <!-- Cada li es un elemento de la lista. El <a> es un enlace, href indica a qué página va -->
                <li><a href="index.html">Inicio</a></li>
                <li><a href="listas.html">Listas</a></li>
                <li><a href="peliculas.html">Películas</a></li>
                <li><a href="series.html">Series</a></li>
                <li><a href="sobre_mi.html">Sobre mí</a></li>
                <li><a href="tablas.html">Tablas</a></li>
            </ul>
        </nav>
    </header>
    <main>
       <form action="">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="mensaje">Mensaje:</label>
        <textarea name="mensaje" id="mensaje" required></textarea>

        <button type="submit">Enviar</button>
       </form> 
    </main>
    <footer></footer>
</body>
</html>