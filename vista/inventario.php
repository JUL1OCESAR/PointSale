<?php
    // Se incluye el archivo de conexión
    include("../controlador/conexion.php");
    
    // Se establece la conexión a la base de datos
    $con = connection();
    
    // Se inicia la sesión
    session_start();
    
    // Se realiza la consulta para obtener todos los usuarios
    $sql = "SELECT * FROM productos";
    $query = mysqli_query($con, $sql);
?>

<!-- Encabezado del contenido (cabecera de la página) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2" style="justify-content: center">
            <div class="col-sm-6">
                <h1 class="m-0">Productos</h1>
            </div>
            <!-- /.col -->
            
            <div class="col-sm-6" style="text-align: right;">
                <button id="openCreateButton">Crear Producto</button>
            </div>
            
            <!-- productCreate para crear producto -->
            <div id="createProduct" class="productCreate">
                <div class="user-form">                    
                    <div class="user-content">
                        <span class="close">&times;</span>
                        <h1 class="tittle-form">Crear producto</h1>
                        <form autocomplete="off" id="createForm" action="" method="post">
                            <input type="text" id="codProducto" placeholder="Codigo">
                            <input type="text" id="nomProducto" placeholder="Nombre">
                            <input type="text" id="precioCompraProducto" placeholder="Precio de venta">
                            <input type="text" id="precioVentaProducto" placeholder="Precio de compra">
                            <input type="text" id="existenciaProducto" placeholder="Existencias">
                            <button type="button" onclick="enviarFormulario();">Confirmar</button>
                            <button type="button" onclick="cerrarFormulario()">Cancelar</button>
                        </form>
                        <?php require "../controlador/product_script.php"; ?>
                    </div>
                </div>
            </div>
            <style>
            .productCreate { display: none; position: fixed; z-index: 50; left: 0; top: 0; width: 100%; height: 100%; overflow: auto; background-color: rgba(0, 0, 0, 0.4); } 
            </style>

            <!-- ModelEdit para editar producto -->
            <div id="editProduct" class="editPopup">
                <div class="user-form">
                    <div class="user-content">
                        <span class="close">&times;</span>
                        <h1 class="tittle-form">Editar usuario</h1>
                        <form autocomplete="off" id="editFormPro" action="" method="post">
                            <input type="text" id="editCodProducto" placeholder="Codigo de Producto">
                            <input type="text" id="editNomProducto" placeholder="Nombre de Producto">
                            <input type="text" id="editPrecioCompraProducto" placeholder="Precio de Compra">
                            <input type="text" id="editPrecioVentaProducto" placeholder="Precio de Venta">
                            <input type="text" id="editExistenciaProducto" placeholder="Existencias Disponibles">
                            <button type="button" onclick="guardarCambios()">Guardar</button>
                            <button type="button" onclick="cerrarFormulario2()">Cancelar</button>
                        </form>                    
                    </div>
                </div>
            </div>     

            <!-- Funciones para productCreate -->
            <script> 
                
                // Función para abrir el productCreate
                var openCreateButton = document.getElementById("openCreateButton");
                openCreateButton.addEventListener("click", function() {
                var productCreate = document.getElementById("createProduct");
                productCreate.style.display = "block";
                });

                // Función para cerrar el productCreate
                var closeButtons = document.getElementsByClassName("close");
                for (var i = 0; i < closeButtons.length; i++) {
                closeButtons[i].addEventListener("click", function() {
                    var productCreate = document.getElementById("createProduct");
                    productCreate.style.display = "none";
                });
                }
                
                // Evento de click fuera del formulario para cerrar el productCreate
                window.addEventListener("click", function(event) {
                var productCreate = document.getElementById("createProduct");
                if (event.target == productCreate) {
                    productCreate.style.display = "none";
                }
                });
                
                // Funcion para cerrar el formulario con boton cancelar
                function cerrarFormulario() {
                    var productCreate = document.getElementById("createProduct").style.display = "none";
                }
            </script>

            <!-- Funciones para ModelEdit -->
            <script>
                function mostrarEditar(idProducto) {
                    var codProducto = document.querySelector('.product-codigo[data-id="' + idProducto + '"]').innerText;
                    var nomProducto = document.querySelector('.product-nombre[data-id="' + idProducto + '"]').innerText;
                    var precioCompraProducto = document.querySelector('.product-compra[data-id="' + idProducto + '"]').innerText;
                    var precioVentaProducto = document.querySelector('.product-venta[data-id="' + idProducto + '"]').innerText;
                    var existenciaProducto = document.querySelector('.product-existencia[data-id="' + idProducto + '"]').innerText;
                    document.getElementById("editCodProducto").value = codProducto;
                    document.getElementById("editNomProducto").value = nomProducto;
                    document.getElementById("editPrecioCompraProducto").value = precioVentaProducto;
                    document.getElementById("editPrecioVentaProducto").value = precioCompraProducto;
                    document.getElementById("editExistenciaProducto").value = existenciaProducto;
                    document.getElementById("editProduct").style.display = "block";

                    document.getElementById("editFormPro").setAttribute("data-id", idProducto);
                }

                function guardarCambios() {
                    var idProducto = document.getElementById("editFormPro").getAttribute("data-id");
                    var codProducto = document.getElementById("editCodProducto").value;
                    var nomProducto = document.getElementById("editNomProducto").value;
                    var precioCompraProducto = document.getElementById("editPrecioVentaProducto").value;
                    var precioVentaProducto = document.getElementById("editPrecioCompraProducto").value;
                    
                    // Cálculo de la utilidad del producto
                    var utilidadProducto = precioVentaProducto - precioCompraProducto;
                    var existenciaProducto = document.getElementById("editExistenciaProducto").value;
                                        
                    // Objeto con los datos a enviar al servidor
                    var data = {
                        idProducto: idProducto, // ID del usuario que estás editando
                        codProducto: codProducto,
                        nomProducto: nomProducto,
                        precioCompraProducto: precioCompraProducto,
                        precioVentaProducto: precioVentaProducto,
                        utilidadProducto: utilidadProducto,
                        existenciaProducto: existenciaProducto
                    };
                    editarProducto(idProducto, data);
                }              
                      
                function cerrarPopup() {
                    document.getElementById("editProduct").style.display = "none";
                }
                
                // Función para cerrar el ModelEdit
                var closeButtons = document.getElementsByClassName("close");
                for (var i = 0; i < closeButtons.length; i++) {
                    closeButtons[i].addEventListener("click", function() {
                        cerrarPopup();
                    });
                }

                // Evento de click fuera del formulario para cerrar el ModelCreate
                window.addEventListener("click", function(event) {
                var editPopup = document.getElementById("editProduct");
                if (event.target == editPopup) {
                    cerrarPopup();
                }
                });
                
                // Funcion para cerrar el formulario con boton cancelar
                function cerrarFormulario2() {
                    var editPopup = document.getElementById("editProduct").style.display = "none";
                }
            </script>
            
            <!-- Mostrar Crud de Productos -->
            <div class="user-table">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Precio de Compra</th>
                            <th>Precio de Venta</th>
                            <th>Utilidad</th>
                            <th>Existencia</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="cargaProduct">
                        <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td class="product-id" data-id="<?= $row['idProducto'] ?>"><?= $row['idProducto'] ?></td>
                            <td class="product-codigo" data-id="<?= $row['idProducto'] ?>"><?= $row['codProducto'] ?></td>
                            <td class="product-nombre" data-id="<?= $row['idProducto'] ?>"><?= $row['nomProducto'] ?></td>
                            <td class="product-compra" data-id="<?= $row['idProducto'] ?>"><?= $row['precioCompraProducto'] ?></td>
                            <td class="product-venta" data-id="<?= $row['idProducto'] ?>"><?= $row['precioVentaProducto'] ?></td>
                            <td class="product-utilidad" data-id="<?= $row['idProducto'] ?>"><?= $row['utilidadProducto'] ?></td>
                            <td class="product-existencia" data-id="<?= $row['idProducto'] ?>"><?= $row['existenciaProducto'] ?></td>
                            
                            <!-- Botón Editar -->
                            <td class="product-edit"><button onclick="mostrarEditar(<?= $row['idProducto'] ?>);">Editar</button></td>
                            
                            <!-- Botón Eliminar -->
                            <td class="product-delete"><button onclick="eliminarUsuario(<?= $row['idProducto'] ?>);">Eliminar</button></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Contenido principal -->
<div class="content">
    <div class="container-fluid">

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->