<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="../css/hoja.css" />
	<meta charset="utf-8">
	<title>Inicio</title>
</head>

<body>

<!-- Principio de la estructura de la página (contenedor) -->
<div id="contenedor">

	<?php 
	require("../estructura/cabecera.php");
	require("../estructura/menu.php");
	?>

	<!-- Principio del contenido/funcionalidad de admin -->
	<div id="contenido">
	<?php 
	    //introducir aquí la funcionalidad del admin
	?>
	</div>
	<!-- Fin del contenido -->

	<?php 
	include("../estructura/pie.php");
	?>

</div> <!-- Fin del contenedor -->

</body>
</html>