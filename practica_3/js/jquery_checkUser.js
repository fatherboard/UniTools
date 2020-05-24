$(document).ready(function(){

    $("#username").keyup(function(){
 
       var username = $(this).val().trim();
 
       if(username != ''){
 
          $.ajax({
             url: 'ajaxfile.php',
             type: 'post',
             data: {username: username},
             success: function(response){
 
                 $('#uname_response').html(response);
 
              }
          });
       }else{
          $("#uname_response").html("");
       }
 
     });
 
  });