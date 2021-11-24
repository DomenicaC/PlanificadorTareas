<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
    header("Location: /Planificador/Ventanas/Login/html/login.html");
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Pagina Principal</title>

    <link href="../../../css/princi.css" rel="stylesheet" />


</head>

<body>
    <header>
        <div class="nav-Primario">
            <a href="../../Login/html/login.html">Cerrar Sesión</a>

        </div>

        <div class="nav-Secundario">
            <div class="principal"> <a href="../php/principal.php">Menú Principal</a> </div>
            <div class="dia"> <a href="">Día</a> </div>
            <div class="semana"> <a href="">Semana</a> </div>
            <div class="mes"> <a href="../mes/mes.php">Mes</a> </div>
        </div>
    </header>

</body>

</html>