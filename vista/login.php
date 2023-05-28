<?php
    require "../controlador/conexion.php";
    $con = connection();
    $sql = "SELECT * FROM usuarios";
    $query = mysqli_query($con, $sql);
    session_start();

    if ($_POST) {
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];
        $sql = "SELECT id, password, nombre, tipo_usuario FROM usuarios WHERE usuario = '$usuario'";
        //echo $sql;
        $resultado = $con -> query($sql);
        $num = $resultado -> num_rows;

        if($num > 0){
            $row = $resultado -> fetch_assoc();
            $password_bd = $row['password'];
            $pass_c = sha1 ($password);

            if($password_bd == $pass_c){
                $_SESSION ['id'] = $row ['id'];
                $_SESSION ['nombre'] = $row ['nombre'];
                $_SESSION ['tipo_usuario'] = $row ['tipo_usuario'];
                header("Location: ../index.php");
            }
            else { echo "Contraseña no coincide"; }
        }
        else { echo "No existe usuario"; }
    }  
?>

<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://tresplazas.com/web/img/big_punto_de_venta.png" rel="shortcut icon">
        <title>Inicio de sesión</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
        <link rel="stylesheet" href="../vista/assets/dist/css/login.css">
        <link rel="stylesheet" href="../vista/assets/dist/css/cabecera.css">
    </head>

    <body>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <img src="../vista/assets/dist/img/avatar.svg" class="imagenv">
            <h1 class="animate__animated animate__backInLeft">BIENVENIDO</h1>
            <p>Usuario <input type="text" placeholder="ingrese su usuario" name="usuario"></p>
            <p>Contraseña <input type="password" placeholder="ingrese su contraseña" name="password"></p>
            <a href="restablecer.php">Olvidé mi contraseña</a> <br>
            <button type="submit" class="btn">
                Ingresar
            </button>
            <!--<input name="btningresar" type="submit" class="btn" value="Ingresar"> -->
        </form>
    </body>
</html>