<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Crear Nueva tarea</title>
    <style type="text/css" rel="stylesheet">

    </style>
    <link href="../../css/estilos.css" rel="stylesheet" />
</head>

<body>

    <?php
    // abrir conexion
    include '../../config/conexionBD.php';

    $codigo = isset($_POST["codigo"]) ? trim($_POST["codigo"]) : null;
    $nombre = isset($_POST["nombre"]) ? mb_strtoupper(trim($_POST["nombre"]), 'UTF-8') : null;
    $descripcion = isset($_POST["descripcion"]) ? mb_strtoupper(trim($_POST["descripcion"]), 'UTF-8') : null;
    $horaInicio = isset($_POST["horaInicio"]) ? mb_strtoupper(trim($_POST["horaInicio"]), 'UTF-8') : null;
    $horaFinal = isset($_POST["horaFinal"]) ? trim($_POST["horaFinal"]) : null;
    $codColab = isset($_POST["codColab"]) ? trim($_POST["codColab"]) : null;

    $sql = "INSERT INTO usuario VALUES (0, '$codigo', '$nombre', '$descripcion', '$horaInicio', '$horaFinal','$codColab')";

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