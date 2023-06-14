<?php
require("dashboard.php");
?>

<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <h2 class="titulo text-center">REGISTRO DE PAGOS</h2>
          </div>
          <div class="card-body">
            <form class="row g-3" method="post">
              <div class="col-md-6">
                <label for="documento" class="form-label texto">Numero de documento:</label>
                <input type="text" class="form-control" id="documento" name="documento" required>
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

                echo
                '<script>
                    if(window.history.replaceState) {
                      
                      window.history.replaceState(null,null,window.location.href);
                    }
                  </script>';

                echo '<div class="alert alert-success">El pago del usuario ha sido registrado</div>';
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
