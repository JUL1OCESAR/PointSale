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
            <div class="users-table">
                <h2>Usuarios registrados</h2>
                <a href="newuser.php">Nuevo</a>
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
                                <td class="user-id"><?= $row['id'] ?></td>
                                <td class="user-username"><?= $row['usuario'] ?></td>
                                <td class="user-password"><?= $row['password'] ?></td>
                                <td class="user-name"><?= $row['nombre'] ?></td>
                                <td class="user-lastname"><?= $row['apellido'] ?></td>
                                <td class="user-type"><?= $row['tipo_usuario'] ?></td>
                                <td class="user-edit"><a href="controlador/update.php?id=<?= $row['id'] ?>" class="users-table--edit">Editar</a></td>
                                <td class="user-delete"><button type="button" onclick="submitData(<?= $row['id'] ?>);">Eliminar</button></td>
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