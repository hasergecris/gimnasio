<?php
  class ControladorFormularios {

    // REGISTRO
  static public function ctrRegistroUsuarios(){
      
      if(isset($_POST["registroNombre"])) {
        $tabla ="usuarios";

        $datos = array("usu_nombre"=>$_POST["registroNombre"],
                        "usu_rol" => $_POST["validacion_rol"],
                        "usu_pas"=>$_POST["contrasenia"],
                        "usu_documento"=>$_POST["registroDocumento"],
                        "usu_correo"=>$_POST["registroCorreo"]
                       );

                $respuesta = ModeloFormularios::mdlRegistroUsuarios($tabla,$datos);

                return $respuesta;
            }
    }  

  }