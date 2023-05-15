<?php
require_once "conexion.php";


class ModeloFormularios
{

    // REGISTRO USUARIOS
    static public function  mdlRegistroUsuarios($tabla, $datos)
    {

        // statement: declaracion
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla( usu_nombre, usu_rol, usu_pas, usu_documento, usu_correo) 
        VALUES( :usu_nombre, :usu_rol, :usu_pas, :usu_documento, :usu_correo)");

        // bindParam()vincula una variable de php a un parametro de solucion con nombre o de signo de interrogacion correaspondiente de l sentencia SQL

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

    // LISTAR REGISTROS
    static public function mdlSeleccionarRegistros($tabla, $item, $valor)
    {

        if ($item == null && $valor == null) {

            $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();
        } else {
            $stmt = Conexion::conectar()->prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        }
    }


    // ACTUALIZAR REGISTRO 
    static public function  mdlActualizarRegistro($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usu_nombre =:usu_nombre, usu_rol=:us_rol, usu_pas=:usu_pas, usu_documnento=_usu_documento, usu_correo=:usu_correo");


        $stmt->bindParam(":usu_nombre", $datos["usu_nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":usu_rol", $datos["usu_rol"], PDO::PARAM_STR);
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
}
