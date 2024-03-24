<?php
require("dashboard.php");

$registro = ControladorFormularios::ctrRegistroUsuarios();

if ($registro == "ok" && isset($_POST['registroNombre']) && isset($_POST['registroDocumento'])) {
  $_SESSION['usuario_nombre'] = $_POST['registroNombre'];
  $_SESSION['usuario_documento'] = $_POST['registroDocumento'];
?>

  <script>
    $(document).ready(function() {
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
      $("#successModal").modal("show");
      setTimeout(function() {
        window.location = "index.php?pagina=registro_pagos";
      }, 3000);
    });
  </script>

<?php
} elseif (!empty($registro)) {
?>

  <script>
    $(document).ready(function() {
      $("#errorModal").modal("show");
    });
  </script>

<?php
}
?>

<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <h2 class="titulo text-center">REGISTRO USUARIO</h2>
          </div>
          <div class="card-body">
            <form method="post" class="row">

              <div class="col-md-12 mb-3">
                <label for="nombres" class="form-label texto">Nombre Completo:</label>
                <input type="text" class="form-control" id="nombres" name="registroNombre" required>
              </div>

              <div class="col-md-12 mb-3">
                <label for="num_documento" class="form-label texto">Numero de documento:</label>
                <input type="text" class="form-control" id="num_documento" name="registroDocumento" aria-describedby="inputGroupPrepend2" required>
              </div>

              <div class="col-md-12 mb-3">
                <label for=correo class="form-label texto">Correo:</label>
                <input type="email" class="form-control" id="correo" name="registroCorreo" required>
              </div>

              <div class="col-md-6 mb-3">
                <label for="validacion_rol" class="form-label texto">Rol</label>
                <select class="form-select" name="validacion_rol" id="validacion_rol" onchange="cargarRol(this.value);" required>
                  <option value="" selected>Seleccionar.... </option>
                  <option value="1">Administrador</option>
                  <option value="2">Cliente</option>
                </select>
              </div>

              <div class="col-md-6 mb-3" id="admin_contrasenia">
                <label for="contrasenia" class="form-label texto">Contraseña:</label>
                <input type="password" class="form-control" id="contrasenia" name="contrasenia">
              </div>

              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary boton_general">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Éxito -->
<div class="modal fade" id="successModal" tabindex="1" aria-labelledby="successModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal_actualizado">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center titulo_modal ">!!! Éxito !!!</h5>
        <div class="icono_danger d-flex-justify-content-center"><i class="fas fa-check"></i></div>
        <p class="texto-danger text-center">El usuario ha sido registrado.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#successModal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


<!-- Modal Error -->
<div class="modal fade" id="errorModal" tabindex="1" aria-labelledby="errorModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content modal_warning">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center titulo_modal">!!! Error !!!</h5>
        <div class="icono_danger d-flex justify-content-center"><i class="fa fa-exclamation-triangle"></i></div>
        <div class="texto-danger text-center">El usuario o el documento ya están registrados.</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#successModal">Cerrar</button>
      </div>
    </div>
  </div>
</div>