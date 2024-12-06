<?php
include 'conectar.php'; // Incluir el archivo de conexión a la base de datos

// Obtener la fecha desde los parámetros de la URL
$fecha = $_GET['fecha']; // Usamos GET para obtener la fecha seleccionada

// Consulta SQL para obtener las citas de la fecha seleccionada
$sql = "SELECT citas.id, citas.hora, pacientes.nombre AS paciente_nombre, 
               citas.odontologo, citas.tratamiento, citas.estado 
        FROM citas
        JOIN pacientes ON citas.paciente_id = pacientes.id
        WHERE citas.fecha = ?";

// Preparar la consulta
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $fecha); // 's' indica que la fecha es una cadena
$stmt->execute();

// Obtener los resultados
$result = $stmt->get_result();
$citas = array();

while ($row = $result->fetch_assoc()) {
    $citas[] = $row;
}

// Devolver las citas en formato JSON
echo json_encode($citas);

// Cerrar la conexión
$stmt->close();
$conn->close();
?>
