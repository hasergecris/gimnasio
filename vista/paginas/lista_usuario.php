<?php
require("dashboard.php");

//   if(isset($_SESSION["validarIngreso"])) {

//     echo '<script> window.location = "index.php?pagina=login_admin" </script>';
//     return;


// }else {
//     if( $_SESSION["validarIngreso"] != "ok") {

//     echo '<script> window.location = "index.php?pagina=login_admin" </script>';
//       return;
//     }
//   }

$usuarios = ControladorFormularios::ctrSeleccionarRegistros(null, null);
?>

<div id="tabla_usuarios">
  <h1 class="titulo_general text-center">LISTA DE USUARIOS</h1>

  <table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>NUMERO</th>
        <th>NOMBRES</th>
        <th>DOCUMENTO</th>
        <th>CORREO</th>
        <th>ROL</th>
        <th>FECHA </th>
        <th>ACCIONES</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($usuarios as $key => $value) : ?>
        <tr>
          <td class="text-center"><?php echo ($key + 1); ?></td>
          <td><?php echo $value["usu_nombre"] ?> </td>
          <td><?php echo $value["usu_documento"] ?></td>
          <td><?php echo $value["usu_correo"] ?></td>
          <td class="text-center"><?php echo $value["usu_rol"] ?></td>
          <td><?php echo $value["fecha"] ?></td>
          <td class="d-flex">
            <div class="btn-group">
              <div class="px-1">
                <a href="index.php?pagina=editar_usuarios&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
              </div>

              <form method="post">
                <input type="hidden" name="eliminarRegistro" value=" <?php echo $value["id"]; ?>">
                <button type="submit" class="btn btn-danger data-toggle="modal" data-target="#confirmDeleteModal""><i class="fas fa-trash-alt"></i></button>

                <?php
                $eliminar = new  ControladorFormularios();
                $eliminar->ctrEliminarRegistro();
                ?>
              </form>
            </div>

            <div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="confirmDeleteModalLabel">Confirmar eliminación</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    ¿Estás seguro de que deseas eliminar este usuario?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Eliminar</button>
                  </div>
                </div>
              </div>
            </div>

          </td>

        </tr>

      <?php endforeach ?>

    </tbody>
  </table>

</div>

<script>
  $(document).ready(function() {
    // Agregar evento al botón de eliminar del modal
    $('#confirmDeleteBtn').click(function() {
      // Ejecutar la eliminación del usuario
      eliminarUsuario();
    });
  });

  function eliminarUsuario() {
    // Aquí puedes agregar el código existente para eliminar el usuario
    // Puedes llamar a la función ctrEliminarRegistro() como lo estás haciendo actualmente
    // Solo asegúrate de que el código de redirección se ejecute solo si la eliminación es exitosa
  }
</script>     










