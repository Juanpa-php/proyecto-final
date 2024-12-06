<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div>
        <form action="citas.php" method="POST">
        <h2>Agenda de citas</h2>
        <label for="">ID de la Cita: </label>
        <input type="text" name="idcita" id="idcita" readonly="readonly">
        <br>
        <label for="">Paciente: </label>
        <input type="text" name="paciente" id="paciente">
        <br>
        <label for="">Fecha: </label>
        <input type="date" name="fechaC" id="fechaC">
        <br>
        <label for="">Horario: </label>
        <input type="text" name="horario" id="horario">
        <br>
        <label for="">Motivo: </label>
        <input type="text" name="motivo" id="motivo">
        <br>
        <label for="">Dentista asignado: </label>
        <input type="text" name="dentist" id="dentist">
        <br>
        <input type="submit" name="Cagregar" id="Cagregar" value="Agregar">
        <input type="submit" name="Cmodificar" id="Cmodificar" value="Modificar">
        <input type="submit" name="Celiminar" id="Celiminar" value="Eliminar">
        </form>
        </div>
        <table id="Ctabla">
            <tr>
                <th>ID Cita</th>
                <th>Paciente</th>
                <th>Fecha</th>
                <th>Horario</th>
                <th>Motivo</th>
                <th>Dts. Asignado</th>
            </tr>
            <tbody>
                <?php
                    include_once("citas.php");
                    $Cconsulta = cita::Cmostrar();

                    foreach($Cconsulta as $Cfila){
                        echo "<tr>";
                        echo "<td>".$Cfila['IDagenda']."</td>";  
                        echo "<td>".$Cfila['Paciente']."</td>";
                        echo "<td>".$Cfila['Fecha']."</td>";
                        echo "<td>".$Cfila['Horario']."</td>";
                        echo "<td>".$Cfila['Motivo']."</td>";
                        echo "<td>".$Cfila['Dentista_asig']."</td>";
                        echo "<td>"."<input type =\"submit\" value=\"Consultar\" onClick=\"Cmostrar()\"></input>"."</td>";
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
            function Cmostrar(){
                var Ctable = document.getElementById("Ctabla");
                for (var ci=1;ci<Ctable.rows.length;ci++){
                    Ctable.rows[ci].onclick= function(){
                        document.getElementById('idcita').value=this.cells[0].innerHTML;
                        document.getElementById('paiciente').value=this.cells[1].innerHTML;
                        document.getElementById('fechaC').value=this.cells[2].innerHTML;
                        document.getElementById('horario').value=this.cells[3].innerHTML;
                        document.getElementById('motivo').value=this.cells[4].innerHTML;
                        document.getElementById('dentist').value=this.cells[5].innerHTML;
                    };
                }
            }
        </script>
        <form method="post">
        <button type="submit" name="regresar">Anterior</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['regresar'])) {
        header("Location: tablas.php");
        exit();
    }
    ?>
    <br>
     </script>
        <form method="post">
        <button type="submit" name="redirigir">Siguiente</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['redirigir'])) {
        header("Location: receta.php");
        exit();
    }
    ?>
</body>
</html>