<?php
include('../modelos/conexion.php');

session_start(); // Iniciando sesion
$error=''; // Variable para almacenar el mensaje de error


// if (isset($_POST['ingresoadm'])) {
if (empty($_POST['documento']) || empty($_POST['contrasenia'])) {

   
$error = "Username or Password is invalid";
}
else
{
    // echo"oki";
// Define $username y $password


echo$username=$_POST['documento'];
echo$password=$_POST['contrasenia'];


// Estableciendo la conexion a la base de datos
// include("config/db.php");//Contienen las variables, el servidor, usuario, contraseña y nombre  de la base de datos
// include("config/conexion.php");//Contiene de conexion a la base de datos
 
// Para proteger de Inyecciones SQL 
// $username    = mysqli_real_escape_string($con,(strip_tags($username,ENT_QUOTES)));
// $password =  sha1($password);//Algoritmo de encriptacion de la contraseña http://php.net/manual/es/function.sha1.php
 
echo$sql = "SELECT usu_documento, usu_pas FROM usuarios WHERE usu_documento = '" . $username . "' and usu_pas='".$password."';";
$query=mysqli_query($con,$sql);
$counter=mysqli_num_rows($query);
if ($counter==1){
		$_SESSION['usu_documento']=$username; // Iniciando la sesion
		header("location: ../vista/dashboard.php"); // Redireccionando a la pagina profile.php
	echo"logueado";
	
} else {
echo$error = "El correo electrónico o la contraseña es inválida.";	
}
}


