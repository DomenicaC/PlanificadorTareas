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
  <script src="../js/calendario.js" type="text/javascript"></script>
  <script src="../js/reloj.js" type="text/javascript"></script>
  <title>Agenda Mes</title>
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
        <li><a href="../php/principal.php"> Página Principal </a></li>
        <li><a href="../dia/dia.php"> Día </a> </li>
        <li><a href="../semana/semana.php"> Semana </a></li>
        <li><a href="mes.php"> Mes </a></li>
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
    <ul type=”A”>
      <li>07:00 <a href="../tareas/tareas.php"></a></li>
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

  <!-- Clase modal donde se escoje la hora y fecha y demas informacion de las tareas -->
  <div id="miModal" class="modal">
    <div class="modal-contenido">
      <a href="#">X Cerrar</a>

      <div class="seleccionHoras">
        <div class="horaInicial">
          <h2>Seleccione la hora Inicial</h2>
          <section id="contReloj">
            <p id="pHoras"></p>
            <p>:</p>
            <p id="pMinutos"></p>
          </section>
          <!-- <section id="contSaludo"></section> -->
          <input type="time" min="07:00" max="20:00" id="horaInicial" onchange="ActualizarHora(this.value)">
        </div>

        <div class="horaFinal">
          <h2>Seleccione la hora Final</h2>
          <section id="contReloj">
            <p id="pHorasF"></p>
            <p>:</p>
            <p id="pMinutosF"></p>
          </section>
          <!-- <section id="contSaludoF"></section> -->
          <input type="time" min="07:00" max="20:00" id="horaInicial" onchange="ActualizarHoraFinal(this.value)">
        </div>
      </div>

      <div class="seleccionInformacion">
        <h2>Seleccion de Inforacion</h2>
        <div class="informacion">
          <label for="">Nombre Tarea:</label>
          <input type="text"> <br>
          <label for="">Descripción Tarea:</label><Br />
          <textarea name="descipcion" rows="10" cols="10" placeholder="Ingrese la descripcion de la tarea"></textarea>
        </div>

        <div class="colaboradores">
          <label for="">Añadir Colaboradores</label>
          <select name="colaboradores" id="sis-colaboradores">
            <option value="ninguno">Seleccione un colaborador</option>
            <option value="serivicioCliente">Servicio al Cliente</option>
            <option value="jefeTecnico">Jefe Tecnico</option>
          </select>
        </div>
      </div>
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