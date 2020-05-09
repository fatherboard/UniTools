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
        <title>INDEX</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap" rel="stylesheet">

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
            <div class="cotenido">
            <div class="fb-col box" id="prs_g">
		    <div class="t1 fb-row" >
            <h1>Foro</h1>
            </div>
            <div class = "b1">
                <div class = "posts">
                    <div class="nav_i " id="nav_nuevo_pr">
                    <a class="botonForo" href="nuevo_post.php">Nuevo Post</a>
                    
                    </div>
        
                    <form action="search.php" method="POST">
                        <input type="text" name="buscar" placeholder="Buscar en posts">
                        <button type="submit" name="submit-buscar" href="search.php">Buscar </button>
                    </form>
                </div>
           
                
                <?php


                $dao_post = new DAOpost();
                $dao_user = new DAOUsuario();
                $res = $dao_post->show_all_data();

	         echo "<table id='t01' style='width:100%'>";
	         echo "<tr>";
	         echo "<th>Título</th>";
		     echo "<th>ID del post</th>";
		     echo "<th>Usuario</th>";
		     echo "</tr>";	
	

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

		  echo "<tr>";
		  echo "<td>" . "<a href=\"post.php?id=" . $post_id . "\">" . $title . "</a></td>";
		  echo "<td>"  . $post_id ."</td>";
		  echo "<td>" . $username   . "</td>";
                  
		  echo "</tr>";
  
                    //echo "<td>Categoría: " . $categoria . "</td>";
                }
	       echo "</table>";
                $dao_user->disconnect();
                ?>

            </div>
        </div>


        </div>
    
    </div> <!-- Fin del contenedor -->

</body>
