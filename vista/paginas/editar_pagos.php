<?php
require("dashboard.php");

if (isset($_GET["id"])) {
  $item = "id";
  $valor = $_GET["id"];
  $usuario = ControladorFormularios::ctrSeleccinarUsuarioPago($item, $valor);
  // print_r($usuario);
  // echo $usuario[0]["usu_nombre"];
}
?>

<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <h2 class="titulo text-center">EDITAR PAGOS</h2>
          </div>
          <div class="card-body">
            <form method="post" class="row d-flex">
              <div class="col-12 justify-content-between">
                <div class="d-flex">
                  <div class="col-md-6 mb-3">
                    <label for="desde" class="texto">Documento:</label>
                    <input type="text" class="form-control" placeholder="Escriba su documento" id="num_documento" name="actualizarDocumento" value="<?php echo $usuario[0]["documento"] ?>">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="desde" class="texto">Valor:</label>
                    <input type="text" class="form-control" placeholder="Escriba el valor a pagar" id="actualizarvalor" name="actualizarValor" value="<?php echo $usuario[0]["valor"] ?>">
                  </div>
                </div>
                <div class="d-flex">
                  <div class="col-md-9 mb-3">
                    <label for="desde" class="texto">Nombre Usuario:</label>
                    <input type="text" class="form-control" placeholder="Escriba su nombre" id="actualizarNombre" name="actualizarNombre" value="<?php echo $usuario[0]["usu_nombre"]; ?>">
                  </div>
                  <div class="col-md-3 mb-3 mx-4">
                    <label for="duracion" class="texto">Duracion:</label>
                    <input type="text" class="form-control" placeholder="Duración en días" id="actualizarDuracion" name="actualizarDuracion" readonly value="<?php echo $usuario[0]["duracion"] ?>">
                  </div>
                </div>
                <div class="d-flex">
                  <div class="form-group col-md-6 mb-3">
                    <label for="desde" class="texto">Desde:</label>
                    <input type="date" class="form-control" id="actualizarDesde" name="actualizarDesde" value="<?php echo $usuario[0]["desde"] ?>">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="hasta" class="texto">Hasta:</label>
                    <input type="date" class="form-control" id="actualizarHasta" name="actualizarHasta" value="<?php echo $usuario[0]["hasta"] ?>">
                  </div>
                </div>

                <?php
                // Procesar la actualización del pago cuando se envía el formulario
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                  $actualizar = ControladorPagos::ctrActualizarPago();
                  print_r($actualizar);
                  if ($actualizar == "ok") {
                ?>
                    <div id="successModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content modal_actualizado">
                          <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <h5 class="modal-title text-center titulo_modal" id="successModalLabel">!!! Éxito !!!</h5>
                            <div class="icono_danger d-flex-justify-content-center"><i class="fas fa-check"></i></div>
                            <div class="texto-warning text-center"> La información de pago al usuario <br><?php echo $usuario[0]["usu_nombre"]; ?><br> ha sido actualizada.</div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#successModal">Aceptar</button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <script>
                      $(document).ready(function() {
                        console.log("Script de jQuery ejecutado correctamente");
                        $("#successModal").modal("show");
                      });
                    </script>
                <?php
                  }
                }
                ?>

                <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $usuario[0]["id"] ?>">
                <!-- Campo oculto para dias_restantes -->
                <input type="hidden" name="dias_restantes" value="<?php echo $dias_restantes; ?>">

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

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var desdeInput = document.getElementById('actualizarDesde');
    var hastaInput = document.getElementById('actualizarHasta');
    var duracionInput = document.getElementById('actualizarDuracion');

    function calcularDuracion() {
      var fechaDesde = new Date(desdeInput.value);
      var fechaHasta = new Date(hastaInput.value);
      if (fechaDesde && fechaHasta) {
        var duracionDias = Math.floor((fechaHasta - fechaDesde) / (1000 * 60 * 60 * 24));
        duracionInput.value = duracionDias >= 0 ? duracionDias : 0;
      }
    }

    desdeInput.addEventListener('change', calcularDuracion);
    hastaInput.addEventListener('change', calcularDuracion);
  });
</script>