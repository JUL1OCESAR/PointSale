<?php
    // Requiere el archivo de conexión
    require "../controlador/conexion.php";
    
    // Establece la conexión con la base de datos
    $con = connection();
    
    // Consulta SQL para obtener todos los usuarios
    $sql = "SELECT * FROM usuarios";
    
    // Ejecuta la consulta en la conexión establecida
    $query = mysqli_query($con, $sql);
    
    // Inicia una sesión
    session_start();
    
    // Verifica si se envió el formulario
    if ($_POST) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        
        // Consulta SQL para obtener el usuario ingresado
        $sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario = '$usuario'";
        
        // Ejecuta la consulta en la conexión establecida
        $resultado = $con->query($sql);
        $num = $resultado->num_rows;
        
        // Verifica si se encontró un usuario con el nombre ingresado
        if ($num > 0) {
            $row = $resultado->fetch_assoc();
            $password_bd = $row['password'];
            $pass_c = $password;
            
            // Verifica si la contraseña ingresada coincide con la almacenada en la base de datos
            if ($password_bd == $pass_c) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['nombre'] = $row['nombre'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                header("Location: ../index.php");
            } else {
                echo "Contraseña no coincide";
            }
        } else {
            echo "No existe usuario";
        }
    }
?>

<!-- Inicio de la página HTML -->
<html lang="es">
    <head>
        
        <!-- Encabezado del documento -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
        <title>Inicio de sesión</title>

        <!-- Enlaces a archivos de estilo externos -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        
        <!-- Estilos personalizados del formulario de inicio de sesión -->
        <link rel="stylesheet" href="../vista/assets/dist/css/logeo.css">
                
    </head>    
    <body>
        <div id="backgroud">
        
            <!-- Formulario de inicio de sesión -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <img src="../vista/assets/dist/img/avatar.svg" class="imagenv">
                <h1 class="animate__animated animate__backInLeft">BIENVENIDO</h1>
                <p>Usuario <input type="text" placeholder="ingrese su usuario" name="usuario"></p>
                <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="password"></p>
                <a href="restablecer.php">Olvidé mi contraseña</a> <br>
                
                <!-- Botón de envío del formulario -->
                <button type="submit" class="btn">
                    Ingresar
                </button>
            </form>
        </div>
    </body>
</html>
<!-- Fin de la página HTML -->