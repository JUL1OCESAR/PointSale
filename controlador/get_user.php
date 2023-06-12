<?php
    
    // Requiere el archivo de conexión a la base de datos
    require "conexion.php"; 

    // Realiza la consulta para obtener los usuarios y los asigna a la variable $query
    $query = mysqli_query(connection(), "SELECT * FROM usuarios");

    // Recorre los resultados de la consulta y muestra cada usuario como una fila en la tabla
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td class=\"user-id\" data-id=\"" . $row['id'] . "\">" . $row['id'] . "</td>";
        echo "<td class=\"user-username\" data-id=\"" . $row['id'] . "\">" . $row['usuario'] . "</td>";
        echo "<td class=\"user-password\" data-id=\"" . $row['id'] . "\">" . $row['password'] . "</td>";
        echo "<td class=\"user-name\" data-id=\"" . $row['id'] . "\">" . $row['nombre'] . "</td>";
        echo "<td class=\"user-lastname\" data-id=\"" . $row['id'] . "\">" . $row['apellido'] . "</td>";
        echo "<td class=\"user-type\" data-id=\"" . $row['id'] . "\">" . $row['tipo_usuario'] . "</td>";
        echo "<td class=\"user-edit\"><button onclick=\"mostrarEditar(" . $row['id'] . ")\">Editar</button></td>";
        echo "<td class=\"user-delete\"><button onclick=\"eliminarUsuario(" . $row['id'] . ")\">Eliminar</button></td>";
        echo "</tr>";
    }        
?>