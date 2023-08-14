<?php
require_once '../config/database.php';


session_start();

// Recibir datos del formulario


$username = $_POST['username'];
$password = $_POST['password'];

// Consulta para verificar las credenciales
$sql = "SELECT id FROM usuarios WHERE username = '$username' AND password = '$password'";
$result = mysqli_query($conexion, $sql);

if ($result->num_rows == 1) {
    // Inicio de sesión exitoso
    $_SESSION['username'] = $username;
    echo 'true';
} else {
    // Inicio de sesión fallido
    echo 'false';
}
