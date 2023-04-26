<?php

//  class Conexion {

    
//  static public function conectar() {
    
//     $link = new PDO("mysql:host=localhost;dbname=gimnasio;", "root", "");

//          $link -> exec("set names utf8");

//          return $link;
         
//     }
// }




// parameters
$servername = "localhost";

$database = "gimnasio";

$username = "root";

$password = "";

// Create connection

$con=@mysqli_connect($servername, $username, $password, $database);
if($con){
     echo"conectado";

}else{
     die("imposible conectarse: ".mysqli_error($con));
    
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}

// $conn = mysqli_connect($servername, $username, $password, $database);

// // Check connection

// if (!$conn) {

// die("Connection failed: " . mysqli_connect_error());

// }

// echo "Connected successfully";

// mysqli_close($conn);

?>



