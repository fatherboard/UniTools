


    <!-- Principio de la estructura de la página (contenedor) -->
 
       <!-- Principio del contenido/funcionalidad de login -->
        <div id="contenido">
           <form name="login" method="post" action = "../scripts/procesarLogin.php">
                <table><tr><td>
                Username: </td> <td><input type ="text" name="username" > </td></tr>
                <tr><td>
                Password: </td> <td><input type="password" name = "password"></td></tr>
                </table>
                <input type="submit" value = "Enviar">
                <?php
                //header("Location:procesarLogin.php");
                ?>
            </form>
        </div>
        <!-- Fin del contenido -->

        <?php 
            include("../estructura/pie.php");
        ?>
