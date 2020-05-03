<ul class="side_menu margin-x0 margin-y0 ">

    <a class="side_unitools d-flex justify-content-center align-items-center margin" href=index.php>
    <div class= "side_unitools_texto c-w">
        UniTools
    </div>
    </a>

    <hr class="side_divH">

    <li class="sideop">
        <a href=index.php>
        <i class="fas fa-house-user"></i>
        <span>Inicio</span>
        </a>
    </li>

    <?php
    if(!isset($_SESSION["login"]) || !($_SESSION["login"])) 
    { ?>
        <div class="side_titulo">
            Comunidad
        </div>

        <li class="sideop">
            <a href=proyectos.php>
            <i class="fas fa-laptop-code"></i>
            <span>Proyectos</span>
            </a>
        </li>

        <li class="sideop">
            <a href=mensajes.php>
            <i class="fas fa-comment-dots"></i>
            <span>Mensajes</span>
            </a>
        </li>

      <?php 
    }
    else if ($_SESSION["login"]) 
    { ?>

        <li class="sideop">
            <a href=perfil.php> 
            <i class="fas fa-house-user"></i>
            <span>Mi Pefil</span>
            </a>
        </li>

        <hr class="side_divH">

        <div class="side_titulo">
            Comunidad
        </div>

        <li class="sideop">
            <a href=proyectos.php>
            <i class="fas fa-laptop-code"></i>
            <span>Proyectos</span>
            </a>
        </li>

        <li class="sideop">
            <a href=mensajes.php>
            <i class="fas fa-comment-dots"></i>
            <span>Mensajes</span>
            </a>
        </li>

        <li class="sideop">
            <a href=foro.php>
            <i class="far fa-window-restore"></i>
            <span>Foro</span>
            </a>
        </li>

        <li class="sideop">
            <a href=herramientas.php>
        <i class="fas fa-tools"></i>
            <span>Herramientas</span>
            </a>
        </li>

      <?php 
    } ?>

    <hr class="side_divH">

    <div class="side_titulo">
        Información
    </div>

    <li class="sideop">
        <a href=team.php>
        <i class="fas fa-user-astronaut"></i>
        <span>Nuestro Equipo</span>
        </a>
    </li>

</ul>