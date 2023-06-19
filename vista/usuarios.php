<?php
    // Se incluye el archivo de conexión
    include("../controlador/conexion.php");
    
    // Se establece la conexión a la base de datos
    $con = connection();
    
    // Se inicia la sesión
    session_start();
    
    // Se realiza la consulta para obtener todos los usuarios
    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($con, $sql);
?>

<!-- Encabezado del contenido (cabecera de la página) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2" style="justify-content: center">
            <div class="col-sm-6">
                <h1 class="m-0">Tablero de Usuarios</h1>
            </div>
            <!-- /.col -->
            
            <div class="col-sm-6" style="text-align: right;">
                <button id="openCreateButton">Crear usuario</button>
            </div>
            
            <!-- ModelCreate para crear usuario -->
            <div id="createUser" class="modelCreate">
                <div class="user-form">                    
                    <div class="user-content">
                        <span class="close">&times;</span>
                        <h1 class="tittle-form">Crear usuario</h1>
                        <form autocomplete="off" id="crudUser" action="" method="post">
                            <input type="text" id="usuario" placeholder="Usuario">
                            <input type="password" id="password" placeholder="Contraseña">
                            <input type="text" id="nombre" placeholder="Nombre">
                            <input type="text" id="apellido" placeholder="Apellido">
                            <input type="text" id="tipo_usuario" placeholder="Tipo de Usuario">
                            <div class="boton">
                                <button type="button" onclick="enviarFormulario();">Confirmar</button>
                                <button type="button" onclick="cerrarFormulario()">Cancelar</button>
                            </div>
                        </form>
                        <?php require "../controlador/crud_script.php"; ?>
                    </div>
                </div>
            </div>

            <!-- ModelEdit para editar usuario -->
            <div id="editUser" class="editPopup">
                <div class="user-form">
                    <div class="user-content">
                        <span class="close">&times;</span>
                        <h1 class="tittle-form">Editar usuario</h1>
                        <form autocomplete="off" id="editForm" action="" method="post">
                            <input type="text" id="editUsuario" placeholder="Usuario">
                            <input type="password" id="editPassword" placeholder="Contraseña">
                            <input type="text" id="editNombre" placeholder="Nombre">
                            <input type="text" id="editApellido" placeholder="Apellido">
                            <input type="text" id="editTipoUsuario" placeholder="Tipo de Usuario">
                            <div class="boton">
                                <button type="button" onclick="guardarCambios()">Guardar</button>
                                <button type="button" onclick="cerrarFormulario2()">Cancelar</button>
                            </div>
                            <style>.boton{display: flex; width: 100%; flex-direction: row-reverse; justify-content: flex-start;}  .user-content button{margin: 0px 0px 0px 15px} </style>
                        </form>                        
                    </div>
                </div>
            </div>     

            <!-- Funciones para ModelCreate -->
            <script> 
                
                // Función para abrir el ModelCreate
                var openCreateButton = document.getElementById("openCreateButton");
                openCreateButton.addEventListener("click", function() {
                var modelCreate = document.getElementById("createUser");
                modelCreate.style.display = "block";
                });

                // Función para cerrar el ModelCreate
                var closeButtons = document.getElementsByClassName("close");
                for (var i = 0; i < closeButtons.length; i++) {
                closeButtons[i].addEventListener("click", function() {
                    var modelCreate = document.getElementById("createUser");
                    modelCreate.style.display = "none";
                });
                }
                
                // Evento de click fuera del formulario para cerrar el ModelCreate
                window.addEventListener("click", function(event) {
                var modelCreate = document.getElementById("createUser");
                if (event.target == modelCreate) {
                    modelCreate.style.display = "none";
                }
                });
                
                // Funcion para cerrar el formulario con boton cancelar
                function cerrarFormulario() {
                    var modelCreate = document.getElementById("createUser").style.display = "none";
                }
            </script>

            <!-- Funciones para ModelEdit -->
            <script>
                function mostrarEditar(id) {
                    var usuario = document.querySelector('.user-username[data-id="' + id + '"]').innerText;
                    var password = document.querySelector('.user-password[data-id="' + id + '"]').innerText;
                    var nombre = document.querySelector('.user-name[data-id="' + id + '"]').innerText;
                    var apellido = document.querySelector('.user-lastname[data-id="' + id + '"]').innerText;
                    var tipoUsuario = document.querySelector('.user-type[data-id="' + id + '"]').innerText;

                    document.getElementById("editUsuario").value = usuario;
                    document.getElementById("editPassword").value = password;
                    document.getElementById("editNombre").value = nombre;
                    document.getElementById("editApellido").value = apellido;
                    document.getElementById("editTipoUsuario").value = tipoUsuario;
                    document.getElementById("editUser").style.display = "block";

                    document.getElementById("editForm").setAttribute("data-id", id);
                }

                function guardarCambios() {
                    var id = document.getElementById("editForm").getAttribute("data-id");
                    var usuario = document.getElementById("editUsuario").value;
                    var password = document.getElementById("editPassword").value;
                    var nombre = document.getElementById("editNombre").value;
                    var apellido = document.getElementById("editApellido").value;
                    var tipoUsuario = document.getElementById("editTipoUsuario").value;
                    
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

                    // Objeto con los datos a enviar al servidor
                    var data = {
                        id: id, // ID del usuario que estás editando
                        usuario: usuario,
                        password: password,
                        nombre: nombre,
                        apellido: apellido,
                        tipo_usuario: tipoUsuario
                    };
                    editarUsuario(id, data);
                }              
                      
                function cerrarPopup() {
                    document.getElementById("editUser").style.display = "none";
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
                var editPopup = document.getElementById("editUser");
                if (event.target == editPopup) {
                    cerrarPopup();
                }
                });
                
                // Funcion para cerrar el formulario con boton cancelar
                function cerrarFormulario2() {
                    var editPopup = document.getElementById("editUser").style.display = "none";
                }
            </script>
            
            <!-- Mostrar Crud de usuarios -->
            <div class="user-table">
                <h2>Usuarios registrados</h2>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo de Usuario</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="CargaUser">
                        <?php while ($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <td class="user-id" data-id="<?= $row['id'] ?>"><?= $row['id'] ?></td>
                            <td class="user-username" data-id="<?= $row['id'] ?>"><?= $row['usuario'] ?></td>
                            <td class="user-password" data-id="<?= $row['id'] ?>"><?= $row['password'] ?></td>
                            <td class="user-name" data-id="<?= $row['id'] ?>"><?= $row['nombre'] ?></td>
                            <td class="user-lastname" data-id="<?= $row['id'] ?>"><?= $row['apellido'] ?></td>
                            <td class="user-type" data-id="<?= $row['id'] ?>"><?= $row['tipo_usuario'] ?></td>
                            
                            <!-- Botón Editar -->
                            <td class="user-edit"><button onclick="mostrarEditar(<?= $row['id'] ?>);">Editar</button></td>
                            
                            <!-- Botón Eliminar -->
                            <td class="user-delete"><button onclick="eliminarUsuario(<?= $row['id'] ?>);">Eliminar</button></td>
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