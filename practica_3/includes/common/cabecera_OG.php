<nav class="cabecera">

<?php
    if(!isset($_SESSION["login"]) || !($_SESSION["login"])) 
    { ?>
    <div class="quote flex_c">
        ¡Ayudando a estudiantes desde 2020!
    </div>
    <ul class="nav_iconos">
        <li class="nav_login nav_i">
            <a href=login.php>
        <span>Login</span>
        </a>

        <li class="nav_reg nav_i">
            <a href=registro.php>
        <span>Registrarse</span>
        </a>
    </ul>

     <?php }
    else if ($_SESSION["login"]) 
    { ?>
    <div class="quote flex_c">
        Bienvenido <?php echo $_SESSION["username"]?>
    </div>

    <ul class="nav_iconos">
        <li class="nav_logout nav_i flex_c">
            <a href=logout.php>
        <span>Logout</span>
        </a>
    </ul>

    <?php 
    } ?>
</nav>
