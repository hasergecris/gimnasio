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

                echo '
                <script>
                  if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                  }
                </script>';

                echo '<div class="alert alert-danger" style="font-weight:700; font-size: 2rem; line-height: 1;">SU PAGO A SIDO REGISTRADO</div>';

                echo '
                <script>
                  setTimeout(function() {
                    window.location = "index.php?pagina=lista_pagos";
                  }, 2000);
                </script>';
              } else if ($usuarios == "no") {
                echo '
                <script>
                  if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                  }
                </script>';

                echo '<div class="alert alert-danger" style="font-weight:700; font-size: 2rem; line-height: 1;">EL USUARIO NO ESTA REGISTRADO EN LA BASE DE DATOS</div>';

                echo '
                <script>
                  setTimeout(function() {
                    window.location = "index.php?pagina=lista_pagos";
                  }, 4000);
                </script>';
              } else if ($usuarios == "vigente") {
                echo '
                <script>
                  if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                  }
                </script>';

                echo '<div class="alert alert-danger" style="font-weight:700; font-size: 2rem; line-height: 1;">EL USUARIO  TIENE UNA MEMBRESIA ACTIVA</div>';

                echo '
                <script>
                  setTimeout(function() {
                    window.location = "index.php?pagina=lista_pagos";
                  }, 4000);
                </script>';
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