<?php
include_once "conexion.php";

class med {
    public static function Rmostrar() {
        try {
            $query = Pconexion::Conexion()->prepare("SELECT * FROM receta_med");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die("Error al mostrar la receta: " . $e->getMessage());
        }
    }

    public static function Rinsertar() {
        try {
            $idM = filter_var($_POST['idmed'], FILTER_SANITIZE_STRING);
            $mdct = filter_var($_POST['mdct'], FILTER_SANITIZE_STRING);
            $hora = filter_var($_POST['hora'], FILTER_SANITIZE_STRING);
            $dia = filter_var($_POST['dia'], FILTER_SANITIZE_STRING);
            $dts = filter_var($_POST['dts'], FILTER_SANITIZE_STRING);

            $query = Pconexion::Conexion()->prepare("INSERT INTO receta_med (IDMedic, Medicamento, Hora, Dias, Dentista) VALUES (?, ?, ?, ?, ?)");
            $query->execute([$idM, $mdct, $hora, $dia, $dts]);

            header("Location: receta.php?status=success");
        } catch (PDOException $e) {
            header("Location: receta.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }

    public static function Rmodificar() {
        try {
            $idM = filter_var($_POST['idmed'], FILTER_SANITIZE_STRING);
            $mdct = filter_var($_POST['mdct'], FILTER_SANITIZE_STRING);
            $hora = filter_var($_POST['hora'], FILTER_SANITIZE_STRING);
            $dia = filter_var($_POST['dia'], FILTER_SANITIZE_STRING);
            $dts = filter_var($_POST['dts'], FILTER_VALIDATE_STRING);

            $query = Pconexion::Conexion()->prepare("UPDATE receta_med SET Medicamento=?, Hora=?, Dias=?, Dentista=? WHERE IDMedicamento=?");
            $query->execute([$mdct, $hora, $dia, $dts, $idM]);

            header("Location: receta.php?status=success");
        } catch (PDOException $e) {
            header("Location: receta.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }
    public static function Reliminar() {
        try {
            $idM = filter_var($_POST['idmed'], FILTER_SANITIZE_STRING);

            $query = Pconexion::Conexion()->prepare("DELETE FROM receta_med WHERE IDMedica=?");
            $query->execute([$idM]);

            header("Location: receta.php?status=success");
        } catch (PDOException $e) {
            header("Location: receta.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }
}

if (array_key_exists("Ragre", $_POST)) {
    med::Rinsertar();
}
if (array_key_exists("Rmodi", $_POST)) {
    med::Rmodificar();
}
if (array_key_exists("Relim", $_POST)) {
    med::Reliminar();
}
?>