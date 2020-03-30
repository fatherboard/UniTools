
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

    ?>

    <tr>
        <td><?php echo $res['id_post'] ?></td>        
        <td><?php echo $res['user'] ?></td> 
        <td><?php echo $res['content'] ?></td>    
    </tr>
<?php
    }
?>

</div>
