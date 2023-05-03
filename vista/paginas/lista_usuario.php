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
   

  $usuarios = ControladorFormularios::ctrSeleccionarRegistros();
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
        foreach($usuarios as $key => $value):?>
          <tr>
            <td class="text-center"><?php echo ($key+1);?></td>
            <td><?php echo $value["usu_nombre"]?> </td>
            <td><?php echo $value["usu_documento"]?></td>
            <td><?php echo $value["usu_correo"]?></td>
            <td class="text-center"><?php echo $value["usu_rol"]?></td>
            <td><?php echo $value["fecha"]?></td>
            <td>
              <div class="btn-group">
                <a href="index.php?pagina=editar&id=<?php echo $value["id"]; ?>" class="btn btn-warning"><i class="fas fa-pencil-alt"></i></a>
                <a href="index.php?pagina=editar" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
              </div>
            </td>
          </tr>
      <?php endforeach ?>

      
    </tbody>
  </table>
</div>





