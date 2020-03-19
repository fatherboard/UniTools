<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../css/hoja.css">
    <title>INDEX</title>
    <meta charset="UTF-8">   
</head>

<body>

<div id="contenedor">

    <?php 
        require("cabecera.php") ;
	 	require("navegacion.php") ;
	?>

	<div id="contenido">
	<?php require("contenido.php");?>
	</div>



	<?php 
	 	require("pie.php") ;
	?>
	

</div> <!-- Fin del contenedor -->

</body>
