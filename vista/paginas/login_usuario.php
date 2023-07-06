<?php
require("dashboard.php");

?>
<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_login">
          <div class="card-header">
            <h2 class="titulo text-center"> INGRESO CLIENTE</h2>
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

              if (isset($respuesta[0])) {

                if ($respuesta[0]) {

                  if ($respuesta[1] == "true") {
                    if ($respuesta[2] == 0) {
                      echo '
                      <script>
                        if (window.history.replaceState) {
                          window.history.replaceState(null, null, window.location.href);
                        }
                      </script>';

                      echo '<div class="alert alert-danger fixed-alert" style="font-weight:700; font-size: 2rem; line-height: 1;"> !!! ATENCION !!! <br> POR FAVOR RENUEVE SU PAGO </div>';

                      echo '
                      <script>
                        setTimeout(function() {
                          window.location = "index.php?pagina=editar_pagos";
                        }, 5000);
                      </script>';
                    } else if ($respuesta[2] <= 2) {
                      echo '
                      <script>
                        if (window.history.replaceState) {
                          window.history.replaceState(null, null, window.location.href);
                        }
                      </script>';

                      echo '<div class="alert alert-danger fixed-alert" style="font-weight:700; font-size: 2rem; line-height: 1;">SU MEMBRESIA ESTA PRÓXIMA A VENCER, LE QUEDAN <br>' . $respuesta[2] . ' <br> DIAS</div>';

                      echo '
                      <script>
                        setTimeout(function() {
                          window.location = "index.php?pagina=login_usuario";
                        }, 5000);
                      </script>';
                    } else {
                      echo '
                      <script>
                        if (window.history.replaceState) {
                          window.history.replaceState(null, null, window.location.href);
                        }
                      </script>';

                      echo '<div class="alert alert-danger fixed-alert" style="font-weight:700; font-size: 2rem; line-height: 1;">AL USUARIO LE QUEDAN <br>' . $respuesta[2] . ' <br> DIAS</div>';

                      echo '
                      <script>
                        setTimeout(function() {
                          window.location = "index.php?pagina=login_usuario";
                        }, 5000);
                      </script>';
                    }
                  } else {
                    echo '
                    <script>
                      if (window.history.replaceState) {
                        window.history.replaceState(null, null, window.location.href);
                      }
                    </script>';

                    echo '<div class="alert alert-success fixed-alert" style="font-weight:700; font-size: 2rem; line-height: 1;">INGRESO EXITOSO</div>';

                    echo '
                    <script>
                      setTimeout(function() {
                        window.location = "index.php?pagina=lista_pagos";
                      }, 5000);
                    </script>';
                  }
                }
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
