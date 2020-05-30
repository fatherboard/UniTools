<?php
if (!isset($_SESSION)) {
	session_start();
}

include_once("dao/dao_user.php");
include_once("dao/dao_project.php");
include_once("dao/DAOpermissions.php");
include_once("dao/DAOestrellas.php");


$dao_project = new DAOproject();
$dao_user = new DAOUsuario();
$dao_perm = new DAOpermissions();
$dao_estrellas = new DAOestrellas();
$res = $dao_project->show_all_data();
$userId = $dao_user->search_username($_SESSION['username'])->get_id();

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
				<div class="b1">
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
					/*
							<th>Titulo</th>
							<th>ID del Proyecto</th>
							<th>Usuario</th>
							<th>Lenguaje</th>
							<th>Valoracion</th>
							<th>Privacidad</th>
							<th>Accesible</th>
					*/
					?>


						<div class="fb-row jc_space-between" id=prs_bloque>

						<?php /*while para cada proyecto*/
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
								
								/*público*/
								$priv = "<i class='fas fa-user-friends'></i>";

								if ($usuario == null) {
									$username = "Usuario borrado";
								} else if ($usuario instanceof TOUser) {
									$username = $usuario->get_username();
								}

								if ($privado == 1) {
									/*privado*/
									$priv = "<i class='fas fa-user-lock'></i>";
								}
							}
																													?>
								<div class="fb-col " id=prs_elem>
									<div class="t1 gr_black fb-row jc_space-between">
										<div>
											<?php echo $priv?>
											<?php echo $title?>
										</div>
										<div id="prs_rat">
											<?php $rating = $dao_estrellas->show_project_estrellas($project_id);
											
											if ($rating == null) echo "0";
											else echo $rating;
											echo "/5";
											?>
											<i class="far fa-star"></i>
										</div>
									</div>
									<div class="b1 gr_smokywhite fb-row jc_space-between">
										<div class="fb-col" id="prs_fotoYnombre">
											<?php if ($usuario != null){
												$filePath = "img/fotosPerfil/" . $username . ".jpg";
												if (file_exists($filePath)) { ?>
												<img class="prs_pic" alt="foto_foro" src=" <?php echo $filePath ?>">
												<?php } else { ?>
												<img class="prs_pic" alt="foto_foro" src="img/Default_user_icon.jpg">
												<?php }
											}
											?>
												<div class="text-center"><?php echo $username ?></div>
										</div>
										<ul class="fb-col">
											<li>
												Repositorio: 
												<?php  if ($privado == 1) echo "Privado"; 
														else echo"Público" ?>
											</li>
											<li>
												Lenguaje: <?php echo $lenguaje ?>
											</li>
											
											<li>
												Accesible: 
												<?php  if ($accesible) echo "<i class='far fa-check-square'></i>"; 
														else echo"<i class='far fa-times-circle'></i>" ?>
											</li>
										</ul>
									</div>
								</div>
						<?php
						} /*end while*/?>
						</div>
				</div>
				<?php $dao_user->disconnect(); ?>

			</div>
		</div>

	</div> <!-- Fin del contenedor -->

</body>
