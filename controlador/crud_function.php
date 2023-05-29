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

        $sql = "INSERT INTO usuarios VALUES('$id','$usuario','$password','$nombre','$apellido','$tipo_usuario')";
        mysqli_query($con, $sql);
        echo "Inserción Exitosa";
    }
?>