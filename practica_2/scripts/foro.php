<?php




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
                 //require("../estructura/menu.php") ;
            ?>

           <!-- Principio del contenido/funcionalidad de procesar login -->
           <div class="foro">

                <a href="index.php?page=perfil">Lista de Posts</a> 
                <a href="index.php?page=perfil">Crear Post</a>

   

            </div>

            <div class = "cotenido">
                <?php
                    require_once 'connectdb.php';
                    //la $sql no está funcionando ----> "Cannot add or update a child row: a foreign key constraint fails"  #putoForo.
                    $sql = "INSERT INTO forumposts (id_post, usuario, content) VALUES ('123', '456', 'ayer me pasé el pokemon mundo misterioso')";
                    if(mysqli_query($conn, $sql)){
                        echo "todo de loks";
                    }
                    else{
                        echo mysqli_error($conn);//te dice cual es el error
                    }
                    $query = mysqli_query($conn, "SELECT * FROM forumposts");

                    while($res = mysqli_fetch_array($query)){

                    ?>

                    <tr>
                        <td><?php echo $res['id_post'] ?></td>        
                        <td><?php echo $res['usuario'] ?></td> 
                        <td><?php echo $res['content'] ?></td>    
                    </tr>
                <?php
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