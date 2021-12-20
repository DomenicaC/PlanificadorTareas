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
    <link href="../../../css/general.css" rel="stylesheet" />


</head>

<body>

    <header class="enc1">
        <img src="../../../images/iconos/calendar.png" alt="iconoLogo" />
        <br />
        <a class="cerrar" href="../../../config/cerrarSesion.php">Cerrar Sesión</a>
        <h1>Planificador Empresarial</h1>


        <br /> <br />
    </header>

    <header class="tabla">
        <br /> <br />
        <nav>
            <ul>
                <li><a href="principal.php"> Página Principal </a></li>
                <li><a href="../dia/dia.php"> Día </a> </li>
                <li><a href="../semana/semana.php"> Semana </a></li>
                <li><a href="../mes/mes.php"> Mes </a></li>
            </ul>
        </nav>
        <br /> <br />
    </header>

    <section>
        <h2>Seccion colaboradores</h2>
        <h1>Colaboradores</h1>
        <div class="colabs">
            <div class="at"> <a href=""><img src="../../../images/iconos/ac.png" style="width: 2rem;" />Atención Cliente</a> </div>
            <div class="ja"> <a href=""><img src="../../../images/iconos/ja.png" style="width: 2rem;" />Jefe Agencia</a> </div>
            <div class="jt"> <a href=""><img src="../../../images/iconos/jt.png" style="width: 2rem;" />Jefe Tecnico</a> </div>
            <div class="jv"> <a href=""><img src="../../../images/iconos/jv.png" style="width: 2rem;" />Jefe Ventas</a> </div>
        </div>
    </section>

    <section class="uno">
        <h2>Seccion de dos columnas</h2>
        <img src="../../../images/diagrama/driagraPastel.jpeg" " />
    </section>

    <section class="dos">
        <h2>Tareas del día</h2>
        <ul type=”A”>
            <li>07:00 <a href=" ../tareas/tareas.php"></a></li>
            <li>07:30 <a></a></li>
            <li>08:00 <a href="../tareas/tareas.php">Reunion con jefe de RH</a></li>
            <li>08:30 <a href="../tareas/tareas.php">Reunion con jefe de RH</a></li>
            <li>09:00 <a href="../tareas/tareas.php"></a></li>
            <li>09:30 <a></a></li>
            <li>10:00 <a href="../tareas/tareas.php">Firma de cheques</a></li>
            <li>10:30 <a href="../tareas/tareas.php">Firma de cheques</a></li>
            <li>11:00 <a href="../tareas/tareas.php"></a></li>
            <li>11:30 <a></a></li>
            <li>12:00 <a href="../tareas/tareas.php"></a></li>
            <li>12:30 <a></a></li>
            <li>13:00 <a href="../tareas/tareas.php">Almuerzo</a></li>
            <li>13:30 <a href="../tareas/tareas.php">Almuerzo</a></li>
            <li>14:00 <a href="../tareas/tareas.php">Almuerzo</a></li>
            <li>14:30 <a href="../tareas/tareas.php">Almuerzo</a></li>
            <li>15:00 <a href="../tareas/tareas.php"></a></li>
            <li>15:30 <a></a></li>
            <li>16:00 <a href="../tareas/tareas.php"></a></li>
            <li>16:30 <a></a></li>
            <li>17:00 <a href="../tareas/tareas.php"></a></li>
            <li>17:30 <a></a></li>
            <li>18:00 <a href="../tareas/tareas.php"></a></li>
            <li>18:30 <a></a></li>
            <li>19:00 <a href="../tareas/tareas.php"></a></li>
        </ul>
    </section>

    <footer class=" pie">
        <br />PLANIFICADORA EMPRESARIAL &#8226;Byron Alejandro Godoy Tenesaca &nbsp; 28201 &#8226;
        <a href="telf: +9534058822"> (953) 405-8822</a> <br />
        <a href="mailto: @est.ups.edu.ec">@est.ups.edu.ec</a>

        <br />PLANIFICADORA EMPRESARIAL &#8226; Domenica Fernanda Vintimilla Canizares &nbsp; 28201 &#8226;
        <a href="telf: +953968741628"> (953) 9687416282</a> <br />
        <a href="mailto: canizaresdomenica4@gmail.com">canizaresdomenica4@gmail.com</a>
        <br />© Todos los derechos reservados
    </footer>

</body>

</html>