<?php

include("../controlador/conexion.php");
$con = connection();

$id=$_POST["id"];
$usuario = $_POST['usuario'];
$password = $_POST['password'];
$nombre = $_POST['nombre'];
$apellido = $_POST['lastname'];
$tipo_usuario = $_POST['tipo_usuario'];

$sql="UPDATE usuarios SET usuario='$usuario', password='$password', nombre='$nombre', apellido='$apellido', tipo_usuario='$tipo_usuario' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    header("Location: ../index.php");
}else{

}

?>