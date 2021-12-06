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
  <script src="../js/calendario.js" type="text/javascript"></script>
  <script src="../js/reloj.js" type="text/javascript"></script>
  <title>Agenda Mes</title>
</head>

<body>
  <header>
    <div class="nav-Primario">
      <a href="../../../config/cerrarSesion.php">Cerrar Sesión</a>
    </div>

    <div class="nav-Secundario">
      <div class="principal"> <a href="../php/principal.php">Menú Principal</a> </div>
      <div class="dia"> <a href="">Dia</a> </div>
      <div class="semana"> <a href="">Semana</a> </div>
      <div class="mes"> <a href="">Mes</a> </div>
    </div>
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
          <section id="contSaludo"></section>
          <input type="time" min="07:00" max="20:00" id="horaInicial" onchange="ActualizarHora(this.value)">
        </div>

        <div class="horaFinal">
          <h2>Seleccione la hora Final</h2>
          <input type="time" min="07:00" max="20:00">
        </div>
      </div>

      <div class="seleccionInformacion">
        <div class="informacion">
          <label for="">Nombre Tarea:</label>
          <input type="text"> <br>
          <label for="">Descripción Tarea:</label>
          <input type="text">
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
</body>

</html>