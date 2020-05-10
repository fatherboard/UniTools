<?php

include_once('includes/Form.php');
require_once('dao/user_class.php');
require_once('dao/dao_user.php');

class FormLogin extends Form {

	public function __construct(){
		parent::__construct('login');
	}

	protected function generaCampos(){
		 $html  =
		'<div  class="contenido_log"">
		<fieldset>
			<legend>Usuario y contraseña</legend>
				<div>
				<label>Nombre de usuario:</label> <input type="text" name="username" style="margin-left: 50px;"/>
				</div>

				<div>
				<label>Password:</label> <input type="password" name="password" style="margin-left: 116px;"/>
				</div>
			<button type="submit" name="login">Entrar</button>
		 </fieldset>
		 </div>';
        return $html;
	}

	protected function procesaFormulario($datos){

	    if(!isset($_SESSION)) 
	    { 
	        session_start(); 
	    } 
	    
	    $_SESSION['error_login'] = [];
	    $username = isset($datos['username']) ? $datos['username'] : null;
	    $password = isset($datos['password']) ? $datos['password'] : null;
	    $user = new TOUser();
	    $dao_usuario = new DAOUsuario();

	    if (empty($username) ) {
	        $_SESSION['error_login'][] = "El nombre de usuario no puede estar vacío";
	    }

	    if (empty($password) ) {
	        $_SESSION['error_login'][] = "El password no puede estar vacío.";
	    }
	    $userData = $dao_usuario->search_username($username);

	    if (count($_SESSION['error_login']) == 0)  {

	        if ($userData == null) {
	            $_SESSION['error_login'][] = "Usuario y/o contraseña no son correctos.";
	            return "login.php";
	        }
	        else {
	            $encrypted = $userData->get_password();
	            if (password_verify($password, $encrypted)) {
	                $_SESSION['login'] = '1';
	                $_SESSION['username'] = $username;
	                if($userData->isAdmin()){
	                	$_SESSION['admin'] = '1';
	                }else{
	                	$_SESSION['admin'] = '0';	                	
	                }
	                return "perfil.php";
	            }
	            else {
	                $_SESSION['error_login'][] = "Usuario y/o contraseña no son correctos";
	                return "login.php";
	            }
	        } 
	    }

	    else {
	       return "login.php";
	    }
       
	}
}

?>
