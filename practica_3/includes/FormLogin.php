<!DOCTYPE html>
<html>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

</html>


<?php

include_once('includes/Form.php');
require_once('dao/user_class.php');
require_once('dao/dao_user.php');

class FormLogin extends Form
{

	public function __construct()
	{
		parent::__construct('login');
	}

	protected function generaCampos()
	{
		$html  =
			'<fieldset class="fb-col contenido_log_reg" id="contenido_log">
			<h1>UNITOOLS</h1>

			<div>
			<input name="username" type="text" id="username" placeholder="Nombre de usuario" required="">
			</div>
			<div>
			<input name="password" type="password" id="password" placeholder="Contraseña" required="">
			</div>
			
			<div>
			<button type="submit" name="login id="submit">ENTRAR</button>
			</div>
		 </fieldset>';
		return $html;
	}

	protected function procesaFormulario($datos)
	{

		if (!isset($_SESSION)) {
			session_start();
		}

		$_SESSION['error_login'] = [];
		$username = isset($datos['username']) ? $datos['username'] : null;
		$password = isset($datos['password']) ? $datos['password'] : null;
		$user = new TOUser();
		$dao_usuario = new DAOUsuario();

		if (empty($username)) {
			$_SESSION['error_login'][] = "El nombre de usuario no puede estar vacío";
		}

		if (empty($password)) {
			$_SESSION['error_login'][] = "El password no puede estar vacío.";
		}
		$userData = $dao_usuario->search_username($username);

		if (count($_SESSION['error_login']) == 0) {

			if ($userData == null) {
				$_SESSION['error_login'][] = "Usuario y/o contraseña no son correctos.";
				return "login.php";
			} else {
				if ($userData instanceof TOUser) {
					$encrypted = $userData->get_password();
					if (password_verify($password, $encrypted)) {
						$_SESSION['login'] = '1';
						$_SESSION['username'] = $username;
						$_SESSION['admin'] = $userData->isAdmin();
						$_SESSION['premium'] = $userData->get_premium();
					
						return "perfil.php";
					}
					else {
						$_SESSION['error_login'][] = "Usuario y/o contraseña no son correctos";
						return "login.php";
					}
				} 
			}
		} else {
			return "login.php";
		}
	}
}

?>