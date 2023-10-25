<?php
include 'API.php';
header("Content-Type: application/json");

// Ruteador básico de la API
// $endpoint = $_SERVER['REQUEST_URI'];//localhost o la ip del servidor

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Endpoint para obtener todas las personas
    if (isset($_GET['id'])) {
        // Endpoint para obtener una persona por ID
        $API = new API();
        $API->editar();
    } else {
        $sql = "SELECT * FROM personas";
    }
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Endpoint para crear una nueva persona
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Endpoint para actualizar una persona por ID
    
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Endpoint para eliminar una persona por ID
    
}
?>