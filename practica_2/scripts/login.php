


    <!-- Principio de la estructura de la página (contenedor) -->
 
       <!-- Principio del contenido/funcionalidad de login -->
        <div id="contenido">
           <form name="login" method="post" action = "procesarLogin.php">
                <table><tr><td>
                Username: </td> <td><input type ="text" name="username" > </td></tr>
                <tr><td>
                Password: </td> <td><input type="password" name = "password"></td></tr>
                </table>
                <input type="submit" value = "Enviar">
                <?php
                //header("Location:procesarLogin.php");
                ?>
            </form>
        </div>
        <!-- Fin del contenido -->

        <?php 
            include("../estructura/pie.php");
        ?>

  

  
/*
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
*/
?>