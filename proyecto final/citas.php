<?php
include_once "conexion.php";

class cita {
    public static function Cmostrar() {
        try {
            $query = Pconexion::Conexion()->prepare("SELECT * FROM agenda_citas");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die("Error al mostrar la agenda: " . $e->getMessage());
        }
    }

    public static function Cinsertar() {
        try {
            $idC = filter_var($_POST['idcita'], FILTER_SANITIZE_STRING);
            $paciente = filter_var($_POST['paciente'], FILTER_SANITIZE_STRING);
            $fechaC = filter_var($_POST['fechaC'], FILTER_SANITIZE_STRING);
            $horario = filter_var($_POST['horario'], FILTER_SANITIZE_STRING);
            $motivo = filter_var($_POST['motivo'], FILTER_SANITIZE_STRING);
            $dentista = filter_var($_POST['dentist'], FILTER_SANITIZE_STRING);

            $query = Pconexion::Conexion()->prepare("INSERT INTO agenda_citas (IDagenda, Paciente, Fecha, Horario, Motivo, Dentista_asig) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([$idC, $paciente, $fechaC, $horario, $motivo, $dentista]);

            header("Location: agenda.php?status=success");
        } catch (PDOException $e) {
            header("Location: agenda.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }

    public static function Cmodificar() {
        try {
            $idC = filter_var($_POST['idp'], FILTER_SANITIZE_STRING);
            $paciente = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $fechaC = filter_var($_POST['apellidop'], FILTER_SANITIZE_STRING);
            $horario = filter_var($_POST['apellidom'], FILTER_SANITIZE_STRING);
            $motivo = filter_var($_POST['edad'], FILTER_VALIDATE_STRING);
            $dentista = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);

            $query = Pconexion::Conexion()->prepare("UPDATE pacientes SET Paciente=?, Fecha=?, Horario=?, Motivo=?, Dentista_asig=? WHERE IDagenda=?");
            $query->execute([$paciente, $fechaC, $horario, $motivo, $dentista, $idC]);

            header("Location: agenda.php?status=success");
        } catch (PDOException $e) {
            header("Location: agenda.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }
    public static function Celiminar() {
        try {
            $idC = filter_var($_POST['idcita'], FILTER_SANITIZE_STRING);

            $query = Pconexion::Conexion()->prepare("DELETE FROM agenda_citas WHERE IDagenda=?");
            $query->execute([$idC]);

            header("Location: agenda.php?status=success");
        } catch (PDOException $e) {
            header("Location: agenda.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }
}

if (array_key_exists("Cagregar", $_POST)) {
    cita::Cinsertar();
}
if (array_key_exists("Cmodificar", $_POST)) {
    cita::Cmodificar();
}
if (array_key_exists("Celiminar", $_POST)) {
    cita::Celiminar();
}
?>