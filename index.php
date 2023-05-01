<?php
// require() establece que el codigo del archivo es requerido
    require_once "controladores/plantilla.controlador.php";
    require_once "controladores/formularios.controlador.php";


    $plantilla = new ControladorPlantilla();
    $plantilla -> ctrTraerPlantilla();

    
 ?>


