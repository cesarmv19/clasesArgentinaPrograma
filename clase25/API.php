
<?php
include 'conexion.php';
// include 'productos.php';
//modelo
class API {
    private $baseDeDatos;
    
    public function __construct($baseDeDatos) {
        $this->baseDeDatos = $baseDeDatos;
    }

    public function agregar(Producto $producto) {
        $sql = "INSERT INTO productos (nombre, precio, cantidad) VALUES (?, ?, ?)";
        $parametros = [$producto->getNombre(), $producto->getPrecio(), $producto->getCantidad()];
        $this->baseDeDatos->ejecutarConsulta($sql, $parametros);
    }

    public function editar(Producto $producto) {
        $sql = "UPDATE productos SET nombre = ?, precio = ?, cantidad = ? WHERE id = ?";
        $parametros = [$producto->getNombre(), $producto->getPrecio(), $producto->getCantidad(), $producto->getId()];
        $this->baseDeDatos->ejecutarConsulta($sql, $parametros);
    }
    public function eliminar($id) {
        $sql = "DELETE FROM productos WHERE id = ?";
        $this->baseDeDatos->ejecutarConsulta($sql, [$id]);
    }

    public function listar() {
        $sql = "SELECT * FROM productos";
        $stmt = $this->baseDeDatos->ejecutarConsulta($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>