<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <form action="medic.php" method="POST">
<h2>Receta medica</h2>
        <label for="">Id del Medicamento</label>
        <input type="text" name="idmed" id="idmed" readonly="readonly">
        <br>
        <label for="">Medicamento: </label>
        <input type="text" name="mdct" id="mdct">
        <br>
        <label for="">Hora: </label>
        <input type="text" name="hora" id="hora">
        <br>
        <label for="">Dias: </label>
        <input type="text" name="dia" id="dia">
        <br>
        <label for="">Dentista: </label>
        <input type="text" name="dts" id="dts">
        <br>
        <input type="submit" name="Ragre" id="Ragre" value="Agregar">
        <input type="submit" name="Rmodi" id="Rmodi" value="Modificar">
        <input type="submit" name="Relim" id="Relim" value="Eliminar">
</form>
</div>
<table id="Rtabla">
            <tr>
                <th>ID Receta</th>
                <th>Medicamento</th>
                <th>Hora</th>
                <th>Dias</th>
                <th>Dentista</th>
            </tr>
            <tbody>
                <?php
                    include_once("medic.php");
                    $Rconsulta = med::Rmostrar();

                    foreach($Rconsulta as $Rfila){
                        echo "<tr>";
                        echo "<td>".$Rfila['IDMedic']."</td>";  
                        echo "<td>".$Rfila['Medicamento']."</td>";
                        echo "<td>".$Rfila['Hora']."</td>";
                        echo "<td>".$Rfila['Dias']."</td>";
                        echo "<td>".$Rfila['Dentista']."</td>";
                        echo "<td>"."<input type =\"submit\" value=\"Consultar\" onClick=\"Rmostrar()\"></input>"."</td>";
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
            function Rmostrar(){
                var Rtable = document.getElementById("Rtabla");
                for (var ri=1;ri<Rtable.rows.length;ri++){
                    Rtable.rows[ri].onclick= function(){
                        document.getElementById('idmed').value=this.cells[0].innerHTML;
                        document.getElementById('mdct').value=this.cells[1].innerHTML;
                        document.getElementById('hora').value=this.cells[2].innerHTML;
                        document.getElementById('dia').value=this.cells[3].innerHTML;
                        document.getElementById('dts').value=this.cells[4].innerHTML;
                    };
                }
            }
        </script>

        </script>
        <form method="post">
        <button type="submit" name="redirigir">Anterior</button>
    </form>
        <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['redirigir'])) {
        header("Location: agenda.php");
        exit();
    }
    ?>
</body>
</html>