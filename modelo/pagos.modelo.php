<?php
require_once "conexion.php";

class ModeloPagos
{

  // SELECCIONAR PAGOS POR DOCUMENTO
  static public function mdlSeleccionarPagosPorDocumento($tabla, $documento)
  {
    $hoy = date("Y-m-d");

    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ing_idUsuario, ing_fecha) VALUES (:ing_idUsuario,:ing_fecha )");
    $stmt->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $stmt->bindParam(":ing_fecha", $hoy, PDO::PARAM_STR);

    $stmt->execute();



    $alerta = Conexion::conectar()->prepare("SELECT * FROM  pagos WHERE $hoy >= fecha_alerta_terminacion");
    $alerta->execute();


    $datosIngreso = $alerta->fetch(PDO::FETCH_ASSOC);
    $fecha_final = $datosIngreso["hasta"];
    if ($alerta) {
      $ingreso = "true";
    } else {
      $ingreso = "false";
    }

    // ingresasr dias restantes
    $date1 = new DateTime($hoy);
    $date2 = new DateTime($fecha_final);
    $diff = $date1->diff($date2);
    // will output 2 days
   


    $stmt = Conexion::conectar()->prepare("UPDATE pagos SET dias_restantes = :dias_restantes WHERE  documento = :documento");

    $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
    $stmt->bindParam(":dias_restantes", $hoy, PDO::PARAM_STR);

    $stmt->execute();


    return  array($stmt, $ingreso, $diff);
  }

  // REGISTRO DE PAGO
  public static function mdlRegistroPagos($tabla, $datos)
  {
    $hasta = date($datos["hasta"]);
    $desde = date($datos["desde"]);
    $fecha_alerta_terminacion =  date("y-m-d", strtotime($hasta . "- 2 days"));


    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (documento, valor, usu_nombre,duracion, desde, hasta,fecha_alerta_terminacion) VALUES (:documento, :valor, :usu_nombre,:duracion, :desde, :hasta, :fecha_alerta_terminacion)");

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
