
<form action="" method="post">
 <p>Título: <input type="text" name="nombre" /></p>
 <p>Contenido: <input type="text" name="edad" /></p>
 <p>Categoría: <input type="text" name="edad" /></p>
 <p><input type="submit" /></p>
</form>

<?php

include_once("dao/dao_post.php");       
include_once("dao/dao_user.php");

//echo $id;


$foro_data = new TOUpost();
$dao_post = new DAOpost();
$dao_user = new DAOUsuario();




echo "<h1>" . $title . "</h1></br>";
echo "<h3>" . $contenido . "</h3></br>";

$dao_user->disconnect();     
?>
