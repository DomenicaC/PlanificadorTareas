<!DOCTYPE html>
<html lang="es">
<meta name="language" content="es" />
<meta http-equiv="Content-Type" content="text/html" charset="Iso-8859-15" />

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../../css/general.css">
    <link rel="stylesheet" type="text/css" href="../../../css/semana.css">
    <script src="../js/calendario.js" type="text/javascript"></script>
    <title> Agenda Semanal</title>

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
                <li><a href="semana.php"> Semana </a></li>
                <li><a href="" id=mes onclick="fechaActualMes()"> Mes </a></li>
            </ul>
        </nav>
        <br /> <br />
    </header>




    <table class="cal">
        <caption>Agenda Semanal</caption>
        <thead>
            <tr>
                <th></th>
                <th class="dia">Lunes 06</th>
                <th class="dia">Martes 07</th>
                <th class="dia">Miércoles 08</th>
                <th class="dia">Jueves 09</th>
                <th class="dia">Viernes 10</th>

            </tr>

        </thead>

        <tbody>
            <tr>
                <td class="horas">8:00 a 8:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Mates"><a href="../tareas/tareas.php">Reunion con<Br /> jefe de RH</a></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>

            <tr>
                <td class="horas">9:00 a 09:30 </td>
                <td class="Musica"></td>
                <td class="Musica"></td>
                <td class="Musica"></td>
                <td class="Musica"></td>
                <td class="Musica"></td>
            </tr>
            <tr>
                <td class="horas">10:00 a 10:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Ingles"><a href="../tareas/tareas.php">Firma de cheques</a></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>
            <tr>
                <td class="horas">11:00 a 11:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Musica"><span> Aula </span></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>
            <tr>
                <td class="horas">12:00 a 12:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Musica"><span> Aula </span></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>

            <tr>
                <td class="horas">13:00 a 13:30 </td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>

            </tr>
            <tr>
                <td class="horas">14:00 a 14:30 </td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>

            </tr>
            <tr>
                <td class="horas">15:00 a 15:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Musica"><span> Aula </span></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>
            <tr>
                <td class="horas">16:00 a 16:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Musica"><span> Aula </span></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>
            <tr>
                <td class="horas">17:00 a 17:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Musica"><span> Aula </span></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>
            <tr>
                <td class="horas">18:00 a 18:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Musica"><span> Aula </span></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>
            <tr>
                <td class="horas">19:00 a 19:30 </td>
                <td class="Musica"><span> </span></td>
                <td class="Musica"> <span> </span></td>
                <td class="Musica"><span> Aula </span></td>
                <td class="Musica"><span> </span> </td>
                <td class="Musica"><span> </span> </td>

            </tr>
        </tbody>
    </table>

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