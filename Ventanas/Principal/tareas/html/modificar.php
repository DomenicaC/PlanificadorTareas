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
  <link rel="stylesheet" href="../../../css/mes.css">
  <link rel="stylesheet" href="../../../css/general.css">

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


  <div id="miModal" class="modal">
    <div class="modal-contenido">
      <h1>Modificar Tarea</h1>
      <section>
        <h1></h1>
        <form id="formulario01" method="POST" action="php/crear_tarea.php">
          <div class="seleccionHoras">
            <div class="horaInicial">
              <h2>Hora Inicial</h2>
              <section id="contReloj">
                <p id="pHoras"></p>
                <p>:</p>
                <p id="pMinutos"></p>
              </section>
              <!-- <section id="contSaludo"></section> -->
              <input type="time" id="horaInicio" name="horaInicio" min="07:00" max="20:00" onchange="ActualizarHora(this.value)">
            </div>

            <div class="horaFinal">
              <h2>Hora Final</h2>
              <section id="contReloj">
                <p id="pHorasF"></p>
                <p>:</p>
                <p id="pMinutosF"></p>
              </section>
              <!-- <section id="contSaludoF"></section> -->
              <input type="time" id="horaFinal" name="horaFinal" min="07:00" max="20:00" onchange="ActualizarHoraFinal(this.value)">
            </div>
          </div>

          <div class="seleccionInformacion">
            <h2>Seleccion de Información</h2>
            <div class="informacion">
              <label for="">Nombre Tarea:</label>
              <input type="text" id="nombre" name="nombre" value="" placeholder="Ingrese el título de la tarea..." required> <br>

              <label for="">Descripción Tarea:</label><Br />
              <textarea id="descripcion" name="descripcion" rows="10" cols="10" placeholder="Ingrese la descripcion de la tarea"></textarea>

              <label for="">Fecha Tarea:</label>
              <input type="date" id="fecha" name="fecha"> <br>
            </div>

            <div class="colaboradores">
              <label for="">Añadir Colaboradores</label>
              <table style="width:100%" class="responstable">
                <tr>
                  <th>Seleccionar</th>
                  <th>Cedula</th>
                  <th>Nombre</th>
                  <th>Sucursal</th>
                  <th>Cargo</th>
                </tr>
                <?php
                include '../../../../config/conexionBD.php';
                //$fecha = $_GET["fecha"];
                $sql = "SELECT col_codigo, usu_cedula, usu_nombres, usu_sucursal, col_cargo  FROM usuario u, colaborador c WHERE u.usu_col_codigo = c.col_codigo ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                  while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td><input type='checkbox' /></td>";
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

          <input type="submit" class="boton" id="crear" name="crear" value="Aceptar" />

        </form>
    </div>

    </section>
  </div>

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