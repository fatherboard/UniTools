<?php

include_once('Form.php');

class FormLogin extends Form {

	public function __construct(){
		parent::__construct('login');
	}

	protected function generaCampos($datosIniciales){

		$html  = 'Username: </td> <td><input type ="text" name="username" placeholder='Nombre usuario' required> </td></tr>';
        $html .= '<tr><td>';
        $html .= 'Password: </td> <td><input type="password" name = "password" placeholder='contraseña' required></td></tr>';
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
	            header("location:../index.php?page=login");
	        }
	        else {
	            $encrypted = $userData->get_password();

	            if (password_verify($password, $encrypted)) {
	                $_SESSION['login'] = '1';
	                $_SESSION['username'] = $username;
	                echo "siuuu";
	                header("location:../index.php?page=perfil");
	            }
	            else {
	                $_SESSION['error_login'][] = "Usuario y/o contraseña no son correctos";
	                header("location:../index.php?page=login");;
	            }
	        } 
	    }

	    else {
	        header("location:../index.php?page=login");
	    }
       
	}
}

?>