<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Punto Fis</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="vista/assets/plugins/fontawesome-free/css/all.min.css">
        
        <!-- Estilo del tema -->
        <link rel="stylesheet" href="vista/assets/dist/css/adminlte.min.css">
        <link rel="stylesheet" href="vista/assets/dist/css/crudstyle.css">
 <!-- Ionicons -->
 <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

<!-- SweetAlert2 -->
<link rel="stylesheet" href="vista/assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

<!-- Jquery CSS -->
<link rel="stylesheet" href="vista/assets/plugins/jquery-ui/jquery-ui.css">

<!-- Bootstrap 5 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- jquery UI -->
<script src="vistas/assets/plugins/jquery-ui/jquery-ui.js"></script>



    </head>
    <body class="hold-transition sidebar-mini">
        
        <!-- wrapper -->
        <div class="wrapper">
            <?php include "modulos/navbar.php"; ?>
            <?php include "modulos/aside.php"; ?>

            <!-- Contenedor de contenido. Contiene el contenido de la página -->
            <div class="content-wrapper">
                <?php include "vista/dashboard.php" ?>
            </div>
            <!-- /.content-wrapper -->

            <?php include "modulos/footer.php"; ?>
        </div>
        <!-- ./wrapper -->

        <script src="vista/assets/plugins/jquery/jquery.min.js"></script>
        <script src="vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="vista/assets/dist/js/adminlte.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
        <script>
            
            // Función para cargar contenido dinámicamente
            function CargarContenido(pagina_php, contenedor) {
                $("." + contenedor).load(pagina_php);
            }
        </script>
    </body>
</html>