
<?php

	include_once("dao/dao_post.php");       
    include_once("dao/dao_user.php");

	//echo $id;


	$foro_data = new TOUpost();
	$dao_post = new DAOpost();
	$dao_user = new DAOUsuario();


	$curr_post = $dao_post->search_post($id);
	$post_id = $curr_post->get_id(); // id del post
	$usuario = $dao_user->search_userId($post_id);
	$categoria = $curr_post->get_category();
	$title = $curr_post->get_title();
	$contenido = $curr_post->get_content();

	$post = $dao_post->search_post($id); //id viene del get de contenido

	if ($usuario == null) {
		$username = "Usuario borrado";
	}
	else {
		$username = $usuario->get_username();
	}

	echo "<h1>" . $title . "</h1></br>";
	echo "<h3>" . $contenido . "</h3></br>";

	$dao_user->disconnect();     
?>
