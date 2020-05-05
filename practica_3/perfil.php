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
  <script defer src="script/popup.js"></script>
  <title>INDEX</title>
  <meta charset="UTF-8">
</head>

<body>

  <div id="contenedor">

    <?php
        require("includes/common/cabecera.php");
        require("includes/common/navegacion.php");
        ?>

    <div id="contenido">
      <?php

            $user = new TOUser();
            $dao_usuario = new DAOUsuario();
            $userData = $dao_usuario->search_username($_SESSION['username']);
            $premium = $dao_usuario->search_premium($_SESSION['username']);
            
            $username = $_SESSION['username'];
            $premium = $userData->get_premium();
            $email = $userData->get_email();
            $password = $userData->get_password();

            ?>


      <body id="per">

        <div class="per_columnaIzq">
          <div class="per_card">
            <div class="per_fotocard">
              <img id="per_foto" alt="foto_perfil" src="/UniTools/practica_2/img/Default_user_icon.jpg">
            </div>
            <p id="p_username"><b> Nombre de ususario: <?php echo $username ?> </b></p>
          </div>
        </div>
        <div class="per_columnaDer">

          <!-- premium user -->
          <div class="per_card">
            Usuario premium:
            <?php
                        if ($premium)
                            echo " Sí";
                        else {
                            echo " No... ¡Hazte premium hoy mismo! ";
                        }
                        






                
                    if($premium == 0){
                    

            echo'<button data-modal-target="#modal" class="click-me">Actualizar a cuenta Premium </button>
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

              <div class=modal-footer>
                <form method="POST" action="">
                  <button class="click-me" type="submit" name="confirm_update" onclick="actualizar()"> Suscribir
                  </button>
                </form>

              </div>
            </div>


            <div id="overlay"></div>';
            
            }
           else{
                
                echo '<button data-modal-target = "#modal" class="click-me">Dejar de ser Premium </button>
                        <div class="modal" id="modal">
                             <div class="modal-header">
                                <div class="title"> ¿Seguro que quieres dejar de ser premium? <br></div>
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


                            <div class=modal-footer>   
                                <form method="POST" action="">
                                    <button class = "click-me"type="submit" name="confirm_update" onclick= "downgrade()"> Continuar </button>
                                </form>    
                                                    
                            </div>
                            <div  id="overlay"></div> 
                        </div>';
            }

?>
            
            <br>
          </div> <br>

          <!-- current email -->
          <div class="per_card">
            E-mail: <?php echo $email ?> <br>
          </div> <br>

          <!-- current password -->
          <div class="per_card">
            Contraseña actual (encriptada): <?php echo $password ?>
          </div><br>
          </form>
        </div>
    </div>

    <?php
        //muerte temporal del footer
        //require("includes/common/pie.php") ; 
        ?>


  </div> <!-- Fin del contenedor -->

</body>



<script>
            function actualizar() {
              
              <?php $dao_usuario -> update_premium($username); ?>
              self.close();
              opener.location.href("perfil.php");
            }
            </script>

            <script>
            function downgrade() {
              
              <?php $dao_usuario -> downgrade_premium($username); ?>
              self.close();
              opener.location.href("perfil.php");
            }
            </script>