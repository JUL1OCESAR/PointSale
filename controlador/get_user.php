<?php
    require "conexion.php";

    // Realiza la consulta para obtener los usuarios
    $query = mysqli_query(connection(), "SELECT * FROM usuarios");

    // Recorre los resultados de la consulta y muestra cada usuario como una fila en la tabla
    while ($row = mysqli_fetch_assoc($query)) {
        echo "<tr>";
        echo "<td class=\"user-id\">" . $row['id'] . "</td>";
        echo "<td class=\"user-username\">" . $row['usuario'] . "</td>";
        echo "<td class=\"user-password\">" . $row['password'] . "</td>";
        echo "<td class=\"user-name\">" . $row['nombre'] . "</td>";
        echo "<td class=\"user-lastname\">" . $row['apellido'] . "</td>";
        echo "<td class=\"user-type\">" . $row['tipo_usuario'] . "</td>";
        echo "<td class=\"user-edit\"><a href=\"#" . $row['id'] . "\" class=\"users-table--edit\">Editar</a></td>";
        echo "<td class=\"user-delete\"><a ref=\"#\" onclick=\"submitData(" . $row['id'] . ");\">Eliminar</a></td>";
        echo "</tr>";
    }
?>
