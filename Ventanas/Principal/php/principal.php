<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /SistemaDeGestion/public/vista/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Gestión de usuarios</title>
    
    <link href="../../../css/princi.css" rel="stylesheet" />


</head>

<body>
    <header>
        <div class="nav-Primario">
            <a href="../../Login/html/login.html">Cerrar Sesión</a>
            
        </div>

        <div class="nav-Secundario">
            <div class="dia"> <a href="">Dia</a> </div>
            <div class="semana"> <a href="">Semana</a> </div>
            <div class="mes"> <a href="">Mes</a> </div>
        </div>
    </header>


</body>

</html>