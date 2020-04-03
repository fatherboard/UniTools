<?php
   
    /*
    Para evitar que se introduzca código en las entradas de username y password:

    htmlspecialchars -> convierte caracteres especiales "en texto"
    trim -> elimina espacios en blanco de la izquierda o derecha 
    strip_tags -> elimina tags de HTML, XML y PHP
    */
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    include_once('/xampp/htdocs/UniTools/practica_2/dao/dao_user.php');
    $username =  htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
    $email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
    $password = $_REQUEST["password"];
    $password2 = $_REQUEST["password2"];
    $premium = 0;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  //Se comprueba si el formato del email es correcto, si no, error
        $_SESSION['error_registro'][] = "El email introducido no es válido";
         //echo "1";
 
    }

    if ($password != $password2) {  //Se comparan las contraseñas son iguales, si no, error
        $_SESSION['error_registro'][] = "Las contraseñas introducidas no coinciden";
        //echo "2";
    }
    /*
    if (!preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $password)) //Restricciones de formato de contraseña
    {
        $_SESSION['error_registro'][] = "La contraseñas no es válida";
    }
    */

    if (empty($username) ) {    //Si el campo de usuario está vacío, error
        $_SESSION['error_registro'][] = "El usuario no puede estar vacío";
        //echo "3";
    }

    if ( empty($password) || empty($password2)) {//Si el campo de contraseña está vacío, error
        $_SESSION['error_registro'][] = "La contraseñas no puede estar vacía";
        //echo "4";
    }

    $dao_usuario = new DAOUsuario();

    if ($dao_usuario->search_username($username)) { //Verificar si el usuario ya está en la BBDD
        $_SESSION['error_registro'][] = "El usuario insertado ya existe";
        //echo "5";
    }

    $encrypted = password_hash($password,PASSWORD_BCRYPT); //Creación del hash de la contraseña para su subida
    $user = new TOUser($email, $encrypted, $username, $premium);
    

    if (count($_SESSION['error_registro']) == 0)  {
        if ($dao_usuario->insert_User($user)) { //Si la creación del usuario es exitosa se realiza el login
            $_SESSION['login'] = '1';
            $_SESSION['username'] = $username;
            //echo "6";
            header("location:../index.php");
        }
    
        else {  //En caso contrario, error
            $_SESSION['error_registro'][] = "El registro no ha tenido éxito";
            //echo "7";
        }
    }

    else {  //En caso contrario, error y vuelta a registro.php con los errores
        //echo "8";
        //echo count($_SESSION['error_registro']);
        header("location:../index.php?page=registrar");
    }
?>
