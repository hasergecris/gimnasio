    <?php
    // require() establece que el codigo del archivo es requerido
    require_once "controladores/plantilla.controlador.php";
    require_once "controladores/formularios.controlador.php";
    require_once "controladores/pagos.controlador.php";


    require_once "modelo/formularios.modelo.php";
    require_once "modelo/pagos.modelo.php";



    $plantilla = new ControladorPlantilla();
    $plantilla->ctrTraerPlantilla();
