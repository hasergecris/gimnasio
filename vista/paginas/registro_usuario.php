<?php
require("dashboard.php")
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
                  <option selected value="">Seleccionar.... </option>
                  <option value="1">Administrador</option>
                  <option value="2">Cliente</option>
                </select>
              </div>

              <div class="col-md-6 mb-3" id="admin_contrasenia">
                <label for="contrasenia" class="form-label texto">Contraseña:</label>
                <input type="password" class="form-control" id="contrasenia" name="contrasenia">
              </div>


              <?php

              // METODO ESTATICO
              $registro = ControladorFormularios::ctrRegistroUsuarios();

              if ($registro == "ok") {
                echo
                '<script>
                  if(window.history.replaceState) {
                    window.history.replaceState(null,null,window.location.href);
                  }
                </script>';

                echo '<div class="alert alert-success">El usuario ha sido registrado</div>';

                echo
                '<script>
                  setTimeout(function(){
                    window.location = "index.php?pagina=lista_usuario";
                  }, 3000);
                </script>';
              } elseif (!empty($registro)) {
                echo '<div class="alert alert-danger">' . $registro . '</div>';
              }
              ?>


              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary boton_general">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>