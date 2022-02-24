<?php
session_start();
if (!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE) {
  header("Location: /Planificador/Ventanas/Login/html/login.html");
}
?>

<!DOCTYPE html>
<html lang="es">
<meta name="language" content="es" />
<meta http-equiv="Content-Type" content="text/html" charset="Iso-8859-15" />

<head>
  <meta charset="UTF-8">
  <title>Tarea</title>

  <!-- <link href="../../../css/princi.css" rel="stylesheet" /> -->
  <link href="../../../../css/general.css" rel="stylesheet" />
  <link rel="stylesheet" href="../../../../css/tablas.css">
  <link rel="stylesheet" href="../../../../css/mes.css">
  <link rel="stylesheet" href="../../../../css/form.scss">

  <script src="../../js/calendario.js" type="text/javascript"></script>
  <script src="../../js/reloj.js" type="text/javascript"></script>

</head>

<body>

  <header class="enc1">
    <img src="../../../../images/logo/logoOfi.png" alt="iconoLogo" />
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
        <li><a href="../../semana/semana.php"> Semana </a></li>
        <li><a href="" id=mes onclick="fechaActualMes()"> Mes </a></li>
      </ul>
    </nav>
    <br /> <br />
  </header>

  <section>

    <?php
    $codigo = $_GET["codigo"];
    $sql = "SELECT * FROM tarea where tar_codigo=$codigo";

    include '../../../../config/conexionBD.php';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

      while ($row = $result->fetch_assoc()) {
    ?>
        <section class="container form">

          <form id="formulario01" method="POST" action="../php/modificar.php">

            <input class="input" type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

            <label for="" class="label">Nombre Tarea:</label><Br />
            <input class="input" type="text" id="nombre" name="nombre" value="<?php echo $row["tar_nombre"]; ?>" required placeholder="Ingrese el nombre" />
            </br>

            <label for="" class="label">Descripción Tarea:</label><Br />
            <input id="descripcion" class="textarea" name="descripcion" rows="10" cols="10" value="<?php echo $row["tar_descripcion"]; ?>" placeholder="Ingrese la descripcion de la tarea" />
            <Br />

            <label for="fecha" class="label">Fecha:</label><Br />
            <input class="input" type="text" id="fecha" name="fecha" value="<?php echo $row["tar_fecha"]; ?>" required placeholder="Ingrese la fecha" />
            <br>

            <label for="horaInicio" class="label">Hora Inicial:</label><Br />
            <input class="input" type="time" id="horaInicio" name="horaInicio" value="<?php echo $row["tar_horaInicio"]; ?>" required placeholder="Ingrese la hora i" />

            <label for="horaInicio" class="label">Hora Final:</label><Br />
            <input type="time" class="input" id="horaFinal" name="horaFinal" value="<?php echo $row["tar_horaFin"]; ?>" required placeholder="Ingrese la hora f" />


            <input type="submit" class="botonAceptar" id="modificar" name="modificar" value="Modificar" />

            <a href="javascript:history.back()" class="botonCancelar" onclick="fechaActualPrin()"> Cancelar </a>

          </form>
        </section>
    <?php
      }
    } else {
      echo "<p>Ha ocurrido un error inesperado !</p>";
      echo "<p>" . mysqli_error($conn) . "</p>";
    }
    $conn->close();
    ?>

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