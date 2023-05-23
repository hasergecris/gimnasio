<?php 
  require("dashboard.php")
  
?>

<div id="tabla_pagos">
  <h1 class="titulo_general text-center">LISTA DE PAGOS</h1>

  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>NUMERO</th>
        <th>CLIENTE</th>
        <th>VALOR</th>
        <th>DESDE</th>
        <th>HASTA</th>
      </tr>
    </thead>

    <tbody>
      <?php foreach ($pagos as $key => $value) : ?>
        <tr>
          <td class="text-center"><?php echo ($key + 1); ?></td>
          <td><?php echo $value["cliente"]; ?></td>
          <td><?php echo $value["valor"]; ?></td>
          <td><?php echo $value["desde"]; ?></td>
          <td><?php echo $value["hasta"]; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

   




      
   


  