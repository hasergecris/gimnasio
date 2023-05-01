<?php 
  require("dashboard.php")
?>

<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <h2 class="titulo text-center">REGISTRO USUARIO</h2>
          </div>
          <div class="card-body">
            <form method="post" class="row">
              <div class="col-12 d-flex justify-content-between align-items-center">
                <div class="col-md-8">
                  <label for="nombres" class="form-label texto">Nombres:</label>
                  <input type="text" class="form-control" id="nombres" name="registroNombre">
                </div>
                <div class=" col-md-4 caja-contador d-flex justify-content-end">
                  <div class="foto  d-flex justify-content-center align-items-center">
                    <i class="fas fa-user icono_usuario"></i>
                  </div>
                </div>
              </div>
                      
              <div class="col-md-12">
                <label for="num_documento" class="form-label texto">Numero de documento:</label>
                <input type="text" class="form-control" id="num_documento" name="registroDocumento"  aria-describedby="inputGroupPrepend2">
              </div>

              <div class="col-md-12">
                <label for=correo" class="form-label texto">Correo:</label>
                <input type="email" class="form-control" id="correo" name="registroCorreo">
              </div>

              <div class="col-md-6">
                <label for="validationDefault04" class="form-label texto">Rol</label>
                <select class="form-select" id="validationDefault04">
                  <option selected disabled value="">Administrador</option>
                  <option>Cliente</option>
                </select>
              </div>
              
              <?php

                // $registro = new ControladorFormularios();
                // $registro -> ctrRegistroUsuarios();

                $registro = ControladorFormularios::ctrRegistroUsuarios();

                if($registro == "ok") {

                  echo 
                  '<script>
                      if(window.history.replaceState) {
                        
                        window.history.replaceState(null,null,window.location.href);
                      }
                    </script>';
                      
                    echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
  
                  }
                ?>






              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary boton_general">Enviar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



