<?php

class BaseDeDatos {
    private $pdo;
    
    public function __construct($host, $dbname, $usuario, $contrasena) {
        $dsn = "mysql:host=$host;dbname=$dbname";
        $this->pdo = new PDO($dsn, $usuario, $contrasena);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function ejecutarConsulta($sql, $parametros = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($parametros);
        return $stmt;
    }
}
?>