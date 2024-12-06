<?php
require_once 'conectar.php';

if (isset($_POST['paciente_id'], $_POST['fecha'], $_POST['hora'], $_POST['dentista'], $_POST['tratamiento'])) {
    $paciente_id = intval($_POST['paciente_id']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    $hora = $conn->real_escape_string($_POST['hora']);
    $dentista = $conn->real_escape_string($_POST['dentista']);
    $tratamiento = $conn->real_escape_string($_POST['tratamiento']);

    $stmt = $conn->prepare("INSERT INTO citas (paciente_id, fecha, hora, dentista, tratamiento) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("issss", $paciente_id, $fecha, $hora, $dentista, $tratamiento);

    if ($stmt->execute()) {
        echo "Cita agendada con éxito.";
    } else {
        echo "Error al agendar cita: " . $stmt->error;
    }
    $stmt->close();
    $conn->close();
} else {
    echo "Por favor, complete todos los campos del formulario.";
}
?>