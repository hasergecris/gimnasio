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
                <!-- <button type="submit" class="btn btn-danger"><i class="fas fa-trash-alt"></i></button> -->
                <button type="button" class="btn btn-danger deleteBtn" data-username="<?php echo $pago['usu_nombre']; ?>"><i class="fas fa-trash-alt"></i></button>
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
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar al usuario <span id="usernameToDelete"></span>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Eliminar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function() {
    var formToSubmit;
    $('.deleteBtn').on('click', function() {
      formToSubmit = $(this).closest('form');
      var username = $(this).data('username');
      $('#usernameToDelete').text(username);
      $('#deleteModal').modal('show');
    });

    $('#confirmDelete').on('click', function() {
      formToSubmit.submit();
    });
  });
</script>