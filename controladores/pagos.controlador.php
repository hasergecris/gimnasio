<?php

// require_once 'conexion.php';

class PagosControlador {
  public function guardarPago($cliente, $valor, $desde, $hasta) {
    $conn = Conexion::conectar();

    $sql = "INSERT INTO pagos (cliente, valor, desde, hasta) VALUES (:cliente, :valor, :desde, :hasta)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':desde', $desde);
    $stmt->bindParam(':hasta', $hasta);

    if ($stmt->execute()) {
      return true;
    } else {
      return false;
    }
  }
}

?>
