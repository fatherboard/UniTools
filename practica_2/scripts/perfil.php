
<!--
    <p> user name: <?php //echo $_SESSION['username'] ?></p>
-->

<?php
include_once('/xampp/htdocs/UniTools/practica_2/dao/dao_user.php');
$user = new TOUser();
$dao_usuario = new DAOUsuario();
$userData = $dao_usuario->search_username($_SESSION['username']);
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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

        <label for='email'> Actualizar correo: </label>
        <input type='text' name='email' />
        <input type="submit" value = "Actualizar" name="ac_email">
        </form>
    </div><br>

    <!-- current password -->
    <div class="per_card">
        Contraseña actual: <?php echo $userData->get_password()?> 
    </div><br>

    <!-- new password #1-->
    <div class="per_card">
        <label for='firstpw'> Nueva contraseña: </label>
        <input type='password' name='email' />
    </div><br>

    <!-- new password #2-->
    <div class="per_card">
        <label for='secondpw'> Volver a introducir: </label>
        <input type='password' name='email' />
        <input type="submit" value = "Actualizar" name="ac_password">
    </div>
</div>

  