    <?php
    // require() establece que el codigo del archivo es requerido
        require_once "controladores/plantilla.controlador.php";
        require_once "controladores/formularios.controlador.php";
        require_once 'controladores/pagos.controlador.php';


        require_once "modelo/formularios.modelo.php";
        require_once "modelo/pago.php";


        $plantilla = new ControladorPlantilla();
        $plantilla -> ctrTraerPlantilla();



        // Crear instancia del controlador de pagos
        $pagosControlador = new PagosControlador();

        // Verificar si se envió el formulario de guardar pago
        if (isset($_POST["guardar_pago"])) {
         $pagosControlador-> guardarPago($cliente, $valor, $desde, $hasta);
        }
        ?>








