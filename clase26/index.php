<?php

class Auth
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function registerUser($username, $password, $email)
    {
        // Verifica si el usuario ya existe
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->close();
            return "El nombre de usuario ya está en uso.";
        }

        $stmt->close();

        // Inserta el nuevo usuario en la base de datos
        $token = bin2hex(random_bytes(16)); // Generar un token de autenticación
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $stmt = $this->conn->prepare("INSERT INTO users (username, password, email, token) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $username, $hashed_password, $email, $token);

        if ($stmt->execute()) {
            return "Usuario registrado con éxito.";
        } else {
            return "Error al registrar el usuario.";
        }
    }

    public function authenticateUser($username, $password)
    {
        $stmt = $this->conn->prepare("SELECT id, password, token FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $hashed_password, $token);
        $stmt->fetch();

        if ($stmt->num_rows == 1 && password_verify($password, $hashed_password)) {
            return $token;
        } else {
            return null;
        }
    }
}

class API
{
    private $auth;

    public function __construct($auth)
    {
        $this->auth = $auth;
    }

    public function login($username, $password)
    {
        $token = $this->auth->authenticateUser($username, $password);

        if ($token) {
            return json_encode(["token" => $token]);
        } else {
            return json_encode(["error" => "Credenciales inválidas"]);
        }
    }
}

// Uso de las clases
$auth = new Auth($conn);
$api = new API($auth);

// Ejemplo de autenticación
$username = "usuario_ejemplo";
$password = "contrasena_ejemplo";
echo $api->login($username, $password);

// Cierre de la conexión a la base de datos
$conn->close();
?>




?>