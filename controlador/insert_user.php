<?php
    include("../controlador/conexion.php");
    $con = connection();
    $id = null;
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['lastname'];
    $tipo_usuario = $_POST['tipo_usuario'];
    $sql = "INSERT INTO usuarios VALUES('$id','$usuario','$password','$nombre','$apellido','$tipo_usuario')";
    $query = mysqli_query($con, $sql);
    /*if ($query) {
        header("Location: ../index.php");
    } else {
    }*/
    if ($query) {
        echo "Inserción exitosa";
    } else {
        echo "Error al insertar el usuario";
    }
?>