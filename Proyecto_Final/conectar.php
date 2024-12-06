<?php
$servername = "localhost";
$username = "tu_usuario";
$password = "";
$dbname = "consultorio_dental";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>