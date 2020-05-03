<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="css/premium-popup.css">
    <title>INDEX</title>
    <meta charset="UTF-8">
</head>
<body>
<h1>Pásate al premium!!</h1>


<div id="popup1" class="overlay">
	<div class="popup">
        <h2>suscríbete</h2>
        <h3>y consigue todas las ventajas de la cuenta premium </h3>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<!--de momento nada-->
		</div>
	</div>
</div>
</body>

<?php

if(isset($_POST['confirm_delete'])) {
   // query


   // at the end
   echo '<script type="text/javascript">self.close(); opener.location.href = "perfil.php";</script>';
}

?>

<form method="POST" action="popup.php">
    <button type="button" id="cancel_delete">SUSCRIBIR</button>
    <button type="submit" name="confirm_delete">CANCELAR</button>
</form>

