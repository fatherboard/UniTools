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
	require("../cabecera.php") ;
	require("../menu.php") ;
	?>

	<div id="contenido">
	<?php 
	//introducir aquí el texto de la página principal
	echo "<h1> Bienvenido a UniTools </h1>";
	echo "<p> Aquí podrás encontrar... </p>";
	?>
	</div>

	<?php 
	include("pie.php");
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>