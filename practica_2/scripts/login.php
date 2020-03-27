
           <form name="login" method="post" action = "../scripts/procesarLogin.php">

                <table><tr><td>
                    Username: </td> <td><input type ="text" name="username" required> </td></tr>
                    <tr><td>
                    Password: </td> <td><input type="password" name = "password" required></td></tr>
                </table>
                    <input type="submit" value = "Enviar">

                <?php
                  //  session_start();
                    if(isset($_SESSION['access_error'])){
                        if($_SESSION['access_error'] == '1'){
                            echo "\n";
                            echo " <h3> <font color = 'red'> Nombre/contraseña incorrectos, 
                            por favor inténtelo de nuevo.</font> </h3>";
                            $_SESSION['access_error'] = '0';
                        }
                    }

                ?>
                

                
                
            </form>
