
<?php 
  require("dashboard.php");
?>


<div id="ingreso_cliente">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="card card_login">
          <div class="card-header">
            <h2 class="titulo text-center"> INGRESO</h2>
          </div>
          <div class="card-body contenido">
            <form action="../controladores/ingreso_usuarios.php" method="POST">
              <div class="mb-2 row d-block">
                <label class="mb-1 col-sm-12 col-form-label texto">Ingresa tu numero de documento:</label>
                <div class="col-sm-12">
                  <div class="input-group mb-1">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user "></i></span>
                    <input type="text"  class="form-control control_ingreso"id="documento" name="documento">
                  </div>
                </div>
              </div>
           
              <div class="card-footer">
                <div class="col-12 d-flex justify-content-center">
                  <button type="submit" class="btn btn-lg btn-success mb-3 boton_general" data-bs-toggle="modal" data-bs-target="#exampleModal">Ingresar</button>
                </div>
            </form>

            </div>
          </div>
        </div>
      </div>
    </div>
</div>


<!-- MODAL -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body flex-column">
        <h1 class="d-flex justify-content-center titulo_modal">¡¡¡ ATENCIÓN !!!</h1>
        <h4 class="texto_modal text-center">Al usuario le quedan </h4>
        <div class="caja-contador d-flex justify-content-center">
          <div class="contador_dias flex-column d-flex justify-content-center align-items-center">
            <div id="contador"></div>
            <div class="dia">Días</div>
          </div>
        </div>
        <div class="texto_dias text-center"> para que termine su suscripción</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger boton_modal" data-bs-dismiss="modal">Entendido</button>
      </div>
    </div>
  </div>
</div>
          






<script>
    function ingresos_clientes(documento) {
        alert("mamá estoy triunfando"); 
    //     // Establecer la fecha de finalización del contador
    // var fechaFinalizacion = new Date("2023-05-27").getTime();

    // // Actualizar el contador cada segundo
    // var x = setInterval(function() {
    
    // // Obtiene la fecha actual 
    // var fechaActual = new Date().getTime();
        
    // // Calcula la diferencia de tiempo entre la fecha final y la fecha actual
    // var tiempoRestante = fechaFinalizacion - fechaActual;

    // // Calcula los días, horas, minutos y segundos restantes
    // var dias = Math.floor(tiempoRestante / (1000 * 60 * 60 * 24));
        
    // // Actualiza el contenido del contador en el HTML
    // document.getElementById("contador").innerHTML = dias;
        
    // // Si el contador ha terminado, para la función del intervalo
    // if (tiempoRestante < 0) {
    //     clearInterval(x);
    //     document.getElementById("contador").innerHTML = "Su mensualidad termino";
    // }
    // }, 1000);
}
</script>



                  

   

    
 
