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

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;0,500&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/side_OG.css">
    <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">
</head>

<body>
    
    <div class="contenedor">

        <?php //class="side_menu"
        require("includes/common/navegacion_OG.php");?>
        
        <?php //class="cabecera"
        require("includes/common/cabecera_OG.php");?>

        <div class="contenido">
            <div class="box a">A</div>
            <div class="box b">B</div>
            <div class="box c">C</div>
            <div class="box d">D</div>
            <div class="box e">E</div>
            <div class="box f">F</div>
        </div>

    </div> <!-- Fin del contenedor -->
</body>
