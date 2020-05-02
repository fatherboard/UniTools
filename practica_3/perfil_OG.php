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

        <div class="side_menu">
            <div class="boxM z">
            <?php echo "<a href=\"index.php\">Inicio</a>"?>
            </div>
            
                <div class="boxM b">
            <?php echo "<a href=\"foro.php\">Foro</a>"?>
            </div>

                <div class="boxM c">
            <?php echo "<a href=\"herramientas.php\">Herramientas</a>"?>
            </div>

                <div class="boxM d">
            <?php echo "<a href=\"team.php\">Nosotros</a>"?>
            </div>

                <div class="boxM e">
            <?php echo"<a href=\"login.php\">Login</a>"?>
            </div>

                <div class="boxM f">
            <?php echo"<a href=\"registro.php\" >Registrar</a>"?>
            </div>
        </div>

        <div class="cabecera">
        INICIO LOGIN LOGOUT
        <?php //require("includes/common/cabecera.php");?>
        </div>

        <div class="contenido">
           Contraseña actual (encriptada): Hey
        </div>

    </div> <!-- Fin del contenedor -->
</body>
