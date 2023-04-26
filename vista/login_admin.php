
<?php 
  require("cabecera.php");  
?>

<div id="registro_usuario" class="fondo">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_login">
          <div class="card-header">
            <h2 class="titulo text-center"> INGRESO</h2>
          </div>
          <div class="card-body contenido">
          <form method="post" action="controladores/autentica.php" name="ingresoadm">
            <div class="mb-3 row d-block">
              <label class="col-sm-12 col-form-label texto">Documento:</label>
              <div class="col-sm-12">
                <input type="text"  class="form-control" id="documento">
              </div>
            </div>
              <div class="mb-3 row d-block">
                <label for="inputPassword" class="col-sm-12 col-form-label texto">Contraseña</label>
                <div class="col-sm-12">
                  <input type="password" class="form-control" id="contrasenia">
                </div>
              </div>
            </div>
            <div class="card-footer">
              <div class="col-12 d-flex justify-content-center">
                <a href="./dashboard.php" class="btn btn-lg btn-success mb-3 boton_general"> Enviar</a>
              </div>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  
  </div>




                  

   

    
 
