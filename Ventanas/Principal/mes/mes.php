<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
  header("Location: /Planificador/Ventanas/Login/html/login.html");
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../css/mes.css">
  <link rel="stylesheet" href="../../../css/general.css">
  <link rel="stylesheet" href="../../../css/tablas.css">
  </title>
  <link rel="stylesheet" href="../../../css/tablas.css" type="text/css">
  <script src="../js/calendario.js" type="text/javascript"></script>
  <script src="../js/reloj.js" type="text/javascript"></script>
  <title>Agenda Mes</title>
</head>

<body>
  <header class="enc1">
    <img src="../../../images/logo/logo1.png" alt="iconoLogo" />
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
    <br /> <br />
  </header>

  <section class="caledario">
    <h1>hola este es el cuerpo donde va a estar el calendario</h1>

    <div id="calendario">
      <div id="anterior" onclick="mesantes()"></div>
      <div id="posterior" onclick="mesdespues()"></div>
      <h2 id="titulos"></h2>
      <table id="diasc">
        <tr id="fila0">
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr id="fila1">
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
        </tr>
        <tr id="fila2">
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
        </tr>
        <tr id="fila3">
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
        </tr>
        <tr id="fila4">
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
        </tr>
        <tr id="fila5">
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
        </tr>
        <tr id="fila6">
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
          <td><a></a></td>
        </tr>
      </table>
      <div id="fechaactual"><i onclick="actualizar()">HOY: </i></div>
      <div id="buscafecha">
        <form action="#" name="buscar">
          <p>Buscar ... MES
            <select name="buscames">
              <option value="0">Enero</option>
              <option value="1">Febrero</option>
              <option value="2">Marzo</option>
              <option value="3">Abril</option>
              <option value="4">Mayo</option>
              <option value="5">Junio</option>
              <option value="6">Julio</option>
              <option value="7">Agosto</option>
              <option value="8">Septiembre</option>
              <option value="9">Octubre</option>
              <option value="10">Noviembre</option>
              <option value="11">Diciembre</option>
            </select>
            ... AÑO ...
            <input type="text" name="buscaanno" maxlength="4" size="4" />
            ...
            <input type="button" value="BUSCAR" onclick="mifecha()" />
          </p>
        </form>
      </div>
    </div>
  </section>

  <section class="tareas">
    <h1>parte de la descipcion de las tareas</h1>
    <div>
      <a href="#miModal"><img src="../../../images/iconos/mas.png" style="width: 2rem;" /> <span>Añadir tarea</span></a>
    </div>
    <table style="width:100%" class="responstable">
      <tr>
        <th>Codigo</th>
        <th>Nombre</th>
        <th>Hora Inicio </th>
        <th>Hora Fin</th>
      </tr>
      <?php
      include '../../../config/conexionBD.php';
      $fecha = $_GET["fecha"];
      $sql = "SELECT * FROM tarea WHERE tar_fecha = '$fecha' ORDER BY tar_horaInicio";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
          echo "<tr>";
          echo " <td>" . $row["tar_codigo"] . "</td>";
          echo " <td>" . $row['tar_nombre'] . "</td>";
          echo " <td>" . $row['tar_horaInicio'] . "</td>";
          echo " <td>" . $row['tar_horaFin'] . "</td>";
          echo " <td> <a href='../tareas/php/eliminar.php?codigo=" . $row['tar_codigo'] . "'>Eliminar</a> </td>";
          echo " <td> <a href='../tareas/html/modificar.php?codigo=" . $row['tar_codigo'] . "'>Modificar</a> </td>";
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

  <!-- Clase modal donde se escoje la hora y fecha y demas informacion de las tareas -->
  <div id="miModal" class="modal">
    <div class="modal-contenido">
      <a href="#">X Cerrar</a>

      <h1>Ingreso de nueva tarea</h1>
      <form id="formulario01" method="POST" action="php/crear_tarea.php">
        <div class="seleccionHoras">
          <div class="horaInicial">
            <h2>Seleccione la hora Inicial</h2>
            <section id="contReloj">
              <p id="pHoras"></p>
              <p>:</p>
              <p id="pMinutos"></p>
            </section>
            <!-- <section id="contSaludo"></section> -->
            <input type="time" id="horaInicio" name="horaInicio" min="07:00" max="20:00" onchange="ActualizarHora(this.value)">
          </div>

          <div class="horaFinal">
            <h2>Seleccione la hora Final</h2>
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
              include '../../../config/conexionBD.php';
              $fecha = $_GET["fecha"];
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

  </div>

  <!-- fin de la clase modal -->

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