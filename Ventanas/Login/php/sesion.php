<?php

    session_start();
    //conexion con BD
    include '../../../config/conexionBD.php';
    $usuario = isset($_POST["usuario"]) ? trim($_POST["usuario"]) : null;
    $contrasenia = isset($_POST["contrasenia"]) ? trim($_POST["contrasenia"]) : null;

    $sql = "SELECT * FROM usuario WHERE  usuario = '$usuario' and contrasenia = '$contrasenia'";

    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['isLogged'] = TRUE;
        header("Location: ../../Principal/principal/principal.php");
        echo "<p>ingreso!! :)</p>";

    } else {
        //header("Location: ../vista/login.html");
        echo "<p>no se pudo ingresar!! :(</p>";
        echo (string)$result->num_rows; 
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
    
?>