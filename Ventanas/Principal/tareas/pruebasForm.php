<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Tarea</title>

    <link href="../../../css/general.css" rel="stylesheet" />
    <link rel="stylesheet" href="form.scss">

    <link rel="stylesheet" href="../../../css/tablas.css">
    <link rel="stylesheet" href="../../../css/mes.css">
    <script src="../js/calendario.js" type="text/javascript"></script>
    <script src="formulario.js" type="text/javascript"></script>

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
                <li><a href="../semana/semana.php"> Semana </a></li>
                <li><a href="" id=mes onclick="fechaActualMes()"> Mes </a></li>
            </ul>
        </nav>
        <br /> <br />
    </header>

    <div class="container">
        
        <h2>Modificar Tarea</h2>

        <?php
        $codigo = $_GET["codigo"];
        $sql = "SELECT * FROM tarea where tar_codigo=$codigo";

        include '../../../config/conexionBD.php';
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
        ?>

                <form id="formulario01" method="POST" action="../php/modificar.php">
                    <input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />

                    <label for="nombre">Nombre tarea (*)</label>
                    <input type="text" class="email" value="<?php echo $row["tar_nombre"]; ?>" required placeholder="Nombre de la tarea" />
                    <br />

                    <label for="descripcion">Descripcion (*)</label>
                    <textarea rows="10" cols="60" class="email" required placeholder="Descripcion de la tarea" > <?php echo $row["tar_descripcion"]; ?> </textarea>
                    <br />

                    <label for="horaIni">Hora inicio (*)</label>
                    <input type="text" class="email" value="<?php echo $row["tar_horaInicio"]; ?>" required placeholder="Hora inicial de la tarea" />
                    <br />

                    <label for="horaFin">Hora fin (*)</label>
                    <input type="text" class="email" value="<?php echo $row["tar_horaFin"]; ?>" required placeholder="Hora final de la tarea" />
                    <br />

                    <label for="fecha">fecha (*)</label>
                    <input type="text" class="email" value="<?php echo $row["tar_fecha"]; ?>" required placeholder="Fecha de la tarea" />
                    <br />

                    <button type="submit" class="register">
                        <span>Modificar Tarea</span>
                    </button>

                </form>

        <?php
            }
        } else {
            echo "<p>Ha ocurrido un error inesperado !</p>";
            echo "<p>" . mysqli_error($conn) . "</p>";
        }
        $conn->close();
        ?>

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