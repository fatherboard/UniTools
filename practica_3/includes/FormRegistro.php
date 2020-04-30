<?php

    include_once("includes/Form.php");
    include_once('dao/dao_user.php');

    class FormRegistro extends Form{
        
        public function __construct(){
            parent::__construct('register');
        }
        
        protected function generaCampos(){
            
            $html = '<fieldset>';
			$html .= '<div><label>Nombre de usuario:</label> <input class="control" type="text" name="username"/></div>';
			$html .= '<div><label>Nombre:</label> <input class="control" type="text" name="nombre" /></div>';
            $html .= '<div><label>Email:</label> <input class="control" type="text" name="email" /></div>';
			$html .= '<div><label>Password:</label> <input class="control" type="password" name="password" /></div>';
			$html .= '<div><label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="password2" /><br/></div>';
			$html .= '<button type="submit" name="register">Registrar</button>';
            $html .= '</fieldset>';
            return $html;
        }
        
        protected function procesaFormulario($datos){
            if(!isset($_SESSION)) { 
                session_start(); 
            } 

            
            $id_user = "";
            $username = htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
            $email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
            $password = $_REQUEST["password"];
            $password2 = $_REQUEST["password2"];
            $premium = 0;
            $_SESSION['error_registro'] = [];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  //Se comprueba si el formato del email es correcto, si no, error
                $_SESSION['error_registro'][] = "El email introducido no es válido";


            }

            if ($password != $password2) {  //Se comparan las contraseñas son iguales, si no, error
                $_SESSION['error_registro'][] = "Las contraseñas introducidas no coinciden";

            }
            /*
            if (!preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $password)) //Restricciones de formato de contraseña
            {
                $_SESSION['error_registro'][] = "La contraseñas no es válida";
            }
            */

            if (empty($username) ) {    //Si el campo de usuario está vacío, error
                $_SESSION['error_registro'][] = "El usuario no puede estar vacío";

            }

            if ( empty($password) || empty($password2)) {//Si el campo de contraseña está vacío, error
                $_SESSION['error_registro'][] = "La contraseñas no puede estar vacía";

            }

            $dao_usuario = new DAOUsuario();

            if ($dao_usuario->search_username($username)) { //Verificar si el usuario ya está en la BBDD
                $_SESSION['error_registro'][] = "El usuario insertado ya existe";

            }

            $encrypted = password_hash($password,PASSWORD_BCRYPT); //Creación del hash de la contraseña para su subida
            $user = new TOUser($id_user, $email, $encrypted, $username, $premium);


            if (count($_SESSION['error_registro']) == 0)  {
                if ($dao_usuario->insert_User($user)) { //Si la creación del usuario es exitosa se realiza el login
                    $_SESSION['login'] = '1';
                    $_SESSION['username'] = $username;

                    return "perfil.php";
                }

                else {  //En caso contrario, error
                    $_SESSION['error_registro'][] = "El registro no ha tenido éxito";
                    
                    return "registrar.php";
                }
            }

            else {  //En caso contrario vuelta a registro.php con los errores
                return "registrar.php";
            }

        }

}
    ?>