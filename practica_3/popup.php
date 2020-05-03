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

if (!isset($_SESSION)) {
    session_start();
}


 include_once('dao/dao_user.php');
 $user = new TOUser();
 $dao_usuario = new DAOUsuario();



if(isset($_POST['confirm_delete'])) {

  echo '<script type="text/javascript">self.close(); opener.location.href = "perfil.php";</script>';
}

if(isset($_POST['confirm_update'])){
    $nombre = $_SESSION['username'];
    echo "$nombre";
    $dao_usuario->update_premium($nombre);
    echo '<script type="text/javascript">self.close(); opener.location.href = "perfil.php";</script>';
}

?>

<form method="POST" action="popup.php">
    <button type="submit" name="confirm_update">SUSCRIBIR</button>
    <button type="submit" name="confirm_delete">CANCELAR</button>
</form>

<script type="text/javascript">

     
</script>

