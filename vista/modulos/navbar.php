<?php include_once 'aside.php'; ?>
<!-- Barra de navegación -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Enlaces de navegación -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vista/tablero.php','content-wrapper')">Tablero</a>
        </li>        
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vista/categoria.php','content-wrapper')">Categorías</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vista/ventas.php','content-wrapper')">Ventas</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vista/compras.php','content-wrapper')">Compras</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vista/reportes.php','content-wrapper')">Reportes</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vista/configuracion.php','content-wrapper')">Configuración</a>
        </li>
        <?php
            if ($tipo_usuario == 1) {
        ?>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vista/inventario.php','content-wrapper')">Inventario</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a style="cursor: pointer;" class="nav-link" onclick="CargarContenido('vista/usuarios.php','content-wrapper')">Usuarios</a>
        </li>
        <?php
            }
        ?>
    </ul>
</nav>
<!-- /.navbar -->
<style>
    .navbar-nav{
        width: 100%;
        justify-content: space-around;
    }
</style>