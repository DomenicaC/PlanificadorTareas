<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" >
    <title>Modificar datos de persona</title>
</head>
<body>
    <?php
        //incluir conexión a la base de datos
        include '../../../config/conexionBD.php';
        $codigo = $_POST["codigo"];
        $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
        $descripcion = isset($_POST["descripcion"]) ? mb_strtoupper(trim($_POST["descripcion"]), 'UTF-8') : null;
        $horaIni = isset($_POST["horaIni"]) ? mb_strtoupper(trim($_POST["horaIni"]), 'UTF-8') : null;
        $horaFin = isset($_POST["horaFin"]) ? trim($_POST["horaFin"]): null;
        $correo = isset($_POST["correo"]) ? trim($_POST["correo"]): null;
        $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]): null;
        date_default_timezone_set("America/Guayaquil");
        $fecha = date('Y-m-d H:i:s', time());
        $sql = "UPDATE usuario " .
        "SET tar_codigo = '$codigo', " .
        "tar_nombre = '$nombres', " .
        "tar_descripcion = '$apellidos', " .
        "tar_horaInicio = '$horaIni', " . 
        "tar_horaFin = '$horaFin', " .
        "usu_correo = '$correo', " .
        "usu_fecha_nacimiento = '$fechaNacimiento', " .
        "usu_fecha_modificacion = '$fecha' " .
        "WHERE usu_codigo = $codigo";
        if ($conn->query($sql) === TRUE) {
            echo "Se ha actualizado la tarea correctamemte!!!<br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn) . "<br>";
        }
        echo "<a href='../../vista/usuario/index.php'>Regresar</a>";
        $conn->close();
    ?>
</body>
</html>