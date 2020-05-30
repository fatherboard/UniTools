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
		require("includes/common/navegacion_OG.php"); ?>

		<?php //class="cabecera"
		require("includes/common/cabecera_OG.php"); ?>

		<div class="contenido">
			<?php
			//echo $id;

			$dao_resp = new DAOrespuesta();
			$foro_data = new TOUpost();
			$dao_post = new DAOpost();
			$dao_user = new DAOUsuario();
			$id = $_GET["id"];
			$_SESSION['curr_post'] = $id;

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
			} ?>

			<div class="fb-col box">
				<div class="t1 fb-row" id="title_answ">
					<h1>Post</h1>

				</div>
				<!-- Ahora la celda de abajo -->
				<div class="b1">
					<table>
						<tr>
							<div>
								<th>Foto de perfil</th>
							</div>
							<th>Titulo</th>
							<th>Nombre de usuario</th>

							<div>
								<th>Contenido
									<div class="btn btn_tomate">
										<?php echo "<a onclick=\"location.href='respuesta.php?post=" . $post_id . "'\">Responder</a>"; ?>
									</div>
								</th>
								<th>Categoría</th>
							</div>
						</tr>
				</div>

				<tr>
					<?php if ($usuario != null) { ?>
						<td>
							<img class="forumPic" alt="foto_foro" src="img/fotosPerfil/<?php echo $username ?>.jpg">
						</td>

					<?php } ?>

					<td> <?php echo $title	 ?> </td>
					<td> <?php echo $username  ?> </td>
					<td> <?php echo $contenido ?> </td>
					<td> <?php echo $categoria ?> </td>
				</tr>
				</table>

				<?php
				$res = $dao_resp->show_all_answers($id);
				while (!empty($res)) {
					$curr_resp = array_shift($res);
					$resp_id = $curr_resp->get_id();
					$post_id = $curr_resp->get_post(); // id del post
					$usuarioResp = $dao_user->search_userId($curr_resp->get_user());
					$date = $curr_resp->get_date();
					$comentario = $curr_resp->get_content();

					if ($usuarioResp == null) {
						$username = "Usuario borrado";
					} else {
						$username = $usuarioResp->get_username();
					}

					echo "
					<table>
					<tr>
					
						<th id='celda_imagen'>Foto de perfil</th>
						<div>
							<th id = 'celda_nombre'>Nombre de usuario</th>
						</div>

						<th>Contenido 
						<div class= 'btn btn_tomate'>
							<a  href=respuesta.php?post=" . $post_id . "&answer=" . $resp_id . ">Responder</a></th>
						</div>
					</tr>
					
					<tbody>
					<tr>";

					if ($usuario != null) {
						$filePath = "img/fotosPerfil/" . $username . ".jpg";
						if (file_exists($filePath)) { ?>
							<td><img class="forumPic" alt="foto_foro" src=" <?php echo $filePath ?>"></td>
						<?php } else { ?>
							<td><img class="forumPic" alt="foto_foro" src="img/Default_user_icon.jpg"></td>
						<?php }
					}

					echo "<td>Usuario: " . $username . "</td>
					      <td>" . $comentario . "</td>
						</tr>";


					//echo "<td>Categoría: " . $categoria . "</td>";

					$nested = $dao_resp->show_nested_answers($id, $resp_id);

					while (!empty($nested)) {
						$nest_resp = array_shift($nested);
						$resp_id = $nest_resp->get_id();
						$post_id = $nest_resp->get_post(); // id del post
						$objUsuario = $dao_user->search_userId($nest_resp->get_user());
						$date = $nest_resp->get_date();
						$comentario = $nest_resp->get_content();

						if ($objUsuario == null) {
							$username = "Usuario borrado";
						} else {
							$username = $objUsuario->get_username();
						}

						if ($objUsuario != null) {
							$filePath = "img/fotosPerfil/" . $username . ".jpg";
							if (file_exists($filePath)) { ?>
								<td><img class="forumPic" alt="foto_foro" src=" <?php echo $filePath ?>"></td>
							<?php } else { ?>
								<td><img class="forumPic" alt="foto_foro" src="img/Default_user_icon.jpg"></td>
							<?php }
						}

						echo "
							<td>Usuario: " . $_SESSION['username'] . "</td>
							<td>" . $comentario . "</td>
							</tr>";
					}

					echo "</tbody>
					</table>";
				}
				$dao_user->disconnect();


				?>
			</div>

		</div>

		<?php






		//Botón de borrar visible para admins
		if (isset($_SESSION['admin']) && $_SESSION['admin']) {
			echo "<form action=\"post.php?id=" . $id . "\" method=\"post\">";
			echo "<input type=\"submit\" name=\"borrarPost\" value=\"Borrar Post\" />";
			echo "</form>";
		} ?>

	</div>

	</div> <!-- Fin del contenedor -->

</body>

<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['borrarPost'])) {
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