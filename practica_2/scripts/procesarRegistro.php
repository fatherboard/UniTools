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
    $_SESSION['register_error'] = '0';
    $servername = "localhost";
    $username =  htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
    $email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
         $_SESSION['register_error'] = '1';
         header("Location:../estructura/index.php");
    }
    
    require_once 'connectdb.php';

    // TODO PREMIUM
    $sql = "INSERT INTO user(email, password, Nick) VALUES ('$email', '$password', '$username')";
    if ($conn->query($sql) === TRUE) {
        $conn->close();
        $_SESSION['login'] = '1';
        $_SESSION['username'] = $username;
        header("location:../estructura/index.php");
         
     } 
     else {
        $_SESSION['register_error'] = '1';
        header("Location:../estructura/index.php");
     }         
?>
