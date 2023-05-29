<?php
require("dashboard.php");

if (isset($_GET["id"])) {

  $item = "id";
  $valor = $_GET["id"];

  $usuario = ControladorPagos::ctrSeleccionarPagos($item, $valor);

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
            <form method="post" class="row">
              <div class="col-12">
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


                  <div class="col-md-2 mb-3">
                    <label for="desde" class="texto">Duracion:</label>
                    <input type="text" class="form-control" placeholder="Escriba los dias de duracion del pago" id="actualizarDuracion" name="actualizarDuracion" value="<?php echo $usuario[0]["duracion"] ?>">
                  </div>
                </div>

                <div class="d-flex">
                  <div class="form-group col-md-6">
                    <label for="desde" class="texto">Desde:</label>
                    <input type="date" class="form-control" id="actualizarDesde" name="actualizarDesde" value="<?php echo $usuario[0]["desde"] ?>">
                  </div>


                  <div class="form-group col-md-6">
                    <label for="hasta" class="texto">Hasta:</label>
                    <input type="date" class="form-control" id="actualizarHasta" name="actualizarHasta" value="<?php echo $usuario[0]["hasta"] ?>">
                  </div>
                </div>


                <?php
                $actualizar = ControladorPagos::ctrActualizarPago();

                if ($actualizar == "ok") {
                  echo
                  '<script>
                      if(window.history.replaceState) {
                        window.history.replaceState(null,null,window.location.href);
                      }
                    </script>';


                  echo '<div class="alert alert-success">La información de pago al usuario <br>' . $usuario[0]["usu_nombre"] . '<br> a sido actualizada.</div>';

                  '<script>
                      setTimeout(fuction(){
                        window.location = "index.php?pagina=lista_pagos";
                      },3000);
                  </script>';
                }
                ?>

                <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $usuario[0]["id"] ?>">

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