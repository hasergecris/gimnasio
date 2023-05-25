<?php
// require_once "modelo/conexion.php";

// if (isset($_POST['documento'])) {
//     $documento = $_POST['documento'];

//     // Obtener la conexión a la base de datos
//     $con = Conexion::conectar();

//     // Verificar si la conexión a la base de datos se establece correctamente
//     if (!$con) {
//         die("Error al conectar a la base de datos: " . $con->errorInfo());
//     }

//     $sql = "SELECT desde, hasta, duracion FROM pagos WHERE documento= '$documento'";
//     $query = $con->query($sql);

//     // Verificar si la consulta se ejecuta correctamente
//     if ($query) {
//         $counter = $query->rowCount();

//         if ($counter > 0) {
//             $fila = $query->fetch(PDO::FETCH_ASSOC);

//             $fecha_inicio = $fila['desde'];
//             $fecha_fin = $fila['hasta'];
//             $duracion = $fila['duracion'];

//             if (!empty($fecha_fin)) {
//                 // Calcular los días restantes hasta la fecha de finalización
//                 $fecha_actual = date('Y-m-d');
//                 $diferencia = strtotime($fecha_fin) - strtotime($fecha_actual);
//                 $dias_restantes = ceil($diferencia / (60 * 60 * 24));

//                 if ($dias_restantes <= 0) {
//                     // Mostrar mensaje de suscripción terminada
//                     echo '<script>
//                             $(document).ready(function() {
//                                 $("#modal-alerta").modal("show");
//                             });
//                         </script>';
//                 } elseif ($dias_restantes === 1) {
//                     // Mostrar mensaje de 1 día restante
//                     echo '<script>
//                             $(document).ready(function() {
//                                 $("#modal-alerta-1dia").modal("show");
//                             });
//                         </script>';
//                 }
//             } else {
//                 // Calcular la fecha de finalización a partir de la fecha de inicio y la duración de la suscripción
//                 $fecha_actual = date('Y-m-d');
//                 $dias_suscripcion = 0;

//                 if ($duracion === '15') {
//                     $dias_suscripcion = 15;
//                 } elseif ($duracion === '30') {
//                     $dias_suscripcion = 30;
//                 } elseif ($duracion === 'anual') {
//                     $dias_suscripcion = 365;
//                 }

//                 $fecha_fin = date('Y-m-d', strtotime($fecha_inicio . ' + ' . $dias_suscripcion . ' days'));

//                 // Actualizar la fecha de finalización en la tabla "pagos"
//                 $update_sql = "UPDATE pagos SET hasta = '$fecha_fin' WHERE documento = '$documento'";
//                 $update_query = $con->query($update_sql);

//                 // Verificar si la actualización se realiza correctamente
//                 if ($update_query) {
//                     // Mostrar mensaje de suscripción exitosa
//                     echo '<script>
//                             $(document).ready(function() {
//                                 $("#modal-suscripcion").modal("show");
//                             });
//                         </script>';
//                 } else {
//                     // Mostrar mensaje de error en caso de fallo en la actualización
//                     echo "Error al actualizar la fecha de finalización: " . $con->errorInfo();
//                 }
//             }
//         } else {
//             // Mostrar mensaje de suscripción no encontrada
//             echo '<script>
//                     $(document).ready(function() {
//                         $("#modal-error").modal("show");
//                     });
//                 </script>';
//         }
//     } else {
//         // Mostrar mensaje de error en caso de fallo en la consulta
//         echo "Error al ejecutar la consulta: " . $con->errorInfo()[2];
//     }

//     // Cerrar la conexión a la base de datos
//     $con = null;
// }
