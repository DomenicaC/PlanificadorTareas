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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>

    <link rel="stylesheet" href="../../../css/form.scss">
    <link rel="stylesheet" href="../../../css/princi.css" />
    <link rel="stylesheet" href="../../../css/mes.css">
    <link rel="stylesheet" href="../../../css/tablas.css" type="text/css">
    <link rel="stylesheet" href="../../../css/general.css" />

    <script src="../js/calendario.js" type="text/javascript"></script>
    <script src="../js/reloj.js" type="text/javascript"></script>
    <script src="../js/controlEstadoTar.js" type="text/javascript"></script>

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
                <li><a href="../semana/semana.php"> Semana </a></li>
                <li><a href="" id=mes onclick="fechaActualMes()"> Mes </a></li>
            </ul>
        </nav>

    </header>

    <section>
        <h1>Colaboradores</h1>
        <div class="colabs">
            <div class="at"> <a href=""><img src="../../../images/iconos/ac.png" style="width: 2rem;" />Atención Cliente</a> </div>
            <div class="ja"> <a href=""><img src="../../../images/iconos/ja.png" style="width: 2rem;" />Jefe Agencia</a> </div>
            <div class="jt"> <a href=""><img src="../../../images/iconos/jt.png" style="width: 2rem;" />Jefe Tecnico</a> </div>
            <div class="jv"> <a href=""><img src="../../../images/iconos/jv.png" style="width: 2rem;" />Jefe Ventas</a> </div>
        </div>
    </section>
    </br>
    <section class="tareas">
        <div>
            <a href="#miModal"><img src="../../../images/iconos/mas.png" style="width: 2rem;" /> <span>Añadir tarea</span></a>
        </div>
    </section>

    <section class="uno">

        <h2>Control de tareas</h2>
        <table style="width:100%" class="responstable">

            <tr>
                <th>Total de tareas</th>
                <th>Tareas no Realizadas</th>
                <th>Tareas Realizadas</th>
            </tr>

            <?php

            include '../../../config/conexionBD.php';
            $fecha = $_GET["fecha"];
            $sql = "SELECT COUNT(*) FROM tarea WHERE tar_fecha = '$fecha'";
            $result = $conn->query($sql);
            $tourresult = $result->fetch_array()[0] ?? '';

            $sql1 = "SELECT COUNT(*) FROM tarea WHERE tar_fecha = '$fecha' AND tar_estado = 0";
            $result1 = $conn->query($sql1);
            $tourresult1 = $result1->fetch_array()[0] ?? '';

            $sql2 = "SELECT COUNT(*) FROM tarea WHERE tar_fecha = '$fecha' AND tar_estado = 1";
            $result2 = $conn->query($sql2);
            $tourresult2 = $result2->fetch_array()[0] ?? '';

            echo ($tourresult);
            echo ($tourresult1);
            echo ($tourresult2);

            //if ($result->num_rows > 0) {
            if ($tourresult > 0) {

                echo "<tr>";
                echo "<th>" . $tourresult . "</th>";
                echo "<th>" . $tourresult1 . "</th>";
                echo "<th>" . $tourresult2 . "</th>";
                echo "</tr>";
            } else {
                echo "<tr>";
                echo " <td colspan='7'> No existen tareas asignadas para hoy</td>";
                echo "</tr>";
            }

            ?>

        </table>

    </section>

    <section>

        <!-- Clase modal donde se escoje la hora y fecha y demas informacion de las tareas -->
        <div id="miModal" class="modal">
            <div class="modal-contenido">
                <a href="#">X Cerrar</a>

                <h1>Ingreso de nueva tarea</h1>
                <form id="formulario01" method="POST" action="../tareas/php/crear_tarea.php">
                    <div class="seleccionHoras">
                        <div class="horaInicial">
                            <h2>Seleccione la hora Inicial</h2>
                            <section id="contReloj">
                                <p id="pHoras"></p>
                                <p>:</p>
                                <p id="pMinutos"></p>
                            </section>
                            <!-- <section id="contSaludo"></section> -->
                            <input class="input" type="time" id="horaInicio" name="horaInicio" min="07:00" max="20:00" onchange="ActualizarHora(this.value)">
                        </div>

                        <div class="horaFinal">
                            <h2>Seleccione la hora Final</h2>
                            <section id="contReloj">
                                <p id="pHorasF"></p>
                                <p>:</p>
                                <p id="pMinutosF"></p>
                            </section>
                            <!-- <section id="contSaludoF"></section> -->
                            <input type="time" class="input" id="horaFinal" name="horaFinal" min="07:00" max="20:00" onchange="ActualizarHoraFinal(this.value)">
                        </div>
                    </div>

                    <div class="seleccionInformacion">
                        <h2>Seleccion de Información</h2>
                        <div class="informacion">
                            <label for="" class="label">Nombre Tarea:</label>
                            <input type="text" class="input" id="nombre" name="nombre" value="" placeholder="Ingrese el título de la tarea..." required> <br>

                            <label for="" class="label">Descripción Tarea:</label><Br />
                            <textarea id="descripcion" class="textarea" name="descripcion" rows="10" cols="10" placeholder="Ingrese la descripcion de la tarea"></textarea>

                            <label for="" class="label">Fecha Tarea:</label>
                            <input type="date" class="input" id="fecha" name="fecha"> <br>
                        </div>

                        <div class="colaboradores">
                            <label for="" class="label">Añadir Colaboradores</label>
                            <table style="width:110%" class="responstable">
                                <tr>
                                    <th>Seleccionar</th>
                                    <th>Cedula</th>
                                    <th>Nombre</th>
                                    <th>Sucursal</th>
                                    <th>Cargo</th>
                                </tr>
                                <?php
                                include '../../../config/conexionBD.php';
                                $fecha = $_GET["fecha"];
                                $sql = "SELECT col_codigo, usu_cedula, usu_nombres, usu_sucursal, col_cargo  FROM usuario u, colaborador c WHERE u.usu_col_codigo = c.col_codigo ";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td><input type='checkbox' id='check'/></td>";
                                        echo " <td>" . $row["usu_cedula"] . "</td>";
                                        echo " <td>" . $row["usu_nombres"] . "</td>";
                                        echo " <td>" . $row["usu_sucursal"] . "</td>";
                                        echo " <td>" . $row['col_cargo'] . "</td>";
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr>";
                                    echo " <td colspan='7'> No colaboradores</td>";
                                    echo "</tr>";
                                }
                                $conn->close();
                                ?>
                            </table>

                        </div>
                    </div>

                    <input type="submit" class="botonAceptar" id="crear" name="crear" value="Aceptar" />
                    <a type="reset" onclick="fechaActualPrin()" href="" class="botonCancelar" id="cancelar" name="cancelar" value="Cancelar">Cancelar </a>

                </form>
            </div>

        </div>

        <!-- fin de la clase modal -->

    </section>

    <section class=" dos">
        <h2>Tareas del día</h2>
        <table style="width:100%" class="responstable">
            <tr>
                <th>Realizado</th>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Hora Inicio</th>
                <th>Hora Fin</th>
            </tr>
            <?php
            include '../../../config/conexionBD.php';
            $fecha = $_GET["fecha"];
            $sql = "SELECT * FROM tarea WHERE tar_fecha = '$fecha' ORDER BY tar_horaInicio";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                    //echo "<tr>";

                    echo "<td><input type='checkbox' onChange='seleccion(" . $row["tar_codigo"] . ")' id =  '" . $row["tar_codigo"] . "'"  ?> . <?php if ($row['tar_estado'] == 1) echo 'checked'; ?> . "onclick = 'estado()'/></td>";
            <?php
                    echo " <td id = 'cod'>" . $row["tar_codigo"] . "</td>";
                    echo " <td>" . $row['tar_nombre'] . "</td>";
                    echo " <td>" . $row['tar_horaInicio'] . "</td>";
                    echo " <td>" . $row['tar_horaFin'] . "</td>";
                    echo " <td> <a href='../tareas/php/eliminar.php?codigo=" . $row['tar_codigo'] . "'>Eliminar</a> </td>";
                    echo " <td> <a onclick='fechaActualPrin()' href='../tareas/html/modificar.php?codigo=" . $row['tar_codigo'] . "'>Modificar</a> </td>";
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