<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/dao_user.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>INDEX</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/9b13eb91e9.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/side_OG.css">
    <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">
</head>

<body>
    
    <div class="contenedor">

        <?php //class="side_menu"
        require("includes/common/navegacion_OG.php");?>
        
        <?php //class="side_menu"
        require("includes/common/cabecera_OG.php");?>

        <div class="contenido">
            Contraseña actual (encriptada): Hey
        </div>

    </div> <!-- Fin del contenedor -->
</body>
