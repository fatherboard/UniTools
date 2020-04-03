<?php
    include_once('../dao/dao_user.php');

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
    $_SESSION['access_error'] = '0';
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $user = new TOUser();
    $dao_usuario = new DAOUsuario();

    if (empty($username) ) {
        //$erroresFormulario[] = "El nombre de usuario no puede estar vacío";
        echo "1";
    }

    if ( empty($password) ) {
        //$erroresFormulario[] = "El password no puede estar vacío.";
        echo "2";
    }
    $userData = $dao_usuario->search_username($username);

    if ($userData == null) {
        //$erroresFormulario[] = "Usuario y/o contraseña no son correctos.";
        echo "ha llegao";
    }
    else {
        if ($password == $userData->get_password()) {
            $_SESSION['login'] = '1';
            $_SESSION['username'] = $username;
            echo "siuuu";
            header("location:../index.php?page=perfil");
        }
        else {
            //$erroresFormulario[] = "Usuario y/o contraseña no son correctos";
            echo "aqui";
        }
    } 
    $dao_usuario->disconnect();
?>
