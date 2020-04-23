<?php


    require_once('FormLogin.php');

    $form = new FormLogin();
    $html = $form->gestiona();

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
