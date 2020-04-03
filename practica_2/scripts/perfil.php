
<p> user name: <?php echo $_SESSION['username'] ?></p>

<?php
include_once('/xampp/htdocs/UniTools/practica_2/dao/dao_user.php');
$user = new TOUser();
$dao_usuario = new DAOUsuario();
$userData = $dao_usuario->search_username($_SESSION['username']);
?>

<div class="row">
    <div class="card">
        <img src="../UniTools/practica_2/img/Default_user_icon.jpg" alt="foto_perfil" style="width:100%" align="left">
        <div class="p_text">
            <h5><b> <?php echo $userData->get_username() ?> </b></h5>
        </div>
    </div> 

    <div class="p_data">
        <p> E-mail: <?php echo $userData->get_email()?> <br>
            Contraseña actual: <?php echo $userData->get_password()?> </p>
    </div>
</div>