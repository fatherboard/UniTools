

<div class = "cotenido">
    <a class= "botonForo" href="index.php?page=nuevoPost">Nuevo Post</a>
    <form action="index.php?page=search" method="POST">
    <input type = "text" name = "buscar" placeholder = "Buscar">
    <button type = "submit" name = "submit-buscar"  href = "index.php?page=search">Buscar </button>
    </form>

    <?php
  
        include_once("dao/dao_user.php");
        include_once("dao/dao_post.php");
        include_once("dao/dao_respuesta.php");
        

        $dao_respuesta = new DAOrespuesta();

        $dao_post = new DAOpost();
        $dao_user = new DAOUsuario();
        $res = $dao_post->show_all_data();
        
    
        while(!empty($res)){
            $curr_post = array_shift($res);
            $post_id = $curr_post->get_id(); // id del post
            $usuario = $dao_user->search_userId($post_id);
            $categoria = $curr_post->get_category();
            $title = $curr_post->get_title();
         
            if ($usuario == null) {
                $username = "Usuario borrado";
            }
            else {
                $username = $usuario->get_username();
            }
            
            echo "<table class=\"posts\">";
	        echo "<tbody>";
		    echo "<tr>";
			echo "<td>ID del post: " . $post_id . "</td>";
			echo "<td>Usuario: " . $username . "</td>";
            echo "<td>Título: " . "<a href=\"index.php?page=post&id=" . $post_id . "\">" . $title . "</a></td>";
            //echo "<td>Categoría: " . $categoria . "</td>";
		    echo "</tr>";
	        echo "</tbody>";
            echo "</table>"; 
            
        } 
        $dao_user->disconnect();
    ?>

</div>
