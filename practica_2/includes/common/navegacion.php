
<div class="navbar">
    <?php
            if(!isset($_SESSION["login"]) || !($_SESSION["login"])) 
            {
                echo "<a href=\"index.php\">Inicio</a>";
                //TODO añadir página con perfiles de la práctica_1
                //echo "<a href=\"index.php?page=aboutus\">Sobre nosotros</a>";
                echo "<a href=\"index.php?page=foro\">Foro</a>";
                echo "<a href=\"index.php?page=herramientas\">Herramientas</a>";
                
                echo"<a href=\"index.php?page=login\">Login</a>";
                echo"<a href=\"index.php?page=registrar\" >Registrar</a>";
            }
            else if ($_SESSION["login"])
            {
                echo "<a href=\"index.php?page=perfil\" >". $_SESSION["username"] . " </a>";
                echo "<a href=\"index.php?page=proyectos\">Proyectos</a>";
                echo "<a href=\"index.php?page=foro\">Foro</a>";
                echo "<a href=\"index.php?page=mensajes\">Mensajes</a>";
                echo "<a href=\"index.php?page=herramientas\">Herramientas</a>";

                //derecha
                echo"<a href=\"index.php?page=logout\" >Logout</a>";
            }
    ?>
</div>
