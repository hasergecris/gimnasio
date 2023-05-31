<div id="registro_usuario" class="fondo">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_login">
          <div class="card-header">
            <h2 class="titulo text-center"> INGRESO</h2>
          </div>
          <div class="card-body contenido">
            <form method="post" name="ingresoadm">
              <div class="mb-3 row d-block">
                <label class="col-sm-12 col-form-label texto1">Documento:</label>
                <div class="col-sm-12">
                  <input type="text" class="form-control" name="ingresoDocumento" id="documento">
                </div>
              </div>
              <div class="mb-3 row d-block">
                <label for="inputPassword" class="col-sm-12 col-form-label texto1">Contraseña</label>
                <div class="col-sm-12">
                  <input type="password" class="form-control" name="ingresoContrasenia" id="ingresoContrasenia">
                </div>
              </div>

              <?php
              // METODO NO ESTATICO
              $ingreso = new ControladorFormularios();
              $ingreso->ctrIngreso();
              ?>

              <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-success mb-3 boton_general">Ingresar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>