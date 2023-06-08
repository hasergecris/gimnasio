<?php
require_once "conexion.php";

class ModeloPagos
{

  /// SELECCIONAR PAGOS POR DOCUMENTO
  static public function mdlSeleccionarPagosPorDocumento($tabla, $documento)
  {
    $hoy = date("Y-m-d");

    // Consulta para seleccionar el último pago realizado por el usuario
    $filtro = Conexion::conectar()->prepare("SELECT * FROM pagos WHERE documento=:ing_idUsuario ORDER BY campo_fecha DESC LIMIT 1;");
    $filtro->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $filtro->bindParam(":ing_fecha", $hoy, PDO::PARAM_STR);
    $filtro->execute();
    $datos_filtro = $filtro->fetch(PDO::FETCH_ASSOC);
    $id_ultimo_pago = $datos_filtro["id"];

    // Consulta para comprobar si la suscripción aún está vigente
    $alerta = Conexion::conectar()->prepare("SELECT * FROM pagos WHERE id = :ultimo_pago AND (fecha_alerta_terminacion <= :ing_fecha AND documento = :ing_idUsuario AND (:ing_fecha >= desde AND :ing_fecha <= hasta))");
    $alerta->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $alerta->bindParam(":ing_fecha", $hoy, PDO::PARAM_STR);
    $alerta->bindParam(":ultimo_pago", $id_ultimo_pago, PDO::PARAM_STR);
    $alerta->execute();
    $datosIngreso = $alerta->fetch(PDO::FETCH_ASSOC);
    $fecha_final = $datosIngreso["hasta"];

    if ($alerta->rowCount() > 0) {
      $ingreso = true;
    } else {
      $ingreso = false;
    }

    // Calcular los días restantes
    $date1 = new DateTime($hoy);
    $date2 = new DateTime($fecha_final);
    $diff = $date1->diff($date2);
    $fechaString = $diff->format('%d');

    if ($fechaString != 0) {
      // Insertar el nuevo pago
      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ing_idUsuario, ing_fecha) VALUES (:ing_idUsuario, :ing_fecha)");
      $stmt->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
      $stmt->bindParam(":ing_fecha", $hoy, PDO::PARAM_STR);
      $stmt->execute();
    }

    // Actualizar los días restantes en la tabla de pagos
    $stmt = Conexion::conectar()->prepare("UPDATE pagos SET dias_restantes = :dias_restantes WHERE documento = :documento");
    $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
    $stmt->bindParam(":dias_restantes", $fechaString, PDO::PARAM_STR);
    $stmt->execute();

    return array($stmt, $ingreso, $fechaString);
  }

  // REGISTRO DE PAGO
  public static function mdlRegistroPagos($tabla, $datos)
  {
    $hasta = date($datos["hasta"]);
    $desde = date($datos["desde"]);
    $fecha_alerta_terminacion = date("y-m-d", strtotime($hasta . "- 2 days"));

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (documento, valor, usu_nombre, duracion, desde, hasta, fecha_alerta_terminacion) VALUES (:documento, :valor, :usu_nombre, :duracion, :desde, :hasta, :fecha_alerta_terminacion)");

    $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
    $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
    $stmt->bindParam(":desde", $desde, PDO::PARAM_STR);
    $stmt->bindParam(":hasta", $hasta, PDO::PARAM_STR);
    $stmt->bindParam(":fecha_alerta_terminacion", $fecha_alerta_terminacion, PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    } else {
      print_r(Conexion::conectar()->errorInfo());
    }
  }

  // LISTAR PAGOS
  static public function mdlSeleccionarPagos($tabla)
  {
    $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
    $stmt->execute();

    return $stmt->fetchAll();
  }

  // ACTUALIZAR PAGO
  static public function mdlActualizarPago($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET documento = :documento, valor = :valor, usu_nombre = :usu_nombre, duracion = :duracion, desde = :desde, hasta = :hasta WHERE id = :id");

    $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
    $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
    $stmt->bindParam(":desde", $datos["desde"], PDO::PARAM_STR);
    $stmt->bindParam(":hasta", $datos["hasta"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    } else {
      print_r(Conexion::conectar()->errorInfo());
    }
  }

  // ELIMINAR PAGO
  static public function mdlEliminarPago($tabla, $valor)
  {
    $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
    $stmt->bindParam(":id", $valor, PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    } else {
      print_r(Conexion::conectar()->errorInfo());
    }
  }
}
