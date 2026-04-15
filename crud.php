<?php
/* ================================================================
   ARCHIVO: crud.php
   Demuestra el uso de PHP para generar contenido dinámico.
   Usa un array asociativo como fuente de datos y construye
   una tabla HTML en el servidor antes de enviarla al navegador.
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

    <main>
        <h1>Tabla generada con PHP</h1>

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

    <footer>
        Derechos Reservados Producciones h777
    </footer>

</body>
</html>
