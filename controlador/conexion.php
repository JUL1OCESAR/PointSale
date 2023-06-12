<?php
    function connection(){
        
        // Se definen los datos de conexión a la base de datos
        $host = "localhost";    // Dirección del servidor de la base de datos
        $user = "root";         // Usuario de la base de datos
        $pass = "";             // Contraseña de la base de datos
        $bd = "sistema";        // Nombre de la base de datos

        // Se establece la conexión utilizando la función mysqli_connect()
        $connect=mysqli_connect($host, $user, $pass);

        // Se selecciona la base de datos utilizando la función mysqli_select_db()
        mysqli_select_db($connect, $bd);

        // Se retorna el objeto de conexión para su uso posterior en otras partes del código
        return $connect;
    }
?>