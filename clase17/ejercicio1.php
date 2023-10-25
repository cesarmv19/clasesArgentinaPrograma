<?php

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    $saludo = "Hola, $nombre";
} else {
    $saludo = "Hola, desconocido";
}

// Establece la cabecera de respuesta como JSON
header('Content-Type: application/json');

// Devuelve el saludo como una respuesta JSON
echo json_encode(array('saludo' => $saludo));
?>
