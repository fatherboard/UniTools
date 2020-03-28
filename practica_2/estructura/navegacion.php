
<div class="navbar">

    <div align='left|justify'>
    <a href="index.php?page=perfil">Perfil</a>
    <a href="index.php?page=proyectos">Proyectos</a>
    <a href="index.php?page=foro">Foro</a>
    <a href="index.php?page=mensajes">Mensajes</a>
    <a href="index.php?page=herramientas">Herramientas</a>
    </div>

    <?php
            
            if(!isset($_SESSION["login"]) || !($_SESSION["login"])) 
            {
                //echo"<div align='right|justify'>";
                echo"<a href=\"index.php?page=login\">Login</a>";
                echo"<a href=\"index.php?page=registrar\" >Registrar</a>";
                //echo"</div>";
            }
            else if ($_SESSION["login"])
            {
                echo"<div align='right|justify'>";
                echo"<a href=\"index.php?page=logout\" >Logout</a>";
                echo"<p> Bienvenido " . $_SESSION['username'] . "</p>";
                echo"</div>";
            }

    ?>

</div>
