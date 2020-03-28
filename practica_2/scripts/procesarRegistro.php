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
    $password = htmlspecialchars(trim(strip_tags($_REQUEST["password"])));
    $nick = htmlspecialchars(trim(strip_tags($_REQUEST["nick"])));
    $rol = ($_REQUEST["rol"]);
    $Premium = ($_REQUEST["premium"]);
    
   require_once 'connectdb.php';

    $sql = "INSERT INTO user(id_User, email, password, Nick, Rol, Premium) VALUES ('$username', '$email', '$password', '$nick', '$rol', '$Premium')";
   if ($conn->query($sql) === TRUE) {
           echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }  
    header("Location:../estructura/index.php");
    
        
?>



        <!-- Principio de la estructura de la página (contenedor) -->
        <div id="contenedor">

            

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

           

        </div> <!-- Fin del contenedor -->
