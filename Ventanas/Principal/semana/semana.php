<!DOCTYPE html>
<html lang="es">
<meta name="language" content="es" />
<meta http-equiv="Content-Type" content="text/html" charset="Iso-8859-15" />

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../../css/general.css">
    <link rel="stylesheet" type="text/css" href="../../../css/semana.css">
    <script src="../js/calendario.js" type="text/javascript"></script>
    <script src="../js/reloj.js" type="text/javascript"></script>
    <title> Agenda Semanal</title>

</head>

<body>

    <header class="enc1">
        <img src="../../../images/logo/logoOfi.png" alt="iconoLogo" />
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
                $DiaSemana = date("N");
                //echo $DiaSemana;
                $fecha_actual = date("d-m-Y");
                $tareasLunes = array();
                $tareasMartes = array();
                $tareasMiercoles = array();
                $tareasJueves = array();
                $tareasViernes = array();
                $tareasSabado = array();

                //echo $DiaActual;

                if ($DiaSemana == 1) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual)) . '</th>
                <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>
                <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "+ 2 days")) . '</th>
                <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "+ 3 days")) . '</th>
                <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "+ 4 days")) . '</th>
                <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 5 days")) . '</th>';

                    for ($i = 0; $i < 6; $i++) {
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
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
                    }
                }
                if ($DiaSemana == 2) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                <th class="dia">Martes ' . date("d", strtotime($fecha_actual)) . '</th>
                <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>
                <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "+ 2 days")) . '</th>
                <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "+ 3 days")) . '</th>
                <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 4 days")) . '</th>';

                    for ($i = -1; $i < 5; $i++) {
                        //echo (date("d.m.Y", strtotime($fecha_actual . "" . $i . "days")));
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
                        //echo "</br>";
                        $sql = "SELECT * FROM tarea WHERE  tar_fecha ='$fechaConsulta'";
                        $result = $conn->query($sql);
                        if ($i == -1) {
                            $tareasLunes = $result;
                        } elseif ($i == 0) {
                            $tareasMartes = $result;
                        } elseif ($i == 1) {
                            $tareasMiercoles = $result;
                        } elseif ($i == 2) {
                            $tareasJueves = $result;
                        } elseif ($i == 3) {
                            $tareasViernes = $result;
                        } else {
                            $tareasSabado = $result;
                        }
                    }
                }
                if ($DiaSemana == 3) {

                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 2 days")) . '</th>
                <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual)) . '</th>
                <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>
                <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "+ 2 days")) . '</th>
                <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 3 days")) . '</th>';

                    for ($i = -2; $i < 4; $i++) {
                        //echo (date("d.m.Y", strtotime($fecha_actual . "" . $i . "days")));
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
                        //echo "</br>";
                        $sql = "SELECT * FROM tarea WHERE  tar_fecha ='$fechaConsulta'";
                        $result = $conn->query($sql);
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
                if ($DiaSemana == 4) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 3 days")) . '</th>
                <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "- 2 days")) . '</th>
                <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                <th class="dia">Jueves ' .  date("d", strtotime($fecha_actual)) . '</th>
                <th class="dia">Viernes ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>
                <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 2 days")) . '</th>';

                    for ($i = -3; $i < 3; $i++) {
                        //echo (date("d.m.Y", strtotime($fecha_actual . "" . $i . "days")));
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
                        //echo "</br>";
                        $sql = "SELECT * FROM tarea WHERE  tar_fecha ='$fechaConsulta'";
                        $result = $conn->query($sql);
                        if ($i == -3) {
                            $tareasLunes = $result;
                        } elseif ($i == -2) {
                            $tareasMartes = $result;
                        } elseif ($i == -1) {
                            $tareasMiercoles = $result;
                        } elseif ($i == 0) {
                            $tareasJueves = $result;
                        } elseif ($i == 1) {
                            $tareasViernes = $result;
                        } else {
                            $tareasSabado = $result;
                        }
                    }
                }
                if ($DiaSemana == 5) {
                    echo '<th class="dia">Lunes ' . date("d", strtotime($fecha_actual . "- 4 days")) . '</th>
                <th class="dia">Martes ' . date("d", strtotime($fecha_actual . "- 3 days")) . '</th>
                <th class="dia">Miércoles ' . date("d", strtotime($fecha_actual . "- 2 days")) . '</th>
                <th class="dia">Jueves ' . date("d", strtotime($fecha_actual . "- 1 days")) . '</th>
                <th class="dia">Viernes ' . date("d", strtotime($fecha_actual)) . '</th>
                <th class="dia">Sabado ' . date("d", strtotime($fecha_actual . "+ 1 days")) . '</th>';
                    for ($i = -4; $i < 2; $i++) {
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
                        $sql = "SELECT * FROM tarea WHERE  tar_fecha ='$fechaConsulta'";
                        $result = $conn->query($sql);
                        if ($i == -4) {
                            $tareasLunes = $result;
                        } elseif ($i == -3) {
                            $tareasMartes = $result;
                        } elseif ($i == -2) {
                            $tareasMiercoles = $result;
                        } elseif ($i == -1) {
                            $tareasJueves = $result;
                        } elseif ($i == 0) {
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
                <th class="dia">Sabado ' .  date("d", strtotime($fecha_actual)) . '</th>';
                    for ($i = -5; $i < 1; $i++) {
                        //echo (date("d.m.Y", strtotime($fecha_actual . "" . $i . "days")));
                        $fechaConsulta = date("d.m.Y", strtotime($fecha_actual . "" . $i . "days"));
                        //echo "</br>";
                        $sql = "SELECT * FROM tarea WHERE  tar_fecha ='$fechaConsulta'";
                        $result = $conn->query($sql);
                        if ($i == -5) {
                            $tareasLunes = $result;
                        } elseif ($i == -4) {
                            $tareasMartes = $result;
                        } elseif ($i == -3) {
                            $tareasMiercoles = $result;
                        } elseif ($i == -2) {
                            $tareasJueves = $result;
                        } elseif ($i == -1) {
                            $tareasViernes = $result;
                        } else {
                            $tareasSabado = $result;
                        }
                    }
                }

                ?>

            </tr>
        </thead>

        <tbody>
            <tr>
                <td class="horas">8:00 a 8:30 </td>

                <?php
                $estado = 0;
                if ($tareasLunes->num_rows > 0) {

                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo ($rowLu["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : "");
                        if ($rowLu["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }

                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas ln </span></td>';
                }






                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes sM</span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }

                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientesmiercoles </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes jueves </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes viernes</span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "08:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
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

                    while ($rowLu = mysqli_fetch_row($tareasLunes)) {
                        if ($rowLu["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes L</span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes M</span></td>';
                }

                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes Mi</span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes J</span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes V</span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "08:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "08:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
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
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes lunes</span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes martes </span></td>';
                }

                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {

                        //echo ($rowJu["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "09:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "09:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
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
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo ($rowLu["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>'); 
                        if ($rowLu["tar_horaInicio"] == "09:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "09:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "09:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "09:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "09:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "09:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "09:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>

            </tr>

            <tr>
                <td class="horas">10:00 a 10:30 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        if ($rowLu["tar_horaInicio"] == "10:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "10:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes mr </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "10:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "10:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "10:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "10:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "10:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>

            </tr>

            <tr>
                <td class="horas">10:30 a 11:00 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "10:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "10:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "10:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "10:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "10:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "10:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "10:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }
                ?>

            </tr>

            <tr>
                <td class="horas">11:00 a 11:30 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "11:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "11:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "11:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "11:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "11:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "11:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "11:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>
            </tr>

            <tr>
                <td class="horas">11:30 a 12:00 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "11:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "11:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "11:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "11:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "11:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "11:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "11:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
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
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "15:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "15:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "15:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "15:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "15:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "15:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "15:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>
            </tr>
            <tr>
                <td class="horas">15:30 a 16:00 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "15:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "15:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "15:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "15:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "15:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "15:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "15:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>

            </tr>
            <tr>
                <td class="horas">16:00 a 16:30 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "16:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "16:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "16:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "16:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "16:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "16:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "16:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>

            </tr>
            <tr>
                <td class="horas">16:30 a 17:00 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "16:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "16:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "16:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "16:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "16:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "16:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "16:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>

            </tr>
            <tr>
                <td class="horas">17:00 a 17:30 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "17:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "17:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "17:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "17:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "17:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "17:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "17:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>

            </tr>

            <tr>
                <td class="horas">17:30 a 18:00 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "17:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "17:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "17:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "17:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "17:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "17:30" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "17:30") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>

            </tr>

            <tr>
                <td class="horas">18:00 a 18:30 </td>
                <?php
                if ($tareasLunes->num_rows > 0) {
                    while ($rowLu = $tareasLunes->fetch_assoc()) {
                        //echo $rowLu["tar_horaInicio"] == "08:00" ? $rowLu != null ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                        //echo ($rowLu["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowLu["tar_horaInicio"] == "18:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowLu["tar_codigo"] . '">' . $rowLu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasMartes->num_rows > 0) {
                    while ($rowMar = $tareasMartes->fetch_assoc()) {
                        //echo ($rowMar["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMar["tar_horaInicio"] == "18:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMar["tar_codigo"] . '">' . $rowMar["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }


                if ($tareasMiercoles->num_rows > 0) {
                    while ($rowMier = $tareasMiercoles->fetch_assoc()) {
                        //echo ($rowMier["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowMier["tar_horaInicio"] == "18:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowMier["tar_codigo"] . '">' . $rowMier["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasJueves->num_rows > 0) {
                    while ($rowJu = $tareasJueves->fetch_assoc()) {
                        //echo ($rowJu["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowJu["tar_horaInicio"] == "18:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowJu["tar_codigo"] . '">' . $rowJu["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasViernes->num_rows > 0) {
                    while ($rowVi = $tareasViernes->fetch_assoc()) {
                        //echo ($rowVi["tar_horaInicio"] == "18:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowVi["tar_horaInicio"] == "18:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowVi["tar_codigo"] . '">' . $rowVi["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                if ($tareasSabado->num_rows > 0) {
                    while ($rowSa = $tareasSabado->fetch_assoc()) {
                        //echo ($rowSa["tar_horaInicio"] == "08:00" ? '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>' : '<td class="Musica"><span> No hay tareas pendientes </span></td>');
                        if ($rowSa["tar_horaInicio"] == "18:00") {
                            echo '<td class="Mates"><a href="../tareas/tareas.php?codigo=' . $rowSa["tar_codigo"] . '">' . $rowSa["tar_nombre"] . '</a></td>';
                            $estado = 1;
                            break;
                        }
                    }
                    if ($estado == 0) {
                        echo '<td class="Musica"><span> No hay tareas pendientes lunes </span></td>';
                        $estado = 0;
                    } else {
                        $estado = 0;
                    }
                } else {
                    echo '<td class="Musica"><span> No hay tareas pendientes </span></td>';
                }

                ?>

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