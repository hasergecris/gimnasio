<?php
require("../modelo/conexion.php");

$documento = $_POST['documento'];

$sql = "SELECT desde, hasta, duracion FROM pagos WHERE cliente = '$documento'";
$query = mysqli_query($con, $sql);
$counter = mysqli_num_rows($query);
$fila = mysqli_fetch_assoc($query);

$fecha_inicio = $fila['desde'];
$fecha_fin = $fila['hasta'];
$duracion = $fila['duracion'];

if (!empty($fecha_fin)) {
    // Calcular los días restantes hasta la fecha de finalización
    $fecha_actual = date('Y-m-d');
    $diferencia = strtotime($fecha_fin) - strtotime($fecha_actual);
    $dias_restantes = ceil($diferencia / (60 * 60 * 24));

    if ($dias_restantes <= 0) {
        // Mostrar mensaje de suscripción terminada
        echo '<script>
                $(document).ready(function() {
                    $("#modal-alerta").modal("show");
                });
            </script>';
    } elseif ($dias_restantes === 1) {
        // Mostrar mensaje de 1 día restante
        echo '<script>
                $(document).ready(function() {
                    $("#modal-alerta-1dia").modal("show");
                });
            </script>';
    }
} else {
    // Calcular la fecha de finalización a partir de la fecha de inicio y la duración de la suscripción
    $fecha_actual = date('Y-m-d');
    $dias_suscripcion = 0;

    if ($duracion === '15') {
        $dias_suscripcion = 15;
    } elseif ($duracion === '30') {
        $dias_suscripcion = 30;
    } elseif ($duracion === 'anual') {
        $dias_suscripcion = 365;
    }

    $fecha_fin = date('Y-m-d', strtotime($fecha_inicio . ' + ' . $dias_suscripcion . ' days'));

    // Actualizar la fecha de finalización en la tabla "pagos"
    $update_sql = "UPDATE pagos SET hasta = '$fecha_fin' WHERE cliente = '$documento'";
    mysqli_query($con, $update_sql);

    // Mostrar mensaje de suscripción exitosa
    echo '<script>
            $(document).ready(function() {
                $("#modal-suscripcion").modal("show");
            });
        </script>';
}
