<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("dao/dao_project.php");
include_once("dao/dao_user.php");
include_once("includes/FormNewProject.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>NUEVO PROYECTO</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/icon/unitools16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/icon/unitools32.png" sizes="32x32">

    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/side_OG.css">
    <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">
</head>

<body>
    <div class="contenedor">

        <?php //class="side_menu"
        require("includes/common/navegacion_OG.php"); ?>

        <?php //class="cabecera"
        require("includes/common/cabecera_OG.php"); ?>

        <div class="contenido">
            <?php
            if (isset($_SESSION['login'])) {
                if ($_SESSION['login']) { ?>
                    <div class='fb-col box v-center' id='n_pr'>
                    <?php
                    $newProject = new FormNewProject();
                    $newProject->gestiona();
                }
                    ?>
                    </div>
                <?php
            } else {
                echo "Necesitas estar loggeado para hacer eso";
            }
                ?>
        </div>

    </div> <!-- Fin del contenedor -->

</body>