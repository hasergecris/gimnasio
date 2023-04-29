
<?php 
  require("dashboard.php")
?>


<div id="ingreso_clientes">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <h2 class="titulo text-center">REGISTRO DE PAGOS</h2>
          </div>
          <div class="card-body">
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="validationDefault04" class="form-label texto">Cliente:</label>
                    <select class="form-select" id="validationDefault04" required>
                        <option selected disabled value="">Administrador</option>
                        <option>Cliente</option>
                    </select>
                </div>
              
              <div class="col-md-6">
                <label for="validationDefault02" class="form-label texto">Valor:</label>
                <input type="text" class="form-control" id="validationDefault02"  required>
              </div>

              <div class="form-group col-md-6">
                <label for="fecha" class="texto">Desde:</label>
                <input type="date" class="form-control datetimepicker-input" id="fecha" data-toggle="datetimepicker" data-target="#fecha" />
              </div>
             
              <div class="form-group col-md-6">
                <label for="fecha" class="texto">Hasta:</label>
                <input type="date" class="form-control datetimepicker-input" id="fecha" data-toggle="datetimepicker" data-target="#fecha" />
              </div>
             
            
              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary boton_general">Guardar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <!-- </div>
  </div>
</div> -->

