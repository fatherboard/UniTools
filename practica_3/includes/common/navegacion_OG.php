<ul class="side_menu margin-x0 margin-y0 ">
<?php
if(!isset($_SESSION["login"]) || !($_SESSION["login"]))
{ ?>
    <a class="side_unitools d-flex justify-content-center align-items-center margin" href=index.php>
    <div class= "side_unitools_texto c-w">
        UniTools
    </div>
    </a>

    <hr class="side_divH margin-x0 margin-y0">

    <li class="sideop">
        <a href=index.php>
        <i class="fas fa-house-user"></i>
        <span>Inicio</span>
        </a>
    </li>

    <hr class="side_divH">

    <div class="side_titulo">
        Comunidad
    </div>

    <li class="sideop">
        <a href=foro.php>
        <i class="fas fa-laptop-code"></i>
        <span>Foro</span>
        </a>
    </li>

    <li class="sideop">
        <a href=herramientas.php>
       <i class="far fa-window-restore"></i>
        <span>Herramientas</span>
        </a>
    </li>

    <hr class="side_divH">

    <div class="side_titulo">
        Información
    </div>

    <li class="sideop">
        <a href=team.php>
        <i class="fas fa-user-astronaut"></i>
        <span>Sobre UniTools</span>
        </a>
    </li>

    <?php /*
    <div class="side_Login">
    <a href=login.php>Login</a>
    </div>

    <div class="side_Registrar">
    <a href=registro.php>Registrar</a>
    </div>
    */?>
<?php }
else if ($_SESSION["login"])
{ ?>

    <div class="side_Inicio">
    <a href=index.php>Inicio</a>
    </div>

    <div class="side_Perfil">
    <a href=perfil.php>  . <?php $_SESSION["username"] ?> . </a>
    </div>

    <div class="side_Proyectos">
    <a href=proyectos.php>Proyectos</a>
    </div>

    <div class="side_Foro">
    <a href=foro.php>Foro</a>
    </div>

    <div class="side_Mensajes">
    <a href=mensajes.php>Mensajes</a>
    </div>

    <div class="side_Herramientas">
    <a href=herramientas.php>Herramientas</a>
    </div>

    <div class="side_Logout">
    <a href=logout.php>Logout</a>
    </div>

<?php } ?>

</ul>
