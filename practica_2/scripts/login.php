
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/hoja.css" />
        <meta charset="utf-8">
        <title>Registro</title>
    </head>

    <body>

        <!-- Principio de la estructura de la página (contenedor) -->
        <div id="contenedor">

            <?php 
                require("../estructura/cabecera.php");
                require("../estructura/menu.php");
            ?>

             <!-- Principio de la estructura de la página (contenedor) -->
 
       <!-- Principio del contenido/funcionalidad de login -->
        <div id="contenido">
           <form name="login" method="post" action = "../scripts/procesarLogin.php">
                <?php
                    session_start();
                    if(isset($_SESSION['access_error'])){
                        $try =  $_SESSION['access_error'];
                        if($try == '1'){
                            echo "\n";
                            echo " <h3> <font color = 'red'> DATOS INTRODUCIDOS INCORRECTOS!! INTÉNTELO DE NUEVO.</font> </h3>";
                            $_SESSION['access_error'] = '0';
                        }
                    }

                ?>
                <table><tr><td>
                Username: </td> <td><input type ="text" name="username" > </td></tr>
                <tr><td>
                Password: </td> <td><input type="password" name = "password"></td></tr>
                </table>
                <input type="submit" value = "Enviar">

                
                
            </form>
        </div>
        <!-- Fin del contenido -->

        <?php 
            include("../estructura/pie.php");
        ?>


        </div> <!-- Fin del contenedor -->
    </body>

