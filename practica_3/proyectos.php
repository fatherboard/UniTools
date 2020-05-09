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
	<div class="fb-col prs">
		<div class="nav_i nav_nuevo_pr">
				<a class="botonForo" href="nuevo_project.php">Nuevo Proyecto</a>
		</div>
		<div>
			<form action="search.php" method="POST">
						<!-- <input type="text" name="buscar" placeholder="Buscar">-->
						<!-- <button type="submit" name="submit-buscar" href="search.php">Buscar </button> -->
			</form>
		</div>
                <?php

                $dao_project = new DAOproject();
                $dao_user = new DAOUsuario();
                $res = $dao_project->show_all_data();
				?>

			 <table id='t01' style='width:100%'>
			 <tbody>
				<tr>
					<th>ID del Proyecto</th>
					<th>Titulo</th>
					<th>Usuario</th>
					<th>Lenguaje</th>
					<th>Candado</th>
					<th>Valoracion</th>
					<th>Privacidad</th>
				</tr> 
			</tbody>
		<?php
		while (!empty($res)) 
		{
			$curr_proj = array_shift($res);
			$project_id = $curr_proj->get_id(); // id del proyecto
			$usuario = $dao_user->search_userId($project_id);
			$lenguaje = $curr_proj->get_lenguaje();
			$title = $curr_proj->get_titulo();
			$candado = $curr_proj->get_candado();
			$estrellas = $curr_proj->get_estrellas();
			$privado = $curr_proj->get_privado();
			$priv = "Repositorio publico";

			if ($usuario == null) 
			{
				$username = "Usuario borrado";
			} 
			else 
			{
				$username = $usuario->get_username();
			}

		    if ($privado === true){
		    	$priv = "Repositorio privado (Feature Premium)";
		    }

		    if ($candado == 0){
		    	$candado = "LIBRE";
		    }
		    else {
		    	$candado = "EN EDICIÓN";
		    }?>
				<tbody class="content">
				 
				<tr>
					<td> <a href="project.php?&id= <?php echo $project_id ?> ">

						 <?php echo $title      ?> </a></td>
					<td> <?php echo $project_id ?> </td>
					<td> <?php echo $username 	?> </td>
					<td> <?php echo $lenguaje 	?> </td>
					<td> <?php echo$candado   	?> </td>
					<td> <?php echo$estrellas 	?> /5 estrellas </td>
					<td> <?php echo$priv 	  	?></td>
				</tr>
		<?php 
		}?>
				</tbody>
				</table>
			<?php $dao_user->disconnect(); ?>

            </div>
        </div>

    </div> <!-- Fin del contenedor -->

</body>
