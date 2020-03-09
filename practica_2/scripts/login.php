<?php

// TODO: Inicia la sesión

if (isset($_REQUEST['login_admin'])) 
{
    $_SESSION['usuario'] = 'admin';
}
else if (isset($_REQUEST['login'])) 
{
    $_SESSION['usuario'] = 'usuario';
}
else if (isset($_REQUEST['logout'])) 
{
    unset($_SESSION['usuario']);
    // TODO: Borra la sesión
}
else {
    // Mensaje de error y return
}

// TODO: Checkear contraseña
