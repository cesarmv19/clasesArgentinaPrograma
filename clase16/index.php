<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
use Response;

$data = array('nombre' => 'Juan', 'edad' => 25);
$response = new Response();
$response->setJson($data);
$response->send();


$json_string = '{"nombre":"Juan","edad":25}';
$data = json_decode($json_string, true);

echo $data['nombre'] . "<br>";
echo $data['edad'];

?>
</body>
</html>