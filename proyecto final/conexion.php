<?php
class Pconexion{
    public static function Conexion(){
        $host = 'localhost';
        $dbname = 'consultorio';
        $user = 'root';
        $pass = '';

        try{
            $conn = new PDO ("mysql:host=$host; port=3306; dbname=$dbname", $user, $pass);
            //echo "Se conecto a la Base de Datos";
        }

        catch(PDOException $pe){
            die("No se logro conectar a la Base de Datos".$pe->get_Message());
        }
        return $conn;
    }
    public static function CerrarConexion(){
        $conex = Pconexion::Conexion().close();
        return $conex;
    }
    }
?>