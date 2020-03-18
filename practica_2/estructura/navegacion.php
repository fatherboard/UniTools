<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<div class="navbar">


    <a href="index.php?page=perfil">Perfil</a>
    <a href="index.php?page=proyectos">Proyectos</a>
    <a href="index.php?page=foro">Foro</a>
    <a href="index.php?page=mensajes">Mensajes</a>
    <a href="index.php?page=herramientas">Herramientas</a>

    <?php
            
            if(!isset($_SESSION["login"]) || !($_SESSION["login"])) 
            {
                echo"<a class=\"aDerecha\" href=\"index.php?page=login\">Login</a>";
                echo"<a class=\"aDerecha\" href=\"index.php?page=registrar\">Registrar</a>";
                
            }
            else if ($_SESSION["login"])
            {
                echo"<p>Bienvenido</p>";
              
            }

    ?>

</div>   