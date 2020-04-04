
<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    //the form hasn't been posted yet, display it
    echo '<form action="" method="post">
    <p>Título: <input type="text" name="titulo" /></p>
    <p>Contenido: <textarea class="inputPost" name="contenido" ></textarea></p>
    <p>Categoría: <input type="text" name="categoria" /></p>
    <p><input type="submit" /></p>
    </form>';
}
else
{
    //the form has been posted, so save it
    include_once("dao/dao_post.php");       
    include_once("dao/dao_user.php");


    $titulo = $_POST['titulo'];
    $contenido = $_POST['contenido'];
    //$categoria = $_POST['categoría'];
    $categoria = 0;


    $foro_data = new TOUpost();
    $dao_post = new DAOpost();
    $dao_user = new DAOUsuario();
    $user_id = $dao_user->search_username($_SESSION['username'])->get_id();
    $new_post = new TOUPost('', $user_id, $titulo, $contenido, $categoria);

    if (!$dao_post->insert_Post($new_post)) {
        echo "Error al insertar post";
    }
    else {
        $dao_user->disconnect();
        header("location:index.php?page=foro");
    }
    
    $dao_user->disconnect(); 
}

    
?>
