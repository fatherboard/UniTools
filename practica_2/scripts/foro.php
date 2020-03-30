
<div class="foro">

    <a href="index.php?page=perfil">Lista de Posts</a> 
    <a href="index.php?page=perfil">Crear Post</a>



</div>

<div class = "cotenido">
    <?php
        require_once 'connectdb.php';
        $sql = "INSERT INTO forumposts(id_post, user, content) VALUES ('yo', 'fer', 'con mi burrito sabanero voy camino de Belen')";
        $query = mysqli_query($conn, "SELECT * FROM forumposts");

        while($res = mysqli_fetch_array($query)){
            
            echo "<tr>";
            echo "<td>" . $res['id_post'] . "</td>";  
            echo "<td>" . $res['user'] . "</td>";
            echo "<td>" . $res['content'] . "</td>";
            echo "</tr>";
        }
    ?>


</div>
