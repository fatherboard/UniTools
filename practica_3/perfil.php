<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once('dao/dao_user.php');
include_once('dao/dao_project.php');
include_once('dao/DAOestrellas.php');

$user = new TOUser();
$dao_usuario = new DAOUsuario();
$userData = $dao_usuario->search_username($_SESSION['username']);
$premium = $dao_usuario->search_premium($_SESSION['username']);

$username = $_SESSION['username'];
$premium = $userData->get_premium();
$id = $userData->get_id();
$email = $userData->get_email();
$name = $userData->get_name();
$aboutMe = $userData->get_aboutMe();
$password = $userData->get_password();

//Script actualizar email
if (isset($_POST['email'])) {
  if ($dao_usuario->update_email($_SESSION['username'], $_POST['email'])) {
    echo '<meta http-equiv="refresh" content="0">';
  } else {
    echo "Se ha producido un error";
  }
}

//Script actualizar nombre
if (isset($_POST['nombre'])) {
  if ($dao_usuario->update_name($_SESSION['username'], $_POST['nombre'])) {
    echo '<meta http-equiv="refresh" content="0">';
  } else {
    echo "Se ha producido un error";
  }
}

//Script actualizar aboutMe
if (isset($_POST['aboutMe'])) {
  if ($dao_usuario->update_aboutMe($_SESSION['username'], $_POST['aboutMe'])) {
    echo '<meta http-equiv="refresh" content="0">';
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
  <link rel="icon" type="image/png" href="img/icon/unitools16.png" sizes="16x16">
  <link rel="icon" type="image/png" href="img/icon/unitools32.png" sizes="32x32">

  <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
  <link rel="stylesheet" type="text/css" href="css/side_OG.css">
  <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
  <link rel="stylesheet" type="text/css" href="css/content_OG.css">
  <link rel="stylesheet" type="text/css" href="css/popup-prem.css">
  <script defer src="script/modal.js"></script>
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
              <button class="btn_mango btn" type="submit" name="submit">Subir foto</button>
            </form>
          </div>
        </div>

        <ul class="fb-col" id="perf_datos">
          <li class="field">
            <!-- user name -->
            <p id="p_username">Nombre de ususario: <?php echo $username ?> </p>
          </li>

          <li class="field">
            <!-- premium user -->
            <p>Usuario premium:
              <?php
              if ($premium)
                echo " Sí";
              else {
                echo " No... ¡Hazte premium hoy mismo! ";
              }
              ?> </p>
          </li>

          <li class="field">
            <!-- current email -->
            <p>E-mail: <?php echo $email ?></p>

            <form action="" method="post">
              Nuevo Email: <input type="text" name="email"><br>
              <input type="submit" class="btn_mango btn">
            </form>
          </li>

          <li class="field">
            <p>Nombre: <?php echo $name ?></p>
            <form action="" method="post">
              Nuevo Nombre: <input type="text" name="nombre"><br>
              <input type="submit" class="btn_mango btn">
            </form>
          </li>

          <li class="field">
            <p>Sobre Mi: <?php echo $aboutMe ?></p>
            <form action="" method="post">
              Nuevo Sobre mi: <input type="text" name="aboutMe"><br>
              <input type="submit" class="btn_mango btn">
            </form>
          </li>
        </ul>

        <button data-modal-target="#modal" id="btn-actualizar">Actualizar a premium</button>
        <div class="modal" id="modal">
          <div class="modal-header">
            <div class="title">Se premium y disfruta de sus ventajas</div>
            <button data-close-button class="close-button">&times;</button>
          </div>
          <div class="modal-body">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse quod alias ut illo doloremque eum ipsum obcaecati
            distinctio debitis reiciendis quae quia soluta totam doloribus quos nesciunt necessitatibus, consectetur quisquam
            accusamus ex, dolorum, dicta vel? Nostrum voluptatem totam, molestiae rem at ad autem dolor ex aperiam. Amet
            assumenda eos architecto, dolor placeat deserunt voluptatibus tenetur sint officiis perferendis atque! Voluptatem
            maxime eius eum dolorem dolor exercitationem quis iusto totam! Repudiandae nobis nesciunt sequi iure! Eligendi,
            eius libero. Ex, repellat sapiente!
          </div>
          <div class="modal-footer">
            <form action="" method="POST">
              <button type="submit" id="f" value="Actualizar" name="f">Actualizar</button>
            </form>

          </div>
        </div>
        <div id="overlay"></div>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['f'])) {
          $result = $dao_usuario->update_premium($_SESSION['username']);
          if (!$result) {
            echo "Se ha producido un error";
          } else {
            echo '<meta http-equiv="refresh" content="0">';
          }
        }
        ?>


        <?php

        $dao_project = new DAOproject();
        $dao_estrellas = new DAOestrellas();
        $dao_user = new DAOUsuario();
        $res = $dao_project->show_user_projects($id);
        ?>

        <table id="prs" class="round">
          <tr>
            <th>Titulo</th>
            <th>ID del Proyecto</th>

            <th>Lenguaje</th>
            <th>Candado</th>
            <th>Valoracion</th>
            <th>Privacidad</th>
          </tr>
          <?php
          while (!empty($res)) {
            $curr_proj = array_shift($res);
            $project_id = $curr_proj->get_id(); // id del proyecto
            $lenguaje = $curr_proj->get_lenguaje();
            $title = $curr_proj->get_titulo();
            $candado = $curr_proj->get_candado();
            $estrellas = $curr_proj->get_estrellas();
            $privado = $curr_proj->get_privado();

            $priv = "Repositorio publico";



            if ($privado == 1) {
              $priv = "Repositorio privado (Feature Premium)";
            }

            if ($candado == 0) {
              $candado = "LIBRE";
            } else {
              $candado = "EN EDICIÓN";
            } ?>
            <tr>
              <?php
              echo '<td id="prs_link"> <a href="project.php?id=' . $project_id . '">';
              ?>


              <?php echo $title      ?> </a></td>
              <td> <?php echo $project_id ?> </td>
              <td> <?php echo $lenguaje   ?> </td>
              <td> <?php echo $candado     ?> </td>
              
              <td> <?php echo $dao_estrellas->show_project_estrellas($project_id); ?> </td>
              <td> <?php echo $priv       ?></td>
            </tr>
          <?php
          } ?>
          </tbody>
        </table>
      </div>
      <?php $dao_user->disconnect(); ?>

    </div>
  </div>
  </div> <!-- Fin del contenido -->
  </div> <!-- Fin del contenedor -->
</body>