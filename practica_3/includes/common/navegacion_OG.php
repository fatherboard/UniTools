<div class="side_menu margin-0">
<?php
if(!isset($_SESSION["login"]) || !($_SESSION["login"]))
{ ?>
    <a class="side_unitools d-flex justify-content-center align-items-center margin" href=index.php>
    <div class= "side_unitools_texto c-w">
        Uni Tools
    </div>
    </a>

    <hr class="side_divH margin-0">

    <div class="side_Inicio">
    <a href=index.php>Inicio</a>
    </div>

    <div class="side_Foro">
    <a href=foro.php>Foro</a>
    </div>

    <div class="side_Herramientas">
    <a href=herramientas.php>Herramientas</a>
    </div>

    <div class="side_Nosotros">
    <a href=team.php>Nosotros</a>
    </div>

    <div class="side_Login">
    <a href=login.php>Login</a>
    </div>

    <div class="side_Registrar">
    <a href=registro.php>Registrar</a>
    </div>

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

</div>
