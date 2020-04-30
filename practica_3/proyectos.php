<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("dao/dao_user.php");
include_once("dao/dao_project.php");
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

	<h2>  Proyectos guardados </h2>
        <div id="contenido">
            <div class="contenido">
                <a class="botonForo" href="nuevo_project.php">Nuevo Proyecto</a>
                <form action="search.php" method="POST">
                    <!-- <input type="text" name="buscar" placeholder="Buscar">-->
                    <!-- <button type="submit" name="submit-buscar" href="search.php">Buscar </button> -->
                </form>

                <?php

                $dao_project = new DAOproject();
                $dao_user = new DAOUsuario();
                $res = $dao_project->show_all_data();

		while (!empty($res)) {
                    $curr_proj = array_shift($res);
		    $project_id = $curr_proj->get_id(); // id del proyecto
		    $usuario = $dao_user->search_userId($project_id);
		    $lenguaje = $curr_proj->get_lenguaje();
                    $title = $curr_proj->get_titulo();
		            $candado = $curr_proj->get_candado();
		            $estrellas = $curr_proj->get_estrellas();
		            $privado = $curr_proj->get_privado();
		            $priv = "Repositorio publico";
                    if ($usuario == null) {
                        $username = "Usuario borrado";
                    } else {
                        $username = $usuario->get_username();
                    }

		    if ($privado === true){
		    	$priv = "Repositorio privado (Feature Premium)";
		    }

                    echo "<table class=\"posts\">";
                    echo "<tbody>";
                    echo "<tr>";
                    echo "<td>ID del proyecto: " . $project_id . "</td>";
                    echo "<td>Usuario: " . $username . "</td>";
                    echo "<td>Nombre: " . "<a href=\"project.php?&id=" . $project_id . "\">" . $title . "</a></td>";
                    echo "<td>Lenguaje: " . $lenguaje . "</td>";
		            echo "<td>CANDADO: " . $candado . "</td>";
		            echo "<td>VALORACION: " . $estrellas . " estrellas </td>";
		            echo "<td>Privacidad: " . $priv . " </td>";
		            echo "<td>";
			    echo "</tr>";
		    //echo "<form method="get" action=".$file .">"
   		    ////echo "<button type="submit">Descargar</button>"
		    //echo "</form>"
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
