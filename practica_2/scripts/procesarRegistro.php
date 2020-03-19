<?php
    session_start();
    /*
    Para evitar que se introduzca código en las entradas de username y password:

    htmlspecialchars -> convierte caracteres especiales "en texto"
    trim -> elimina espacios en blanco de la izquierda o derecha 
    strip_tags -> elimina tags de HTML, XML y PHP
    */
    $servername = "localhost";
    $username =  htmlspecialchars(trim(strip_tags($_REQUEST["username"])));
    $email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
    $nick = htmlspecialchars(trim(strip_tags($_REQUEST["nick"])));
    $rol = ($_REQUEST["rol"]);
    $Premium = ($_REQUEST["premium"]);

    
    $conn = mysqli_connect("localhost", "root", "root", "unitoolsdb");
    if( mysqli_connect_error ()){
        die ("Conexión con la base de datos fallida : " . mysqli_connect_error());
        
    }else{
         echo "Connected successfully";
    }
    
        

    $sql = "INSERT INTO user(id_User, email, password, Nick, Rol, Premium) VALUES ('$username', '$email', '$password', '$nick', '$rol', '$Premium')";
    if ($conn->query($sql) === TRUE) {
           echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  
   
    $conn->close();
        
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
                        echo"<p> Datos introducidos inválidos. </p>";
                    }
                    else{
                       // header("Location:inicio.php");
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