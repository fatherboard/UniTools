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
    $_SESSION['access_success'];
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
        $_SESSION['access_success'] = $username;
        header("Location:inicio.php");
    } else {
        $_SESSION['access_error'] = '1';
        header("location: login.php");
    }
    
   

       
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/hoja.css" />
        <meta charset="utf-8">
        <title>Inicio</title>
    </head>

    <body>

        <!-- Principio de la estructura de la página (contenedor) -->
        <div id="contenedor">

            <?php 
                require("../estructura/cabecera.php") ;
                require("../estructura/menu.php") ;
            ?>

           <!-- Principio del contenido/funcionalidad de procesar login -->
            <div id="contenido">
                <?php
                    if(!isset($_SESSION["login"])) //wrong user
                    {
                        echo"<h1>¡Se ha producido un error!</h1>";
                        echo"<p> Por favor, revisa los datos introducidos e intentelo de nuevo. </p>";
                    }
                    else{
                        header("Location:inicio.php");
                    }
                ?>
            </div>
            <!-- Fin del contenido -->

            <?php 
                include("../estructura/pie.php");
            ?>

        </div> <!-- Fin del contenedor -->

    </body>
</html>