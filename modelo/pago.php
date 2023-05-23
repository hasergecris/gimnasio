<?php

require_once 'conexion.php';

class PagosModelo {

  static public function guardarPago($tabla, $datos) {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (cliente, valor, desde, hasta) VALUES (:cliente, :valor, :desde, :hasta)");

    $stmt->bindParam(":cliente", $datos["cliente"], PDO::PARAM_STR);
    $stmt->bindParam(":valor", $datos["valor"], PDO::PARAM_STR);
    $stmt->bindParam(":desde", $datos["desde"], PDO::PARAM_STR);
    $stmt->bindParam(":hasta", $datos["hasta"], PDO::PARAM_STR);

    if ($stmt->execute()) {
      return "ok";
    } else {
      print_r(Conexion::conectar()->errorInfo());
    }
  }

}
