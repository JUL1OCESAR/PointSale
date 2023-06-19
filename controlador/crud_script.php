<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
        // Se ejecuta cuando el documento FORM DE INSERTAR ha sido completamente cargado y listo
        $('#crudUser').submit(function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            enviarFormulario(); // Llama a la función enviarFormulario() cuando se envía el formulario
        });

        // Se ejecuta cuando el documento FORM DE EDITAR ha sido completamente cargado y listo
        $('#editForm').submit(function(event) {
            event.preventDefault();
            var id = $(this).attr("data-id"); // ID del usuario a editar
            editarUsuario(id);
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
        
        // Crea un objeto con los valores del formulario
        var usuario = $("#usuario").val();
        var password = $("#password").val();
        var nombre = $("#nombre").val();
        var apellido = $("#apellido").val();
        var tipoUsuario = $("#tipo_usuario").val();
        
        // Validación de campos requeridos
        if (usuario.trim() === "" || password.trim() === "" || nombre.trim() === "" || apellido.trim() === "" || tipoUsuario.trim() === "") {
            alert("Todos los campos son obligatorios");
            return;
        }

        // Validación de longitud mínima
        if (password.length < 8) {
            alert("La contraseña debe tener al menos 8 caracteres");
            return;
        }

        var passwordRegex = /^(?=.*[A-ZÑñ])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&ñÑ]{8,}$/;
        if (!passwordRegex.test(password)) {
            alert("La contraseña debe contener al menos una letra mayúscula, una letra minúscula, un número y un carácter especial");
            return;
        }
        
        if (tipoUsuario != 1 && tipoUsuario != 2) {
            alert("El tipo de Usuario debe ser 1 o 2");
            return;
        }

        // Realiza una solicitud AJAX al servidor para insertar los datos del formulario
        var formData = {
            action: 'insert',
            usuario: usuario,
            password: password,
            nombre: nombre,
            apellido: apellido,
            tipo_usuario: tipoUsuario
        };
        
        // Realiza una solicitud AJAX al servidor para insertar los datos del formulario
        $.ajax({
            url: 'controlador/crud_function.php',
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
                cerrarPopup();                        
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
    function eliminarUsuario(id) {
        var confirmation = confirm("¿Estás seguro de que deseas eliminar este usuario?");

        if (confirmation) {
            var formData = {
                action: 'delete',
                id: id
            };

            $.ajax({
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
    }
</script>