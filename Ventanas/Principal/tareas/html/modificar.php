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
    <title>Tarea</title>

    <!-- <link href="../../../css/princi.css" rel="stylesheet" /> -->
    <link href="../../../../css/general.css" rel="stylesheet" />
    <script src="../../js/calendario.js" type="text/javascript"></script>
  <link rel="stylesheet" href="../../../../css/tablas.css">

</head>

<body>

    <header class="enc1">
        <img src="../../../../images/iconos/calendar.png" alt="iconoLogo" />
        <br />
        <a class="cerrar" href="../../../../config/cerrarSesion.php">Cerrar Sesión</a>

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
        <br /> <br />
    </header>
    <h1>Modificar Tareas</h1>
    <section>
        <form class="formu" id="formulario01" method="POST" action="" onsubmit="return validarCamposObligatorios()">
            <br>
            <label for="nombre">Nombre Tarea</label>
            <input type="text" id="cedula" name="cedula" value="" placeholder="" onkeyup="return valCedula(this)" />
            <span id="mensajeced" class="error"></span>
            <br><br>

            <label for="desc">Descripcion Tarea</label>
            <input type="text" id="cedula" name="cedula" value="" placeholder="" onkeyup="return validarNombres(this)" />
            <span id="mensajeNombres" class="error"></span>
            <br><br>

            <label for="Horarios">Horario Inicio Seleccionados</label>
            <input type="text" id="apellidos" name="apellidos" value="" placeholder="" onkeyup="return validarApellidos(this)" />
            <span id="mensajeApellidos" class="error"></span>
            <br><br>

            <label for="Horarios">Horario Final Seleccionados</label>
            <input type="text" id="apellidos" name="apellidos" value="" placeholder="" onkeyup="return validarApellidos(this)" />
            <span id="mensajeApellidos" class="error"></span>
            <br><br>

            <label for="Horarios">Horario Final Seleccionados</label>
            <input type="text" id="apellidos" name="apellidos" value="" placeholder="" onkeyup="return validarApellidos(this)" />
            <span id="mensajeApellidos" class="error"></span>
            <br><br>

            <label for="direccion">Colaboradores</label>
            <div class="colaboradores">
            <table style="width:100%" class="responstable">
              <tr>
                <th>Seleccionar</th>
                <th>Codigo col</th>
                <th>Cedula</th>
                <th>Nombre</th>
                <th>Sucursal</th>
                <th>Cargo</th>
              </tr>
              <?php
              include '../../../../config/conexionBD.php';
              $sql = "SELECT col_codigo, usu_cedula, usu_nombres, usu_sucursal, col_cargo  FROM usuario u, colaborador c WHERE u.usu_col_codigo = c.col_codigo";
              $result = $conn->query($sql);

              if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td><input type='checkbox' /></td>";
                  echo " <td>" . $row["col_codigo"] . "</td>";
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
            <br><br>

            <input class="boton" type="reset" id="volver" name="volver" value="Volver" />
            <br><br>
        </form>
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