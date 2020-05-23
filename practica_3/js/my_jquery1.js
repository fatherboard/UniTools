$(document).ready(function() {

    $("#register").click(function(){
        if(validarFormulario()){
            alert("Formulario Correcto");
        }
    });


    function validarFormulario(){
        if($("#username").val() == ""){
            alert("El campo Usuario no puede estar vacio.");
            $("input").focus(function(){
                $("span").css("display", "inline");
            });
            return false;
        }
        if($("#nombre").val() == ""){
            alert("El campo Nombre no puede estar vacio.");
            $("#nombre").focus();
            return false;
        }
        if($("#email").val() == ""){
            alert("El campo Email no puede estar vacio.");
            $("#email").focus();
            return false;
        }
        if($("#password").val() == ""){
            alert("El campo Contraseña no puede estar vacio.");
            $("#pasword").focus();
            return false;
        }
        if($("#password2").val() == ""){
            alert("El campo Confirmar contraseña no puede estar vacio.");
            $("#password2").focus();
            return false;
        }






    }


});	    