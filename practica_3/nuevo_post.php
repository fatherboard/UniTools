<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("dao/dao_post.php");
include_once("dao/dao_user.php");

?>

<!DOCTYPE html>
<html>

<head>
    <title>NUEVO POST</title>
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
                if ($_SESSION['login']) {

                    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            ?>

                        <div class="fb-col box v-center " id="n_p">
                            <form action="" method="post">
                                <div class="t2 text-center">
                                    <h1>Nuevo Post</h1>
                                </div>
                                <div class="b2">
                                    <div class="fb-row">
                                        <p>Título del nuevo post:
                                            <textarea class="field tittle-row" name="titulo" rows="1" placeholder="Escribe un título"></textarea>
                                    </div>

                                    <div id="contenido_npost">
                                        <p>Contenido:</p>
                                        <textarea class="field tittle-row" name="contenido" rows="4" placeholder="Escribe un contenido"></textarea>
                                    </div>

                                    <div id="categoria_post">
                                        <p>Categoria</p>
                                        <select name="categoría">
                                            <option value="General">General</option>
                                            <option value="Programación">Programación</option>
                                            <option value="Estudio">Estudio</option>
                                            <option value="Apuntes">Apuntes</option>
                                        </select>
                                    </div>

                                    <p class="submit-center">
                                        <input type="submit" id="btn_enviar_npost" value="Enviar" class="field v-center" />
                                    </p>
                            </form>
                        </div>

            <?php
                    } else {

                        //the form has been posted, so save it

                        $titulo = $_POST['titulo'];
                        $contenido = $_POST['contenido'];
                        $categoria = $_POST['categoría'];

                        $foro_data = new TOUpost();
                        $dao_post = new DAOpost();
                        $dao_user = new DAOUsuario();
                        $user_id = $dao_user->search_username($_SESSION['username'])->get_id();
                        $new_post = new TOUPost('', $user_id, $titulo, $contenido, $categoria);

                        if (!$dao_post->insert_Post($new_post)) {
                            echo "Error al insertar post";
                        } else {
                            $dao_user->disconnect();
                            header("location:foro.php");
                        }

                        $dao_user->disconnect();
                    }
                } else {
                    echo "Necesitas estar loggeado para hacer eso";
                }
            } else {
                echo "Necesitas estar loggeado para hacer eso";
            }

            ?>





        </div>



    </div>

    <?php
    //muerte temporal del footer
    //require("includes/common/pie.php") ; 
    ?>


    </div> <!-- Fin del contenedor -->

</body>