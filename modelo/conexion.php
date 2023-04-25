<?php

class conexion {
    static public function conectar() {
        $link = new PDO("mysql:host=localhost;Dbname" );
         return $link;
    }
}

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