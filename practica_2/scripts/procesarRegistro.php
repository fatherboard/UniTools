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
    $servername = "localhost";
    $username =  htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
    $email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
    $password = $_REQUEST["password"];
    $password2 = $_REQUEST["password2"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $_SESSION['register_error'] = '1';
         $_SESSION['reg_mess'] = "El email introducido no es válido";
         header("Location:index.php?page=registrar");
    }

    else if ($password != $password2) {
        $_SESSION['register_error'] = '1';
        $_SESSION['reg_mess'] = "Las contraseñas introducidas no coinciden";
        header("Location:index.php?page=registrar");
    }

    else if (!preg_match('/^(?=[a-z])(?=[A-Z])[a-zA-Z]{8,}$/', $password))
    {
        $_SESSION['register_error'] = '1';
        $_SESSION['reg_mess'] = "La contraseñas no es válida";
        header("Location:index.php?page=registrar");
    }
    
    //VERIFICAR SI USUARIO ESTÁ YA EN LA BBDD

    
    require_once 'connectdb.php';

    // TODO PREMIUM
    $sql = "INSERT INTO user(email, password, Nick) VALUES ('$email', '$password', '$username')";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        $_SESSION['login'] = '1';
        $_SESSION['username'] = $username;
        header("location:../index.php");
         
     } 
     else {
        $_SESSION['register_error'] = '1';
        header("Location:../index.php");
     }         
?>
