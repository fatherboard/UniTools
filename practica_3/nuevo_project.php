<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("dao/dao_project.php");
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
            <p>Lenguaje: <textarea class="inputPost" name="lenguaje"></textarea></p>
	    <p>Privado: <checkbox class="inputPost" name="privado"></checkbox></p> 
            <p><input type="submit" /></p>
            </form>';
                    } else {
                        //the form has been posted, so save it

                        $titulo = $_POST['titulo'];
                        $contenido = $_POST['contenido'];
			$lenguaje = $_POST['lenguaje'];
			$privado = $_POST['privado'];

                        $proj_data = new TOUproject();
                        $dao_proj = new DAOproject();
                        $dao_user = new DAOUsuario();
			$user_id = $dao_user->search_username($_SESSION['username'])->get_id();
			// 3 estrellas por defecto
                        $new_proj = new TOUproject('', $user_id, $titulo, $contenido, $lenguaje, $privado,3);

                        if (!$dao_proj->insert_Project($new_proj)) {
                            echo "Error al insertar project";
                        } else {
                            $dao_user->disconnect();
                            header("location:proyects.php");
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

