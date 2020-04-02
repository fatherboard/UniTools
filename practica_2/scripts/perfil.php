<?php
    include_once('../dao/dao_user.php');
    $user = new TOUser();
    $dao_usuario = new DAOUsuario();
    ?>

<p> user id:" . <?php $_SESSION['user_id'] ?> . </p>;

<?php
$result = $dao_usuario->search_user($_SESSION['user_id']);

echo $_SESSION['user_id'];
echo "user mail" . $user_data->get_email();


/*
<div class="row">
    <div class="card">
        <img src="../UniTools/practica_2/img/Default_user_icon.jpg" alt="foto_perfil" style="width:100%" align="left">
        <div class="p_text">
            <h5><b> <?php $user_data->get_email() ?> </b></h5>
        </div>
    </div> 

    <div class="p_data">
        <p> sadflkjasdf </p>
        <p> dfadsaf </p>
    </div>
</div>
*/
?>