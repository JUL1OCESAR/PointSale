<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        
        // Se ejecuta FORM DE INSERTAR
        $('#createForm').submit(function(event) {
            event.preventDefault(); // Evitar el envío del formulario por defecto
            enviarFormulario(); // Llama a la función enviarFormulario() cuando se envía el formulario
        });

        // Se ejecuta FORM DE EDITAR
        $('#editFormPro').submit(function(event) {
            event.preventDefault();
            var idProducto = $(this).attr("data-id"); // ID del producto a editar
            editarProducto(idProducto);
        });
    });

    function cargarProducto() {
        
        // Realiza una solicitud AJAX al servidor para obtener los usuarios actualizados en formato HTML
        $.ajax({
            url: 'controlador/get_product.php', // URL del archivo PHP que obtiene los usuarios
            type: 'GET',
            dataType: 'html',
            success: function(response) {
                
                // Actualiza la tabla de usuarios con los datos recibidos
                $('#cargaProduct').html(response);
            },
            error: function(xhr, status, error) {
                
                // Maneja el error en caso de que ocurra
                console.log(xhr.responseText);
            }
        });
    }

    function enviarFormulario() {
        
        // Crea un objeto con los valores del formulario
        var codProducto = $("#codProducto").val();
        var nomProducto = $("#nomProducto").val();
        var precioVentaProducto = parseFloat($("#precioVentaProducto").val());
        var precioCompraProducto = parseFloat($("#precioCompraProducto").val());
        var utilidadProducto = precioVentaProducto - precioCompraProducto;
        var existenciaProducto = parseFloat($("#existenciaProducto").val());
        
        // Validación de campos requeridos
        if (codProducto.trim() === "" || nomProducto.trim() === "" || isNaN(precioVentaProducto) || isNaN(precioCompraProducto) || isNaN(existenciaProducto)) {
            alert("Todos los campos son obligatorios");
            return;
        }
        
        // Validación de utilidadProducto
        if (isNaN(utilidadProducto)) {
            alert("Los campos de Precio Venta y Precio Compra deben ser números válidos");
            return;
        }

        // Realiza una solicitud AJAX al servidor para insertar los datos del formulario
        var formData = {
            action: 'insert',
            codProducto: codProducto,
            nomProducto: nomProducto,
            precioVentaProducto: precioVentaProducto,
            precioCompraProducto: precioCompraProducto,
            utilidadProducto: utilidadProducto,
            existenciaProducto: existenciaProducto
        };
        
        // Realiza una solicitud AJAX al servidor para insertar los datos del formulario
        $.ajax({
            url: 'controlador/product_function.php', // URL del archivo PHP que realiza la inserción
            type: 'POST',
            data: formData,
            success: function(response) {
                
                // Realiza acciones después de la inserción exitosa
                console.log(response);
                
                // Carga los usuarios actualizados después de la inserción
                cargarProducto();
            },
            error: function(xhr, status, error) {
                
                // Maneja el error en caso de que ocurra
                console.log(xhr.responseText);
            }
        });
    }
    function editarProducto(idProducto) {
        var editCodProducto = $("#editCodProducto").val();
        var editNomProducto = $("#editNomProducto").val();
        var editPrecioVentaProducto = parseFloat($("#editPrecioVentaProducto").val());
        var editPrecioCompraProducto = parseFloat($("#editPrecioCompraProducto").val());
        var editExistenciaProducto = parseFloat($("#editExistenciaProducto").val());
        
        // Validación de campos requeridos
        if (editCodProducto.trim() === "" || editNomProducto.trim() === "" || isNaN(editPrecioVentaProducto) || isNaN(editPrecioCompraProducto) || isNaN(editExistenciaProducto)) {
            alert("Todos los campos son obligatorios");
            return;
        }

        // Validación de utilidadProducto
        var editUtilidadProducto = editPrecioVentaProducto - editPrecioCompraProducto;
        if (isNaN(editUtilidadProducto)) {
            alert("Los campos de Precio Venta y Precio Compra deben ser números válidos");
            return;
        }        
        var formData = {
            action: 'edit',
            idProducto: idProducto,
            editCodProducto: $("#editCodProducto").val(),
            editNomProducto: $("#editNomProducto").val(),
            editPrecioVentaProducto : $("#editPrecioVentaProducto").val(),
            editPrecioCompraProducto : $("#editPrecioCompraProducto").val(),
            editUtilidadProducto : editPrecioVentaProducto - editPrecioCompraProducto,
            editExistenciaProducto : $("#editExistenciaProducto").val(),
        };
        
        $.ajax({
            // URL del archivo PHP que realiza la actualización
            url: 'controlador/product_function.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                console.log(response);
                cargarProducto();
                cerrarPopup();                        
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
            }
        });
    }
    function eliminarUsuario(idProducto) {
        var confirmation = confirm("¿Estás seguro de que deseas eliminar este producto?");

        if (confirmation) {
            var formData = {
                action: 'delete',
                idProducto: idProducto
            };

            $.ajax({
                url: 'controlador/product_function.php',
                type: 'POST',
                data: formData,
                success: function(response) {
                    console.log(response);
                    cargarProducto();
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        }
    }
</script>