<?php
if (!isset($_SESSION)) {
	session_start();
}
include_once("dao/dao_project.php");
include_once("dao/dao_user.php");
include_once("dao/DAOpermissions.php");
include_once("dao/DAOestrellas.php");

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
	<link rel="stylesheet" type="text/css" href="css/estrellas.css">
</head>

<body>
	<div class="contenedor">

		<?php //class="side_menu"
		require("includes/common/navegacion_OG.php"); ?>

		<?php //class="cabecera"
		require("includes/common/cabecera_OG.php"); ?>

		<div class="contenido">
			<?php
			$proj_data = new TOUproject();
			$dao_proj = new DAOproject();
			$dao_user = new DAOUsuario();
			$dao_estrellas = new DAOestrellas();
			$id = $_GET["id"];
			$_SESSION['project'] = $id;

			$curr_proj = $dao_proj->search_project($id);
			$proj_id = $curr_proj->get_id(); // id del project
			$usuario = $dao_user->search_userId($curr_proj->get_user());
			$userId = $usuario->get_id();
			$dao_perm = new DAOpermissions();
			$userPerm = $dao_perm->show_permissions($proj_id, $userId);
			$userType = $userPerm->get_type();
			$lenguaje = $curr_proj->get_lenguaje();
			$title = $curr_proj->get_titulo();
			$estrellas = $curr_proj->get_estrellas();
			$contenido = $curr_proj->get_contenido();
			$candado = $curr_proj->get_candado();

			if ($usuario == null) {
				$username = "Usuario borrado";
			} else if ($usuario instanceof TOUser){
				$username = $usuario->get_username();
			}

			if ($candado == true) {
				$lock = "ON";
			} else {
				$lock = "OFF";
			}
			?>
			<div class="fb-col box">

				<div class="t1 fb-row">
					<h1>Proyecto</h1>
				</div>
				<div class="b1">
					<table>
						<tr>
							<?php //echo "<th>ID del Proyecto</th>"; 
							?>
							<th>Titulo</th>
							<th>Usuario</th>
							<th>Lenguaje</th>
							<th>Candado</th>
							<th>Valoracion</th>

						</tr>

						<tr>
							<td> <?php echo $title 	  ?></td>
							<td> <?php echo $username ?></td>
							<td> <?php echo $lenguaje ?></td>
							<td> <?php 
									if ($userType == 0 || $userType == 2) {
										echo "<form action=\"\" method=\"post\">";
										echo "<input type=\"submit\" name=\"updateCandado\" value=\"" . $lock . "\" />";
										echo "</form>";
									}
									?> </td>
							<td> <?php 
							
							if (!$dao_estrellas->inEstrellas($proj_id, $userId)) {
								echo '<form action="" method="post" id="valorar"></form>';
								echo '<div class="rating">';
								echo '<input type="hidden" name="user" form="valorar" value=' . $username . ' />';
								echo '<input type="radio" name="estrella" form="valorar" id="estrella1" value="5"><label for="estrella1"></label>';
								echo '<input type="radio" name="estrella" form="valorar" id="estrella2" value="4"><label for="estrella2"></label>';
								echo '<input type="radio" name="estrella" form="valorar" id="estrella3" value="3"><label for="estrella3"></label>';
								echo '<input type="radio" name="estrella" form="valorar" id="estrella4" value="2"><label for="estrella4"></label>';
								echo '<input type="radio" name="estrella" form="valorar" id="estrella5" value="1"><label for="estrella5"></label>';
								echo '</div>';
								echo '<input type="submit" name="votar" form="valorar" value="Votar" />'; 
							}
							else {
								echo $dao_estrellas->show_project_estrellas($proj_id);
							}
							?> </td>
							
						</tr>
					</table>

					<table>
						<tr>
							<th> Contenido </th>
						</tr>
						<tr>
							<td> <?php echo $contenido ?> </td>
						</tr>
					</table>

					<table>

						<tr>
							<th>Usuario</th>
							<th>Permiso</th>
						</tr>
						<?php

						$res = $dao_perm->show_project_perm($id);

						while (!empty($res)) {
							$curr_perm = array_shift($res);
							$proj_id = $curr_perm->get_project(); // id del project
							$usuario = $dao_user->search_userId($curr_perm->get_user());
							$type = $curr_perm->get_type();

							if ($usuario == null) {
								$username = "Usuario borrado";
							} else if ($usuario instanceof TOUser){
								$username = $usuario->get_username();
							}

							if ($type == 0) {
								$permiso = "Creador";
							} else if ($type == 1) {
								$permiso = "Lectura";
							} else if ($type == 2) {
								$permiso = "Escritura";
							} else $permiso = "Sin permisos";


							echo "<tr>";
							echo "<td>" . $username . "</td>";
							echo "<td>" . $permiso;
							if ($userType == 0 && ($username != $_SESSION['username'])) {
								echo "<form action=\"\" onsubmit=\"return confirm('¿Estás segur@ de que quieres borrar el permiso de " . $username . "?');\" method=\"post\">";
								echo "<input type=\"hidden\" name=\"user\" value=\"" . $username . "\" />";
								echo "<input type=\"submit\" name=\"borrarPermiso\" value=\"Borrar Permiso\" />";
								echo "</form>";
							}
							echo "</td>";
							echo "</tr>";
						}
						?>
					</table>

					<form action="" method="POST" id="addPermiso"></form>

					<table>
						<tr>
							<th>Añadir Permiso</th>
							<th>Tipo</th>
						</tr>
						<tr>
							<td>
								Usuario: <input type="text" name="user" form="addPermiso" /> <br>


							</td>
							<td>
								<input type="radio" form="addPermiso" checked="checked" name="type" value="1"> Lectura <br>
								<input type="radio" form="addPermiso" name="type" value="2"> Escritura <br>

							</td>
							<td>
								<input type="submit" name="addPermiso" form="addPermiso" value="Añadir Permiso" />
							</td>
						</tr>
					</table>

					<table>
						<tr>
							<th> Archivos Subidos</th>
						</tr>
						<tr>

							<?php

							if ($userType == 0 || $userType == 1 || $userType == 2) {
								$dir_path = "proyectos/" . $id;

								if (is_dir($dir_path)) {
									$files = opendir($dir_path); {
										if ($files) {
											while (($file_name = readdir($files)) !== FALSE) {
												if ($file_name != '.' && $file_name != '..') {
													echo '<tr><td><a href="' . $dir_path . '/' . $file_name . '" download>' . $file_name . '</a></td>';
													if (($userType == 0 || $userType == 2) && $candado == 0)
														echo '<td><a href="project.php?id=' . $id . '&delete=' . $file_name . '" onClick="return confirm(\'¿Estás segur@ de que quieres borrar ' . $file_name . '?\');"> Borrar archivo</a></td></tr>';
												}
											}
										}
									}
								}
							}

							?>

						</tr>
					</table>

					<?php
					if (($userType == 0 || $userType == 2) && $candado == 0) {
						echo '<form action="uploadProject.php" method="POST" enctype="multipart/form-data">
						<input type="file" name="file">
						<button type="submit" name="submit">Subir archivo</button>
					</form>';
					} else echo "No puedes realizar cambios en los archivos en este momento";

					?>

					<?php
					$dao_user->disconnect(); ?>

				</div>
			</div>
		</div>
	</div> <!-- Fin del contenedor -->

