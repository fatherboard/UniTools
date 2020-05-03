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
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"> 
    <script src="https://kit.fontawesome.com/9b13eb91e9.js" crossorigin="anonymous"></script>
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
