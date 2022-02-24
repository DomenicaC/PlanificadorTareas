<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar datos de tareas</title>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"], 'UTF-8') : null;
    $descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"], 'UTF-8') : null;
    $horaIni = isset($_POST["horaInicio"]) ? trim($_POST["horaInicio"], 'UTF-8') : null;
    $horaFin = isset($_POST["horaFinal"]) ? trim($_POST["horaFinal"]) : null;
    $fecha = isset($_POST["fecha"]) ? trim($_POST["fecha"], 'UTF-8') : null;
    date_default_timezone_set("America/Guayaquil");
    //$fecha = date('d-m-Y H:i:s', time());
    $sql = "UPDATE tarea " .
        "SET tar_codigo = '$codigo', " .
        "tar_nombre = '$nombre', " .
        "tar_descripcion = '$descripcion', " .
        "tar_horaInicio = '$horaIni', " .
        "tar_horaFin = '$horaFin', " .
        "tar_fecha = '$fecha' " .
        //"usu_fecha_modificacion = '$fecha' " .
        "WHERE tar_codigo = $codigo";
    if ($conn->query($sql) === TRUE) {
        //echo "Se ha actualizado la tarea correctamemte!!!<br>";
        print '<script language="JavaScript">';
        print 'alert("Los datos han sido modificados correctamente");';
        print "document.location='../html/modificar.php?codigo=" . $codigo . "'";
        print '</script>';
    } else {
        //echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        print '<script language="JavaScript">';
        print 'alert("No se ha podido modificar los datos");';
        print "document.location='../html/modificar.php?codigo=" . $codigo . "'";
        print '</script>';
    }
    echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
    $conn->close();
    ?>
</body>

</html>