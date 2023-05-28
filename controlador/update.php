<?php 
    include("../controlador/conexion.php");
    $con=connection();
    session_start();
    $id=$_GET['id'];

    $sql="SELECT * FROM usuarios WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
        <title>Editar usuarios</title>
        
    </head>
    <body>
        <div class="users-form">
            <form action="edit_user.php" method="POST">
                <input type="hidden" name="id" value="<?= $row['id']?>">
                <input type="text" name="usuario" placeholder="Nombre" value="<?= $row['usuario']?>">
                <input type="text" name="password" placeholder="Apellidos" value="<?= $row['password']?>">
                <input type="text" name="nombre" placeholder="Username" value="<?= $row['nombre']?>">
                <input type="text" name="lastname" placeholder="Password" value="<?= $row['apellido']?>">
                <input type="text" name="tipo_usuario" placeholder="Email" value="<?= $row['tipo_usuario']?>">

                <input type="submit" value="Actualizar">
            </form>
        </div>
    </body>
</html>
<link rel="stylesheet" href="../vista/assets/dist/css/cabecera.css">
    <link rel="stylesheet" href="../vista/assets/dist/css/login.css">
    <link rel="stylesheet" href="../vista/assets/dist/css/style.css">