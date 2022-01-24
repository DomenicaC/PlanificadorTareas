<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Modificar datos de persona</title>
</head>

<body>
    <?php
    //incluir conexión a la base de datos
    include '../../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $estado = 1;


    $sql = "UPDATE tarea " .
        "SET tar_codigo = '$codigo', " .
        "tar_estado = '$estado', " .
        "WHERE tar_codigo = $codigo ";

    if ($conn->query($sql) === TRUE) {
        echo "Se ha actualizado el estado correctamemte!!!<br>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
    }
    echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
    $conn->close();
    ?>
</body>

</html>