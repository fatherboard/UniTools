<?php
if (!isset($_SESSION)) {
	session_start();
}
include_once("dao/dao_post.php");
include_once("dao/dao_respuesta.php");
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

			//echo $id;

			$dao_resp = new DAOrespuesta();
			$foro_data = new TOUpost();
			$dao_post = new DAOpost();
			$dao_user = new DAOUsuario();
			$id = $_GET["id"];

			$curr_post = $dao_post->search_post($id);
			$post_id = $curr_post->get_id(); // id del post
			$usuario = $dao_user->search_userId($post_id);
			$categoria = $curr_post->get_category();
			$title = $curr_post->get_title();
			$contenido = $curr_post->get_content();

			$post = $dao_post->search_post($id); //id viene del get de contenido

			if ($usuario == null) {
				$username = "Usuario borrado";
			} else {
				$username = $usuario->get_username();
			}

			echo "<h1>" . $title . "</h1></br>";
			echo "<h3>" . $contenido . "</h3></br>";

			
			$res = $dao_resp->show_all_answers($id);

			while (!empty($res)) {
				$curr_resp = array_shift($res);
				$resp_id = $curr_resp->get_id();
				$post_id = $curr_resp->get_post(); // id del post
				$user = $curr_resp->get_user();
				$date = $curr_resp->get_date();
				$comentario = $curr_resp->get_content();

				if ($usuario == null) {
					$username = "Usuario borrado";
				} else {
					$username = $usuario->get_username();
				}

				echo "<table class=\"respuestas\">";
				echo "<tbody>";
				echo "<tr>";
				echo "<td>ID: " . $resp_id . "</td>";
				echo "<td>Usuario: " . $user . "</td>";
				echo "<td>" . $comentario . "</td>";
				//echo "<td>Categoría: " . $categoria . "</td>";
				echo "</tr>";
				echo "</tbody>";
				echo "</table>";
			}
			$dao_user->disconnect();

			echo "<button onclick=\"location.href='respuesta.php?post=" . $post_id . "'\">Responder</button>"
			?>

			

		</div>

		<?php

		//muerte temporal del footer
		//require("includes/common/pie.php") ; 
		?>


	</div> <!-- Fin del contenedor -->

</body>