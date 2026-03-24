<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/style/style.css">
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
       <form action="php/logica.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>

        <label for="date">Fecha</label>
        <input type="date" name="date" id="date" required>

        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" id="mensaje" required></textarea>

        <label for="opciones">Opciones</label>
        <select name="opciones" id="opciones" required>
            <option value="">Selecciona una opcion</option>
            <option value="opcion 1"> Opcion 1</option>
            <option value="opcion 2">Opcion 2</option>
            <option value="opcion 3">Opcion 3</option>
        </select>
        <button type="submit">Enviar</button>
       </form> 
    </main>
    <footer></footer>
</body>
</html>