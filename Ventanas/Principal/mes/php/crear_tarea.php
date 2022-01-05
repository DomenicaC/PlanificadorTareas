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
    $codColab = 1; //isset($_POST["codColab"]) ? trim($_POST["codColab"]) : null;
    $fecha = '5.1.2022'; //isset($_POST["fecha"]) ? mb_strtoupper(trim($_POST["fecha"]), 'UTF-8') : null;
    $estado = 0;

    //INSERT INTO tarea VALUES (10, 'as', 'as', '16:00', '15:00',1, '1');
    $sql = "INSERT INTO tarea VALUES (0, '$nombre', '$descripcion', '$horaInicio', '$horaFinal', $codColab, '$fecha', $estado)";/*,$codColab',$fecha*/

    if ($conn->query($sql) === TRUE) {
        echo "<p>Se ha insertado la tarea correctamemte!!!</p>";
    } else {
        if ($conn->errno == 1062) {
            echo "<p class='error'>La tarea con el codigo $codigo ya está registrada en el sistema </p>";
        } else {
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }

    //cerrar la base de datos
    $conn->close();
    echo "<a href='../vista/crear_usuario.html'>Regresar</a>";

    ?>

</body>

</html>