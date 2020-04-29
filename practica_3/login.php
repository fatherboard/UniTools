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
	require("includes/common/FormLogin.php");
	?>

        <div id="contenido">
            <?php

            $form = new FormLogin();
            $html = $form->gestiona();

            if (!isset($_SESSION)) {
                session_start();
            }

            if (isset($_SESSION['error_login'])) {
                if (count($_SESSION['error_login']) > 0) {
                    echo '<ul class="errores">';
                }

                foreach ($_SESSION['error_login'] as $error) {
                    echo "<li>$error</li>";
                }

                if (count($_SESSION['error_login']) > 0) {
                    echo '</ul>';
                }
                unset($_SESSION['error_login']);
            }


            ?>
        </div>

        <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


    </div> <!-- Fin del contenedor -->

</body>
