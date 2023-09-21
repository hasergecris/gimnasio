<?php
require_once "conexion.php";

class ModeloFormularios
{
  // REGISTRO USUARIOS
  static public function mdlRegistroUsuarios($tabla, $datos)
  {
    // Verificar si ya existe un usuario con el número de documento
    $documentoExistente = self::verificarDocumentoExistente($datos["usu_documento"]);
  
    if ($documentoExistente) {
      return "El número de documento ya está registrado. Por favor, ingresa un número de documento diferente.";
    }
  
    // Continuar con el proceso de registro
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usu_nombre, usu_rol, usu_pas, usu_documento, usu_correo) VALUES (:usu_nombre, :usu_rol, :usu_pas, :usu_documento, :usu_correo)");
  
    $stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_rol", $datos["usu_rol"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_pas", $datos["usu_pas"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_documento", $datos["usu_documento"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_correo", $datos["usu_correo"], PDO::PARAM_STR);
  
    if ($stmt->execute()) {
      return "ok";
    } else {
      print_r(Conexion::conectar()->errorInfo());
    }
  }
  
  // Verificar si ya existe un usuario con el número de documento
  static private function verificarDocumentoExistente($documento)
  {
    $stmt = Conexion::conectar()->prepare("SELECT COUNT(*) FROM usuarios WHERE usu_documento = :usu_documento");
    $stmt->bindParam(":usu_documento", $documento, PDO::PARAM_STR);
    $stmt->execute();
  
    $count = $stmt->fetchColumn();
  
    if ($count > 0) {
      return true; // El número de documento ya está registrado
    }
  
    return false; // El número de documento no está registrado
  }
  


  // AUTENTICACIÓN DE USUARIO
static public function mdlAutenticarUsuario($tabla, $documento, $contrasenia)
{
  $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usu_documento = :usu_documento");

  $stmt->bindParam(":usu_documento", $documento, PDO::PARAM_STR);

  $stmt->execute();

  $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($usuario && $contrasenia == $usuario['usu_pas']) {
    // Autenticación exitosa
    return $usuario;
  } else {
    // Autenticación fallida
    return false;
  }
}


  // LISTAR REGISTROS
  static public function mdlSeleccionarRegistros($tabla, $item, $valor)
  {
    $query = "SELECT *, DATE_FORMAT(fecha, '%d/%m/%Y') AS fecha FROM $tabla";

    if ($item != null && $valor != null) {
      $query .= " WHERE $item = :$item";
    }

    $query .= " ORDER BY usu_nombre ASC";

    $stmt = Conexion::conectar()->prepare($query);

    if ($item != null && $valor != null) {
      $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
    }

    $stmt->execute();

    return $stmt->fetchAll();
  }

    // LISTAR REGISTROS
    static public function mdlSeleccionarUsuarioPago($tabla, $item, $valor)
    {
      $query = "SELECT * FROM $tabla WHERE $item = $valor";
  
      $stmt = Conexion::conectar()->prepare($query);
      $stmt->execute();
  
      return $stmt->fetchAll();
    }
      
  

  

  // ACTUALIZAR REGISTRO 
  static public function mdlActualizarRegistro($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usu_nombre = :usu_nombre, usu_pas = :usu_pas, usu_documento = :usu_documento, usu_correo = :usu_correo WHERE id = :id");

    $stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_pas", $datos["usu_pas"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_documento", $datos["usu_documento"], PDO::PARAM_STR);
    $stmt->bindParam(":usu_correo", $datos["usu_correo"], PDO::PARAM_STR);
    $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

    if ($stmt->execute()) {
      return "ok";
    } else {
      print_r(Conexion::conectar()->errorInfo());
    }
  }

  // ELIMINAR REGISTRO 
  static public function mdlEliminarRegistro($tabla, $valor)
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
