<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablas.css" type="text/css">
    <script src="../Principal/js/calendario.js" type="text/javascript"></script>
    <script src="../Principal/js/reloj.js" type="text/javascript"></script>
    <title>Principal</title>
</head>

<body>
    <table class="responstable">


        <tr>
            <th>Realizado</th>
            <th>Codigo</th>
            <th>Nombre</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
        </tr>

        <?php
        include '../config/conexionBD.php';
        $fecha = $_GET["fecha"];
        $sql = "SELECT * FROM tarea WHERE tar_fecha = '$fecha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='radio' /></td>";
                echo " <td>" . $row["tar_codigo"] . "</td>";
                echo " <td>" . $row['tar_nombre'] . "</td>";
                echo " <td>" . $row['tar_horaInicio'] . "</td>";
                echo " <td>" . $row['tar_horaFin'] . "</td>";
                echo " <td> <a href='eliminar.php?codigo=" . $row['tar_codigo'] . "'>Eliminar</a> </td>";
                echo " <td> <a href='modificar.php?codigo=" . $row['tar_codigo'] . "'>Modificar</a> </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen tareas asignadas para hoy</td>";
            echo "</tr>";
        }
        $conn->close();
        ?>

    </table>
</body>

</html>