<?php
// Datos de conexión
$host = 'localhost'; // Cambiar si usas otro servidor
$dbname = 'consultorio_dental';
$username = 'root'; // Por defecto en XAMPP es 'root'
$password = ''; // Si no tiene contraseña, déjalo vacío

// Establecer la conexión PDO
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configurar el PDO para lanzar excepciones en caso de error
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Si hay un error en la conexión, lo mostramos
    die("Error de conexión: " . $e->getMessage());
}
?>
