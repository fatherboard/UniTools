
<form name="register" method="post" action = "../scripts/procesarRegistro.php">
    <table><tr><td>
    Username: </td> <td><input type ="text" name="username" required> </td></tr>
    <tr><td>
    email: </td> <td><input type ="text" name="email" required> </td></tr>
    <tr><td>
    Password: </td> <td><input type="password" name = "password" required></td></tr>
    <tr><td> 
    Nick: </td> <td><input type ="text" name="nick" required> </td></tr>
    <tr><td>
    Rol: </td> <td><input type ="number" name="rol" required> </td></tr>
    <tr><td>
    Premium: </td> <td><input type ="number"  name="premium" max = 1 min = 0 required> </td></tr>
    </table>
    <input type="submit" value = "Enviar">
</form>

