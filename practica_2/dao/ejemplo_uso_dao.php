<h1>ya está</h1>

<?php

include_once('dao_user.php');

$columna = [
		    "email" => "prueba@yahoo.es",
		    "password" => "con1",
		    "user_name" => "Carlos",
		    "premium" => 0
			];

$user = new TOUser($columna["email"], $columna["password"],$columna["user_name"], $columna["premium"]);
$dao_usuario = new DAOUsuario();
//$dao_usuario->insert_User($user);
echo $dao_usuario->search_userId("4")->get_email();
?>