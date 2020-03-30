
<form name="register" method="post" action = "../scripts/procesarRegistro.php">
    <table><tr><td>
    Username: </td> <td><input type ="text" name="username" required> </td></tr>
    <tr><td>
    Email: </td> <td><input type ="text" name="email" required> </td></tr>
    <tr><td>
    Password: </td> <td><input type="password" name = "password" required></td></tr>
    </table>
    <input class="send-buttons" type="submit" value = "Enviar">
</form>

<?php
    //  session_start();
    if(isset($_SESSION['register_error'])){
        if($_SESSION['register_error'] == '1'){
            header("location: ../estructura/index.php?page=registro");
        }
    }

?>   