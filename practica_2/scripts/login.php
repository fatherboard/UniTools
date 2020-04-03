
<form name="login" method="post" action = "scripts/procesarLogin.php">

    <table><tr><td>
        Username: </td> <td><input type ="text" name="username" placeholder='Nombre usuario' required> </td></tr>
        <tr><td>
        Password: </td> <td><input type="password" name = "password" placeholder='contraseña' required></td></tr>
    </table>
        <input type="submit" value = "Enviar">

    <?php
       
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
   
       if(isset($_SESSION['error_login'])){
           if(count($_SESSION['error_login']) > 0) {
               echo '<ul class="errores">';
           }
       
           foreach($_SESSION['error_login'] as $error) {
               echo "<li>$error</li>";
           }
       
           if (count($_SESSION['error_login']) > 0) {
               echo '</ul>';
           }
           unset($_SESSION['error_login']);
       }
       

    ?>               
</form>
