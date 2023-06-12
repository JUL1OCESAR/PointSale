<!-- Metodo para CargarPlantilla llama a la vista "plantilla.php" -->

<?php
    class PlantillaControlador{
        public function CargarPlantilla(){
            include "vista/plantilla.php";
        }
    }
?>