<?php
    //borra los datos que se han guardado de la sesión
    session_start();
    unset($_SESSION["login"]);
    unset($_SESSION["username"]);
    unset($_SESSION["isAdmin"]);
    unset($_SESSION['access_error']);
    unset($_SESSION['userId']);
    unset($_SESSION['register_error']);
    unset($_SESSION['reg_mess']);
    /*unset();*/

    header("Location:index.php");
    exit;
?>