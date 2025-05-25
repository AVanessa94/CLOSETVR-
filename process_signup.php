<?php
require 'config.php'; // Conexión a la base de datos

// Recibir datos del formulario
$nombre = $_POST['signupName'];
$correo = $_POST['signupEmail'];
$contrasena = password_hash($_POST['signupPassword'], PASSWORD_BCRYPT); // Encriptar la contraseña
$fecha = date("d/m/y");

// Preparar consulta SQL
$stmt = $conn->prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)");

try {
    $stmt->execute([$nombre, $correo, $contrasena]); // Ejecutar la consulta
    header("Location: index.html"); // Redirigir al login
    exit();
} catch (PDOException $e) {
    echo "Error al registrar: " . $e->getMessage();
}
?>
