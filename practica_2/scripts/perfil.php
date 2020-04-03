
<!--
    <p> user name: <?php //echo $_SESSION['username'] ?></p>
-->

<?php
include_once('/xampp/htdocs/UniTools/practica_2/dao/dao_user.php');
$user = new TOUser();
$dao_usuario = new DAOUsuario();
$userData = $dao_usuario->search_username($_SESSION['username']);
?>
<body id="per">

    <div class="per_columnaIzq">
        <div class= "per_card">
            <img id="per_foto" alt="foto_perfil" src="/UniTools/practica_2/img/Default_user_icon.jpg" >  
            <p id="p_username"><b> Nombre de ususario: <?php echo $userData->get_username() ?> </b></p>
        </div>
    </div>
    <div class="per_columnaDer">
        <div class="per_card">
                E-mail: <?php echo $userData->get_email()?> <br>
        </div> 
        <div class="per_card">
            Contraseña actual: <?php echo $userData->get_password()?> 
        </div>
    </div>
   
  