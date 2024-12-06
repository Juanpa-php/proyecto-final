<?php
include('db.php');

// Obtener todos los pacientes
$query = "SELECT * FROM pacientes";
$stmt = $pdo->query($query);
$pacientes = $stmt->fetchAll();
?>

<h1>Lista de Pacientes</h1>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Edad</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Email</th>
    </tr>
    <?php foreach ($pacientes as $paciente): ?>
    <tr>
        <td><?php echo $paciente['id']; ?></td>
        <td><?php echo $paciente['nombre']; ?></td>
        <td><?php echo $paciente['apellido']; ?></td>
        <td><?php echo $paciente['Edad']; ?></td>
        <td><?php echo $paciente['telefono']; ?></td>
        <td><?php echo $paciente['email']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
