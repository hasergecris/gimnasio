<?php 
  require("cabecera.php");  
  require("dashboard.php")
?>

<div id="tabla_usuarios">
  <h1 class="titulo_general text-center"> LISTA DE PAGOS</h1> 
  <div class="col-12 d-flex justify-content-around ">
    <div class="col-6">
      <div class="search-box">
        <i class="fas fa-search"></i>
        <input type="text" placeholder="Buscar...">
      </div>
    </div>
      <div class="col-6 boton d-flex justify-content-end mb-3">
        <a href="registro_usuario.php" class="btn btn-lg btn-warning boton_agregar" role="button" data-bs-toggle="button">Agregar</a>
      </div>
  </div>
  
  <table class="table table-dark table-hover card_tabla">
    <thead>
      <tr>
        <th class="text-center">ID</th>
        <th>DOCUMENTO</th>
        <th>PERIODO</th>
        <th>DIAS PAGOS</th>
        <th>TOTALES</th>
      </tr>
    </thead>
       
    <tbody>
      <tr>
        <th class="text-center">3</th>
        <td>22222222222</td>
        <td>Abril</td>
        <td>30</td>
        <td>25</td>
      </tr>
      <tr>
        <th class="text-center">23</th>
        <td>2222555522222</td>
        <td>Abril</td>
        <td>15</td>
        <td>5</td>
      </tr>
      <tr>
        <th class="text-center">2</th>
        <td>22222222222</td>
        <td>Abril</td>
        <td>30</td>
        <td>10</td>
      </tr>
    </tbody>
  </table>
</div>

   




      
   


  