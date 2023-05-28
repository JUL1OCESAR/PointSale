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
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Tablero de Usuarios</h1>
            </div>            
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                    <li class="breadcrumb-item active">Tablero</li>
                </ol>
            </div>
            <!-- /.col -->
            <div class="users-form">
                <h1>Crear usuario</h1>
                <form action="controlador/insert_user.php" method="POST">
                    <input type="text" name="usuario" placeholder="Username">
                    <input type="password" name="password" placeholder="Password">
                    <input type="text" name="nombre" placeholder="Nombre">
                    <input type="text" name="lastname" placeholder="Apellido">
                    <input type="text" name="tipo_usuario" placeholder="Tipo de Usuario">
                    <input type="submit" value="Agregar">
                </form>
            </div>

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