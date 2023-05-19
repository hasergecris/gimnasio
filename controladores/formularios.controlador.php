<?php

class ControladorFormularios {


  // REGISTRO
  static public function ctrRegistroUsuarios()
  {

    if (isset($_POST["registroNombre"])) {
      $tabla = "usuarios";

      $datos = array(
        "usu_nombre" => $_POST["registroNombre"],
        "usu_rol" => $_POST["validacion_rol"],
        "usu_pas" => $_POST["contrasenia"],
        "usu_documento" => $_POST["registroDocumento"],
        "usu_correo" => $_POST["registroCorreo"]
      );

      $respuesta = ModeloFormularios::mdlRegistroUsuarios($tabla, $datos);

      return $respuesta;
    }
  }

  // LISTAR REGISTROS

  static public function ctrSeleccionarRegistros($item, $valor)
  {

    $tabla = "usuarios";

    $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

    return $respuesta;
  }

  // INGRESO ADMIN

  public function ctrIngreso()
  {

    if (isset($_POST["ingresoDocumento"])) {

      $tabla = "usuarios";
      $item = "usu_documento";
      $valor = $_POST["ingresoDocumento"];

      $respuesta = ModeloFormularios::mdlSeleccionarRegistros($tabla, $item, $valor);

      if ($respuesta["usu_documento"] ==  $_POST["ingresoDocumento"] && $respuesta["usu_pas"] == $_POST["ingresoContrasenia"]) {

        $_SESSION["validarIngreso"] = "ok";

        echo
        '<script>
              if(window.history.replaceState) {
                window.history.replaceState(null,null,window.location.href);
              }
              window.location = "index.php?pagina=lista_usuario";
            </script>';
      } else {
        echo
        '<script>
              if(window.history.replaceState) {
                
                window.history.replaceState(null,null,window.location.href);
              }
            </script>';

        echo '<div class="alert alert-danger">Error al ingresar al sistema, el documento o la contraseña no coínciden</div>';
      }

      // echo '<pre>'; print_r($respuesta); echo '</pre>';

    }
  }

  // ACTUALIZAR USUARIO

  static public function ctrActualizarRegistro()
  {

    if (isset($_POST["actualizarNombre"])) {

      if ($_POST["actualizarContrasenia"] != "") {
        $password = $_POST["actualizarcontrasenia"];
      } else {

        $password = $_POST["contraseniaActual"];
      }

      $tabla = "usuarios";

      $datos = array(
        "id" => $_POST["idUsuario"],
        "usu_nombre" => $_POST["actualizarNombre"],
        "usu_documento" => $_POST["actualizarDocumento"],
        "usu_correo" => $_POST["actualizarCorreo"],
        "usu_pas" => $password
      );

      $respuesta = ModeloFormularios::mdlActualizarRegistro($tabla, $datos);

      return $respuesta;
    }
  }

  // ELIMINAR REGIDTRO 

 public function ctrEliminarRegistro(){

  if (isset($_POST["eliminarRegistro"])) {
    $tabla = "usuarios";
    $valor = $_POST["eliminarRegistro"] ;

  

    $respuesta = ModeloFormularios::mdlEliminarRegistro($tabla, $valor);

    if ($respuesta== "ok"){
      echo
        '<script>
              if(window.history.replaceState) {
                window.history.replaceState(null,null,window.location.href);
              }
              window.location = "index.php?pagina=lista_usuario";
            </script>';
    }
 
  }
 }
  

}
