<?php
if (!isset($_SESSION)) {
    session_start();

    include_once("dao/dao_post.php");
    include_once("dao/dao_user.php");
}



?>

<!DOCTYPE html>
<html>

<head>
        <title>INDEX</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200;0,500&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/side_OG.css">
    <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">
</head>

<body>
 <div class="contenedor">

<?php //class="side_menu"
require("includes/common/navegacion_OG.php");?>

<?php //class="cabecera"
require("includes/common/cabecera_OG.php");?>

<div class="contenido">

            <div class="fb-col box" id = "pg_s">
		    <div class="t1 fb-row" >
            <?php
            $dao_post = new DAOpost();
            $dao_user = new DAOUsuario();
            $search = $_POST['buscar'];
            $res = $dao_post->search_certain_post($search); 
            if (count($res) == '1') {
                echo "<h2>¡Se han encontrado " . count($res) . " resultado!</h2>";
            } else {
                echo "<h2>¡Se han encontrado " . count($res) . " resultados!</h2>";
            }?>
            </div>
            <div class = "b1" id = "resultados_style">


            <?php

            

            while (!empty($res)) {
                $curr_post = array_shift($res);
                $post_id = $curr_post->get_id(); // id del post
                $usuario = $dao_user->search_userId($curr_post->get_user());
                $categoria = $curr_post->get_category();
                $title = $curr_post->get_title();


                if ($usuario == null) {
                    $username = "Usuario borrado";
                } else {
                    $username = $usuario->get_username();
                }
                
                
               
                echo "<table id = 't02' style='width:100%' class=\"posts\">";
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

            
        </div>

    </div> <!-- Fin del contenedor -->

</body>
