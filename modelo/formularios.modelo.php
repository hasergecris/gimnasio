<?php
 require_once "conexion.php";


 class ModeloFormularios{

    // REGISTRO USUARIOS
    static public function  mdlRegistroUsuarios($tabla, $datos){

        // statement: declaracion
        $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla( usu_nombre, usu_rol, usu_pas, usu_documento, usu_correo) 
        VALUES( :usu_nombre, :usu_rol, :usu_pas, :usu_documento, :usu_correo)");

        // bindParam()vincula una variable de php a un parametro de solucion con nombre o de signo de interrogacion correaspondiente de l sentencia SQL

        $stmt -> bindParam(":usu_nombre",$datos["usu_nombre"], PDO::PARAM_STR);
        $stmt -> bindParam(":usu_rol",$datos["usu_rol"], PDO::PARAM_STR);
        $stmt -> bindParam(":usu_pas",$datos["usu_pas"], PDO::PARAM_STR);
        $stmt -> bindParam(":usu_documento",$datos["usu_documento"], PDO::PARAM_STR);
        $stmt -> bindParam(":usu_correo",$datos["usu_correo"], PDO::PARAM_STR);

        if($stmt->execute()){

            return "ok";

        }else {
            print_r(Conexion::conectar()->errorInfo());
        }

       


    }

 }
