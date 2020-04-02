<?php 

if(isset($_GET["page"])) {

    if($_GET["page"] == "login") {
        require("scripts/login.php");
    }
    else if($_GET["page"] == "registrar") {
        require("scripts/registro.php");
    }
    else if($_GET["page"] == "procesarlogin") {
        require("scripts/procesarLogin.php");
    }
    else if($_GET["page"] == "logout") {
        require("scripts/logout.php");
    }
    else if($_GET["page"] == "admin") {

        if ((!isset($_SESSION["login"])) && (!isset($_SESSION["esAdmin"]))) {
            echo "<p>No puedes ver este contenido, tienes que estar loggeado y ser Administrador para visualizarlo.</p>";
        }

        if ((isset($_SESSION["login"])) && (!isset($_SESSION["esAdmin"]))) {
            echo "<p>No puedes ver este contenido, tienes ser Administrador para visualizarlo.</p>";
        }
        
        if (isset($_SESSION["esAdmin"]) && $_SESSION["esAdmin"] == true) {
            require("scripts/admin.php");
        }
    }
    else if ($_GET["page"] == "perfil"){
        if (!isset($_SESSION["login"])) {
            echo "<p>No tienes una sesión activa, loggeate para poder visualizar tu perfil.</p>";
        }
        
        if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
            require("scripts/perfil.php");
        }
    }
    else if ($_GET["page"] == "proyectos"){
        if (!isset($_SESSION["login"])) {
            echo "<p>No puedes ver este contenido, loggeate para poder visualizarlo.</p>";
        }
        
        if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
            require("scripts/proyectos.php");
        }
    }
    else if ($_GET["page"] == "foro") {
        require("scripts/foro/foro.php");
    }
    else if ($_GET["page"] == "mensajes"){
        if (!isset($_SESSION["login"])) {
            echo "<p>No puedes ver este contenido, loggeate para poder visualizarlo.</p>";
        }
        
        if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
            require("scripts/mensajes.php");
        }
    }
    else if ($_GET["page"] == "herramientas"){
        require("scripts/herramientas.php");
    }

    else if ($_GET["page"] == "post"){
        require("scripts/post.php");
    }
    else {
        http_response_code(404);
        require("scripts/404.php");
    }
}


else {
    echo "<h1>Página principal</h1>
    <p> Aquí está el contenido público, visible para todos los usuarios. </p>";
}
?>
