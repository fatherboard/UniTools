<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once('dao/dao_user.php');
include_once('dao/dao_project.php');

$user = new TOUser();
$user_aux = new TOUser();
$dao_usuario = new DAOUsuario();


//Script actualizar email
if (isset($_POST['email'])) {
  if ($dao_usuario->update_email($_SESSION['username'], $_POST['email'])) {
    header("Refresh:0");
  } else {
    echo "Se ha producido un error";
  }
}

//Script actualizar nombre
if (isset($_POST['nombre'])) {
  if ($dao_usuario->update_name($_SESSION['username'], $_POST['nombre'])) {
    header("Refresh:0");
  } else {
    echo "Se ha producido un error";
  }
}

//Script actualizar aboutMe
if (isset($_POST['aboutMe'])) {
  if ($dao_usuario->update_aboutMe($_SESSION['username'], $_POST['aboutMe'])) {
    header("Refresh:0");
  } else {
    echo "Se ha producido un error";
  }
}




?>

<!DOCTYPE html>
<html>

<head>
  <title>INDEX</title>
  <meta charset="UTF-8">

  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200;0,500&display=swap" rel="stylesheet">

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
      <div class="fb-row jc_center" id="perf_info">
        <div class="fb-col" id="perf_pic">
          <div class="t2 text-center">
            <h2>Foto de perfil</h2>
          </div>
          <div class="b2 text-center">
            <?php
            $filePath = "img/fotosPerfil/" . $_SESSION['username'] . ".jpg";
            if (file_exists($filePath)) { ?>
              <img class="profilePic round-img" alt="foto_perfil" src=" <?php echo $filePath ?>">
            <?php } else { ?>
              <img class="profilePic round-img" alt="foto_perfil" src="img/Default_user_icon.jpg">
            <?php }
            ?>

            <!-- upload profile picture -->
            <form action="uploadPhoto.php" method="POST" enctype="multipart/form-data">
              <input type="file" name="file">
              <button type="submit" name="submit">Subir foto</button>
            </form>
          </div>
        </div>

        <ul class="fb-col" id="perf_datos">
          <li class="field">
            <!-- user name -->
            <p id="p_username">Nombre de ususario: <?php echo  $_SESSION['username']?> </p>
          </li>

          <li class="field">
            <!-- premium user -->
            <p>Usuario premium:
              <?php
              if ($user->get_premium())
                echo " Sí";
              else {
                echo " No... ¡Hazte premium hoy mismo! ";
              }
              ?> </p>
          </li>

          <li class="field">
            <!-- current email -->
            <p>E-mail: <?php 
            
            $user_aux = $dao_usuario->search_username($_SESSION['username']);
            echo $user_aux->get_email() ?></p>

            <form action="" method="post">
              Nuevo Email: <input type="text" name="email"><br>
              <input type="submit">
            </form>
          </li>

          <li class="field">
            <p>Nombre: <?php
            $user_aux = $dao_usuario->search_username($_SESSION['username']);
            echo $user_aux->get_name() ?></p>
            <form action="" method="post">
              Nuevo Nombre: <input type="text" name="nombre"><br>
              <input type="submit">
            </form>
          </li>

          <li class="field">
            <p>Sobre Mi: <?php 
            $user_aux = $dao_usuario->search_username($_SESSION['username']);
            echo $user_aux->get_aboutMe() ?></p>
            <form action="" method="post">
              Nuevo Sobre mi: <input type="text" name="aboutMe"><br>
              <input type="submit">
            </form>
          </li>
        </ul>

        <?php

                $dao_project = new DAOproject();
                $dao_user = new DAOUsuario();
                $res = $dao_project->show_user_projects($user->get_username());
        ?>
        
			 <table id="prs"  class="round">
				<tr>
					<th>Titulo</th>
					<th>ID del Proyecto</th>
					
					<th>Lenguaje</th>
					<th>Candado</th>
					<th>Valoracion</th>
					<th>Privacidad</th>
				</tr> 
		<?php
		while (!empty($res)) 
		{
			$curr_proj = array_shift($res);
			$project_id = $curr_proj->get_id(); // id del proyecto
			$lenguaje = $curr_proj->get_lenguaje();
			$title = $curr_proj->get_titulo();
			$candado = $curr_proj->get_candado();
			$estrellas = $curr_proj->get_estrellas();
			$privado = $curr_proj->get_privado();

			$priv = "Repositorio publico";

			

		    if ($privado == 1){
		    	$priv = "Repositorio privado (Feature Premium)";

		    }

		    if ($candado == 0){
		    	$candado = "LIBRE";
		    }
		    else {
		    	$candado = "EN EDICIÓN";
		    }?>
				<tr>
				<?php 
				echo '<td id="prs_link"> <a href="project.php?id=' . $project_id . '">';
				?>
					

						 <?php echo $title      ?> </a></td>
					<td> <?php echo $project_id ?> </td>
					<td> <?php echo $lenguaje 	?> </td>
					<td> <?php echo $candado   	?> </td>
					<td> <?php echo $estrellas 	?> /5 estrellas </td>
					<td> <?php echo $priv 	  	?></td>
				</tr>
		<?php 
		}?>
				</tbody>
				</table>
				</div>
			<?php $dao_user->disconnect();?>

            </div>
        </div>
      </div> <!-- Fin del contenido -->
    </div> <!-- Fin del contenedor -->
</body>