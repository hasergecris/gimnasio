<?php
require_once "conexion.php";

class ModeloPagos
{
  // REGISTRO DE PAGO
  public static function mdlRegistroPagos($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (documento, valor, usu_nombre,duracion, desde, hasta) VALUES (:documento, :valor, :usu_nombre,:duracion, :desde, :hasta)");

    $stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_STR);
    $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":duracion", $datos["duracion"], PDO::PARAM_STR);
    $stmt->bindParam(":desde", $datos["desde"], PDO::PARAM_STR);
    $stmt->bindParam(":hasta", $datos["hasta"], PDO::PARAM_STR);

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
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET documento = :documento, valor = :valor, usu_nombre = :usu_nombre, desde = :desde, hasta = :hasta WHERE id = :id");

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
?>
