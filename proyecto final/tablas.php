<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <?php
        // include_once("conexion.php");
        // $consulta = Pconexion::Conexion();
        ?>
    <div>
    <form action="pacientes.php" method="POST">
        <h2>Pacientes</h2>
        <label for="">ID del Paciente</label>
        <input type="text" name="idp" id="idp" readonly="readonly">
        <br>
        <label for="">Nombre(s): </label>
        <input type="text" name="nombre" id="nombre">
        <br>
        <label for="">Apellido P: </label>
        <input type="text" name="apellidop" id="apellidop">
        <br>
        <label for="">Apellido M: </label>
        <input type="text" name="apellidom" id="apellidom">
        <br>
        <label for="">Edad: </label>
        <input type="text" name="edad" id="edad">
        <br>
        <label for="">Fecha de Nac: </label>
        <input type="date" name="fecha" id="fecha">
        <br>
        <input type="submit" name="guardar" id="guardar" value="Agregar">
        <input type="submit" name="modificar" id="modificar" value="Modificar">
        <input type="submit" name="eliminar" id="eliminar" value="Eliminar">
        <Button>Siguiente<a href="agenda.php"></a></Button>
    </form>
    </div>
        <table id="tabla">
            <tr>
                <th>ID Paciente</th>
                <th>Nombre(s)</th>
                <th>Apellido P</th>
                <th>Apellido M</th>
                <th>Edad</th>
                <th>Fecha de Nac</th>
            </tr>
            <tbody>
                <?php
                    include_once("pacientes.php");
                    $consulta = pac::mostrar();

                    foreach($consulta as $fila){
                        echo "<tr>";
                        echo "<td>".$fila['Idpaciente']."</td>";  
                        echo "<td>".$fila['Nombre']."</td>";
                        echo "<td>".$fila['ApellidoP']."</td>";
                        echo "<td>".$fila['ApellidoM']."</td>";
                        echo "<td>".$fila['Edad']."</td>";
                        echo "<td>".$fila['Fecha_Nac']."</td>";
                        echo "<td>"."<input type =\"submit\" value=\"Consultar\" onClick=\"mostrar()\"></input>"."</td>";
                        echo "<tr>";
                        }
                        ?>
            </tbody>
        </table>

        <style>
            table,th,td{
                border : 1px solid;
            }
        </style>
        <script>
            function mostrar(){
                var table = document.getElementById("tabla");
                for (var i=1;i<table.rows.length;i++){
                    table.rows[i].onclick= function(){
                        document.getElementById('idp').value=this.cells[0].innerHTML;
                        document.getElementById('nombre').value=this.cells[1].innerHTML;
                        document.getElementById('apellidop').value=this.cells[2].innerHTML;
                        document.getElementById('apellidom').value=this.cells[3].innerHTML;
                        document.getElementById('edad').value=this.cells[4].innerHTML;
                        document.getElementById('fecha').value=this.cells[5].innerHTML;
                    };
                }
            }
        </script>
        <form method="post">
        <button type="submit" name="redirigir">Siguiente</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['redirigir'])) {
        header("Location: agenda.php");
        exit();
    }
    echo "<br>";
    ?>
     <form method="post">
        <button type="submit" name="regresar">Anterior</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['regresar'])) {
        header("Location: ../proyecto_Final/index.html");
        exit();
    }
    ?>
</body>
</html>