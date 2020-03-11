<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/hoja.css" />
	<meta charset="utf-8">
	<title>Inicio</title>
</head>

<body>

<div id="contenedor">

	<?php 
	require("../estructura/cabecera.php") ;
	require("../estructura/menu.php") ;
	?>

	<div id="contenido">
   <form name="login" method="post" action = "procesarLogin.php">
    <table><tr><td>
    Username: </td> <td><input type ="text" name="username" > </td></tr>
    <tr><td>
    Password: </td> <td><input type="password" name = "password"></td></tr>
    </table>
    <input type="submit" value = "Enviar">
    
    </form>
	</div>
    <?php 
	include("../estructura/pie.php");
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>

<?php
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