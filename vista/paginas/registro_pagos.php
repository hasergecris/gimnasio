<?php
require("dashboard.php");
?>
<script>
  function buscar_ajax(cadena) {
    $.ajax({
      type: 'POST',
      url: '../GYM/modelo/buscar_pago.php',
      data: 'cadena=' + cadena,
      success: function(respuesta) {
        //Copiamos el resultado en #mostrar
        $('#mostrar').html(respuesta);
      }
    });
  }
</script>

<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <div id="mostrar"></div>
            <h2 class="titulo text-center">REGISTRO DE PAGOS</h2>
          </div>
          <div class="card-body">
            <form class="row g-3" method="post">
              <div class="col-md-6">
                <label for="documento" class="form-label texto">Numero de documento:</label>
                <input type="text" class="form-control" id="documento" name="documento" onkeyup="buscar_ajax(this.value);" required>
              </div>

              <div class="col-md-6">
                <label for="valor" class="form-label texto">Valor:</label>
                <input type="text" class="form-control" id="valor" name="valor" required>
              </div>

              <div class="col-md-8">
                <label for="nombre" class="form-label texto">Nombre Usuario:</label>
                <input type="text" class="form-control" id="nombre" name="registroNombre" required>
              </div>

              <div class="col-md-4">
                <label for="nombre" class="form-label texto">Duración:</label>
                <input type="text" class="form-control" id="duracion" name="duracion" required>
              </div>

              <div class="form-group col-md-6">
                <label for="desde" class="texto">Desde:</label>
                <input type="date" class="form-control" id="desde" name="desde" required>
              </div>

              <div class="form-group col-md-6">
                <label for="hasta" class="texto">Hasta:</label>
                <input type="date" class="form-control" id="hasta" name="hasta" required>
              </div>

              <?php

              // METODO ESTATICO

              $usuarios = ControladorPagos::ctrRegistroPagos();
              if ($usuarios == "ok") {
              ?>
                <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content entrada_normal">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h5 class="modal-title text-center titulo_modal">Éxito</h5>
                        <div class="icono_check d-flex justify-content-center"><i class="fas fa-check"></i></div>
                        <div class="texto text-center">SU PAGO HA SIDO REGISTRADO</div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="redireccionar()">Aceptar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  $(document).ready(function() {
                    $("#successModal").modal("show");
                    setTimeout(function() {
                      window.location = "index.php?pagina=login_usuario";
                    }, 5000);
                  });
                </script>
              <?php
              } else if ($usuarios == "no") {
              ?>
                <div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="errorModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal_danger">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: red;"></button>
                      </div>
                      <div class="modal-body">
                        <h5 class="modal-title titulo_modal" id="errorModalLabel">Error</h5>
                        <div class="icono_danger d-flex justify-content-center"><i class="fas fa-skull-crossbones"></i></div>
                        <div class="texto-danger text-center">EL USUARIO NO ESTA REGISTRADO EN LA BASE DE DATOS</div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="redireccionar()">Aceptar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  $(document).ready(function() {
                    $("#errorModal").modal("show");
                    setTimeout(function() {
                      window.location = "index.php?pagina=registro_usuario";
                    }, 5000);
                  });
                </script>
              <?php
              } else if ($usuarios == "vigente") {
              ?>
                <div class="modal fade" id="warningModal" tabindex="-1" role="dialog" aria-labelledby="warningModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content modal_warning">
                      <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <h5 class="modal-title text-center titulo_modal">!!! ATENCIÓN !!! </h5>
                        <div class="icono_danger d-flex justify-content-center"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i></div>
                        <div class="texto-warning flex-column d-flex justify-content-center">EL USUARIO TIENE UNA MEMBRESIA ACTIVA</div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="redireccionar()">Aceptar</button>
                      </div>
                    </div>
                  </div>
                </div>

                <script>
                  $(document).ready(function() {
                    $("#warningModal").modal("show");
                    setTimeout(function() {
                      window.location = "index.php?pagina=login_usuario";
                    }, 5000);
                  });
                </script>
              <?php
              }
              ?>

              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary boton_general">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>