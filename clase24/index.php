<?php
//vista
include 'productos.php';
// $nombre = $_POST['nombre'];
// $precio = $_POST['precio'];
// $cantidad = $_POST['cantidad'];
$producto = new Producto("azúcar", 1050, 10);

// echo $producto->getPrecio();
$con = new BaseDeDatos("localhost", "abmpoo", "root", "");
if($con){
    // echo "Se conectó correctamente";
}else{
    echo "Error";
}
$abm = new ABM($con);
// $abm->agregar($producto);

$producto->setPrecio("1200");
$producto->setId(2);
$abm->editar($producto);
?>