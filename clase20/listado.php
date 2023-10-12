<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php
include 'conexion.php';

$consulta = "SELECT nomEmp,fecNac,salEmp,comisionE,cargoE FROM empleados;";
$resultado = $conn->query($consulta);
?>
<a href="nuevo.php">Agregar un nuevo empleado</a> - 
<a href="cienproductos.php">Agregar 100 productos</a> -
<a href="eliminarimpares.php">Eliminar impares</a>
<table border="1">
<tr>
    <td>Nombre de empleado</td>
    <td>Cargo</td>
</tr>

<?php
while($empleados = mysqli_fetch_assoc($resultado)){
    echo "<tr><td>" . $empleados['nomEmp'] . "</td>";
    echo "<td>" . $empleados['cargoE'] . "</td></tr>";
}

?>
</table>
</body>
</html>