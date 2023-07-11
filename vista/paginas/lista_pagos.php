<?php
require("dashboard.php");

$pagos = ControladorPagos::ctrSeleccionarPagos();

?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
<script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>

<script>
  $(document).ready(function() {
    $('#lista_pagos').DataTable({
      searching: true,
      ordering: true,
      paging: true,
      pageLength: 10,
      language: {
        search: 'Buscar:',
        paginate: {
          next: '<i class="fas fa-chevron-right"></i>',
          previous: '<i class="fas fa-chevron-left"></i>'
        }
      }
    });
  });
</script>

<div class="tabla_usuarios">
  <h2 class="titulo text-center">Listado de Pagos</h2>
  <table class="table table-dark table-hover" id="lista_pagos">
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
                <input type="hidden" name="eliminarPago" value="<?php echo $pago["id"]; ?>">
                <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button>

                <?php
                $eliminar = new ControladorPagos();
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
