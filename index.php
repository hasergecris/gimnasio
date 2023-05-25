    <?php
    // require() establece que el codigo del archivo es requerido
    require_once "controladores/plantilla.controlador.php";
    require_once "controladores/formularios.controlador.php";
    require_once "controladores/ingreso_usuarios.php";


    require_once "modelo/formularios.modelo.php";


    $plantilla = new ControladorPlantilla();
    $plantilla->ctrTraerPlantilla();











