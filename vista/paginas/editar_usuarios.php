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
}

?>

<div id="editar_usuarios">
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
                  <input type="password" class="form-control" placeholder="Escriba su contraseña" id="actualizarContrasenia" name="actualizarContrasenia">
                  <input type="hidden" class="form-control" id="contraseniaActual" name="contraseniaActual" value="<?php echo $usuario[0]["usu_pas"] ?>">
                </div>
                <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $usuario[0]["id"] ?>">

                <?php
                $actualizar = ControladorFormularios::ctrActualizarRegistro();

                if ($actualizar == "ok") {
                  echo '
                  <script>
                      if(window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                      }
                    </script>';
                ?>
                  <div class="modal fade modal_general" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="successModalLabel">Éxito</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body text-center">
                          La información del usuario <br><?php echo $usuario[0]["usu_nombre"]; ?> <br>ha sido actualizada.
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="redirectToUsersList()">Aceptar</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <script>
                    function redirectToUsersList() {
                      window.location.href = "index.php?pagina=lista_usuario";
                    }

                    $(document).ready(function() {
                      $("#successModal").modal("show");
                    });
                  </script>
                <?php
                }
                ?>

                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-lg btn-primary boton_general">Actualizar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>