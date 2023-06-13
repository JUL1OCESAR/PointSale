<?php
    
    // Se incluye el archivo "conexion.php" que contiene la función de conexión
    require "conexion.php";

    // Verifica si se recibió una acción a través del método POST
    if(isset($_POST["action"])){
        
        // Comprueba si la acción recibida es "insert"
        if($_POST["action"] == "insert"){
            
            // Llama a la función insert() para realizar la inserción
            insert();
        }
        // Comprueba si la acción recibida es "edit"
        else if ($_POST["action"] == "edit"){
            
            // Llama a la función edit() para realizar la inserción
            edit();
        }
    }

    // Definición de la función insert()
    function insert(){
        
        // Se establece la conexión con la base de datos utilizando la función connection()
        $con = connection();

        // Se obtienen los datos del formulario enviados por el método POST
        $id = null;                     // Variable autoincremental
        $usuario = $_POST["usuario"];
        $password = $_POST["password"];
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $tipo_usuario = $_POST["tipo_usuario"];

        // Validaciones antes de la inserción

        // Se construye la consulta SQL para insertar los datos en la tabla "usuarios"
        $sql = "INSERT INTO usuarios (usuario, password, nombre, apellido, tipo_usuario) 
                VALUES ('$usuario', '$password', '$nombre', '$apellido', '$tipo_usuario')";
        
        // Se ejecuta la consulta utilizando la función mysqli_query()
        // Si la inserción es exitosa, se muestra un mensaje de éxito. De lo contrario, se muestra un mensaje de error
        if(mysqli_query($con, $sql)){
            echo "Inserción Exitosa";
        } else {
            echo "Error en la inserción: " . mysqli_error($con);
        }
    }
    
    // Definición de la función edit()
    function edit(){
        
        // Se establece la conexión con la base de datos utilizando la función connection()
        $con = connection();

        // Se obtienen los datos del formulario enviados por el método POST
        $id = $_POST["id"];
        $usuario = $_POST["editUsuario"];
        $password = $_POST["editPassword"];
        $nombre = $_POST["editNombre"];
        $apellido = $_POST["editApellido"];
        $tipo_usuario = $_POST["editTipoUsuario"];

        // Validaciones antes de la actualización

        // Se construye la consulta SQL para actualizar los datos en la tabla "usuarios"
        $sql = "UPDATE usuarios SET usuario='$usuario', password='$password', nombre='$nombre', apellido='$apellido', tipo_usuario='$tipo_usuario' WHERE id='$id'";
        
        // Se ejecuta la consulta utilizando la función mysqli_query()
        // Si la actualización es exitosa, se muestra un mensaje de éxito. De lo contrario, se muestra un mensaje de error
        if(mysqli_query($con, $sql)){
            echo "Actualización Exitosa";
        } else {
            echo "Error en la actualización: " . mysqli_error($con);
        }
    }
?>