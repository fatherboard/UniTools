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
            if (isset($_SESSION['login'])) {
                if ($_SESSION['login']) {

                    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                        //Falta categoria
                        echo '<form action="" method="post">
            <p>Título: <input type="text" name="titulo" /></p>
            <p>Contenido: <textarea class="inputPost" name="contenido" ></textarea></p>
            
            <p><input type="submit" /></p>
            </form>';
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

        <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


    </div> <!-- Fin del contenedor -->

</body>

