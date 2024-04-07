<?php
require_once "conexion.php";

class ModeloPagos
{
  // SELECCIONAR PAGOS POR DOCUMENTO
  public function mdlSeleccionarPagosPorDocumento($tabla, $documento)
  {
    $hoy = strtotime(date('Y-m-d'));

    $alerta = Conexion::conectar()->prepare("SELECT * FROM pagos WHERE documento = :ing_idUsuario AND :ing_fecha >= desde AND :ing_fecha <= hasta");

    $alerta->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $alerta->bindValue(":ing_fecha", date('Y-m-d', $hoy), PDO::PARAM_STR); // Usar el formato correcto para la 

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

    $stmt->bindParam(
      ":documento",
      $documento,
      PDO::PARAM_STR
    );
    $stmt->bindParam(":dias_restantes", $dias_restantes, PDO::PARAM_INT);

    $stmt->execute();

    print_r($dias_restantes);

    return [$stmt, $ingreso, $dias_restantes];
  }

  // REGISTRO DE PAGO
  public static function mdlRegistroPagos($tabla, $datos)
  {
    $documento = ($datos["documento"]);
    $desde = date($datos["desde"]);
    $hasta = date($datos["hasta"]);
    $fecha_alerta_terminacion =  date("Y-m-d", strtotime($hasta));

    // COMPROVACION  SI NO EXIXTE EL CLIENTE NO DEJA REGISTRAR PAGO  
    $comprovacionUsuarios = Conexion::conectar()->prepare("SELECT COUNT(*) FROM usuarios WHERE usu_documento = :ing_idUsuario");
    $comprovacionUsuarios->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $comprovacionUsuarios->execute();
    $count = $comprovacionUsuarios->fetchColumn();

    // COMPROBACION DE SI EXIXTE MEMBRESIA NO DEJE REGISTRAR OTRO PAGO
    $comprovacionVigencia = Conexion::conectar()->prepare("SELECT COUNT(*) FROM pagos WHERE documento = :ing_idUsuario AND hasta > :desde");
    $comprovacionVigencia->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $comprovacionVigencia->bindParam(":desde", $datos["desde"], PDO::PARAM_STR);
    $comprovacionVigencia->execute();
    $comprobacion = $comprovacionVigencia->fetchColumn();

    if ($count > 0 && $comprobacion <= 0) {
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
