<?php
//Interfaces
interface Vehiculo {
    public function acelerar();
    public function frenar();
}

class Coche implements Vehiculo {
    public function acelerar() {
        // Implementación específica para acelerar un coche

    }

    public function frenar() {
        // Implementación específica para frenar un coche
    }
}

//Clase abstracta
abstract class Animal {
    public $nombre;

    abstract public function hacerSonido();
}

class Perro extends Animal {
    public function hacerSonido() {
        echo "El perro hace un ladrido.";
    }
}

//Dao
class Usuario {
    private $id;
    private $nombre;
    private $correo;

    // Constructor, getters y setters
    public function setNombre(){}
    public function setCorreo(){}
}

interface UsuarioDAO {
    public function insertar(Usuario $usuario);
    public function actualizar(Usuario $usuario);
    public function eliminar($id);
    public function buscarPorId($id);
    public function buscarTodos();
}

class UsuarioDAODB implements UsuarioDAO {
    // Implementa los métodos de la interfaz UsuarioDAO
    // Por ejemplo, el método insertar() insertaría un nuevo usuario en la base de datos.
    public function insertar(Usuario $usuario){

    }
    public function actualizar(Usuario $usuario){}
    public function eliminar($id){}
    public function buscarPorId($id){
        
    }
    public function buscarTodos(){}
    
}

$usuarioDAO = new UsuarioDAODB();
$usuarioDAO->insertar($nuevoUsuario);
$usuarioRecuperado = $usuarioDAO->buscarPorId(1);

$nuevoUsuario = new Usuario();
$nuevoUsuario->setNombre("Ejemplo");
$nuevoUsuario->setCorreo("ejemplo@example.com");

?>