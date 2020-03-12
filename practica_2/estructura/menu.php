<!-- Menu -->

<div class="navbar">
    <?php
            session_start();
            if(!isset($_SESSION["login"]) || !($_SESSION["login"])) 
            {
                echo"<div align='left|justify'>";
                echo"<a href='inicio.php'>Inicio</a>";
                echo"<a href='perfil.php'>Perfil</a>";
                echo"<a href='foro.php'>Foro</a>";
                echo"<a href='herramientas.php'>Herramientas</a>";
                echo"</div>";
            }
            else if ($_SESSION["login"])
            {
                echo"<div align='right|justify'>";
                echo"<a href='logout.php'>Logout</a>";
                echo"</div>";
            }

    ?>
</div>
