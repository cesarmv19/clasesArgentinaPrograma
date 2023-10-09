<?php
header("Content-Type: application/json");

// Ruteador básico de la API
$endpoint = $_SERVER['REQUEST_URI'];//localhost o la ip del servidor

switch ($endpoint) {
    case '/2023/appmovil/api_rest/'://ruta de su carpeta en el servidor (htdocs)
        include('personas.php');
        break;
    default:
        echo json_encode(array('message' => 'Ruta no encontrada'));
}
?>
