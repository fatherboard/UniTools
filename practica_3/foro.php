<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("dao/dao_user.php");
include_once("dao/dao_post.php");
include_once("dao/dao_respuesta.php");

$dao_post = new DAOpost();
$dao_user = new DAOUsuario();
$res = $dao_post->show_all_data();
?>

<!DOCTYPE html>
<html>

<head>
        <title>FORO</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="img/icon/unitools16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="img/icon/unitools32.png" sizes="32x32">

    <link rel="stylesheet" type="text/css" href="css/hoja_OG.css">
    <link rel="stylesheet" type="text/css" href="css/side_OG.css">
    <link rel="stylesheet" type="text/css" href="css/cabecera_OG.css">
    <link rel="stylesheet" type="text/css" href="css/content_OG.css">
</head>

<body>
 <div class="contenedor">

<?php //class="side_menu"
require("includes/common/navegacion_OG.php");?>

<?php //class="cabecera"
require("includes/common/cabecera_OG.php");?>

<div class="contenido">
    <?php if(isset($_SESSION['login']) && $_SESSION['login']){?>
            <div class="cotenido">
                <div class="fb-col box" id="prs_g">

                    <div class="t1 fb-row" >
                    <h1>Foro</h1>
                    </div>
                    <div class="b1" id="fr_box">
                        <div class = "fb-row jc_space-between v-center" id = "posts">

                            <div class="btn btn_mango">
                                <a href="nuevo_post.php">Nuevo Post</a>
                            </div>
                
                            <form action="search.php" method="POST" id ="foro_barra_busqueda" class="fb-row" >
                                <input type="text" name="buscar" placeholder="  Buscar en posts">

                                    <a class="btn btn_agua" type="submit" name="submit-buscar" href="search.php"> 
                                        <i class="btn btn_agua fas fa-search" id="fr_search"></i>
                                    </a>               
                            </form>
                        </div>
                            <div id="fb-col fr_b">

                                <?php /*while loop*/ 
                                    while (!empty($res)) {
                                    $curr_post = array_shift($res);
                                    $post_id = $curr_post->get_id(); // id del post
                                    $usuario = $dao_user->search_userId($curr_post->get_user());
                                    $categoria = $curr_post->get_category();
                                    $title = $curr_post->get_title();
                                    $contenido = $curr_post->get_content();
                                    if ($usuario == null) {
                                        $username = "Usuario borrado";
                                    } else if ($usuario instanceof TOUser){
                                        $username = $usuario->get_username();
                                } ?>

                                <div class="pad_0 fr_e">
                                    <?php echo "<a id='fr_link' href=\"post.php?id=" . $post_id . "\">"; ?>
                                    <div class="fb-row field gr_smokywhite leftBorder">
                                    
                                    <div class="fb-col justify-content-center text-center" id="fr_nombre_foto">
                                    <?php 
                                    /*foto perfil*/
                                    if ($usuario != null){

                                        $filePath = "img/fotosPerfil/" . $username . ".jpg";
                                        if (file_exists($filePath)) { ?>
                                        <td><img class="fr_pic" alt="foto_foro" src=" <?php echo $filePath ?>"></td>
                                        <?php } else { ?>
                                            <td><img class="fr_pic" alt="foto_foro" src="img/Default_user_icon.jpg"></td>
                                        <?php }
                                    } ?>
                                    
                                    <?php echo $username;?>
                                    <div>
                                    </div>
                                </div>
                                <div class ="fb-col" id="fr_txt">
                                <h1><?php echo $title; ?></h1>
                                <h2><?php echo $contenido; ?></h2>
                                </div>

                                </div>
                                </a>
                                </div>
                                <?php } /*end while*/?>
                                </div>
                            </div> <?php /* end fr_b*/ ?>
                        </div>

                        <?php
                        $dao_user->disconnect();
                        ?>
                    
                </div>
            </div>
    <?php }else{
    echo "No puedes entrar aqui a menos que estes logueado";
    } ?>
</div> <!-- Fin del contenedor -->
</div>

</body>
