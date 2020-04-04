
<?php

	include_once("dao/dao_post.php");       
    include_once("dao/dao_user.php");

	echo "<h1> titulo del post </h1>";
	echo "<h3> contenido del post </h3>";
	echo $id;


	$foro_data = new TOUpost();
	$dao_post = new DAOpost();
	$dao_usuario = new DAOUsuario();

	$userData = $dao_usuario->search_username($_SESSION['username']);

	$columna = [
		"user" => $userData->get_username(),
		"title" => $_SESSION['title'],
		"content" => $_SESSION['contenido'],
		"categoria" => $_SESSION['category']
	];
	$foro_data->create_Post($columna);
	$data_post->insertPost($foro_data);

	$dao_usuario->disconnect();
	$dao_post->disconnect();
	$dao_post->disconnect();       
?>
