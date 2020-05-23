$().ready(function() {
    //Validacion de formulario
    $("contenido_reg").validate({
        rules:{
            username: {
                required: true,
                minlength: 2
            },
            nombre: {
                required: true,
                minlength: 2
            },
            email: {
                required: true,
                email: true
            },
            password:{
                required: true,
                minlength: 5
            },
            password2:{
                required: true,
                minlength: 5,
                equalTo: "#password"
            },
        },

        messages:{
            username: {
                required: "Por favor introduce el usuario",
                minlenght: "Tu usuario debe ser de más de 2 carateres"
            },
            nombre: {
                required: "Por favor introduce el nombre",
                minlenght: "Tu nombre debe ser de más de 2 carateres"
            },
            password: {
                required: "Por favor introduce la contraseña",
                minlenght: "Tu contraseña debe ser de más de 5 carateres"
            },
            password2: {
                required: "Por favor introduce la confirmación de contraseña",
                minlenght: "Tu contraseña debe ser de más de 5 carateres",
                equalTo: "Tu contraseña debe ser igual a la anterior"
            },
        }
    });
});