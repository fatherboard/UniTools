
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

            <!-- Principio del contenido/funcionalidad de registro -->
            <div id="contenido">
                <form name="register" method="post" action = "procesarRegistro.php">
                    <table><tr><td>
                    Username: </td> <td><input type ="text" name="username" > </td></tr>
                    <tr><td>
                    email: </td> <td><input type ="text" name="email" > </td></tr>
                    <tr><td>
                    Password: </td> <td><input type="password" name = "password"></td></tr>
                    <tr><td> 
                    Nick: </td> <td><input type ="text" name="nick" > </td></tr>
                    <tr><td>
                    Rol: </td> <td><input type ="number" name="rol" > </td></tr>
                    <tr><td>
                    Premium: </td> <td><input type ="number"  name="premium" max = 1 min = 0> </td></tr>
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