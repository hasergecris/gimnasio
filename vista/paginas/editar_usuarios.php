<?php 
  require("dashboard.php");

  if(isset($_GET["id"])){

    $item = "id";
    $valor = $_GET["id"];

    $usuario = ControladorFormularios::ctrSeleccionarRegistros( $item, $valor );

  }

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
                  <input type="text" class="form-control" placeholder="Escriba su nombre" id="nombres" name="actualizarNombre"  value="<?php echo $value["usu_nombre"]?>">
                </div>
               
              </div>
             
              <div class="col-md-12">
                <input type="text" class="form-control" placeholder="Escriba su documento" id="num_documento" name="actualizarDocumento"  value="<?php echo $value["usu_documento"]?>" aria-describedby="inputGroupPrepend2">
              </div>

              <div class="col-md-12">
                <input type="email" class="form-control" id="correo" name="actualizarCorreo" value="<?php echo $usuario["usu_correo"]?>">
              </div>

              <div class="col-md-6 mb-4" id="admin_contrasenia">
                <input type="pasword" class="form-control" placeholder="Escriba su contraseña" id="actualizarContrasenia" name="contrasenia">
              </div>
              <input type="hidden" class="form-control" placeholder="Escriba su contraseña" id="contraseniaActual" name="contraseniaActual" value="<?php echo $usuario["usu_pas"]?>">
                

                      
              <?php

             
                ?>

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
  




             
              

              




              


