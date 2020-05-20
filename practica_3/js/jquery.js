<script type="text/javascript">
$(document).ready(function() {
    $('#register').click(function(){
        if($("#email").val().indexOf('@', 0) == -1 || $("#email").val().indexOf('.', 0) == -1) {
            alert('El correo electrónico introducido no es correcto.');
            return false;
        }

        alert('El email introducido es correcto.');
    })
});
</script>