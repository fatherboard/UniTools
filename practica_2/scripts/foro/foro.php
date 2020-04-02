<div class = "cotenido">
    <a class= "botonForo" href="index.php?page=nuevoPost">Nuevo Post</a>
    <a class= "botonForo" href="index.php?page=temas">Elegir Tema</a>

    <?php
        echo "hola esto está en construcción"


        /*
        Analizar GET y hacer output de los posts de la categoría seleccionada
        Al entrar al foro entra con categoría general, al cambiar categoría se hace un doble GET
        con ?page=foro y ?categoría=categoríaElegida.
        
        $query = mysqli_query($conn, "SELECT * FROM forumposts ORDER BY id_post DESC");
        while($res = mysqli_fetch_array($query)){
            
            $userQuery=$res['user'];
            $userById = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$userQuery");  
            $resultUser = mysqli_fetch_array($userById);
            
            echo "<table class=\"posts\">";
	        echo "<tbody>";
		    echo "<tr>";
			echo "<td>ID del post: " . $res['id_post'] . "</td>";
			echo "<td>Usuario: " . $resultUser['Nick'] . "</td>";
            echo "<td>Título: " . "<a href=\"../index.php?page=post\">" . $res['title'] . "</a></td>";
            echo "<td>Respuestas: " . "</td>";
            echo "<td>Categoría: " . "</td>";
		    echo "</tr>";
	        echo "</tbody>";
            echo "</table>";
            
        } 
        
        $conn->close();
        */
    ?>

</div>