<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("dao/dao_user.php");
include_once("dao/dao_post.php");
include_once("dao/dao_respuesta.php");
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
            <div class="cotenido">
                <a class="botonForo" href="nuevo_post.php">Nuevo Post</a>
                <form action="search.php" method="POST">
                    <input type="text" name="buscar" placeholder="Buscar">
                    <button type="submit" name="submit-buscar" href="search.php">Buscar </button>
                </form>

                <?php


                $dao_post = new DAOpost();
                $dao_user = new DAOUsuario();
                $res = $dao_post->show_all_data();


                while (!empty($res)) {
                    $curr_post = array_shift($res);
                    $post_id = $curr_post->get_id(); // id del post
                    $usuario = $dao_user->search_userId($post_id);
                    $categoria = $curr_post->get_category();
                    $title = $curr_post->get_title();

                    if ($usuario == null) {
                        $username = "Usuario borrado";
                    } else {
                        $username = $usuario->get_username();
                    }

                    echo "<table class=\"posts\">";
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>ID del post: " . $post_id . "</td>";
                    echo "<td>Usuario: " . $username . "</td>";
                    echo "<td>Título: " . "<a href=\"post.php?&id=" . $post_id . "\">" . $title . "</a></td>";
                    //echo "<td>Categoría: " . $categoria . "</td>";
                    echo "</tr>";
                    echo "</tbody>";
                    echo "</table>";
                }
                $dao_user->disconnect();
                ?>

            </div>
        </div>

        <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


    </div> <!-- Fin del contenedor -->

</body>