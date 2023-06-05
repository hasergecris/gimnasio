<?php
require("dashboard.php");

$pagos = ControladorPagos::ctrSeleccionarPagos();

?>

<div class="tabla_usuarios">
  <h2 class="titulo text-center">Listado de Pagos</h2>
  <table class="table table-dark table-hove">
    <thead>
      <tr>
        <th>Documento</th>
        <th>Valor</th>
        <th>Nombre</th>
        <th>Duración</th>
        <th>Desde</th>
        <th>Hasta</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pagos as $pago) : ?>
        <tr>
          <td><?php echo $pago["documento"]; ?></td>
          <td><?php echo $pago["valor"]; ?></td>
          <td><?php echo $pago["usu_nombre"]; ?></td>
          <td><?php echo $pago["duracion"]; ?></td>
          <td><?php echo $pago["desde"]; ?></td>
          <td><?php echo $pago["hasta"]; ?></td>
          <td class="d-flex">
            <div class="btn-group">
              <div class="px-1">
                <a href="index.php?pagina=editar_pagos&id=<?php echo $pago["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
              </div>

              <form method="post">
                <input type="hidden" name="eliminarPago" value=" <?php echo $pago["id"]; ?>">
                <button type="submit" class="btn btn-danger"><i class=" fas fa-trash-alt"></i></button>

                <?php
                $eliminar = new  ControladorPagos();
                $eliminar->ctrEliminarPago();
                ?>
              </form>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>