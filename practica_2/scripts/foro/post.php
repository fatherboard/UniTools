<a class= "botonForo" href="index.php?page=nuevoPost">Nuevo Post</a>
<a class= "botonForo" href="index.php?page=temas">Elegir Tema</a>

<?php
	echo "<h1> titulo del post </h1>";
	echo "<h3> contenido del post </h3>";

	$foro_data = new TOUpost();
	$dao_post = new DAOpost();
	$dao_usuario = new DAOUsuario();

	$userData = $dao_usuario->search_username($_SESSION['username']);

	$columna = [
		"user" => $userData.get_name(),
		"title" => $_SESSION['username'],
		"content" => $_SESSION['contenido'],
		"categoria" => $_SESSION['category']
	];
	$foro_data->create_Post($columna);
	$data_post->insertPost($foro_data);

	$dao_usuario->disconnect();
	$dato_post->disconnect();
	$dao_post->disconnect();       
?>
