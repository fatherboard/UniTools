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
    $_SESSION['access_error'] = '0';
    $_SESSION['username'];
    $username = htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
    echo "$username " . " " . "$password";
    require_once 'connectdb.php';
    $query = mysqli_query($conn, "SELECT * FROM user WHERE Nick = '$username' AND password = '$password'");
    if(!$query){ 
        // echo "Usuario no existe " . $nombre . " " . $password. " o hubo un error " . 
        echo mysqli_error($conn);
        // si la consulta falla es bueno evitar que el código se siga ejecutando
        exit;
    } 
    //validamos los datos introducidos en el login
    if($user = mysqli_fetch_assoc($query)) {
        $conn->close();
        $_SESSION['login'] = '1';
        $_SESSION['username'] = $username;
        header("location:../estructura/index.php");
    } 
    else {
        $_SESSION['access_error'] = '1';
        header("location: ../estructura/index.php?page=login");
    }      
?>
