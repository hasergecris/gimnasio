
<?php 
  require("cabecera.php");  
  require("dashboard.php")
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
            <div class="mb-3 row d-block">
                  <label class="mb-3 col-sm-12 col-form-label texto">Ingresa tu numero de documento:</label>
                  <div class="col-sm-12">
                    <input type="text"  class="form-control"id="documento">
                  </div>
              </div>
         
            </div>
            <div class="card-footer">
              <div class="col-12 d-flex justify-content-center">
                <button type="submit" class="btn btn-lg btn-success mb-3 boton_general">Ingresar</button>
                <!-- <div class="alert">¡Alerta! Tu sesión expirará en <span id="counter">10</span> segundos.</div> -->
                <div id="contador">30</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

  <script>
    // function updateCounter() {
    //   var counter = document.getElementById('counter');
    //   var count = counter.innerHTML;
    //   count--;
    //   counter.innerHTML = count;

    //   // Chequear si el contador llegó a "0"
    //   if (count == 0) {
    //     clearInterval(interval);
    //   }
    // }

        // Establecer la fecha de finalización del contador
      var fechaFinalizacion = new Date("2023-05-01").getTime();

      // Actualizar el contador cada segundo
      var x = setInterval(function() {
      
      // Obtiene la fecha actual 
      var fechaActual = new Date().getTime();
        
      // Calcula la diferencia de tiempo entre la fecha final y la fecha actual
      var tiempoRestante = fechaFinalizacion - fechaActual;

      // Calcula los días, horas, minutos y segundos restantes
      var dias = Math.floor(tiempoRestante / (1000 * 60 * 60 * 24));
        
      // Actualiza el contenido del contador en el HTML
      document.getElementById("contador").innerHTML = dias + " días";
        
      // Si el contador ha terminado, para la función del intervalo
      if (tiempoRestante < 0) {
        clearInterval(x);
        document.getElementById("contador").innerHTML = "Contador terminado";
      }
    }, 1000);
  </script>

                  

   

    
 
