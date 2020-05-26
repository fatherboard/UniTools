$(function() {

    $("#uname_error_message").hide();
    $("#sname_error_message").hide();
    $("#email_error_message").hide();
    $("#password_error_message").hide();
    $("#password2_error_message").hide();

    var error_uname = false;
    var error_sname = false;
    var error_email = false;
    var error_password = false;
    var error_password2 = false;

    $("#username").focusout(function(){
         check_uname();
    });
    $("#nombre").focusout(function() {
        check_sname();
    });
    $("#email").focusout(function() {
        check_email();
    });
    $("#password").focusout(function() {
        check_password();
    });
    $("#password2").focusout(function() {
        check_password2();
    });

    function check_uname() {
        var user_length = $("#username").val().length;
        if (user_length < 3) {
            $("#uname_error_message").html("Debe tener 3 caracteres minimo");
            $("#uname_error_message").show();
            $("#username").css("border-bottom","2px solid #F90A0A");
            error_fname = true;               
        } else {
            $("#uname_error_message").hide();
            $("#username").css("border-bottom","2px solid #34F458");               
        }
    }

    function check_sname() {
        var pattern = /^[a-zA-Z]*$/;
        var sname = $("#nombre").val()
        if (pattern.test(sname) && sname !== '') {
            $("#sname_error_message").hide();
            $("#nombre").css("border-bottom","2px solid #34F458");
        } else {
            $("#sname_error_message").html("Debe incluir solo carácteres");
            $("#sname_error_message").show();
            $("#nombre").css("border-bottom","2px solid #F90A0A");
            error_fname = true;
        }
    }

    function check_password() {
        var password_length = $("#password").val().length;
        if (password_length < 8) {
            $("#password_error_message").html("8 caracteres minimo");
            $("#password_error_message").show();
            $("#password").css("border-bottom","2px solid #F90A0A");
            error_password = true;
        } else {
            $("#password_error_message").hide();
            $("#password").css("border-bottom","2px solid #34F458");
        }
    }

    function check_password2() {
        var password = $("#password").val();
        var password2 = $("#password2").val();
        if (password !== password2) {
            $("#password2_error_message").html("Las contraseñas no coinciden");
            $("#password2_error_message").show();
            $("#password2").css("border-bottom","2px solid #F90A0A");
            error_password2 = true;
        } else {
            $("#password2_error_message").hide();
            $("#password2").css("border-bottom","2px solid #34F458");
        }
    }

    function check_email() {
        var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var email = $("#email").val();
        if (pattern.test(email) && email !== '') {
            $("#email_error_message").hide();
            $("#email").css("border-bottom","2px solid #34F458");
        } else {
            $("#email_error_message").html("Email invalido");
            $("#email_error_message").show();
            $("#email").css("border-bottom","2px solid #F90A0A");
            error_email = true;
        }
    }

    $("#register").click(function() {
        error_fname = false;
        error_sname = false;
        error_email = false;
        error_password = false;
        error_password2 = false;

        check_uname();
        check_sname();
        check_email();
        check_password();
        check_password2();

        if (error_uname === false && error_sname === false && error_email === false && error_password === false && error_password2 === false && $("#username").val() != "" && $("#nombre").val() != "" && $("#email").val() != "" && $("#password").val() != "" && $("#password2").val() != "") {
                alert("Regsitro realizado con exito");
                return true;
            
        } else {
            alert("Por favor rellena todos los campos correctamente");
            return false;
        }
    });
});
