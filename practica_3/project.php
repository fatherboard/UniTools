<?php
if (!isset($_SESSION)) {
	session_start();
}
include_once("dao/dao_project.php");
include_once("dao/dao_user.php");
include_once("dao/DAOpermissions.php");

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
			$proj_data = new TOUproject();
			$dao_proj = new DAOproject();
			$dao_user = new DAOUsuario();
			$id = $_GET["id"];
			$_SESSION['project'] = $id;
			$curr_proj = $dao_proj->search_project($id);
			$proj_id = $curr_proj->get_id(); // id del project
			$usuario = $dao_user->search_userId($curr_proj->get_user());
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

			if ($candado === true) {
				$candado = "ON";
			} else {
				$candado = "OFF";
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
							<th>ID</th>
						</tr>

						<tr>
							<td> <?php echo $title 	  ?></td>
							<td> <?php echo $username ?></td>
							<td> <?php echo $lenguaje ?></td>
							<td> <?php echo $candado  ?></td>
							<td> <?php echo $estrellas ?> estrellas </td>
							<td> <?php echo $id  ?></td>
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
						$dao_perm = new DAOpermissions();
						$res = $dao_perm->show_project_perm($id);
						while (!empty($res)) {
							$curr_perm = array_shift($res);
							$proj_id = $curr_perm->get_project(); // id del project
							$usuario = $dao_user->search_userId($curr_perm->get_user());
							$type = $curr_perm->get_type();

							if ($usuario == null) {
								$username = "Usuario borrado";
							} else {
								$username = $usuario->get_username();
							}

							if ($type == 0) {
								$permiso = "Creador";
							} else if ($type = 1) {
								$permiso = "Lectura";
							} else if ($type = 2) {
								$permiso = "Escritura";
							} else $permiso = "Sin permisos";


							echo "<tr>";
							echo "<td>" . $username . "</td>";
							echo "<td>" . $permiso . "</td>";
							echo "</tr>";
						}
						?>
					</table>

					<table>
						<tr>
							<th> Archivos Subidos</th>
						</tr>
						<tr>

							<?php

							if ($type == 0 || $type == 1 || $type = 2) {
								$dir_path = "proyectos/" . $id;

								if (is_dir($dir_path)) {
									$files = opendir($dir_path); {
										if ($files) {
											while (($file_name = readdir($files)) !== FALSE) {
												if ($file_name != '.' && $file_name != '..') {
													echo '<tr><td><a href="' . $dir_path . '/' . $file_name . '" download>' . $file_name . '</a></td>';
													if ($type == 0 || $type == 2) 
													echo '<td><a href="project.php?id=' . $id . '&delete=' . $file_name . '"> Borrar archivo</a></td></tr>';
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
					if ($type == 0 || $type == 2) {
						echo '<form action="uploadProject.php" method="POST" enctype="multipart/form-data">
						<input type="file" name="file">
						<button type="submit" name="submit">Subir archivo</button>
					</form>';
					}
					else echo "No tienes permisos para hacer cambios en los archivos";
					?>
					
					<?php
					$dao_user->disconnect(); ?>

				</div>
			</div>
		</div>
	</div> <!-- Fin del contenedor -->

</body>

<?php
if (isset($_GET['delete'])) {
	unlink("proyectos/" . $id . "/" . $_GET['delete']);
	header('Location: project.php?id=' . $id);
}
?>