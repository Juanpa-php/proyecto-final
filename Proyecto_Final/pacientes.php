<?php
include 'conectar.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];

    // Consulta SQL para insertar paciente
    $sql = "INSERT INTO pacientes (nombre, apellido, telefono, email) VALUES ('$nombre', '$apellido', '$telefono', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Paciente registrado con éxito.";
    } else {
        echo "Error al registrar paciente: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
<?php
include 'conectar.php';

$sql = "SELECT * FROM pacientes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Nombre: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
    }
} else {
    echo "0 resultados";
}

$conn->close();
?>

