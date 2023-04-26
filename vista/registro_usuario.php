<?php 
  require("cabecera.php");  
  require("dashboard.php")
?>



<div id="registro_usuario">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_registro">
          <div class="card-header">
            <h2 class="titulo text-center">REGISTRO USUARIO</h2>
          </div>
          <div class="card-body">
            <form class="row g-3">
              <div class="col-md-6">
                <label for="validationDefault01" class="form-label texto">Nombres:</label>
                <input type="text" class="form-control" id="validationDefault01"  required>
              </div>
              <div class="col-md-12">
                <label for="validationDefault02" class="form-label texto">Apellidos:</label>
                <input type="text" class="form-control" id="validationDefault02"  required>
              </div>
              <div class="col-md-6">
                <label for="validationDefaultUsername" class="form-label texto">Numero de documento:</label>
                <input type="text" class="form-control" id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
              </div>
              
              <div class="col-md-6">
                <label for="validationDefault03" class="form-label texto">CORREO:</label>
                <input type="email" class="form-control" id="validationDefault03" required>
              </div>
              <div class="col-md-6">
                <label for="validationDefault04" class="form-label texto">Rol</label>
                <select class="form-select" id="validationDefault04" required>
                  <option selected disabled value="">Administrador</option>
                  <option>Cliente</option>
                </select>
              </div>
              <div class="col-12 d-flex justify-content-end">
                <button type="submit" class="btn btn-lg btn-primary boton_general">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

