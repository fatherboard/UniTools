
<!--
    <p> user name: <?php //echo $_SESSION['username'] ?></p>
-->

<?php
include_once('/xampp/htdocs/UniTools/practica_2/dao/dao_user.php');
$user = new TOUser();
$dao_usuario = new DAOUsuario();
$userData = $dao_usuario->search_username($_SESSION['username']);

//inicialización de variables

$email = $password1 = $password2 = $premium = "";
$emailErr = $passwordErr = $premiumErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["email"])) {
        $emailErr = "Es necesario introducir un correo";
    } else {
        $email = test_input($_POST["email"]);

        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Introduzca un correo válio";
        }
    }

    if (empty($_POST["password1"]) || empty($_POST["password2"])) {
        $passwordErr = "Es necesario rellenar ambas contraseñas";
        } 
        else {
        $password1 = test_input($_POST["password1"]);
        $password2 = test_input($_POST["password2"]);

        // check if e-mail address is well-formed
        if ($password1 != $password2) {
            $passwordErr = "Las contraseñas no concident";
        }
    }


    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
?>


<body id="per">

<div class="per_columnaIzq">
    <div class= "per_card">
        <div class= "per_fotocard">
        <img id="per_foto" alt="foto_perfil" src="/UniTools/practica_2/img/Default_user_icon.jpg" >  
        </div>
    <p id="p_username"><b> Nombre de ususario: <?php echo $userData->get_username() ?> </b></p>
    </div>
</div>
<div class="per_columnaDer">
    
<!-- premium user -->
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
    <div class="per_card">
            Usuario premium: 
            <?php 
            if($userData->get_premium())
                echo " Sí, días restantes 29.";
            else{
                echo " No... ¡Hazte premium hoy mismo! ";
                echo "<input type='submit' value = 'Premium' name='premium'";
            }
            ?> <br>

    </div> <br>

    <!-- current email -->
    <div class="per_card">
            E-mail: <?php echo $userData->get_email()?> <br>
    </div> <br>

    <!-- new email -->
    <div class="per_card">        
        Actualizar correo:
        <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?> </span>
        <input type="submit" value = "Actualizar" name="ac_email" onclick=acEmail()>
    </div><br>

    <!-- current password -->
    <div class="per_card">
        Contraseña actual: <?php echo $userData->get_password()?> 
    </div><br>

    <!-- new password #1-->
    <div class="per_card">
        Nueva contraseña:
        <input type="password" name="password1">
        <span class="error">* </span>
    </div><br>

    <!-- new password #2-->
    <div class="per_card">
        Volver a introducir:
        <input type="password" name="password2" value="<?php echo $password2;?>">
        <span class="error">* <?php echo $passwordErr;?></span>
        <input type="submit" value = "Actualizar" name="ac_password"  onclick=acPassword()>
    </div>
</form>
</div>



<script>
function acEmail() {
    <?php echo $userData->set_email($email)?>
}

function acPassword() {
    <?php echo $userData->set_password($password2)?>
}
</script>