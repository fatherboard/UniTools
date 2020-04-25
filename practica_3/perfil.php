<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once('dao/dao_user.php');
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
        ?>

        <div id="contenido">
            <?php

            $user = new TOUser();
            $dao_usuario = new DAOUsuario();
            $userData = $dao_usuario->search_username($_SESSION['username']);

            $username = $_SESSION['username'];
            $premium = $userData->get_premium();
            $email = $userData->get_email();
            $password = $userData->get_password();

            ?>


            <body id="per">

                <div class="per_columnaIzq">
                    <div class="per_card">
                        <div class="per_fotocard">
                            <img id="per_foto" alt="foto_perfil" src="/UniTools/practica_2/img/Default_user_icon.jpg">
                        </div>
                        <p id="p_username"><b> Nombre de ususario: <?php echo $username ?> </b></p>
                    </div>
                </div>
                <div class="per_columnaDer">

                    <!-- premium user -->
                    <div class="per_card">
                        Usuario premium:
                        <?php
                        if ($premium)
                            echo " Sí, días restantes 29.";
                        else {
                            echo " No... ¡Hazte premium hoy mismo! ";
                        }
                        ?> <br>
                    </div> <br>

                    <!-- current email -->
                    <div class="per_card">
                        E-mail: <?php echo $email ?> <br>
                    </div> <br>

                    <!-- current password -->
                    <div class="per_card">
                        Contraseña actual (encriptada): <?php echo $password ?>
                    </div><br>
                    </form>
                </div>
        </div>

        <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


    </div> <!-- Fin del contenedor -->

</body>