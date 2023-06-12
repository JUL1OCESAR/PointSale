<?php
    
    // Inicia una sesión existente o crea una nueva sesión
    session_start();

    // Destruye la sesión actual y elimina todos los datos asociados con ella
    session_destroy();

    // Redirige al usuario a la página "../index.php"
    header("Location: ../index.php");
?>