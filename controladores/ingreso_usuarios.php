<?php 
 require ("../modelo/conexion.php");
 
 $documento = $_POST['documento'];

    echo$sql = "SELECT pago_periodo_fin, pago_usu_id FROM pagos WHERE pago_usu_id = '"  . $documento ."' ";
    $query=mysqli_query($con,$sql);
    $counter=mysqli_num_rows($query);
    $fila[]=mysqli_fetch_assoc($query);

    $fecha_fin = $fila[0]['pago_periodo_fin'];
    echo"<script>ingresos_clientes(".$fecha_fin.");</script>"

?>


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


   
    

