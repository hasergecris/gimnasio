<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lista de Usuarios</title>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.1/css/dataTables.bootstrap5.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.0/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.1/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.11.1/js/dataTables.bootstrap5.min.js"></script>
</head>

<body>

  <?php
  require("dashboard.php");

  $usuarios = ControladorFormularios::ctrSeleccionarRegistro(null, null);
  ?>

  <script>
    $(document).ready(function() {
      $('#lista_usuarios').DataTable({
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
    <h1 class="titulo_general text-center">LISTA DE USUARIOS</h1>

    <table id="lista_usuarios" class="table table-dark table-hover">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">NOMBRES</th>
          <th scope="col">DOCUMENTO</th>
          <th scope="col">CORREO</th>
          <th scope="col">ROL</th>
          <th scope="col">FECHA</th>
          <th scope="col">ACCIONES</th>
        </tr>
      </thead>

      <tbody>
        <?php foreach ($usuarios as $key => $value) : ?>
          <tr class="align-items-center listaUsa">
            <td class="text-center texto_tablas"><?php echo ($key + 1); ?></td>
            <td class="texto_tablas"><?php echo $value["usu_nombre"] ?> </td>
            <td class="texto_tablas"><?php echo $value["usu_documento"] ?></td>
            <td class="texto_tablas"><?php echo $value["usu_correo"] ?></td>
            <td class="text-center texto_tablas"><?php echo $value["usu_rol"] ?></td>
            <td class="texto_tablas"><?php echo $value["fecha"] ?></td>

            <td class="d-flex">
              <div class="btn-group">
                <div class="px-1">
                  <a href="index.php?pagina=editar_usuarios&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                </div>

                <form method="post" class="deleteForm">
                  <input type="hidden" name="eliminarRegistro" value="<?php echo $value["id"]; ?>">
                  <button type="button" class="btn btn-danger deleteBtn" data-username="<?php echo $value['usu_nombre']; ?>"><i class="fas fa-trash-alt"></i></button>

                  <?php
                  $eliminar = new  ControladorFormularios();
                  $eliminar->ctrEliminarRegistro();
                  ?>
                </form>
              </div>
            </td>
          </tr>
        <?php endforeach ?>
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
</body>

</html>