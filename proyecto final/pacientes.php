<?php
include_once "conexion.php";

class pac {
    public static function mostrar() {
        try {
            $query = Pconexion::Conexion()->prepare("SELECT * FROM pacientes");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die("Error al mostrar pacientes: " . $e->getMessage());
        }
    }

    public static function insertar() {
        try {
            $id = filter_var($_POST['idp'], FILTER_SANITIZE_STRING);
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $apellidop = filter_var($_POST['apellidop'], FILTER_SANITIZE_STRING);
            $apellidom = filter_var($_POST['apellidom'], FILTER_SANITIZE_STRING);
            $edad = filter_var($_POST['edad'], FILTER_VALIDATE_INT);
            $fecha = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);

            $query = Pconexion::Conexion()->prepare("INSERT INTO pacientes (Idpaciente, Nombre, ApellidoP, ApellidoM, Edad, Fecha_Nac) VALUES (?, ?, ?, ?, ?, ?)");
            $query->execute([$id, $nombre, $apellidop, $apellidom, $edad, $fecha]);

            header("Location: tablas.php?status=success");
        } catch (PDOException $e) {
            header("Location: tablas.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }

    public static function modificar() {
        try {
            $id = filter_var($_POST['idp'], FILTER_SANITIZE_STRING);
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $apellidop = filter_var($_POST['apellidop'], FILTER_SANITIZE_STRING);
            $apellidom = filter_var($_POST['apellidom'], FILTER_SANITIZE_STRING);
            $edad = filter_var($_POST['edad'], FILTER_VALIDATE_INT);
            $fecha = filter_var($_POST['fecha'], FILTER_SANITIZE_STRING);

            $query = Pconexion::Conexion()->prepare("UPDATE pacientes SET Nombre=?, ApellidoP=?, ApellidoM=?, Edad=?, Fecha_Nac=? WHERE Idpaciente=?");
            $query->execute([$nombre, $apellidop, $apellidom, $edad, $fecha, $id]);

            header("Location: tablas.php?status=success");
        } catch (PDOException $e) {
            header("Location: tablas.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }
    public static function eliminar() {
        try {
            $id = filter_var($_POST['idp'], FILTER_SANITIZE_STRING);

            $query = Pconexion::Conexion()->prepare("DELETE FROM pacientes WHERE Idpaciente=?");
            $query->execute([$id]);

            header("Location: tablas.php?status=success");
        } catch (PDOException $e) {
            header("Location: tablas.php?status=error&message=" . urlencode($e->getMessage()));
        }
    }
}

if (array_key_exists("guardar", $_POST)) {
    pac::insertar();
}
if (array_key_exists("modificar", $_POST)) {
    pac::modificar();
}
if (array_key_exists("eliminar", $_POST)) {
    pac::eliminar();
}
?>
