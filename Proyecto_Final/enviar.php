<?php
// Conexión a la base de datos
$servidor = "localhost";  // o tu servidor de base de datos
$usuario = "root";  // tu nombre de usuario
$clave = ""; // tu contraseña
$base_de_datos = "consultorio_dental"; // tu base de datos

// Crear la conexión
$conn = new mysqli($servidor, $usuario, $clave, $base_de_datos);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si los datos fueron enviados por el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recoger los valores del formulario
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];

    // Preparar la consulta SQL para insertar los datos
$sql = $conn->prepare("INSERT INTO pacientes (nombre, edad, correo) VALUES (?, ?, ?)");
$sql->bind_param("sis", $nombre, $edad, $correo); // 's' para string, 'i' para entero

// Ejecutar la consulta
if ($sql->execute()) {
    echo "Datos insertados correctamente";
} else {
    echo "Error al insertar datos: " . $sql->error;
}

}

// Cerrar la conexión
$conn->close();
?>
