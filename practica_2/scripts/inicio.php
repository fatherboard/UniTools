<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/hoja.css" />
	<meta charset="utf-8">
	<title>Inicio</title>
</head>

<body>

<div id="contenedor">

	<?php require("../cabecera.php") ;

	 	require("../menu.php") ;
	?>

	<div id="contenido">
	<?php require("contenido.php");?>
	</div>
	

</div> <!-- Fin del contenedor -->

</body>
</html>