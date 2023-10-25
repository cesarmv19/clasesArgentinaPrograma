<?php
class Persona {
private $nombre;
// Setter de nombre
public function setNombre($nombre) {
// Agregamos validaciones adicionales
if(strlen($nombre) < 3) {
throw new Exception("El nombre debe tener al menos 3 caracteres.");
}
$this->nombre = $nombre;
}
// Getter de nombre
public function getNombre() {
return $this->nombre;
}
}
// Creamos una nueva persona
$persona = new Persona();
// Establecemos el nombre mediante el setter
// $persona->setNombre("Juan");
// Obtenemos el nombre mediante el getter
// echo $persona->getNombre(); // Salida: "Juan"
// Tratamos de establecer un nombre inválido
try {
$persona->setNombre("Jo");
} catch(Exception $e) {
echo $e->getMessage(); // Salida: "El nombre debe tener al menos 3 caracteres."
}

echo $persona->getNombre(); // Salida: "Juan"

?>