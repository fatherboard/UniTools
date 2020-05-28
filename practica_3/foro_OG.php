<?php
if (!isset($_SESSION)) {
    session_start();
}

include_once("dao/dao_user.php");
include_once("dao/dao_post.php");
include_once("dao/dao_respuesta.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>INDEX</title>
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,100;0,200&display=swap" rel="stylesheet">

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
        <?php if(isset($_SESSION['login']) && $_SESSION['login']){ ?>
                    <div class="contenido">
                    <div class="fb-col box" id="prs_g">
        		    <div class="t1 fb-row" >
                    <h1>Foro</h1>
                    </div>
                    <div class = "b1">
                        <div class = "fb-row jc_space-between v-center" id = "posts">

                            <div class="btn btn_mango">
                                <a href="nuevo_post.php">Nuevo Post</a>
                            </div>
                
                            <form action="search.php" method="POST" id ="foro_barra_busqueda" class="fb-row" >
                                <input type="text" name="buscar" placeholder="Buscar en posts">

                                    <a class="btn btn_agua" type="submit" name="submit-buscar" href="search.php"> 
                                        <i class="btn btn_agua fas fa-search"></i>
                                    </a>               
                            </form>
                        </div>
                              
                        <?php
                        $dao_post = new DAOpost();
                        $dao_user = new DAOUsuario();
                        $res = $dao_post->show_all_data();
                        ?>

                        <?php
                        while (!empty($res)) {
                            $curr_post = array_shift($res);
                            $post_id = $curr_post->get_id(); // id del post
                            $usuario = $dao_user->search_userId($curr_post->get_user());
                            $categoria = $curr_post->get_category();
                            $title = $curr_post->get_title();

                            if ($usuario == null) {
                                $username = "Usuario borrado";
                            } else {
                                $username = $usuario->get_username();
                            }?>

                    <div class="box">
                        <div class="field fb-row">
                            <div class="fb-col" id="prs_foto">
                              <?php if ($usuario != null){
                                $filePath = "img/fotosPerfil/" . $username . ".jpg";
                                if (file_exists($filePath)) { ?>
                                  <img class="forumPic" alt="foto_foro" src=" <?php echo $filePath ?>">
                                <?php } else { ?>
                                    <img class="forumPic" alt="foto_foro" src="img/Default_user_icon.jpg">
                                <?php }
                                } ?>
                            </div>
                            <div class="fb-col" id="prs_cont">
                        	<?php echo "<td>" . "<a href=\"post.php?id=" . $post_id . "\">" . $title . "</a></td>";
                                  echo "<td>"  . $post_id ."</td>";
                                  echo '<div class=Fb-row">';
                                  echo "<td>" . $username   . "</td>";
                                  echo "<td>Categoría: " . $categoria . "</td>"; ?>
                            </div>
                        </div>
                    </div>
                       
        	      <?php } $dao_user->disconnect(); ?>

                    </div>
                </div>    
            </div> 
        </div> <!-- Fin de contenido -->
        <?php }else{
            echo "No puedes entrar aqui a menos que estes logueado";
            } ?>
</div> <!-- Fin del contenedor -->
</body>
</html>