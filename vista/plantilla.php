<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Punto Fis</title>

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="vista/assets/plugins/fontawesome-free/css/all.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="vista/assets/dist/css/adminlte.min.css">
        <!-- jQuery -->
        <script src="vista/assets/plugins/jquery/jquery.min.js"></script>
        <!-- Bootstrap 4 -->
        <script src="vista/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!-- AdminLTE App -->
        <script src="vista/assets/dist/js/adminlte.min.js"></script>
    </head>

    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <?php
            include "modulos/navbar.php";
            include "modulos/aside.php";
            ?>
            
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <?php include "vista/dashboard.php" ?>
            </div>
            
            <!-- /.content-wrapper -->
            <?php
            include "modulos/footer.php";
            ?>
        </div>

        <!-- ./wrapper -->
        <script>
            function CargarContenido(pagina_php, contenedor){
                $("." + contenedor).load(pagina_php);
            }
        </script>

        <!-- REQUIRED SCRIPTS -->
        <!-- jQuery -->
        <script src="plugins/jquery/jquery.min.js"></scrip>
        <!-- Bootstrap 4 -->
        <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></scrip>
        <!-- AdminLTE App -->
        <script src="dist/js/adminlte.min.js"></script>
    </body>
</html>