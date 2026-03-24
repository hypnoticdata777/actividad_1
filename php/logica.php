<?php
if (!isset($_POST['nombre'])) {
    die("Error: no se recibieron datos del formulario.");
}

$nombre = htmlspecialchars($_POST['nombre'], ENT_QUOTES, 'UTF-8');
echo "Nombre: " . $nombre . "<br>";
?>