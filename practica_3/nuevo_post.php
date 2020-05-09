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
  <title>INDEX</title>
  <meta charset="UTF-8">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap"
    rel="stylesheet">

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
          <div class="t1 fb-row">
            <h1>Nuevo Post</h1>
          </div>
          <div class = "b1">
          <?php
            if (isset($_SESSION['login'])) {
                if ($_SESSION['login']) {

                    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                        ?>
                        
                        <div id = "nuevopost">
                            <form action="" method="post">
                            <label for="titulo">Titulo: </label>
                            <textarea type="text" name="titulo" placeholder = "Escribe un título"></textarea>
                            <label for="titulo">Contenido: </label>
                            <textarea class="inputPost" name="contenido" placeholder = "Escribe un contenido"></textarea>
                
                            <input type="submit" id = "nuevoPost_btn" class = "fb-center"> </input>
                        </form>
                    </div>
                        
                        
                        <?php
                    } else {

                        //the form has been posted, so save it

                        $titulo = $_POST['titulo'];
                        $contenido = $_POST['contenido'];
                        //$categoria = $_POST['categoría'];
                        $categoria = 0; //de momento así poruqe todos los posts van a general


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