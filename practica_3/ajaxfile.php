<?php
include "registro.php"; //Ncesario FormRegistro?
include "FormRegistro";

if(isset($_POST['username'])){
 
   if ($dao_usuario->search_username($username)) { //Verificar si el usuario ya está en la BBDD
      $response = "<span style='color: red;'>El usuario insertado ya existe.</span>";
  }      
    

   echo $response;
   die;
}
?>