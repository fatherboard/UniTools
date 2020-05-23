$(document).ready(function() {

    $("#okCorreo").hide(); 
    $("#email").change(function(){ 	
       // if ( correoValido($("#campoEmail").val() ) )	{	  		
 
        var correoNoValido = ($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1);
 
       if (correoNoValido) {               	
      		
            alert("Corre Invalido")
            $("#okCorreo").hide();
            $("#noCorreo").show();				
        
        } else {
            alert("Corre Valido")
            $("#okCorreo").show();
            $("#noCorreo").hide();					
        }	

    });
});	


   
