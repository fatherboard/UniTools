<h1>ya está</h1>

<?php

include_once('dao_user.php');

$columna = array(
		    "email" => "hola@yahoo.es",
		    "password" => "con1",
		    "user_name" => "paco",
		    "premium" => "1"
		);

$user = new TOUser($columna);
$dao_usuario = new DAOUsuario();
$dao_usuario->insert_User($user);
//echo $dao_usuario->search_user('6');

?>