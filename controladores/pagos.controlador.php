<?php

  //INGRESO USUARIO
  class ControladorPagos
  {
    // INGRESO USUARIO
    static public function ctrIngresoUsuarios()
    {
      if (isset($_POST["documento"])) {
        $tabla = "ingreso_clientes";
        $documento = $_POST["documento"];
  
        $respuesta = ModeloPagos::mdlSeleccionarPagosPorDocumento($tabla, $documento);
  
        return $respuesta;
      }
    }
  
    // SELECCIONAR PAGOS POR DOCUMENTO
    public static function ctrSeleccionarPagosPorDocumento()
    {
      if (isset($_POST["documento"])) {
        $documento = $_POST["documento"];
        $respuesta = ModeloPagos::mdlSeleccionarPagosPorDocumento("pagos", $documento);
  
        if ($respuesta[1]) {
          $mensaje = "La suscripción está vigente. Quedan " . $respuesta[2] . " días.";
        } else {
          $mensaje = "La suscripción ha finalizado.";
        }
  
        echo json_encode($mensaje);
      }
    }
  
    // REGISTRO DE PAGO
    public static function ctrRegistroPagos()
    {
      if (isset($_POST["documento"])) {
        $tabla = "pagos";
        $datos = array(
          "documento" => $_POST["documento"],
          "valor" => $_POST["valor"],
          "usu_nombre" => $_POST["usu_nombre"],
          "duracion" => $_POST["duracion"],
          "desde" => $_POST["desde"],
          "hasta" => $_POST["hasta"]
        );
  
        // Comprobar si existen pagos vigentes para el mismo documento
        $pagosVigentes = ModeloPagos::mdlSeleccionarPagosPorDocumento($tabla, $datos["documento"]);
  
        if ($pagosVigentes[1]) {
          return "No se puede registrar el pago. Aún hay una suscripción vigente para este documento.";
        }
  
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
              if (window.history.replaceState) {
                window.history.replaceState(null, null, window.location.href);
              }
              window.location = "index.php?pagina=lista_pagos";
            </script>';
        }
      }
    }
  }
  

