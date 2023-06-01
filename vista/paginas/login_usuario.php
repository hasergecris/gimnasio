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

              $respuesta[0];


              if ($respuesta[0]) {


                if ($respuesta[1] == "true") {
                  if ($respuesta[2] == 0) {
                    echo
                    '<script>
                    if(window.history.replaceState) {
                      
                      window.history.replaceState(null,null,window.location.href);
                    }
                  </script>';

                    echo '<div class="alert alert-danger"> !!! ATENCION !!! <br> POR FAVOR RENUEVE SU PAGO </div>';
                    '<script>
                      setTimeout(fuction(){
                        window.location = "index.php?pagina=lista_pagos";
                      },5000);
                    </script>';
                  } else {

                    echo
                    '<script>
                      if(window.history.replaceState) {
                        
                        window.history.replaceState(null,null,window.location.href);
                      }
                    </script>';

                    echo '<div class="alert alert-danger">AL USUARIO LE QUEDAN' . $respuesta[2] . ' DIAS</div>';
                    '<script>
                    setTimeout(fuction(){
                      window.location = "index.php?pagina=lista_pagos";
                    },3000);
                  </script>';
                  }
                } else {
                  echo
                  '<script>
                      if(window.history.replaceState) {
                        
                        window.history.replaceState(null,null,window.location.href);
                      }
                    </script>';

                  echo '<div class="alert alert-success">INGRESO EXITOSO</div>';
                  '<script>
                    setTimeout(fuction(){
                      window.location = "index.php?pagina=lista_pagos";
                    },3000);
                  </script>';
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