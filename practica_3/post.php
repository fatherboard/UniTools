<?php
if (!isset($_SESSION)) {
	session_start();
}
include_once("dao/dao_post.php");
include_once("dao/dao_respuesta.php");
include_once("dao/dao_user.php");

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
} else if ($usuario instanceof TOUser){
	$username = $usuario->get_username();
} 
$res = $dao_resp->show_all_answers($id);
?>

<!DOCTYPE html>
<html>

<head>
	<title>INDEX</title>
	<meta charset="UTF-8">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap" rel="stylesheet">
	<link rel="icon" type="image/png" href="img/icon/unitools16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/icon/unitools32.png" sizes="32x32">

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

			<div class="fb-col box">
				<div class="t1 fb-row" id="title_answ">
					<h1>Post</h1>

				</div>
				<!-- Ahora la celda de abajo -->
				<div class="b1">

					<div class="pad_0 pst_prin">
						<div class="fb-row field gr_smokywhite leftBorder">
						
							<div class="fb-col justify-content-center text-center" id="fr_nombre_foto">
								<?php 
								/*foto perfil*/
								if ($usuario != null){

									$filePath = "img/fotosPerfil/" . $username . ".jpg";
									if (file_exists($filePath)) { ?>
									<td><img class="fr_pic" alt="foto_foro" src=" <?php echo $filePath ?>"></td>
									<?php } else { ?>
										<td><img class="fr_pic" alt="foto_foro" src="img/Default_user_icon.jpg"></td>
									<?php }
								} ?>
							
								<?php echo $username;?>
							<div>
						</div>
					</div>
					<div class ="fb-col" id="fr_txt">
						<h1><?php echo $title; ?></h1>
						<h2><?php echo $contenido; ?></h2>
						<div class="btn btn_tomate">
							<?php echo "<a onclick=\"location.href='respuesta.php?post=" . $post_id . "'\">Responder</a>"; ?>
						</div>
					</div>
				</div>
			</div>
					

				<?php
				while (!empty($res)) {
					$curr_resp = array_shift($res);
					$resp_id = $curr_resp->get_id();
					$post_id = $curr_resp->get_post(); // id del post
					$usuarioResp = $dao_user->search_userId($curr_resp->get_user());
					$date = $curr_resp->get_date();
					$comentario = $curr_resp->get_content();

					if ($usuarioResp == null) {
						$username = "Usuario borrado";
					} else if ($usuarioResp instanceof TOUser){
						$username = $usuarioResp->get_username();
				 }?>
				
					<div class="pad_0 pst_first">
						<div class="fb-row field gr_smokywhite leftBorder">
							<div class="fb-col justify-content-center text-center" id="fr_nombre_foto">
								<?php 
								/*foto perfil*/
								if ($usuario != null){

									$filePath = "img/fotosPerfil/" . $username . ".jpg";
									if (file_exists($filePath)) { ?>
									<td><img class="fr_pic" alt="foto_foro" src=" <?php echo $filePath ?>"></td>
									<?php } else { ?>
										<td><img class="fr_pic" alt="foto_foro" src="img/Default_user_icon.jpg"></td>
									<?php }
								} ?>
							
								<?php echo $username;?>
							</div>

							<div class ="fb-col pst_txt">
								<?php echo $comentario ?>
								<div class="btn btn_tomate">
									<?php echo "<a  href=respuesta.php?post=" . $post_id . "&answer=" . $resp_id . ">Responder</a>"; ?>
								</div>
							</div>
						</div>
					</div>
					
					<?php 
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
							} else if ($objUsuario instanceof TOUser){
								$username = $objUsuario->get_username();
							} ?>
							
							<div class="pad_0 pst_rest">
								<div class="fb-row field gr_smokywhite leftBorder">
									<div class="fb-col justify-content-center text-center align-items-center" id="fr_nombre_foto">
										<?php 
										/*foto perfil*/
										if ($objUsuario != null){

											$filePath = "img/fotosPerfil/" . $username . ".jpg";
											if (file_exists($filePath)) { ?>
											<td><img class="fr_pic" alt="foto_foro" src=" <?php echo $filePath ?>"></td>
											<?php } else { ?>
												<td><img class="fr_pic" alt="foto_foro" src="img/Default_user_icon.jpg"></td>
											<?php }
										} ?>
										<?php echo $_SESSION['username'];?>
									</div>

								<div class ="fb-col pst_txt">
									<?php echo $comentario ?>
								</div>
									</div>
							</div>
						    <?php
						}
				}
				?>
			</div>

		</div>

		<?php
		//Botón de borrar visible para admins
		if (isset($_SESSION['admin']) && $_SESSION['admin']) {
			echo "<form action=\"post.php?id=" . $id . "\" method=\"post\">";
			echo "<input type=\"submit\" name=\"borrarPost\" value=\"Borrar Post\" />";
			echo "</form>";
		} $dao_user->disconnect();
		?>
		
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
