<?php
require_once 'conectar.php';

if (isset($_GET['fecha'])) {
    $fecha = $conn->real_escape_string($_GET['fecha']);

    $stmt = $conn->prepare("SELECT citas.id, citas.fecha, citas.hora, pacientes.nombre AS paciente, citas.odontologo, citas.tratamiento, citas.estado FROM citas JOIN pacientes ON citas.paciente_id = pacientes.id WHERE citas.fecha = ? ORDER BY citas.hora ASC");
    $stmt->bind_param("s", $fecha);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Fecha</th><th>Hora</th><th>Paciente</th><th>Odontólogo</th><th>Tratamiento</th><th>Estado</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr><td>{$row['id']}</td><td>{$row['fecha']}</td><td>{$row['hora']}</td><td>{$row['paciente']}</td><td>{$row['odontologo']}</td><td>{$row['tratamiento']}</td><td>{$row['estado']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay citas para la fecha seleccionada.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Por favor, proporcione una fecha para consultar las citas.";
}
?>
