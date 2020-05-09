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
	<link rel="stylesheet" type="text/css" href="css/forum.css">
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
			$usuario = $dao_user->search_userId($curr_post->get_user());
			$categoria = $curr_post->get_category();
			$title = $curr_post->get_title();
			$contenido = $curr_post->get_content();

			$post = $dao_post->search_post($id); //id viene del get de contenido

			if ($usuario == null) {
				$username = "Usuario borrado";
			} else {
				$username = $usuario->get_username();
			}

			 echo "<table id='t01' style='width:100%'>";
             echo "<tr>";
             //echo "<th>ID del Proyecto</th>";
             echo "<th>Titulo</th>";
             echo "<th>Usuario</th>";
             echo "<th>Contenido</th>";
             echo "</tr>";  
             echo "<tr>";
             echo "<td>". $title ."</td>";
             echo "<td>" . $username . "</td>";
			 echo "<td>". $contenido ."</td>";
			 echo "</tr>";  
			 echo "</table>";  
			 echo "<button onclick=\"location.href='respuesta.php?post=" . $post_id . "'\">Responder</button>";  
			 echo "<p></p>";
			
			$res = $dao_resp->show_all_answers($id);

			while (!empty($res)) {
				$curr_resp = array_shift($res);
				$resp_id = $curr_resp->get_id();
				$post_id = $curr_resp->get_post(); // id del post
				
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
				echo "<td>Usuario: " . $username . "</td>";
				echo "<td>" . $comentario . "</td>";
				echo "<td><a href=respuesta.php?post=" . $post_id . "&answer=" . $resp_id . ">Responder</a></td>";
				echo "</tr>";
				
				
				//echo "<td>Categoría: " . $categoria . "</td>";
				
				$nested = $dao_resp->show_nested_answers($id,$resp_id);

				while (!empty($nested)) {
					$nest_resp = array_shift($nested);
					$resp_id = $nest_resp->get_id();
					$post_id = $nest_resp->get_post(); // id del post
					$usuario = $dao_user->search_userId($nest_resp->get_user());
					$date = $nest_resp->get_date();
					$comentario = $nest_resp->get_content();

					if ($usuario == null) {
						$username = "Usuario borrado";
					} else {
						$username = $usuario->get_username();
					}

					echo "<td>ID: " . $resp_id . "</td>";
					echo "<td>Usuario: " . $username . "</td>";
					echo "<td>" . $comentario . "</td>";
					echo "</tr>";

				}

				echo "</tbody>";
				echo "</table>";
			}
			$dao_user->disconnect();


			//Botón de borrar visible para admins
			if (isset($_SESSION['admin']) && $_SESSION['admin']) {
				echo "<form action=\"post.php?id=" . $id . "\" method=\"post\">";
    			echo "<input type=\"submit\" name=\"borrarPost\" value=\"Borrar Post\" />";
				echo "</form>";
			}

			
			?>

			

		</div>

		<?php

		//muerte temporal del footer
		//require("includes/common/pie.php") ; 
		?>


	</div> <!-- Fin del contenedor -->

</body>

<?php
    if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['borrarPost']))
    {
		if ($_SESSION['admin']) {
			$id = $_GET["id"];
			$result = $dao_post->borrarPost($id);
			if (!$result) header('Location: foro.php');
			else {
				echo "Post borrado";
				echo "<a href=\"foro.php\">Volver al foro</a>";
			}
		}
		
    }
?>
