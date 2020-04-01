<div class = "cotenido">
    <?php
        echo "hola esto está en construcción"
        /*$query = mysqli_query($conn, "SELECT * FROM forumposts ORDER BY id_post DESC");

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
		    echo "</tr>";
	        echo "</tbody>";
            echo "</table>";
            

        } 
        
        $conn->close();
        */
    ?>

</div>
