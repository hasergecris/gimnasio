<?php
require("dashboard.php");
?>

<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_login">
          <div class="card-header">
            <h2 class="titulo text-center">INGRESO CLIENTE</h2>
          </div>
          <div class="card-body contenido">
            <form method="POST" name="ingresoUsuarios">
              <div class="mb-2 row d-block">
                <label class="mb-1 col-sm-12 col-form-label texto">Ingresa tu número de documento:</label>
                <div class="col-sm-12">
                  <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                    <input type="text" class="form-control control_ingreso" id="documento" name="documento">
                  </div>
                </div>
              </div>

              <?php
              $respuesta = ControladorPagos::ctrIngresoUsuarios();

              if (isset($respuesta[0]) && $respuesta[0] && $respuesta[1] == "true") {
                $daysRemaining = $respuesta[2];
                $modalToShow = '';

                if ($daysRemaining <= 0) {
                  $modalToShow = 'renewModal';
                } elseif ($daysRemaining == 1 || $daysRemaining == 2) {
                  $modalToShow = 'expireModal';
                } else {
                  $modalToShow = 'daysModal';
                }

                echo '<script>
                  $(document).ready(function() {
                    $("#" + "' . $modalToShow . '").modal("show");
                  });
                </script>';
              }
              ?>

              <div class="card-footer">
                <div class="col-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-lg btn-success mb-3 boton_general">Ingresar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modales -->
<div class="modal" tabindex="-1" role="dialog" id="renewModal">
  <div class="modal-dialog modal-dialog-centered modal-md" role="document">
    <div class="modal-content modal_danger">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="color: red;"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center titulo_modal">!!! ALERTA !!! </h5>
        <div class="icono_danger d-flex justify-content-center"><i class="fas fa-skull-crossbones"></i></div>
        <div class="texto-danger text-center"> POR FAVOR RENUEVE SU PAGO </div>
      </div>

    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="expireModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content modal_warning">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center titulo_modal">!!! ATENCIÓN !!! </h5>
        <div class="icono_danger d-flex justify-content-center"><i class="fa fa-exclamation-triangle"></i></div>
        <div class="texto-warning d-flex justify-content-center">AL USUARIO LE QUEDA<br>
          <?php echo $daysRemaining ?> <br> DÍA<?php if ($daysRemaining > 1) echo 'S'; ?>
        </div>
      </div>


    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="daysModal">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content entrada_normal">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h5 class="modal-title text-center titulo_modal">!!! ATENCIÓN !!!</h5>
        <div class="icono_danger d-flex justify-content-center"><i class="fa fa-exclamation-triangle"></i></div>
        <div class="texto-warning text-center">AL USUARIO LE QUEDAN <br>
          <?php echo $daysRemaining ?> <br> DÍA<?php if ($daysRemaining > 1) echo 'S'; ?>
        </div>
      </div>

    </div>
  </div>
</div>
