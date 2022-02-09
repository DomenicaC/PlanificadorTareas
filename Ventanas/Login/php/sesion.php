<?php


session_start();
//conexion con BD
include '../../../config/conexionBD.php';
$usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : null;
$contrasenia = isset($_POST["contrasenia"]) ? trim($_POST["contrasenia"]) : null;

$sql = "SELECT * FROM usuario WHERE  usu_usuario = '$usuario' and usu_contrasenia = '$contrasenia'";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $_SESSION['isLogged'] = TRUE;

    // $fecha_actual = new DateTime();
    // $cadena_fecha_actual = $fecha_actual->format("d.m.Y");
    date_default_timezone_set("America/Guayaquil");
    $cadena_fecha_actual = date('d.m.Y');
    header("Location: ../../Principal/principal/principal.php?fecha=" . $cadena_fecha_actual);

    echo "<p>ingreso!! :)</p>";
} else {
    //header("Location: ../vista/login.html");


    print '<script language="JavaScript">';
    print 'alert("Usuario o contraseña incorrectos");';
    print 'document.location="../html/login.html"';
    print '</script>';


    //echo "<p>no se pudo ingresar!! :(</p>";
    //echo (string)$result->num_rows;
}
$conn->close();
    /*
    $usuario=$_POST['usuario'];
    $contrasenia=$_POST['contrasenia'];

    if($usuario== 'byron' && $contrasenia=='123'){
        echo '';
    }
    else{
        echo 'no entre';
    }
    //echo 'usuario '. $usuario . ' contraseña '. $contrasenia;*/
