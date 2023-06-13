<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
        // Esta función se ejecuta cuando el documento FORM DE INSERTAR ha sido completamente cargado y listo
        $('#crudUser').submit(function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            enviarFormulario(); // Llama a la función enviarFormulario() cuando se envía el formulario
        });

        // Esta función se ejecuta cuando el documento FORM DE EDITAR ha sido completamente cargado y listo
        $('#editForm').submit(function(event) {
            event.preventDefault();
            var id = $(this).attr("data-id"); // ID del usuario que deseas editar
            editarUsuario(id); // Llama a la función editarFormulario() cuando se envía el formulario
        });
    });

    function cargarUsuarios() {
        
        // Realiza una solicitud AJAX al servidor para obtener los usuarios actualizados en formato HTML
        $.ajax({
            url: 'controlador/get_user.php', // URL del archivo PHP que obtiene los usuarios
            type: 'GET',
            dataType: 'html',
            success: function(response) {
                
                // Actualiza la tabla de usuarios con los datos recibidos
                $('#CargaUser').html(response);
            },
            error: function(xhr, status, error) {
                
                // Maneja el error en caso de que ocurra
                console.log(xhr.responseText);
            }
        });
    }

    function enviarFormulario() {
        
        // Crea un objeto formData con los valores del formulario
        var formData = {
            action: 'insert',
            usuario: $("#usuario").val(),
            password: $("#password").val(),
            nombre: $("#nombre").val(),
            apellido: $("#apellido").val(),
            tipo_usuario: $("#tipo_usuario").val()
        };

        // Realiza una solicitud AJAX al servidor para insertar los datos del formulario
        $.ajax({
            url: 'controlador/crud_function.php', // URL del archivo PHP que realiza la inserción
            type: 'POST',
            data: formData,
            success: function(response) {
                
                // Realiza acciones después de la inserción exitosa
                console.log(response);
                
                // Carga los usuarios actualizados después de la inserción
                cargarUsuarios();
            },
            error: function(xhr, status, error) {
                
                // Maneja el error en caso de que ocurra
                console.log(xhr.responseText);
            }
        });
    }
    function editarUsuario(id) {
        var formData = {
            action: 'edit',
            id: id,
            editUsuario: $("#editUsuario").val(),
            editPassword: $("#editPassword").val(),
            editNombre: $("#editNombre").val(),
            editApellido: $("#editApellido").val(),
            editTipoUsuario: $("#editTipoUsuario").val()
        };

        $.ajax({
            // URL del archivo PHP que realiza la actualización
            url: 'controlador/crud_function.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                cargarUsuarios();                            
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
</script>