
<?php 
  require("cabecera.php");  
  require("dashboard.php");

?>

<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_login">
          <div class="card-header">
            <h2 class="titulo text-center"> INGRESO</h2>
          </div>
          <div class="card-body contenido">
            <form action="../controladores/ingreso_usuarios.php" method="POST">
              <div class="mb-3 row d-block">
                    <label class="mb-3 col-sm-12 col-form-label texto">Ingresa tu numero de documento:</label>
                    <div class="col-sm-12">
                      <input type="text"  class="form-control"id="documento" name="documento">
                    </div>
                </div>
           
              </div>
              <div class="card-footer">
                <div class="col-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-lg btn-success mb-3 boton_general" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar</button>
                </div>
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- MODAL -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body flex-column">
        <h1 class="d-flex justify-content-center titulo_modal">¡¡¡ATENCIÓN!!!</h1>
        <h4 class="texto_modal text-center">Al usuario le quedan </h4>
        <div class="caja-contador d-flex justify-content-center">
          <div class="contador_dias flex-column d-flex justify-content-center align-items-center">
            <div id="contador"></div>
            <div class="dia">Días</div>
          </div>
        </div>
        <div class="texto_dias text-center"> para que termine su suscripción</div>
      </div>
          


      <div class="modal-footer">
        <button type="button" class="btn btn-danger boton_modal">Entendido</button>
      </div>
    </div>
  </div>
</div>




 

                  

   

    
 
