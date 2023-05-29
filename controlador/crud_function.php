<?php
    require "conexion.php";

    if(isset($_POST["action"])){
        if($_POST["action"] == "insert"){
            insert();
        }
    }

    function insert(){
        $con = connection();

        $id = null;
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $tipo_usuario = $_POST["tipo_usuario"];

        // Realizar validaciones u otras operaciones antes de la inserción

        $sql = "INSERT INTO usuarios (usuario, password, nombre, apellido, tipo_usuario) 
                VALUES ('$usuario', '$password', '$nombre', '$apellido', '$tipo_usuario')";
        
        if(mysqli_query($con, $sql)){
            echo "Inserción Exitosa";
        } else {
            echo "Error en la inserción: " . mysqli_error($con);
        }
    }
?>
