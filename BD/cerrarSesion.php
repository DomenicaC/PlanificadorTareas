<?php
    session_start();
    $_SESSION['isLogged'] = FALSE;
    session_destroy();
    header("Location: /Planificador/Login/html/login.html");
?>