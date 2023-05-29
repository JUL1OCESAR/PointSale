<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script type="text/javascript"> 
    function submitData(action){
        $(document).ready(function(){
            var data = {
                action: action,
                usuario: $("#usuario").val(),
                password: $("#password").val(),
                nombre: $("#nombre").val(),
                apellido: $("#apellido").val(),
                tipo_usuario: $("#tipo_usuario").val(),
            };
            $.ajax({
                url: 'controlador/crud_function.php',
                type: 'post',
                data: data,
                success: function(response){
                    alert();
                }
            });
        });
    }
</script>