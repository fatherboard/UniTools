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

        <?php //class="side_menu"
        require("includes/common/navegacion_OG.php");?>
        
        <div class="cabecera">
        INICIO LOGIN LOGOUT
        <?php //require("includes/common/cabecera.php");?>
        </div>

        <div class="contenido">
            Contraseña actual (encriptada): Hey
        </div>

    </div> <!-- Fin del contenedor -->
</body>
