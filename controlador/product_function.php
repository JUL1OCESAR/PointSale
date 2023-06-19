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
        else if ($_POST["action"] == "delete"){
            
            // Llama a la función edit() para realizar la inserción
            delete();
        }
    }

    // Definición de la función insert()
    function insert(){
        
        // Se establece la conexión con la base de datos utilizando la función connection()
        $con = connection();

        // Se obtienen los datos del formulario enviados por el método POST
        $idProducto = null;                     // Variable autoincremental
        $codProducto = $_POST["codProducto"];
        $nomProducto = $_POST["nomProducto"];
        $precioVentaProducto = floatval($_POST["precioVentaProducto"]);
        $precioCompraProducto = floatval($_POST["precioCompraProducto"]);
        $utilidadProducto = $precioVentaProducto - $precioCompraProducto;
        $existenciaProducto = floatval($_POST["existenciaProducto"]);

        // Validaciones antes de la inserción

        // Se construye la consulta SQL para insertar los datos en la tabla "usuarios"
        $sql = "INSERT INTO productos (codProducto, nomProducto, precioVentaProducto, precioCompraProducto, utilidadProducto, existenciaProducto) 
                VALUES ('$codProducto', '$nomProducto', '$precioVentaProducto', '$precioCompraProducto', '$utilidadProducto', '$existenciaProducto')";
        
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
        $idProducto = $_POST["idProducto"];
        $codProducto = $_POST["editCodProducto"];
        $nomProducto = $_POST["editNomProducto"];
        $precioVentaProducto = floatval($_POST["editPrecioVentaProducto"]);
        $precioCompraProducto = floatval($_POST["editPrecioCompraProducto"]);
        $utilidadProducto = $precioVentaProducto - $precioCompraProducto;
        $existenciaProducto = floatval($_POST["editExistenciaProducto"]);
        
        // Consulta SQL para actualizar
        $sql = "UPDATE productos SET codProducto='$codProducto', nomProducto='$nomProducto', precioVentaProducto='$precioVentaProducto', precioCompraProducto='$precioCompraProducto', utilidadProducto='$utilidadProducto', existenciaProducto='$existenciaProducto' WHERE idProducto='$idProducto'";
        
        if(mysqli_query($con, $sql)){
            echo "Actualización Exitosa";
        } else {
            echo "Error en la actualización: " . mysqli_error($con);
        }
    }
    function delete(){
        $con = connection();

        // ID del usuario a eliminar
        $idProducto = $_POST["idProducto"];

        // Consulta SQL
        $sql = "DELETE FROM productos WHERE idProducto='$idProducto'";

        if (mysqli_query($con, $sql)) {
            echo "Se Elimino Exitosamente";
        } else {
            echo "Error en al Eliminar: " . mysqli_error($con);
        }
    }
?>