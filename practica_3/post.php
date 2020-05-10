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
		}?>

			<table id='t01' style='width:100%'>
				<tr>
					<?php /*echo "<th>ID del Proyecto</th>"; */?>
					<th>Foto de perfil</th>
					<th>Titulo</th>
					<th>Usuario</th>
					<th>Contenido</th>
				</tr>
				<tr>
					<?php
					if ($usuario != null){
						echo '<td><img class="forumPic" alt="foto_foro" src="img/fotosPerfil/' . $username . '.jpg"></td>';
						}
					?>
				
					<td> <?php echo $title	   ?> </td>
					<td> <?php echo $username  ?> </td>
					<td> <?php echo $contenido ?> </td>
				</tr>  
			</table> 
			<?php echo "<button onclick=\"location.href='respuesta.php?post=" . $post_id . "'\">Responder</button>";  
		
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
			if ($usuario != null){
				echo '<td><img class="forumPic" alt="foto_foro" src="img/fotosPerfil/' . $username . '.jpg"></td>';
				}
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

				if ($usuario != null){
					echo '<td><img class="forumPic" alt="foto_foro" src="img/fotosPerfil/' . $username . '.jpg"></td>';
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
		}?>

	</div>

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
