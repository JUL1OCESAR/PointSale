<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#crudUser').submit(function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            enviarFormulario();
        });
    });

    function cargarUsuarios() {
        // Realizar una solicitud AJAX al servidor para obtener los usuarios actualizados en formato HTML
        $.ajax({
            url: 'controlador/get_user.php',
            type: 'GET',
            dataType: 'html',
            success: function(response) {
            // Actualizar la tabla de usuarios con los datos recibidos
            $('#CargaUser').html(response);
            },
            error: function(xhr, status, error) {
            // Manejar el error en caso de que ocurra
            console.log(xhr.responseText);
            }
        });
    }

    function enviarFormulario() {
        var formData = {
            action: 'insert',
            usuario: $("#usuario").val(),
            password: $("#password").val(),
            nombre: $("#nombre").val(),
            apellido: $("#apellido").val(),
            tipo_usuario: $("#tipo_usuario").val()
        };

        $.ajax({
            url: 'controlador/crud_function.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Realizar acciones después de la inserción exitosa
                console.log(response);
                // Cargar los usuarios actualizados después de la inserción
                cargarUsuarios();
                },
                error: function(xhr, status, error) {
                // Manejar el error en caso de que ocurra
                console.log(xhr.responseText);
            }
        });
    }
</script>