</body>

<?php
if (isset($_GET['delete']) && ($userType == 0 || $userType == 2)) {
	unlink("proyectos/" . $id . "/" . $_GET['delete']);
	header('Location: project.php?id=' . $id);
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['borrarPermiso'])) {

	if ($userType == 0) {
		$id = $_GET["id"];
		$user = $_POST["user"];
		$dao_user_aux = new DAOUsuario();
		$userId = $dao_user_aux->search_username($user)->get_id();
		if (!$dao_perm->deletePermission($id, $userId)) {
			echo "No se ha podido borrar el permiso";
		} else {
			echo "Permiso borrado";
			echo '<meta http-equiv="refresh" content="0">';
		}
		$dao_user_aux->disconnect();
	}
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['updateCandado'])) {
	$dao_proj_aux = new DAOproject();
	$result = $dao_proj_aux->update_candado($id);
	if (!$result) echo "Se ha producido un error";
	else {
		echo '<meta http-equiv="refresh" content="0">';
	}
	$dao_proj_aux->disconnect();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['addPermiso'])) {
	$dao_perm_aux = new DAOpermissions();
	$dao_user_aux = new DAOUsuario();
	$username = $_POST["user"];
	$user = $dao_user_aux->search_username($username);
	if ($user) {
		$userId = $dao_user_aux->search_username($username)->get_id();
		$privilegio = $_POST["type"];
		$permiso = new TOPermissions('', $id, $userId, $privilegio);
		$result = $dao_perm_aux->insert_permission($permiso);
		if (!$result) echo "Se ha producido un error";
		else {
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	else {
		echo "No se ha podido encontrar el usuario";
	}


	$dao_proj_aux->disconnect();
}

if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['votar'])) {
	$dao_estrellas_aux = new DAOestrellas();
	$dao_user_aux = new DAOUsuario();
	$username = $_POST["user"];
	$user = $dao_user_aux->search_username($username);
	if ($user) {
		$userId = $dao_user_aux->search_username($username)->get_id();
		$rating = $_POST["estrella"];
		$estrellas = new TOEstrellas('', $id, $userId, $rating);
		$result = $dao_estrellas_aux->insert_estrellas($estrellas);
		if (!$result) echo "Se ha producido un error";
		else {
			echo '<meta http-equiv="refresh" content="0">';
		}
	}
	else {
		echo "No se ha podido encontrar el usuario";
	}


	$dao_estrellas_aux->disconnect();
}

?>
