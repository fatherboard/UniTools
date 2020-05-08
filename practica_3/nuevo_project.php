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
            <?php
            if (isset($_SESSION['login'])) {
                if ($_SESSION['login']) {

                    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                        //Falta categoria ?>
                        <div class=" fb-col box align-items-center">
                            <form action="" method="post">
                                <div class= "t2">
                                    <h2> Creación de un nuevo proyecto</h2>
                                </div>

                                <div class="b2">
                                <p>Título: <input type="text" name="titulo" /></p>
                                <p>Contenido: <textarea class="inputPost" name="contenido" ></textarea></p>
                                <p>Lenguaje: <textarea class="inputPost" name="lenguaje"></textarea></p>
                                <p>Privado: <input type="checkbox" name="privado"/></p> 
                                <p>Archivo: <input type="file" name="archivo" value="archivo"/></p>
                                <p><input type="submit" value="Subir" /></p>
                                </div>
                            </form> 
                        </div><?php
                    } 
                    else {
                        //the form has been posted, so save it

                        $titulo = $_POST['titulo'];
                        $contenido = $_POST['contenido'];
			$lenguaje = $_POST['lenguaje'];
			$privado = $_POST['privado'];
			$candado = 0;
			$file = $_POST['archivo'];

                        $proj_data = new TOUproject();
                        $dao_proj = new DAOproject();
			$dao_user = new DAOUsuario();
			$user_id = $dao_user->search_username($_SESSION['username'])->get_id();
			$privado = 1;
			$new_proj = new TOUproject('',$user_id, $titulo, $contenido, $lenguaje, $privado,$candado,3,$file);
		        	
			if (!$dao_proj->insert_Project($new_proj)) {
                            echo "Error al insertar project";
                        } else {
			    $dao_user->disconnect();
                            header("location:proyectos.php");
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
