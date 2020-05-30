<?php
if (!isset($_SESSION)) {
	session_start();
}

include_once("dao/dao_user.php");
include_once("dao/dao_project.php");
include_once("dao/DAOpermissions.php");
include_once("dao/DAOestrellas.php");
?>

<!DOCTYPE html>
<html>

<head>
	<title>INDEX</title>
	<meta charset="UTF-8">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

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
			<div class="fb-col box" id="prs_g">
				<div class="t1 fb-row">
					<h1>Proyectos</h1>
				</div>
				<div class="b1" id="prs_main">
					<div class="btn btn_mango">
						<a href="nuevo_project.php">Nuevo Proyecto</a>
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
					$dao_perm = new DAOpermissions();
					$dao_estrellas = new DAOestrellas();
					$res = $dao_project->show_all_data();
					?>

					<table id="prs" class="round">
						<tr>
							<th>Titulo</th>
							<th>ID del Proyecto</th>
							<th>Usuario</th>
							<th>Lenguaje</th>
							<th>Valoracion</th>
							<th>Privacidad</th>
							<th>Accesible</th>
						</tr>
						<?php
						$userId = $dao_user->search_username($_SESSION['username'])->get_id();
						while (!empty($res)) {
							$curr_proj = array_shift($res);

							//EL PROYECTO NO VA A APARECER SI NO SE ENCUENTRA LA CUENTA DEL CREADOR!
							if ($dao_user->search_userId($curr_proj->get_user())) {
								$project_id = $curr_proj->get_id(); // id del proyecto
								if ($dao_perm->inPermissions($project_id, $userId) || !$curr_proj->get_privado()) {
									$accesible = 1;
								} else $accesible = 0;
								$usuario = $dao_user->search_userId($curr_proj->get_user());
								$lenguaje = $curr_proj->get_lenguaje();
								$title = $curr_proj->get_titulo();
								$candado = $curr_proj->get_candado();
								$estrellas = $curr_proj->get_estrellas();
								$privado = $curr_proj->get_privado();

								$priv = "Repositorio publico";

								if ($usuario == null) {
									$username = "Usuario borrado";
								} else if ($usuario instanceof TOUser) {
									$username = $usuario->get_username();
								}

								if ($privado == 1) {
									$priv = "Repositorio privado";
								}


						?>
								<tr>
									<?php
									if ($accesible)
										echo '<td id="prs_link"> <a href="project.php?id=' . $project_id . '">';
									else echo '<td>';
									?>


									<?php echo $title      ?> </a></td>
									<td> <?php echo $project_id ?> </td>
									<td> <?php echo $username 	?> </td>
									<td> <?php echo $lenguaje 	?> </td>
									<td> <?php $rating = $dao_estrellas->show_project_estrellas($project_id);
											if ($rating == null) echo "0";
											else echo $rating ?>

									</td>
									<td> <?php echo $priv ?></td>
									<td> <?php if ($accesible) echo "Sí";
											else echo "No" ?> </td>
								</tr>
						<?php


							}
						} ?>
						</tbody>
					</table>
				</div>
				<?php $dao_user->disconnect(); ?>

			</div>
		</div>

	</div> <!-- Fin del contenedor -->

</body>
