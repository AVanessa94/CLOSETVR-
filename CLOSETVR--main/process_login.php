<?php
session_start(); // 🔹 Inicia sesión

require 'config.php';

$correo = $_POST['loginEmail'];
$clave = $_POST['loginPassword'];

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
$stmt->execute([$correo]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($clave, $usuario['contrasena'])) {
    // 🔹 Guardar datos en sesión
    $_SESSION['usuario_id'] = $usuario['id'];
    $_SESSION['usuario_nombre'] = $usuario['nombre'];

    header("Location: catalogo.php"); // Cambia a PHP para poder usar sesiones
    exit();
} else {
    echo "Correo o contraseña incorrectos.";
}
?>
