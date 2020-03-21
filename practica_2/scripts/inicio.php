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
                require("../estructura/cabecera.php");
                require("../estructura/menu.php");
            ?>

            <!-- Principio del contenido de inicio -->
            <div id="contenido">
                <?php 
                    session_start();
                    if(isset($_SESSION['access_success'])){
                        $try =  $_SESSION['access_success'];
                        echo "<h1> Bienvenido a UniTools $try</h1>";
                        echo "<p> Aquí podrás encontrar... </p>";
                        $_SESSION['access_success'] = NULL;
                    }
                    //introducir aquí el texto de la página principal
                   
                        
                    
                    else{
                        echo "<h1> Bienvenido a UniTools </h1>";
                        echo "<p> Aquí podrás encontrar... </p>";
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