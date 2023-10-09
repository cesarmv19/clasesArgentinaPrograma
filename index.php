<?php

        // $data = array('nombre' => 'Juan', 'edad' => 25);
        // $response = new Response();
        // $response->setJson($data);
        // $response->send();


        // $json_string = '{"nombre":"Juan","edad":25}';
        // $data = json_decode($json_string, true);

        // echo $data['nombre'] . "<br>";
        // echo $data['edad'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = json_decode(file_get_contents('php://input'), true);
            header('Content-Type: application/json');
            echo json_encode(array('message' => 'Datos recibidos', 'data' => $data));
        }

        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Bienvenido a mi micro-API'));
?>