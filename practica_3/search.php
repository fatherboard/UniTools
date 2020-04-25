<?php
if (!isset($_SESSION)) {
    session_start();

    include_once("dao/dao_post.php");
    include_once("dao/dao_user.php");
}

require("includes/common/cabecera.php");
require("includes/common/navegacion.php");

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

        <div id="contenido">
            <?php
            $dao_post = new DAOpost();
            $dao_user = new DAOUsuario();
            $search = $_POST['buscar'];
            $res = $dao_post->search_certain_post($search);
            if (count($res) == '1') {
                echo "<h2>Se han encontrado " . count($res) . " resultado!!</h2>";
            } else {
                echo "<h2>Se han encontrado " . count($res) . " resultados!!</h2>";
            }

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
                echo "<td>Título: " . "<a href=\"post.php?id=" . $post_id . "\">" . $title . "</a></td>";
                //echo "<td>Categoría: " . $categoria . "</td>";
                echo "</tr>";
                echo "</tbody>";
                echo "</table>";
            }


            ?>
        </div>

        <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


    </div> <!-- Fin del contenedor -->

</body>