<?php
$usuarios = [
    "user" => "pass",
    "admin" => "admin123"
];

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

if (array_key_exists($username, $usuarios) && $usuarios[$username] === $password) {
    //echo "¡Bienvenido, $username!";
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>
