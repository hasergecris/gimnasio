<?php
require_once "conexion.php";

class ModeloPagos
{
  // SELECCIONAR PAGOS POR DOCUMENTO
  public function mdlSeleccionarPagosPorDocumento($tabla, $documento)
  {
    $hoy = strtotime(date('Y-m-d'));

    // Actualizar los días restantes para todos los usuarios
    $stmt = Conexion::conectar()->prepare("SELECT id, hasta FROM pagos");
    $stmt->execute();
    $pagos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($pagos as &$pago) {  // Pasar por referencia
      $fecha_final = strtotime($pago['hasta']);
      $diff = $fecha_final - $hoy;
      $dias_restantes = round($diff / (60 * 60 * 24));

      $updateStmt = Conexion::conectar()->prepare("UPDATE pagos SET dias_restantes = :dias_restantes WHERE id = :id");
      $updateStmt->bindParam(":dias_restantes", $dias_restantes, PDO::PARAM_INT);
      $updateStmt->bindParam(":id", $pago['id'], PDO::PARAM_INT);
      $updateStmt->execute();
    }
    unset($pago);  // Liberar la referencia después del bucle foreach

    // Luego realizar la verificación del usuario
    $alerta = Conexion::conectar()->prepare("SELECT * FROM pagos WHERE documento = :documento AND :hoy >= desde AND :hoy <= hasta");
    $alerta->bindParam(":documento", $documento, PDO::PARAM_STR);
    $alerta->bindValue(":hoy", date('Y-m-d', $hoy), PDO::PARAM_STR); // Usar el formato correcto para la fecha
    $alerta->execute();

    $datosIngreso = $alerta->fetch(PDO::FETCH_ASSOC);

    if ($datosIngreso) {
      $ingreso = true;
      // Verificar si existe la clave 'hasta' en $datosIngreso
      if (isset($datosIngreso['hasta'])) {
        $fecha_final = strtotime($datosIngreso['hasta']); // Convertir la fecha final a timestamp
        $diff = $fecha_final - $hoy; // Calcular la diferencia en segundos
        $dias_restantes = round($diff / (60 * 60 * 24)); // Convertir la diferencia a días y redondear
      } else {
        $dias_restantes = 0;
      }
    } else {
      $ingreso = false;
    }

    $stmt = Conexion::conectar()->prepare("UPDATE pagos SET dias_restantes = :dias_restantes WHERE documento = :documento");
    $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
    $stmt->bindParam(":dias_restantes", $dias_restantes, PDO::PARAM_INT);
    $stmt->execute();

    return [$stmt, $ingreso, $dias_restantes];
  }

  // REGISTRO DE PAGO
  public static function mdlRegistroPagos($tabla, $datos)
  {
    $documento = $datos["documento"];
    $desde = strtotime($datos["desde"]);
    $hasta = strtotime($datos["hasta"]);
    $fecha_alerta_terminacion = date("Y-m-d", strtotime($datos["hasta"]));
    $dias_restantes = round(($hasta - strtotime(date('Y-m-d'))) / (60 * 60 * 24));

    // COMPROVACION SI NO EXISTE EL CLIENTE NO DEJA REGISTRAR PAGO
    $comprobacionUsuarios = Conexion::conectar()->prepare("SELECT COUNT(*) FROM usuarios WHERE usu_documento = :documento");
    $comprobacionUsuarios->bindParam(":documento", $documento, PDO::PARAM_STR);
    $comprobacionUsuarios->execute();
    $count = $comprobacionUsuarios->fetchColumn();

    // COMPROBACION DE SI EXISTE MEMBRESIA NO DEJE REGISTRAR OTRO PAGO
    $comprobacionVigencia = Conexion::conectar()->prepare("SELECT COUNT(*) FROM pagos WHERE documento = :documento AND hasta > :desde");
    $comprobacionVigencia->bindParam(":documento", $documento, PDO::PARAM_STR);
    $comprobacionVigencia->bindParam(":desde", $datos["desde"], PDO::PARAM_STR);
    $comprobacionVigencia->execute();
    $comprobacion = $comprobacionVigencia->fetchColumn();

    if ($count > 0 && $comprobacion <= 0) {
      $desdeFecha = date('Y-m-d', $desde);
      $hastaFecha = date('Y-m-d', $hasta);

      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (documento, valor, usu_nombre, duracion, desde, hasta, dias_restantes, fecha_alerta_terminacion) VALUES (:documento, :valor, :usu_nombre, :duracion, :desde, :hasta, :dias_restantes, :fecha_alerta_terminacion)");

      $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
      $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
      $stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
      $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
      $stmt->bindParam(":desde", $desdeFecha, PDO::PARAM_STR);
      $stmt->bindParam(":hasta", $hastaFecha, PDO::PARAM_STR);
      $stmt->bindParam(":dias_restantes", $dias_restantes, PDO::PARAM_INT);
      $stmt->bindParam(":fecha_alerta_terminacion", $fecha_alerta_terminacion, PDO::PARAM_STR);

      if ($stmt->execute()) {
        return "ok";
      } else {
        print_r(Conexion::conectar()->errorInfo());
      }
    } else if ($comprobacion > 0) {
      return "vigente";
    } else {
      return "no";
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
    $desde = strtotime($datos["desde"]);
    $hasta = strtotime($datos["hasta"]);
    $hoy = strtotime(date('Y-m-d'));
    $dias_restantes = round(($hasta - $hoy) / (60 * 60 * 24));

    // Convertir timestamps a fechas antes de pasarlos a bindParam
    $desdeFecha = date('Y-m-d', $desde);
    $hastaFecha = date('Y-m-d', $hasta);

    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET documento = :documento, valor = :valor, usu_nombre = :usu_nombre, duracion = :duracion, desde = :desde, hasta = :hasta, dias_restantes = :dias_restantes WHERE id = :id");

    $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
    $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
    $stmt->bindParam(":desde", $desdeFecha, PDO::PARAM_STR);
    $stmt->bindParam(":hasta", $hastaFecha, PDO::PARAM_STR);
    $stmt->bindParam(":dias_restantes", $dias_restantes, PDO::PARAM_INT);
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
