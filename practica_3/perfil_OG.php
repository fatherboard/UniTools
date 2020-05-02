<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/dao_user.php');
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/L.css">
    <title>INDEX</title>
    <meta charset="UTF-8">
</head>

<body>

    <div class="contenedor">

        <div class="a menu">
        <p> PERFIL </p>
        <p> HERRAMIENTAS </p>
        <p> FORO </p>
        <p> AJUSTES </p>
        <?php //require("includes/common/navegacion.php");?>
        </div>

        <div class="a cabecera">
        INICIO LOGIN LOGOUT
        <?php //require("includes/common/cabecera.php");?>
        </div>

        <div class="a contenido">
           Contraseña actual (encriptada): Hey
        </div>

    </div> <!-- Fin del contenedor -->
</body>
