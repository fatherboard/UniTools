<?php
if (!isset($_SESSION)) {
  session_start();
}

include_once('dao/dao_user.php');
?>

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="css/hoja.css">
  <link rel="stylesheet" type="text/css" href="css/premium-popup.css">
  <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
  <link rel="stylesheet" type="text/css" href="css/side_OG.css">
  <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
  <link rel="stylesheet" type="text/css" href="css/content_OG.css">
  <script defer src="script/popup.js"></script>
  <title>INDEX</title>
  <meta charset="UTF-8">
</head>

<body>
 <div class="contenedor">

<?php //class="side_menu"
require("includes/common/navegacion_OG.php");?>

<?php //class="cabecera"
require("includes/common/cabecera_OG.php");?>

<div class="contenido">
    <div class="fb-col" id="prs_g">
		<div class="nav_i nav_nuevo_pr">
    </div>
    </div>
      <?php

      $user = new TOUser();
      $dao_usuario = new DAOUsuario();
      $userData = $dao_usuario->search_username($_SESSION['username']);
      $premium = $dao_usuario->search_premium($_SESSION['username']);

      $username = $_SESSION['username'];
      $premium = $userData->get_premium();
      $email = $userData->get_email();
      $password = $userData->get_password();?>
      
      <body>

        <div class="per_columnaIzq">
          <div class="per_card">
            <div class="per_fotocard">
            <?php
            $filePath = "img/fotosPerfil/" . $_SESSION['username'] . ".jpg";
            if (file_exists($filePath)) {
              echo '<img id="per_foto" alt="foto_perfil" src="' . $filePath . '">';
            }
            else {
              echo '<img id="per_foto" alt="foto_perfil" src="img/Default_user_icon.jpg">';
            }

            
            
            ?>

              
            </div>
            <p id="p_username"><b> Nombre de ususario: <?php  echo $username ?> <br>
            
          </b></p>
          </div>
        </div>
        <div class="per_columnaDer">

          <!-- premium user -->
          <div class="per_card">
            Usuario premium:
            <?php
            echo $filePath;
            if ($premium)
              echo " Sí";
            else {
              echo " No... ¡Hazte premium hoy mismo! ";
            }
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
                    <button class="negativo" type="submit" > Cancelar</button>
                  </form>
              
                </div>
              </div>
            <?php
            } ?>

              <div id="overlay"></div>
          </div>

          <!-- current email -->
          <div class="per_card">
            E-mail: <?php echo $email ?>
            
            
            <br>
          </div> <br>

          <!-- current password -->
          <div class="per_card">
            Contraseña actual (encriptada): <?php echo $password ?>
          </div><br>

          <!-- upload profile picture -->
          <form action="uploadPhoto.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit">Subir foto</button>
          </form>

        </div>
    </div>

    <?php
    //muerte temporal del footer
    //require("includes/common/pie.php") ; 
    ?>


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
