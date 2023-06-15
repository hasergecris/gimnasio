<?php
require_once "conexion.php";

class ModeloPagos
{

  // SELECCIONAR PAGOS POR DOCUMENTO
  static public function mdlSeleccionarPagosPorDocumento($tabla, $documento)
  {
    $hoy = date("Y-m-d");


    $alerta = Conexion::conectar()->prepare("SELECT * FROM pagos WHERE documento = :ing_idUsuario and ( :ing_fecha >= desde AND :ing_fecha <= hasta )");

    $alerta->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $alerta->bindParam(":ing_fecha", $hoy, PDO::PARAM_STR);

    $alerta->execute();


    $datosIngreso = $alerta->fetch(PDO::FETCH_ASSOC);

    $fecha_final = $datosIngreso['hasta'];
    $hasta = $fecha_final;

    if ($alerta) {
      $ingreso = "true";
    } else {
      $ingreso = "false";
    }

    $date1 = new DateTime();
    $date2 = new DateTime($hasta);
    


    $diff = $date1->diff($date2);

    // will output 2 days
    $fechaString = $diff->format('%d');

    // print_r($fechaString);


    if ($fechaString != 0) {
      $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (ing_idUsuario, ing_fecha) VALUES (:ing_idUsuario,:ing_fecha )");
      $stmt->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
      $stmt->bindParam(":ing_fecha", $hoy, PDO::PARAM_STR);

      $stmt->execute();
    }

    $stmt = Conexion::conectar()->prepare("UPDATE pagos SET dias_restantes = :dias_restantes WHERE  documento = :documento");

    $stmt->bindParam(":documento", $documento, PDO::PARAM_STR);
    $stmt->bindParam(":dias_restantes", $fechaString, PDO::PARAM_STR);

    $stmt->execute();


    return  array($stmt, $ingreso, $fechaString);
  }


  // REGISTRO DE PAGO
  public static function mdlRegistroPagos($tabla, $datos)
  {
    $documento = ($datos["documento"]);
    $hasta = date($datos["hasta"]);
    $desde = date($datos["desde"]);
    $fecha_alerta_terminacion =  date("y-m-d", strtotime($hasta . "- 2 days"));

    // COMPROVACION  SI NO EXIXTE EL CLIENTE NO DEJA REGISTRAR PAGO  
    $comprovacionUsusarios = Conexion::conectar()->prepare("SELECT COUNT(*) FROM usuarios WHERE usu_documento = :ing_idUsuario");
    $comprovacionUsusarios->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $comprovacionUsusarios->execute();
    $count = $comprovacionUsusarios->fetchColumn();

    // COMPROBACION DE SI EXIXTE MEMBRESIA NO DEJE REGISTRAR OTRO PAGO
    $comprovacionVigencia = Conexion::conectar()->prepare("SELECT COUNT(*) FROM pagos WHERE documento = :ing_idUsuario and hasta > :desde");
    $comprovacionVigencia->bindParam(":ing_idUsuario", $documento, PDO::PARAM_STR);
    $comprovacionVigencia->bindParam(":desde", $datos["desde"], PDO::PARAM_STR);
    $comprovacionVigencia->execute();
    $comprobacion = $comprovacionVigencia->fetchColumn();

    if ($count > 0 &&  $comprobacion <= 0) {
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
    } else if ($comprobacion > 0) {
      return "vigente";
    } else {
      return "no";
    }
  }

  // static public function mdlBuscarUsuario() {
    
  // $busqueda=$_POST['cadena'];

  // strlen($busqueda);


  //   $buscar = Conexion::conectar()->prepare("SELECT * FROM usuarios where usu_docunmento LIKE '% :usu_documento %'");
  //   $buscar->bindParam(":usu_documento", $busqueda, PDO::PARAM_STR);
  //   $buscar->execute();
    
  //   $buscarDocumento = $buscar->fetch(PDO::FETCH_ASSOC);




  // }
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
