<?php

    //borra los datos que se han guardado de la sesión
    session_start();
    unset($_SESSION["login"]);
    unset($_SESSION["nombre"]);
    unset($_SESSION["isAdmin"]);

    header("Location:index.php");
    exit;
?>