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
                <?php
                include '../../../config/conexionBD.php';
                $tareasLunes = array();
                $tareasMartes = array();
                $tareasMiercoles = array();
                $tareasJueves = array();
                $tareasViernes = array();
                $tareasSabado = array();
                $DiaSemana = date("N");
                //echo $DiaSemana;
                $fecha_actual = date("d-m-Y");
                $tareas = array();
                //echo $DiaActual;

                if ($DiaSemana == 1) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual)) . '</th>
                <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>
                <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "+ 2 days")) . '</th>
                <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "+ 3 days")) . '</th>
                <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "+ 4 days")) . '</th>
                <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 5 days")) . '</th>';

                    $DiaActual = date("d", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
                    $DiaMes = date("m", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
                    $DiaAnio = date("Y", mktime(0, 0, 0, date("m"), date("d"), date("Y")));
                    $FechaInicio = $DiaActual . "." . $DiaMes . "." . $DiaAnio;

                    for ($i = 0; $i < 6; $i++) {
                        //echo (date("d.m.Y", strtotime($fecha_actual . "" . $i . "days")));
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
                        //echo "</br>";
                        $sql = "SELECT * FROM tarea WHERE  tar_fecha ='$fechaConsulta'";
                        $result = $conn->query($sql);
                        if ($i == 0) {
                            $tareasLunes = $result;
                        } elseif ($i == 1) {
                            $tareasMartes = $result;
                        } elseif ($i == 2) {
                            $tareasMiercoles = $result;
                        } elseif ($i == 3) {
                            $tareasJueves = $result;
                        } elseif ($i == 4) {
                            $tareasViernes = $result;
                        } else {
                            $tareasSabado = $result;
                        }
                        //echo $sql;
                        //echo '</br>';
                    }
                }

                if ($DiaSemana == 2) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                    <th class="dia">Martes ' . date("d", strtotime($fecha_actual)) . '</th>
                    <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>
                    <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "+ 2 days")) . '</th>
                    <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "+ 3 days")) . '</th>
                    <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 4 days")) . '</th>';
                }

                if ($DiaSemana == 3) {

                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 2 days")) . '</th>
                    <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                    <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual)) . '</th>
                    <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>
                    <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "+ 2 days")) . '</th>
                    <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 3 days")) . '</th>';

                    for ($i = -2; $i < 5; $i++) {
                        //echo (date("d.m.Y", strtotime($fecha_actual . "" . $i . "days")));
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
                        echo "</br>";
                        $sql = "SELECT * FROM tarea WHERE  tar_fecha ='$fechaConsulta'";
                        $result = $conn->query($sql);
                        echo ($sql);

                        if ($i == -2) {
                            $tareasLunes = $result;
                        } elseif ($i == -1) {
                            $tareasMartes = $result;
                        } elseif ($i == 0) {
                            $tareasMiercoles = $result;
                        } elseif ($i == 1) {
                            $tareasJueves = $result;
                        } elseif ($i == 2) {
                            $tareasViernes = $result;
                        } else {
                            $tareasSabado = $result;
                        }
                    }

                    // echo ($tareasLunes);
                    echo "</br>";
                    //echo $tareasMartes;
                    echo "</br>";
                    //echo $tareasMiercoles;
                    if ($tareasMiercoles->num_rows > 0) {

                        while ($row = $tareasMiercoles->fetch_assoc()) {
                            //echo($row);
                            echo "</br>";
                            //echo $row["tar_codigo"];
                            echo "</br>";
                            echo $row['tar_nombre'];
                        }
                    }
                    /*echo "</br>";
                    echo $tareasJueves;
                    echo "</br>";
                    echo $tareasViernes;
                    echo "</br>";
                    echo $tareasSabado;
                    echo "</br>";*/
                }
                if ($DiaSemana == 4) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 3 days")) . '</th>
                    <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "- 2 days")) . '</th>
                    <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                    <th class="dia">Jueves ' . date("d", strtotime($fecha_actual)) . '</th>
                    <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>
                    <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 2 days")) . '</th>';
                }
                if ($DiaSemana == 5) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 4 days")) . '</th>
                    <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "- 3 days")) . '</th>
                    <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "- 2 days")) . '</th>
                    <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                    <th class="dia">Viernes ' . date("d", strtotime($fecha_actual)) . '</th>
                    <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>';

                    for ($i = -4; $i < 2; $i++) {
                        //echo (date("d.m.Y", strtotime($fecha_actual . "" . $i . "days")));
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
                        echo "</br>";
                        $sql = "SELECT * FROM tarea WHERE  tar_fecha ='$fechaConsulta'";
                        $result = $conn->query($sql);
                        echo ($sql);

                        if ($i == -2) {
                            $tareasLunes = $result;
                        } elseif ($i == -1) {
                            $tareasMartes = $result;
                        } elseif ($i == 0) {
                            $tareasMiercoles = $result;
                        } elseif ($i == 1) {
                            $tareasJueves = $result;
                        } elseif ($i == 2) {
                            $tareasViernes = $result;
                        } else {
                            $tareasSabado = $result;
                        }
                    }
                }
                if ($DiaSemana == 6) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 5 days")) . '</th>
                    <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "- 4 days")) . '</th>
                    <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "- 3 days")) . '</th>
                    <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "- 2 days")) . '</th>
                    <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                    <th class="dia">Sabado ' . date("d", strtotime($fecha_actual)) . '</th>';
                }

                ?>

            </tr>

        </thead>

        <tbody>
            <tr>
                <td class="horas">8:00 a 8:30 </td>

                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo ($rowLu["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : "");
                        if ($rowLu["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes Martes</span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientesmiercoles </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes viernes</span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes sabado</span></td>';
                }
                ?>
            </tr>


            <tr>
                <td class="horas">8:30 a 09:00 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {

                    while ($fila = mysqli_fetch_row($tareasLunes)) {
                        echo 'hola';
                    }

                    // while ($rowLu = $tareasLunes->fetch_assoc()) {
                    //     //echo ($rowLu["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>'); 
                    //     echo 'andansdjsand';
                    //     if($rowLu["tar_horaInicio"]=="08:30"){
                    //         echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                    //         break;
                    //     }else{
                    //         echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                    //     }
                    // }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes L</span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes M</span></td>';
                }

                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes Mi</span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes J</span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes V</span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes S</span></td>';
                }
                ?>
            </tr>



            <tr>
                <td class="horas">9:00 a 9:30 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {

                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo ($rowLu["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>'); 
                        if ($rowLu["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes lunes</span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes martes </span></td>';
                }

                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {

                        //echo ($rowJu["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            echo 'mfpsmfoismgoisgn';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            break;
                        } else {
                            echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                        }
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>
            </tr>

            <!-- --------------------------------------------------------------------------------------------------------------------------------------- -->
            <tr>
                <td class="horas">9:30 a 10:00 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>

            <tr>
                <td class="horas">10:00 a 10:30 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>

            <tr>
                <td class="horas">10:30 a 11:00 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                ?>

            </tr>

            <tr>
                <td class="horas">11:00 a 11:30 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>
            </tr>

            <tr>
                <td class="horas">11:30 a 12:00 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>

            <tr>
                <td class="horas">12:00 a 13:00 </td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>

            </tr>
            <tr>
                <td class="horas">13:00 a 14:00 </td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>
                <td class="recreo"><a href="../tareas/tareas.php">Almuerzo</a></td>

            </tr>



            <!-- aqui falta seguir asiendo lo de las tablas para poder mostrar  -->


            <tr>
                <td class="horas">15:00 a 15:30 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>
            </tr>
            <tr>
                <td class="horas">15:30 a 16:00 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>
            <tr>
                <td class="horas">16:00 a 16:30 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>
            <tr>
                <td class="horas">16:30 a 17:00 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>
            <tr>
                <td class="horas">17:00 a 17:30 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>

            <tr>
                <td class="horas">17:30 a 18:00 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>

            <tr>
                <td class="horas">18:00 a 18:30 </td>
                <?php
                while ($rowLu = $tareasLunes->fetch_assoc()) {
                    echo ($rowLu["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMar = $tareasMartes->fetch_assoc()) {
                    echo ($rowMar["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                    echo ($rowMier["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowJu = $tareasJueves->fetch_assoc()) {
                    echo ($rowJu["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowVi = $tareasViernes->fetch_assoc()) {
                    echo ($rowVi["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }
                while ($rowSa = $tareasSabado->fetch_assoc()) {
                    echo ($rowSa["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                }

                ?>

            </tr>
        </tbody>
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