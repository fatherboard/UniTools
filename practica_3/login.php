<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>LOGIN</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200;0,500&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/icon/unitools16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/icon/unitools32.png" sizes="32x32">
    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">
    <!--
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/jquery.validate.js"></script>
    <script src="js/signup-form.js"></script>
    <script src="js/my_jquery.js"></script>
    <script src="js/my_jquery1.js"></script>
    <script src="js/jquery_checkUser.js"></script>
    -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


</head>

<body>

    <div class="contenedor_log_reg c_background">

        <?php
        require("includes/FormLogin.php");

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
        } ?>

    </div> <!-- Fin del contenedor -->

</body>