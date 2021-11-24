<?php
    $usuario=$_POST['usuario'];
    $contrasenia=$_POST['contrasenia'];

    if($usuario== 'byron' && $contrasenia=='123'){
        echo 'entro';
    }
    else{
        echo 'no entre';
    }
    //echo 'usuario '. $usuario . ' contraseña '. $contrasenia;
?>