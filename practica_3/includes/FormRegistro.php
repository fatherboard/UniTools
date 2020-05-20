
<html>
    <head>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#register").click(function(){
                    if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
                        alert("El correo electrónico introducido no es correcto.");
                        return false;
                    }

                    alert("El email introducido es correcto.");
                });
            });

        </script>
    </head>
</html>
<?php

    include_once("includes/Form.php");
    include_once('dao/dao_user.php');

    class FormRegistro extends Form{
        
        public function __construct(){
            parent::__construct('register');
        }
        
        protected function generaCampos(){
            
            $html = 
            '<fieldset  class="fb-col contenido_log_reg" id ="contenido_reg">
                <h1>ÚNETE A NOSOTROS</h1>
                <div>
                    <input name="username" type="text" placeholder="Nombre de usuario" />
                </div>
                <div>
                    <input name="nombre" type="text" placeholder="Nombre propio"/>
                </div>
                <div>
                    <input name="email" type="text" id="email" placeholder="Correo electrónico"/>
                </div>
                <div>
                    <input name="password" type="password" placeholder="Contraseña" />
                </div>
                <div>
                    <input  name="password2" type="password" placeholder="Reintroducir contraseña"/>
                </div>

                <div>
                    <button type="submit" name="register" id="register" >REGISTRARSE</button>
                </div>
            
            </fieldset>';
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
            $admin = 0;
            $nombre= htmlspecialchars(trim(strip_tags($_REQUEST["nombre"])));
            $aboutMe='';
            $_SESSION['error_registro'] = [];
            /*   
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  //Se comprueba si el formato del email es correcto, si no, error
                $_SESSION['error_registro'][] = "El email introducido no es válido";


            }
            */
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
            $user = new TOUser($id_user, $email, $encrypted, $username, $premium, $admin, $nombre);


            if (count($_SESSION['error_registro']) == 0)  {
                if ($dao_usuario->insert_User($user)) { //Si la creación del usuario es exitosa se realiza el login
                    $_SESSION['login'] = '1';
                    $_SESSION['username'] = $username;
                    $_SESSION['admin']= '0';
                    return "perfil.php";
                }

                else {  //En caso contrario, error
                    $_SESSION['error_registro'][] = "El registro no ha tenido éxito";
                    
                    return "registro.php";
                }
            }

            else {  //En caso contrario vuelta a registro.php con los errores
                return "registro.php";
            }

        }

}
    ?>
