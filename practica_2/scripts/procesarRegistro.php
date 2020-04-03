<?php
   
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
    /*
    Para evitar que se introduzca código en las entradas de username y password:

    htmlspecialchars -> convierte caracteres especiales "en texto"
    trim -> elimina espacios en blanco de la izquierda o derecha 
    strip_tags -> elimina tags de HTML, XML y PHP
    */
    include_once('/xampp/htdocs/UniTools/practica_2/dao/dao_user.php');
    $username =  htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
    $email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
    $password = $_REQUEST["password"];
    $password2 = $_REQUEST["password2"];
    $premium = 0;

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $_SESSION['register_error'] = '1';
         $_SESSION['reg_mess'] = "El email introducido no es válido";
         header("Location:index.php?page=registrar");
    }

    if ($password != $password2) {
        $_SESSION['register_error'] = '1';
        $_SESSION['reg_mess'] = "Las contraseñas introducidas no coinciden";
        header("Location:index.php?page=registrar");
    }
    /*
    if (!preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $password))
    {
        $_SESSION['register_error'] = '1';
        $_SESSION['reg_mess'] = "La contraseñas no es válida";
        header("Location:index.php?page=registrar");
    }
    */

    if (empty($username) ) {
        $_SESSION['register_error'] = '1';
        $_SESSION['reg_mess'] = "El usuario no puede estar vacío";
        header("Location:index.php?page=registrar");
    }

    if ( empty($password) || empty($password2)) {
        $_SESSION['register_error'] = '1';
        $_SESSION['reg_mess'] = "La contraseñas no puede estar vacía";
        header("Location:index.php?page=registrar");
    }
    
    //VERIFICAR SI USUARIO ESTÁ YA EN LA BBDD
    $encrypted = password_hash($password,PASSWORD_BCRYPT);
    $user = new TOUser($email, $encrypted, $username, $premium);
    $dao_usuario = new DAOUsuario();
    if ($dao_usuario->insert_User($user)) {
        $_SESSION['login'] = '1';
        $_SESSION['username'] = $username;
        header("location:../index.php");
    }

    else {
        $_SESSION['register_error'] = '1';
        $_SESSION['reg_mess'] = "El registro no ha tenido éxito";
        header("Location:index.php?page=registrar");
    }
    

?>
