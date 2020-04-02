
<form name="register" method="post" action = "scripts/procesarRegistro.php">
    <table><tr><td>
    Usuario: </td> <td><input type ="text" name="username" placeholder='Username' required> </td></tr>
    <tr><td>
    Email: </td> <td><input type ="text" name="email" placeholder='correo' required> </td></tr>
    <tr><td>
    Contraseña: </td> <td><input type="password" name = "password" placeholder='contraseña' required></td></tr>
    <tr><td>
    Conf. Contraseña: </td> <td><input type="password" name = "password2" placeholder='contraseña' required></td></tr>
    </table>
    <input class="send-buttons" type="submit" value = "Enviar">
</form>

<?php
    //  session_start();
    if(isset($_SESSION['register_error'])){
        if($_SESSION['register_error'] == '1'){
            echo $_SESSION['reg_mess'];
            $_SESSION['register_error'] = '0';
        }
    }

?>   
    