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

			$dao_resp = new DAOrespuesta();
			$proj_data = new TOUproject();
			$dao_proj = new DAOproject();
			$dao_user = new DAOUsuario();
			$id = $_GET["id"];

			$curr_proj = $dao_proj->search_project($id);
			$proj_id = $curr_proj->get_id(); // id del project
			$usuario = $dao_user->search_userId($proj_id);
			$lenguaje = $curr_proj->get_lenguaje();
			$title = $curr_proj->get_title();
			$candado = $curr_proj->get_candado();
			$contenido = $curr_proj->get_content();

			$proj = $dao_proj->search_project($id); //id viene del get de contenido

			if ($usuario == null) {
				$username = "Usuario borrado";
			} else {
				$username = $usuario->get_username();
			}

			echo "<h1>" . $title . "</h1></br>";
			echo "<h3> LENGUAJE: " . $lenguaje . "</h3></br>";
			echo "<h3> CANDADO:  " . $candado . "</h3></br>";
			echo "<h3>" . $contenido . "</h3></br>"; 
			
			$dao_user->disconnect();

			echo "<button onclick=\"location.href='editar_proj.php?proj=" . $proj_id . "'\">Editar</button>"
			?>

		</div>

		<?php

		//muerte temporal del footer
		//require("includes/common/pie.php") ; 
		?>


	</div> <!-- Fin del contenedor -->

</body>
