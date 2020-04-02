<a class= "botonForo" href="index.php?page=nuevoPost">Nuevo Post</a>
    <a class= "botonForo" href="index.php?page=temas">Elegir Tema</a>

    <?php
        echo "<h1> titulo del post </h1>";
        echo "<h3> contenido del post </h3>";


         /*$query = mysqli_query($conn, "SELECT * FROM forumposts ORDER BY id_post DESC");
        while($res = mysqli_fetch_array($query)){
            
            $userQuery=$res['user'];
            $userById = mysqli_query($conn, "SELECT * FROM user WHERE id_user=$userQuery");  
            $resultUser = mysqli_fetch_array($userById);
            
            echo "<table class=\"posts\">";
	        echo "<tbody>";
		    echo "<tr>";
			echo "<td>usuario"</td>";
			echo "<td>comentario</td>";
		    echo "</tr>";
	        echo "</tbody>";
            echo "</table>";
            
        } 
        
        $conn->close();

        include o cuadro de texto in-situ para realizar un comentario directamente desde la pantalla del post

        echo "<textarea class=\"respuesta\" placeholder=\"comentario\"></textarea>;

        

        */

        
    ?>