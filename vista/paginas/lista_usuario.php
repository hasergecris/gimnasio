<?php
require("dashboard.php");



$usuarios = ControladorFormularios::ctrSeleccionarRegistro(null, null);
?>

<div class="tabla_usuarios">
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
                <button type="submit" class="btn btn-danger"><i class=" fas fa-trash-alt"></i></button>

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