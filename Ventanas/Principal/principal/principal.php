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
    <script src="../js/calendario.js" type="text/javascript"></script>

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
                <li><a href="" id=prin onclick="fechaActualPrin()"> Página Principal </a></li>
                <li><a href="../dia/dia.php"> Día </a> </li>
                <li><a href="../semana/semana.php"> Semana </a></li>
                <li><a href="" id=mes onclick="fechaActualMes()"> Mes </a></li>
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

    <section class=" dos">
        <h2>Tareas del día</h2>
        <table style="width:100%">
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Hora</th>
            </tr>
            <?php
            include '../../../config/conexionBD.php';
            $sql = "SELECT * FROM tarea WHERE tar_fecha = '21.11.21'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo " <td>" . $row["tar_codigo"] . "</td>";
                    echo " <td>" . $row['tar_nombre'] . "</td>";
                    echo " <td>" . $row['tar_horaInicio'] . "</td>";
                    echo " <td> <a href='eliminar.php?codigo=" . $row['tar_codigo'] . "'>Eliminar</a> </td>";
                    echo " <td> <a href='modificar.php?codigo=" . $row['tar_codigo'] . "'>Modificar</a> </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr>";
                echo " <td colspan='7'> No existen tareas asignadas para hoy</td>";
                echo "</tr>";
            }
            $conn->close();
            ?>
        </table>
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