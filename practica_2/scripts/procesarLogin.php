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
    $_SESSION['error_login'] = [];
    $username = isset($_POST['username']) ? $_POST['username'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
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
?>
