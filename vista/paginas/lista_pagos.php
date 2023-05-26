<?php
require("dashboard.php");
?>

<div id="lista_pagos">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card-registro">
          <div class="card-header">
            <h2 class="titulo text-center">Listado de Pagos</h2>
          </div>
          <div class="card-body">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Documento</th>
                  <th>Valor</th>
                  <th>Nombre</th>
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
                    <td><?php echo $pago["desde"]; ?></td>
                    <td><?php echo $pago["hasta"]; ?></td>
                    <td>
                      <a href="#" class="btn btn-info btn-sm btnEditarPago" data-toggle="modal" data-target="#modalEditarPago" data-id="<?php echo $pago["id"]; ?>" data-documento="<?php echo $pago["documento"]; ?>" data-valor="<?php echo $pago["valor"]; ?>" data-nombre="<?php echo $pago["usu_nombre"]; ?>" data-desde="<?php echo $pago["desde"]; ?>" data-hasta="<?php echo $pago["hasta"]; ?>">
                        <i class="fas fa-pencil-alt"></i>
                      </a>
                      <button class="btn btn-danger btn-sm btnEliminarPago" data-id="<?php echo $pago["id"]; ?>" data-toggle="modal" data-target="#modalEliminarPago">
                        <i class="fas fa-trash"></i>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal editar pago -->
<div class="modal fade" id="modalEditarPago" tabindex="-1" role="dialog" aria-labelledby="modalEditarPagoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditarPagoLabel">Editar Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" id="formEditarPago">
          <div class="form-group">
            <label for="editarDocumento">Documento</label>
            <input type="text" class="form-control" id="editarDocumento" name="actualizarDocumento">
          </div>
          <div class="form-group">
            <label for="editarValor">Valor</label>
            <input type="text" class="form-control" id="editarValor" name="actualizarValor">
          </div>
          <div class="form-group">
            <label for="editarNombre">Nombre</label>
            <input type="text" class="form-control" id="editarNombre" name="actualizarNombre">
          </div>
          <div class="form-group">
            <label for="editarDesde">Desde</label>
            <input type="date" class="form-control" id="editarDesde" name="actualizarDesde">
          </div>
          <div class="form-group">
            <label for="editarHasta">Hasta</label>
            <input type="date" class="form-control" id="editarHasta" name="actualizarHasta">
          </div>
          <input type="hidden" id="idPago" name="idPago">
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal eliminar pago -->
<div class="modal fade" id="modalEliminarPago" tabindex="-1" role="dialog" aria-labelledby="modalEliminarPagoLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEliminarPagoLabel">Eliminar Pago</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Está seguro de que desea eliminar este pago?</p>
        <form method="post" id="formEliminarPago">
          <input type="hidden" id="eliminarPago" name="eliminarPago">
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  // Obtener datos del pago a editar
  $(".btnEditarPago").click(function() {
    $("#editarDocumento").val($(this).data("documento"));
    $("#editarValor").val($(this).data("valor"));
    $("#editarNombre").val($(this).data("nombre"));
    $("#editarDesde").val($(this).data("desde"));
    $("#editarHasta").val($(this).data("hasta"));
    $("#idPago").val($(this).data("id"));
  });

  // Obtener id del pago a eliminar
  $(".btnEliminarPago").click(function() {
    $("#eliminarPago").val($(this).data("id"));
  });

  // Enviar formulario de edición
  $("#formEditarPago").submit(function(e) {
    e.preventDefault();
    var url = "actualizar_pago.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $(this).serialize(),
      success: function(data) {
        $("#modalEditarPago").modal("hide");
        location.reload();
      }
    });
  });

  // Enviar formulario de eliminación
  $("#formEliminarPago").submit(function(e) {
    e.preventDefault();
    var url = "eliminar_pago.php";
    $.ajax({
      type: "POST",
      url: url,
      data: $(this).serialize(),
      success: function(data) {
        $("#modalEliminarPago").modal("hide");
        location.reload();
      }
    });
  });
</script>
