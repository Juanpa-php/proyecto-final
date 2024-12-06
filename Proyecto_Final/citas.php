<?php
// Conectar a la base de datos
include 'conectar.php'; // Asegúrate de tener tu conexión establecida

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir los valores enviados por el formulario
    $paciente_id = $_POST['paciente_id'];  // El valor seleccionado del paciente
    $fecha = $_POST['fecha'];               // La fecha de la cita
    $hora = $_POST['hora'];                 // La hora de la cita
    $dentista = $_POST['dentista'];     // Nombre del odontólogo
    $tratamiento = $_POST['tratamiento'];   // Tratamiento asignado

    // Validación simple para asegurarnos de que no haya campos vacíos
    if (empty($paciente_id) || empty($fecha) || empty($hora) || empty($dentista) || empty($tratamiento)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Consulta para insertar la cita en la base de datos
    $sql = "INSERT INTO citas (paciente_id, fecha, hora, dentista, tratamiento)
            VALUES ('$paciente_id', '$fecha', '$hora', '$dentista', '$tratamiento')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "Cita agendada con éxito.";
    } else {
        echo "Error al agendar cita: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
}
?>
