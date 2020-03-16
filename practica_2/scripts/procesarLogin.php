<?php
    session_start();
    /*
    Para evitar que se introduzca código en las entradas de username y password:

    htmlspecialchars -> convierte caracteres especiales "en texto"
    trim -> elimina espacios en blanco de la izquierda o derecha 
    strip_tags -> elimina tags de HTML, XML y PHP
    */
    $username = htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));

        if($username == "user" && $password == "u") 
        {
            $_SESSION["login"] = true;
            $_SESSION["nombre"] = "Usuario";
            $_SESSION["isAdmin"] = false;
            echo "bien";
        }

        else if($username == "admin" && $password == "a") 
        {
            $_SESSION["login"] = true;
            $_SESSION["nombre"] = "Admin";
            $_SESSION["isAdmin"] = true;
            echo "bien";
        }

        else{
            echo "mal";
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