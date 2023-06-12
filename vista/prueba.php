<!-- ESTA PAGINA PHP NO SIRVE ES SOLO DE PRUEBA -->

<?php
    include("../controlador/conexion.php");
    $con = connection();
    session_start();
    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario de inserción</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#insert-form").submit(function(e) {
                e.preventDefault(); // Evita el envío normal del formulario

                // Obtener los valores del formulario
                var usuario = $("#usuario").val();
                var password = $("#password").val();
                var nombre = $("#nombre").val();
                var apellido = $("#apellido").val();
                var tipo_usuario = $("#tipo_usuario").val();

                // Realizar la petición Ajax
                $.ajax({
                    url: "../controlador/insertar_usuario.php",
                    method: "POST",
                    data: {
                        usuario: usuario,
                        password: password,
                        nombre: nombre,
                        apellido: apellido,
                        tipo_usuario: tipo_usuario
                    },
                    success: function(response) {
                        // Mostrar mensaje de éxito o error
                        $("#mensaje").text(response);
                    }
                });
            });
        });
    </script>
</head>
<body>
    <h1>Formulario de inserción de usuario</h1>
    <form id="insert-form">
        <!-- Campos del formulario -->
        <input type="text" name="usuario" id="usuario" placeholder="Usuario">
        <input type="password" name="password" id="password" placeholder="Contraseña">
        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        <input type="text" name="apellido" id="apellido" placeholder="Apellido">
        <input type="text" name="tipo_usuario" id="tipo_usuario" placeholder="Tipo de usuario">
        <button type="submit">Insertar usuario</button>
    </form>
    <div id="mensaje"></div>
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
                    <tbody>
                        <?php while ($row = mysqli_fetch_array($query)): ?>
                            <tr>
                                <th>
                                    <?= $row['id'] ?>
                                </th>
                                <th>
                                    <?= $row['usuario'] ?>
                                </th>
                                <th>
                                    <?= $row['password'] ?>
                                </th>
                                <th>
                                    <?= $row['nombre'] ?>
                                </th>
                                <th>
                                    <?= $row['apellido'] ?>
                                </th>
                                <th>
                                    <?= $row['tipo_usuario'] ?>
                                </th>
                                <th><a href="controlador/update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></th>
                                <th><a href="controlador/delete_user.php?id=<?= $row['id'] ?>" class="users-table--delete">Eliminar</a>
                                </th>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
</body>
</html>
