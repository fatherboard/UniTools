<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/hoja.css">
    <title>ADMIN</title>
    <meta charset="UTF-8">
</head>

<body>

    <div id="contenedor">

        <?php
        require("includes/common/cabecera.php");
        require("includes/common/navegacion.php");
        ?>

        <div id="contenido">
            
            

        </div>

        <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


    </div> <!-- Fin del contenedor -->

</body>