<!-- LLama al metodo PlantillaControlador y carga plantilla -->
<?php
    require_once "controlador/plantilla_controlador.php";
    $plantilla = new PlantillaControlador();
    $plantilla->CargarPlantilla();
?>