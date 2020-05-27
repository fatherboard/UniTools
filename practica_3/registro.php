<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
        <title>INDEX</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200;0,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 

    <script src="js/jquery_register.js"></script>



</head>

<body >

    <div class="contenedor_log_reg c_background">

        <?php
        require("includes/FormRegistro.php");

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
            } ?>

    </div> <!-- Fin del contenedor -->

</body>
