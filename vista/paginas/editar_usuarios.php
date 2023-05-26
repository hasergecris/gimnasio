<script>
  function cargarRol(rol) {
    if (rol == 1) {
      document.getElementById("admin_contrasenia").style.display = "block";
    } else {
      document.getElementById("admin_contrasenia").style.display = "none";
    }
  }
</script>

<?php
require("dashboard.php");

if (isset($_GET["id"])) {

  $item = "id";
  $valor = $_GET["id"];

  $usuario = ControladorFormularios::ctrSeleccionarRegistro($item, $valor);

  //  print_r($usuario);
  // echo $usuario[0]["usu_nombre"];
}

?>


<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <h2 class="titulo text-center">EDITAR USUARIO</h2>
          </div>
          <div class="card-body">
            <form method="post" class="row">
              <div class="col-12">
                <div class="col-md-12 mb-4">
                  <input type="text" class="form-control" placeholder="Escriba su nombre" id="nombres" name="actualizarNombre" value="<?php echo $usuario[0]["usu_nombre"]; ?>">
                </div>


                <div class="col-md-12 mb-4">
                  <input type="text" class="form-control" placeholder="Escriba su documento" id="num_documento" name="actualizarDocumento" value="<?php echo $usuario[0]["usu_documento"] ?>" aria-describedby="inputGroupPrepend2">
                </div>

                <div class="col-md-12 mb-4">
                  <input type="email" class="form-control" placeholder="Escriba su correo" id="correo" name="actualizarCorreo" value="<?php echo $usuario[0]["usu_correo"] ?>">
                </div>

                <div class="col-md-12 mb-4" id="admin_contrasenia">
                  <input type="pasword" class="form-control" placeholder="Escriba su contraseña" id="actualizarContrasenia" name="actualizarContrasenia">
                  <input type="hidden" class="form-control" id="contraseniaActual" name="contraseniaActual" value="<?php echo $usuario[0]["usu_pas"] ?>">
                </div>
                <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $usuario[0]["id"] ?>">

                <?php
                $actualizar = ControladorFormularios::ctrActualizarRegistro();

                if ($actualizar == " ok") {
                  echo
                  '<script>
                      if(window.history.replaceState) {
                        window.history.replaceState(null,null,window.location.href);
                      }
                    </script>';


                  echo '<div class="alert alert-success">La información del Usuario a sido actualizada.</div>';

                  '<script>
                        setTimeout(fuction(){
                          window.location = "index.php?pagina=lista_usuario";
                        },3000);
                    </script>';
                }
                ?>


                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-lg btn-primary boton_general">ActuaLizar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>