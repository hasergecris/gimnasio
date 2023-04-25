<?php

// class Conexion {

// $usuario = "root";
// $contraseña="";    
//     static public function conectar() {
//         $link = new PDO("mysql:host=localhost;dbname=gimnasio;root",$usuario,$contraseña);

//          $link -> exec("set names utf8");

//          return $link;
//     }
// }

$servername = "";

$database = "gimnasio";

$username = "root";

$password = "";

// Create connection

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection

if (!$conn) {

die("Connection failed: " . mysqli_connect_error());

}

echo "Connected successfully";

mysqli_close($conn);

?>