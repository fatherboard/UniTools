<?php
include "registro.php"; //Ncesario FormRegistro?
include "FormRegistro";

if(isset($_POST['username'])){
   $username = $_POST['username'];

   //Check if $username existe en la tabla users

   $query = "select count(*) as cntUser from users where username='".$username."'";  
   $result = mysqli_query($con,$query);

   //Crear una variable &responsey assignarla "Disponible"

   $response = "<span style='color: green;'>Disponible.</span>";
   if(mysqli_num_rows($result)){
      $row = mysqli_fetch_array($result);

      $count = $row['cntUser'];
    
      if($count > 0){
          $response = "<span style='color: red;'>No Disponible.</span>";
      }   
   }

   echo $response;
   die;
}
?>