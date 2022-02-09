<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Eliminar tarea </title>
    <script src="../../js/calendario.js" type="text/javascript"></script>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../../config/conexionBD.php';
    $codigo = $_GET["codigo"];
    //$fecha = $_GET["fecha"];

    //Si voy a eliminar físicamente el registro de la tabla
    //$sql = "DELETE FROM usuario WHERE codigo = '$codigo'";
    date_default_timezone_set("America/Guayaquil");
    $fecha = date('d.m.Y');
    $sql = "DELETE FROM tarea WHERE tar_codigo = $codigo";
    //echo $sql;
    if ($conn->query($sql) === TRUE) {
        //echo "<p>Se ha eliminado la tarea correctamemte!!!</p>";
        print '<script language="JavaScript">';
        print 'alert("Los datos han sido eliminados correctamente");';
        print "document.location='http://localhost/Planificador/Ventanas/Principal/principal/principal.php?fecha=" . $fecha . "'";
        print '</script>';
    } else {
        print '<script language="JavaScript">';
        print 'alert("Los datos no han sido eliminados");';
        print "document.location= 'onclick='fechaActualPrin()''";
        print '</script>';
    }
    echo "<a href='../../principal/principal.php'>Regresar</a>";
    //?codigo=" . $codigo . "'
    $conn->close();
    ?>
</body>

</html>