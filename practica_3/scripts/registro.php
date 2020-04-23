<?php
    require_once('FormRegistro.php');

    $form = new FormRegistro();
    $html = $form->gestiona();

     if(!isset($_SESSION)) 
     { 
         session_start(); 
     } 


    if(isset($_SESSION['error_registro'])){
        if(count($_SESSION['error_registro']) > 0) {
            echo '<ul class="errores">';
        }
    
        foreach($_SESSION['error_registro'] as $error) {
            echo "<li>$error</li>";
        }
    
        if (count($_SESSION['error_registro']) > 0) {
            echo '</ul>';
        }
        unset($_SESSION['error_registro']);
    }
    

?>   
    