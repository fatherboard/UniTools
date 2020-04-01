
<div class="foro">

    <a href="index.php?page=perfil">$res['title']</a> 

    <?php
    if (isset($_SESSION["login"]) && $_SESSION["login"] == true) {
        echo "<a href=\"../index.php?page=perfil\">Nuevo Post</a> ";
    }
    ?>
</div>

<div class = "cotenido">
    
    <h2>Publicar un post</h2>

    <form> 
    <label for="fname">Mensaje:</label><br>
    <input type="text" id="contenido" name="contenido" value="Hola!"><br>
    <input type="submit" value="Publicar">
    </form> 
    <p>Pulse en Publicar para incluir su mensaje en el Foro!</p>

    <?php
        require_once 'connectdb.php';
	
	$username  =  $_SESSION["username"];
	$contenido =  htmlspecialchars(trim(strip_tags($_REQUEST["content"])));

	$sql = "INSERT INTO forumposts(usuario, content) VALUES ('$username', '$contenido')";
	
	if(mysqli_query($conn, $sql)){
		echo "Post publicado.";
	}
	else{
		echo mysqli_error($conn);
	} 
        
        $conn->close();
    ?>


</div>
