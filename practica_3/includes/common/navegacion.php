
<div class="navbar">
    <?php
            if(!isset($_SESSION["login"]) || !($_SESSION["login"])) 
            {
                echo "<a href=\"index.php\">Inicio</a>";
                //TODO añadir página con perfiles de la práctica_1
                //echo "<a href=\"index.php?page=aboutus\">Sobre nosotros</a>";
                echo "<a href=\"foro.php\">Foro</a>";
                echo "<a href=\"herramientas.php\">Herramientas</a>";
                
                echo"<a href=\"login.php\">Login</a>";
                echo"<a href=\"registro.php\" >Registrar</a>";
                
            }
            else if ($_SESSION["login"])
            {
                echo "<a href=\"perfil.php\" >". $_SESSION["username"] . " </a>";
                echo "<a href=\"proyectos.php\">Proyectos</a>";
                echo "<a href=\"foro.php\">Foro</a>";
                echo "<a href=\"mensajes.php\">Mensajes</a>";
                echo "<a href=\"herramientas.php\">Herramientas</a>";

                //derecha
                echo"<a href=\"logout.php\" >Logout</a>";
                        }
    ?>
</div>
