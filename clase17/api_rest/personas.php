<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Endpoint para obtener todas las personas
    if (isset($_GET['id'])) {
        // Endpoint para obtener una persona por ID
        $id = $_GET['id'];
        $sql = "SELECT * FROM personas WHERE id = $id";
    } else {
        $sql = "SELECT * FROM personas";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $personas = [];
        while ($row = $result->fetch_assoc()) {
            $personas[] = $row;
        }
        echo json_encode($personas);//convierte el array en formato json
    } else {
        echo json_encode(array());
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Endpoint para crear una nueva persona
    $data = json_decode(file_get_contents('php://input'), true);
    echo json_encode($data);
    $nombre = $data['nombre'];
    $edad = $data['edad'];
    $sql = "INSERT INTO personas (nombre, edad) VALUES ('$nombre', $edad)";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => 'Persona creada con éxito'));
    } else {
        echo json_encode(array('message' => 'Error al crear persona: ' . $conn->error));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    // Endpoint para actualizar una persona por ID
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];
    $nombre = $data['nombre'];
    $edad = $data['edad'];
    $sql = "UPDATE personas SET nombre='$nombre', edad=$edad WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => 'Persona actualizada con éxito'));
    } else {
        echo json_encode(array('message' => 'Error al actualizar persona: ' . $conn->error));
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    // Endpoint para eliminar una persona por ID
    $id = $_GET['id'];
    $sql = "DELETE FROM personas WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => 'Persona eliminada con éxito'));
    } else {
        echo json_encode(array('message' => 'Error al eliminar persona: ' . $conn->error));
    }
}

$conn->close();
?>
