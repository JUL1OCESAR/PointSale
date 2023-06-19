<?php
    // Inicia una sesión
    session_start();

    // Redirecciona al usuario a la página de inicio de sesión si no existe la variable de sesión 'id'
    if (!isset($_SESSION['id'])) {
        header("Location: vista/login.php"); 
    }

    // Obtiene el valor de la variable de sesión 'nombre' y 'tipo_usuario' y lo asigna a su variable local
    $nombre = $_SESSION['nombre']; 
    $tipo_usuario = $_SESSION['tipo_usuario'];
?>

<!-- Contenedor de la barra lateral principal -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Logotipo de la marca -->
    <a href="index3.html" class="brand-link">
        <img src="vista/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">Market Rosita</span>
    </a>

    <!-- Barra lateral -->
    <div class="sidebar">

        <!-- Menú de la barra lateral -->
        <nav class="mt-2">

            <!-- Usuario promedio -->
            <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                <?php echo $nombre ?>
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="#" class="nav-link active">
                                    <p>Configuración</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="controlador/logout.php" class="nav-link">
                                    <p>Cerrar sesión</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </div>

                <li class="nav-item">
                    <a style ="cursor: pointer;" href="#" class="nav-link" onclick="CargarContenido('vista/dashboard.php', 'content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Tablero Principal
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Productos
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style ="cursor: pointer;" href="#" class="nav-link active" onclick="CargarContenido('vista/inventario.php', 'content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Inventario</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Categorías</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a style ="cursor: pointer;" href="#" class="nav-link" onclick="CargarContenido('vista/ventas.php', 'content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Ventas
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a style ="cursor: pointer;" href="#" class="nav-link" onclick="CargarContenido('vista/dashboard.php', 'content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Compras
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a style ="cursor: pointer;" href="#" class="nav-link" onclick="CargarContenido('vista/prueba.php', 'content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Reportes
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a style ="cursor: pointer;" href="#" class="nav-link" onclick="CargarContenido('vista/dashboard.php', 'content-wrapper')">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Configuración
                        </p>
                    </a>
                </li>
            <!-- Cierre de usuario promedio -->

            <!-- Confidencial (solo para administradores) -->
                <?php
                    if ($tipo_usuario == 1) {
                ?>
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Confidencial
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a style ="cursor: pointer;" href="#" class="nav-link active" onclick="CargarContenido('vista/usuarios.php', 'content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a style ="cursor: pointer;" href="#" class="nav-link" onclick="CargarContenido('vista/general.php', 'content-wrapper')">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Configuración General</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
                    }
                ?>
            <!-- Cierre de confidencial -->
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

<!-- Posible buscador -->
<!-- SidebarSearch Form 
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->