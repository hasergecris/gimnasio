<?php
require("dashboard.php");

$pagos = ControladorFormularios::ctrSeleccionarRegistros(null, null, "pagos");
?>

<div id="tabla_pagos">
  <h1 class="titulo_general text-center">LISTA DE PAGOS</h1>

  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>DOCUMENTO</th>
        <th>VALOR</th>
        <th>NOMBRE</th>
        <th>DESDE</th>
        <th>HASTA</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($pagos as $key => $value) : ?>
        <tr>
          <td><?php echo $value["documento"]; ?></td>
          <td><?php echo $value["valor"]; ?></td>
          <td><?php echo $value["usu_nombre"]; ?></td>
          <td><?php echo $value["desde"]; ?></td>
          <td><?php echo $value["hasta"]; ?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
</div>
