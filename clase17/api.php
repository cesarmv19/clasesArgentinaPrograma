<?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $data = json_decode(file_get_contents('php://input'), true);
    print_r($data);


    $host = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'micro_api';
    $conn = mysqli_connect($host, $username, $password, $db);

    if(!$conn){
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(array('message' => 'Erro de db'));
        exit();
    }
    $query = "INSERT INTO personas(nombre, email) VALUES('" . $data['nombre'] . "', '" . $data['email'] . "')";
    $result = mysqli_query($conn, $query);

    if(!$result){
        header('HTTP/1.1 500 Internal Server Error');
        echo json_encode(array('message' => 'Erro de db'));
        exit();
    }


    header('Content-Type: application/json');
    echo json_encode(array('message' => 'Datos recibidos', 'data' => $data));
    exit();
}

header('Content-Type: application/json');
echo json_encode(array('message' => 'Bienvenido a mi micro-API'));

?>