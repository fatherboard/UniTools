

<div class = "cotenido">
    <a class= "botonForo" href="index.php?page=nuevoPost">Nuevo Post</a>
    <a class= "botonForo" href="index.php?page=temas">Elegir Tema</a>

    <?php
        echo "hola esto está en construcción";    
        include_once("../../dao/dao_user.php");
        include_once("../../dao/dao_post.php");
        $foro_data = new TOUpost();
        $dao_post = new DAOpost();
        $dao_user = new DAOUsuario();
        $res = $dao_post->show_all_data();
        
    
        while(!empty($res)){
            $curr_post = array_shift($res);
            $user_id = $curr_post->get_user(); // id del usuario que ha posteado
            $user_name = $dao_user->search_username($user_id);
            
            echo "<table class=\"posts\">";
	        echo "<tbody>";
		    echo "<tr>";
			echo "<td>ID del post: " . $curr_post->get_id() . "</td>";
			echo "<td>Usuario: " . $user_name . "</td>";
            echo "<td>Título: " . "<a href=\"../index.php?page=post\">" . $curr_post->get_title() . "</a></td>";
            //echo "<td>Respuestas: " .."</td>";
            echo "<td>Categoría: " .$curr_post->get_category(). "</td>";
		    echo "</tr>";
	        echo "</tbody>";
            echo "</table>";       
            
        } 
        $dao_user->disconnect();
        $dao_post->disconnect();
    ?>

</div>