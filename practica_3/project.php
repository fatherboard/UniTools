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
	<link rel="stylesheet" type="text/css" href="css/projs.css">
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
			$proj_data = new TOUproject();
			$dao_proj = new DAOproject();
			$dao_user = new DAOUsuario();
			$id = $_GET["id"];

			$curr_proj = $dao_proj->search_project($id);
			$proj_id = $curr_proj->get_id(); // id del project
			$usuario = $dao_user->search_userId($proj_id);
			$lenguaje = $curr_proj->get_lenguaje();
			$title = $curr_proj->get_titulo();
			$estrellas = $curr_proj->get_estrellas();
			$contenido = $curr_proj->get_contenido();
			$candado = $curr_proj->get_candado();

			if ($usuario == null) {
				$username = "Usuario borrado";
			} else {
				$username = $usuario->get_username();
			}
			
			if ($candado === true ){
				$candado = "ON";
			}
		    else {
				$candado = "OFF";
			}

             echo "<table id='t01' style='width:100%'>";
             echo "<tr>";
             //echo "<th>ID del Proyecto</th>";
             echo "<th>Titulo</th>";
             echo "<th>Usuario</th>";
             echo "<th>Lenguaje</th>";
             echo "<th>Candado</th>";
             echo "<th>Valoracion</th>";
             echo "</tr>";  
             echo "<tr>";
             echo "<td>". $title ."</td>";
			 echo "<td>". $username ."</td>";
			 echo "<td>". $lenguaje ."</td>";
			 echo "<td>". $candado ."</td>";
			 echo "<td>". $estrellas ." estrellas </td>";
			 echo "</tr>";  
             echo "</table>";    
             
             echo "<table id='t01' style='width:100%'>";
             echo "<tr>";
             echo "<th> CONTENIDO </th>";
			 echo "</tr>"; 
			 echo "<tr>";
			 echo "<td>" . $contenido . "</td>";
			 echo "</tr>";
             echo "</table>"; 
     
			$dao_user->disconnect();

			echo "<p></p><button onclick=\"location.href='editar_proj.php?proj=" . $proj_id . "'\">Editar</button>"
			?>

		</div>

		<?php

		//muerte temporal del footer
		//require("includes/common/pie.php") ; 
		?>


	</div> <!-- Fin del contenedor -->

</body>
