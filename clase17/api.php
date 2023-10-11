<?php
header('Content-Type: application/json');
// echo $_SERVER['REQUEST_URI'];
$host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'micro_api';
    $conn = new mysqli($host, $username, $password, $db);
    if(!$conn){
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(array('message' => 'Erro de db'));
        exit();
    }

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $request_body = file_get_contents('php://input');
    $data = json_decode($request_body, true);
    // $data = json_decode(file_get_contents('php://input'), true);
    // print_r($data);

    $nombre = $data['nombre'];
    $email = $data['email'];
    // if(isset($_POST['nombre'])){
    //     $nombre = $_POST['nombre'];
    //     // echo $_POST['nombre'];
    // }
    // if(isset($_POST['email'])){
    //     $email = $_POST['email'];
    // }
    $sql = "INSERT INTO personas(nombre, email) VALUES('$nombre', '$email')";
    // $result = mysqli_query($conn, $query);

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('message' => 'Persona creada con éxito'));
    } else {
        echo json_encode(array('message' => 'Error al crear persona: ' . $conn->error));
    }


    header('Content-Type: application/json');
    echo json_encode(array('message' => 'Datos recibidos', 'data' => $data));
    exit();
}

// header('Content-Type: application/json');
// echo json_encode(array('message' => 'Bienvenido a mi micro-API'));

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM personas";  
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
}
?>