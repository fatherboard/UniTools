<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/hoja.css">
    <title>INDEX</title>
    <meta charset="UTF-8">
</head>

<body>

    <div id="contenedor">

        <?php
        require("includes/common/cabecera.php");
        require("includes/common/navegacion.php");
	require("includes/common/FormRespuesta.php");
	?>

        <div id="contenido">
            <?php

            $post = $_GET["post"];
            $form = new FormRespuesta();
            $html = $form->gestiona();
            if (!isset($_SESSION)) {
                session_start();
            }

            if (isset($_SESSION['error_respuesta'])) {
                if (count($_SESSION['error_respuesta']) > 0) {
                    echo '<ul class="errores">';
                }

                foreach ($_SESSION['error_respuesta'] as $error) {
                    echo "<li>$error</li>";
                }

                if (count($_SESSION['error_respuesta']) > 0) {
                    echo '</ul>';
                }
                unset($_SESSION['error_respuesta']);
            }

            
            ?>
        </div>

        <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


    </div> <!-- Fin del contenedor -->

</body>
