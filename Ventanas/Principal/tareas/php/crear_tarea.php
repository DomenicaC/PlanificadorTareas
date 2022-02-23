<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nueva tarea</title>
    <style type="text/css" rel="stylesheet">

    </style>

</head>

<body>

    <?php
    // abrir conexion
    include '../../../../config/conexionBD.php';

    //$codigo = 0;
    $nombre = isset($_POST["nombre"]) ? trim($_POST["nombre"]) : null;
    $descripcion = isset($_POST["descripcion"]) ? trim($_POST["descripcion"]) : null;
    $horaInicio = isset($_POST["horaInicio"]) ? trim($_POST["horaInicio"]) : null;
    $horaFinal = isset($_POST["horaFinal"]) ? trim($_POST["horaFinal"]) : null;
    $cedUsuario = "0107377020"; //isset($_POST["codColab"]) ? trim($_POST["codColab"]) : null;
    $fecha = isset($_POST["fecha"]) ? mb_strtoupper(trim($_POST["fecha"]), 'UTF-8') : null;
    $timestamp = strtotime($fecha);
    $newDate = date("d.m.Y", $timestamp);
    $fechaActual = date("d.m.Y");
    $estado = 0;

    //INSERT INTO tarea VALUES (10, 'as', 'as', '16:00', '15:00',1, '1');

    $sqlIni = "SELECT * FROM tarea WHERE tar_horaInicio = '$horaInicio' AND tar_fecha = '$newDate' ";
    $sqlFin = "SELECT * FROM tarea WHERE tar_horaFin = '$horaFinal' AND tar_fecha = '$newDate'";
    //echo ($sql1);
    $result = $conn->query($sqlIni);
    $result1 = $conn->query($sqlFin);

    if ($result->num_rows > 0) {
        print '<script language="JavaScript">';
        print 'alert("Esta tarea no puede ser añadida, tienes otra tarea en esas horas");';
        print "document.location='http://localhost/Planificador/Ventanas/Principal/principal/principal.php?fecha=" . $fechaActual . "#miModal'";
        print '</script>';
    } else {
        if ($result1->num_rows > 0) {
            print '<script language="JavaScript">';
            print 'alert("Esta tarea no puede ser añadida, tienes otra tarea en esas horas");';
            print "document.location='http://localhost/Planificador/Ventanas/Principal/principal/principal.php?fecha=" . $fechaActual . "#miModal'";
            print '</script>';
        } else {
            $sql = "INSERT INTO tarea VALUES (0, '$nombre', '$descripcion', '$horaInicio', '$horaFinal', '$newDate', $estado, '$cedUsuario')";
            echo ($sql);
            if ($conn->query($sql) === TRUE) {
                //echo "<p>Se ha insertado la tarea correctamemte!!!</p>";
                print '<script language="JavaScript">';
                print 'alert("Los datos han sido agregados correctamente");';
                print "document.location='http://localhost/Planificador/Ventanas/Principal/principal/principal.php?fecha=" . $fechaActual . "'";
                print '</script>';
            } else {

                //echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                print '<script language="JavaScript">';
                print 'alert("Los datos no han podido ser agregados correctamente");';
                print "document.location='http://localhost/Planificador/Ventanas/Principal/principal/principal.php?fecha=" . $fechaActual . "'";
                print '</script>';
            }
        }
    }

    /*if ($conn->query($sql1) === TRUE) {
        print '<script language="JavaScript">';
        print 'alert("Esta tarea no puede ser añadida, tienes otra tarea en esas horas");';
        print "document.location='http://localhost/Planificador/Ventanas/Principal/principal/principal.php?fecha=" . $fechaActual . "#miModal'";
        print '</script>';
    } else {
        if ($conn->query($sql) === TRUE) {
            //echo "<p>Se ha insertado la tarea correctamemte!!!</p>";
            print '<script language="JavaScript">';
            print 'alert("Los datos han sido agregados correctamente");';
            print "document.location='http://localhost/Planificador/Ventanas/Principal/principal/principal.php?fecha=" . $fechaActual . "'";
            print '</script>';
        } else {

            //echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            print '<script language="JavaScript">';
            print 'alert("Los datos no han podido ser agregados correctamente");';
            print "document.location='http://localhost/Planificador/Ventanas/Principal/principal/principal.php?fecha=" . $fechaActual . "'";
            print '</script>';
        }
    }
*/


    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/crear_usuario.html'>Regresar</a>";

    ?>

</body>

</html>