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
	    require("includes/FormRegistro.php");
	?>

        <div id="contenido">
            <?php

            $form = new FormRegistro();
            $html = $form->gestiona();

            if (!isset($_SESSION)) {
                session_start();
            }


            if (isset($_SESSION['error_registro'])) {
                if (count($_SESSION['error_registro']) > 0) {
                    echo '<ul class="errores">';
                }

                foreach ($_SESSION['error_registro'] as $error) {
                    echo "<li>$error</li>";
                }

                if (count($_SESSION['error_registro']) > 0) {
                    echo '</ul>';
                }
                unset($_SESSION['error_registro']);
            }


            ?>
        </div>

        <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


    </div> <!-- Fin del contenedor -->

</body>
