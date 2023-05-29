<?php
class ControladorPagos
{
   // INGRESO DE USUARIOS
   public static function ctrIngresoUsuarios()
   {
     if (isset($_POST["documento"])) {
       $documento = $_POST["documento"];
       $tabla = "pagos";
       $pagos = ModeloPagos::mdlSeleccionarPagosPorDocumento($tabla, $documento);
 
       if (!empty($pagos)) {
         $ultimoPago = end($pagos);
         $hasta = new DateTime($ultimoPago["hasta"]);
         $hoy = new DateTime();
 
         if ($hasta >= $hoy) {
           $diasRestantes = $hasta->diff($hoy)->days;
           // Mostrar el modal con los días restantes al usuario
           echo '<script>
                   document.getElementById("contador").innerHTML = ' . $diasRestantes . ';
                   $("#exampleModal").modal("show");
                 </script>';
         } else {
           // El último pago ha vencido
           echo '<script>
                   document.getElementById("contador").innerHTML = "Su mensualidad ha terminado";
                   $("#exampleModal").modal("show");
                 </script>';
         }
       } else {
         // No se encontraron pagos para el usuario
         echo '<script>
                 document.getElementById("contador").innerHTML = "Usuario no encontrado";
                 $("#exampleModal").modal("show");
               </script>';
       }
     }
   }

   // REGISTRO PAGOS
  public static function ctrRegistroPagos()
  {
    if (isset($_POST["documento"])) {
      $tabla = "pagos";

      $datos = array(
        "documento" => $_POST["documento"],
        "valor" => $_POST["valor"],
        "usu_nombre" => $_POST["registroNombre"],
        "duracion" => $_POST["duracion"],
        "desde" => $_POST["desde"],
        "hasta" => $_POST["hasta"]
      );

      $respuesta = ModeloPagos::mdlRegistroPagos($tabla, $datos);

      return $respuesta;
    }
  }

  // LISTAR PAGOS
  static public function ctrSeleccionarPagos()
  {
    $tabla = "pagos";
    $respuesta = ModeloPagos::mdlSeleccionarPagos($tabla);
    return $respuesta;
  }

  // ACTUALIZAR PAGO
  static public function ctrActualizarPago()
  {
    if (isset($_POST["actualizarDocumento"])) {
      $tabla = "pagos";

      $datos = array(
        "id" => $_POST["idUsuario"],
        "documento" => $_POST["actualizarDocumento"],
        "valor" => $_POST["actualizarValor"],
        "usu_nombre" => $_POST["actualizarNombre"],
        "duracion" => $_POST["actualizarDuracion"],
        "desde" => $_POST["actualizarDesde"],
        "hasta" => $_POST["actualizarHasta"]
      );

      $respuesta = ModeloPagos::mdlActualizarPago($tabla, $datos);

      return $respuesta;
    }
  }

  // ELIMINAR PAGO
  public function ctrEliminarPago()
  {
    if (isset($_POST["eliminarPago"])) {
      $tabla = "pagos";
      $valor = $_POST["eliminarPago"];

      $respuesta = ModeloPagos::mdlEliminarPago($tabla, $valor);

      if ($respuesta == "ok") {
        echo
        '<script>
          if(window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
          }
          window.location = "index.php?pagina=lista_pagos";
        </script>';
      }
    }
  }
}
