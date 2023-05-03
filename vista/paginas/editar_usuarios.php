<?php 
  require("dashboard.php")
?>

<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <h2 class="titulo text-center">EDITAR USUARIO</h2>
          </div>
          <div class="card-body">
            <form method="post" class="row">
              <div class="col-12 d-flex justify-content-between align-items-center">
                <div class="col-md-8">
                  <input type="text" class="form-control" id="nombres" name="actualizarNombre">
                </div>
               
              </div>
             
              <div class="col-md-12">
                <input type="text" class="form-control" id="num_documento" name="actualizarDocumento"  aria-describedby="inputGroupPrepend2">
              </div>

              <div class="col-md-12">
                <input type="email" class="form-control" id="correo" name="actualizarCorreo">
              </div>
                      
              <?php

             
                ?>

              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary boton_general">Actuañizar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  




             
              

              




              


