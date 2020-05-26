$(document).ready(function() {
    $("#submit").click(function(){
        if($("#username").val() == ""){
            alert("El campo Usuario no puede estar vacio.");  
        } 
    });  

    $("#submit").click(function(){
        if(validarFormulario()){
            alert("Formulario Correcto");
        }
    });

    function validarFormulario(){
        if($("#username").val() == ""){
            alert("El campo Usuario no puede estar vacio.");           
            return false;
        }
        if($("#password").val() == ""){
            alert("El campo Contraseña no puede estar vacio.");           
            return false;
        }
    }
});	       