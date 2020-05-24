$(document).ready(function(){

    $("#username").keyup(function(){  //Campo de user
 
       var username = $(this).val().trim(); //Leer rl valor y asignarlo a la variable username
 
       if(username != ''){ //Ver si está vacio o no
 
          $.ajax({              // Si no está vacio enviar Ajax Post a ajaxfile.php
             url: 'ajaxfile.php',
             type: 'post',
             data: {username: username},    // Pasar el username como data
             success: function(response){
 
                 $('#uname_response').html(response); // si es correcto llamar a escribir Disponible
 
              }
          });
       }else{
          $("#uname_response").html(""); //Si está vacio vaciar el texto de respuesta
       }
 
     });
 
  });