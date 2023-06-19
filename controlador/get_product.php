<?php
    
    // Requiere el archivo de conexión a la base de datos
    require "conexion.php"; 

    // Realiza la consulta para obtener los usuarios y los asigna a la variable $query
    $query = mysqli_query(connection(), "SELECT * FROM productos");

    // Recorre los resultados de la consulta y muestra cada usuario como una fila en la tabla
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td class=\"product-id\" data-id=\"" . $row['idProducto'] . "\">" . $row['idProducto'] . "</td>";
        echo "<td class=\"product-codigo\" data-id=\"" . $row['idProducto'] . "\">" . $row['codProducto'] . "</td>";
        echo "<td class=\"product-nombre\" data-id=\"" . $row['idProducto'] . "\">" . $row['nomProducto'] . "</td>";
        echo "<td class=\"product-compra\" data-id=\"" . $row['idProducto'] . "\">" . $row['precioCompraProducto'] . "</td>";
        echo "<td class=\"product-venta\" data-id=\"" . $row['idProducto'] . "\">" . $row['precioVentaProducto'] . "</td>";
        echo "<td class=\"product-utilidad\" data-id=\"" . $row['idProducto'] . "\">" . $row['utilidadProducto'] . "</td>";
        echo "<td class=\"product-existencia\" data-id=\"" . $row['idProducto'] . "\">" . $row['existenciaProducto'] . "</td>";
        echo "<td class=\"product-edit\"><button onclick=\"mostrarEditar(" . $row['idProducto'] . ")\">Editar</button></td>";
        echo "<td class=\"product-delete\"><button onclick=\"eliminarUsuario(" . $row['idProducto'] . ")\">Eliminar</button></td>";
        echo "</tr>";
    }        
?>