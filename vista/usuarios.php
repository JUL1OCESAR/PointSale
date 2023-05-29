<?php
    include("../controlador/conexion.php");
    $con = connection();
    session_start();
    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($con, $sql);
?>

<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2" style="justify-content: center">
            <div class="col-sm-6">
                <h1 class="m-0">Tablero de Usuarios</h1>
            </div>            
            <!-- /.col -->
            <div class="col-sm-6" style="text-align: right;">
                <button id="openModalButton">Crear usuario</button>
            </div> 
            <div id="myModal" class="modal">
                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="users-form">
                    <h1>Crear usuario</h1>
                    <form autocomplete="off" id="crudUser" action="" method="post">
                        <input type="text" id="usuario" placeholder="Username">
                        <input type="password" id="password" placeholder="Password">
                        <input type="text" id="nombre" placeholder="Nombre">
                        <input type="text" id="apellido" placeholder="Apellido">
                        <input type="text" id="tipo_usuario" placeholder="Tipo de Usuario">
                        <button type="button" onclick="enviarFormulario();">Confirmar</button>
                    </form>
                    <?php require "../controlador/crud_script.php"; ?>
                    </div>
                </div>
            </div>
            <script> 
                // Abrir Modelo
                var openModalButton = document.getElementById("openModalButton");
                openModalButton.addEventListener("click", function() {
                var modal = document.getElementById("myModal");
                modal.style.display = "block";
                });

                // Cerrar Modelo
                var closeButtons = document.getElementsByClassName("close");
                for (var i = 0; i < closeButtons.length; i++) {
                closeButtons[i].addEventListener("click", function() {
                    var modal = document.getElementById("myModal");
                    modal.style.display = "none";
                });
                }
                // Evento click fuera del form
                window.addEventListener("click", function(event) {
                var modal = document.getElementById("myModal");
                if (event.target == modal) {
                    modal.style.display = "none";
                }
                });
            </script>
            <div class="users-table">
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
                            <td class="user-edit"><button onclick="mostrarPopupEditar(<?= $row['id'] ?>);">Editar</button></td>
                            <!-- Botón Eliminar -->
                            <td class="user-delete"><button onclick="eliminarUsuario(<?= $row['id'] ?>);">Eliminar</button></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>        
                <div class="popup" id="popup" style="display: none;">
                    <div class="popup-content">
                        <h1>Editar usuario</h1>
                        <form autocomplete="off" id="editForm" action="" method="post">
                        <input type="text" id="editUsuario" placeholder="Usuario">
                        <input type="password" id="editPassword" placeholder="Contraseña">
                        <input type="text" id="editNombre" placeholder="Nombre">
                        <input type="text" id="editApellido" placeholder="Apellido">
                        <input type="text" id="editTipoUsuario" placeholder="Tipo de Usuario">
                        <button type="button" onclick="guardarCambios()">Guardar</button>
                        <button type="button" onclick="cerrarPopup()">Cancelar</button>
                        </form>
                    </div>
                </div>
                <script>
                    function mostrarPopupEditar(id) {
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

                        document.getElementById("popup").style.display = "block";
                    }

                    function guardarCambios() {
                        var usuario = document.getElementById("editUsuario").value;
                        var password = document.getElementById("editPassword").value;
                        var nombre = document.getElementById("editNombre").value;
                        var apellido = document.getElementById("editApellido").value;
                        var tipoUsuario = document.getElementById("editTipoUsuario").value;
                        cerrarPopup();
                    }

                    function cerrarPopup() {
                        document.getElementById("popup").style.display = "none";
                    }

                    function eliminarUsuario(id) {
                    }
                </script>  
                <script>
                    document.addEventListener("click", function (event) {
                        var targetElement = event.target;
                        if (!targetElement.closest(".popup-content") && !targetElement.closest(".user-edit")) {
                        cerrarPopup();
                        }
                    });
                </script>              
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">

    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content -->