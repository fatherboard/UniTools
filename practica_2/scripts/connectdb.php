<?php
 $conn = mysqli_connect("localhost", "root", "", "unitoolsdb");
 if( mysqli_connect_error ()){
     die ("Conexión con la base de datos fallida : " . mysqli_connect_error());
 }
 
 else{
      echo "Conexión con la base de datos establecida.";
 }
?>