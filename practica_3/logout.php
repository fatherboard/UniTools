<?php
    //borra los datos que se han guardado de la sesión
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    session_destroy();

    header("Location:index.php");
    exit;
?>
