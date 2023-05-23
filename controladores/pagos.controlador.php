<?php

// require_once 'conexion.php';

class PagosControlador {
  private $conn;

  public function __construct() {
    $this->conn = Conexion::conectar(); // Utiliza la función estática de la clase 'Conexion' para obtener la conexión a la base de datos
  }

  public function guardarPago($cliente, $valor, $desde, $hasta) {
    // Verificar que los datos del pago sean válidos y realizar cualquier validación adicional si es necesario

    // Insertar el pago en la base de datos
    $sql = "INSERT INTO pagos (cliente, valor, desde, hasta) VALUES (:cliente, :valor, :desde, :hasta)";
    $stmt = $this->conn->prepare($sql);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':valor', $valor);
    $stmt->bindParam(':desde', $desde);
    $stmt->bindParam(':hasta', $hasta);

    if ($stmt->execute()) {
      // Pago registrado exitosamente
      return true;
    } else {
      // Error al registrar el pago
      return false;
    }
  }
}

?>
