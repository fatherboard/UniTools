
           <form name="login" method="post" action = "../scripts/procesarLogin.php">
                <?php
                  //  session_start();
                    if(isset($_SESSION['access_error'])){
                        $try =  $_SESSION['access_error'];
                        if($try == '1'){
                            echo "\n";
                            echo " <h3> <font color = 'red'> DATOS INTRODUCIDOS INCORRECTOS!! INTÉNTELO DE NUEVO.</font> </h3>";
                            $_SESSION['access_error'] = '0';
                        }
                    }

                ?>
                <table><tr><td>
                Username: </td> <td><input type ="text" name="username" required> </td></tr>
                <tr><td>
                Password: </td> <td><input type="password" name = "password" required></td></tr>
                </table>
                <input type="submit" value = "Enviar">

                
                
            </form>
