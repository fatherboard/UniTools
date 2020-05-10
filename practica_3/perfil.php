<?php

if (!isset($_SESSION)) {
  session_start();
}

include_once('dao/dao_user.php');

  $user = new TOUser();
  $dao_usuario = new DAOUsuario();
  $userData = $dao_usuario->search_username($_SESSION['username']);
  $premium = $dao_usuario->search_premium($_SESSION['username']);

  $username = $_SESSION['username'];
  $premium = $userData->get_premium();
  $email = $userData->get_email();
  $name = $userData->get_name();
  $aboutMe = $userData->get_aboutMe();
  $password = $userData->get_password(); 
  
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
            <p id="p_username">Nombre de ususario: <?php echo $username ?>  </p>
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
            ?>
            </p>
          </li>
          
          <li class="field">
            <!-- current email -->
            <p>E-mail: <?php echo $email ?></p>
          </li>

          <li class="field">
            Nombre: <?php echo $name ?>
          </li>

          <li class="field">
            Sobre Mi: <?php echo $aboutMe ?>
          </li>
        </ul>
    </div> <!-- Fin del contenido -->
  </div> <!-- Fin del contenedor -->
</body>


<?php
if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['hacersePremium'])) {
  $dao_usuario->update_premium($username);
  header('Location: perfil.php');
} else if ($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['quitarPremium'])) {
  $dao_usuario->downgrade_premium($username);
  header('Location: perfil.php');
}
?>

<?php
if ($premium == 0) {
?>

  <button data-modal-target="#modal" class="click-me">Actualizar a cuenta Premium </button>

  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title"> Pásate al premium <br></div>
      <button data-close-button class="close-buttonX"> &times;</button>
    </div>

    <div class="modal-body">
      1-Consigue repositorios privados. <br>
      2-Sin límite de tamaño de archivos. <br>
      3-Di adiós a la publicidad <br>
      4-Ocupa el lugar más alto de los rankings. <br>
      5-Utiliza los mensajes de la plataforma. <br>
      6-Recibe antes que nadie nuestras novedades. <br>
      7-Forma parte de la gran familia de Unitools. <br>
    </div>


    <form method="POST" action="perfil.php">
      <button class="click-me" type="submit" name="hacersePremium"> Suscribir
      </button>
    </form>
  </div>

<?php
} else {
?>
  <button data-modal-target="#modal" class="click-me">Cancelar Premium </button>
  <div class="modal">
    <div class="modal-header">
      <div class="title"> Cancelar cuenta premium <br></div>
      <button data-close-button class="close-buttonX"> &times;</button>
    </div>

    <div class="modal-body">
      ¿Estás seguro que quieres dejar de ser usuario premium? <br>
      Perderás todas las ventajas que ello conlleva.
    </div>

    <div class=modal-footer>
      <form method="POST" action="perfil.php">
        <button class="afirmativo" type="submit" name="quitarPremium"> Aceptar</button>
        <button class="negativo" type="submit"> Cancelar</button>
      </form>

    </div>
  </div>
<?php
} ?>
