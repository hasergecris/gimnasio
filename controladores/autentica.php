<?php
include('../controladores/autentica.php');

$conexion = Conexion::conectar();


// session_start();
// if (isset($_POST['ingresoadm'])) {
   echo $username = $_POST['documento'];
    echo $password = $_POST['contrasenia'];
//     $query = $conexion->prepare("SELECT * FROM usuarios WHERE usu_nom=:username and  usu_pas= :password ");
//     // $query->bindParam("username", $username, PDO::PARAM_STR);
//     $query->execute();
//     $result = $query->fetch(PDO::FETCH_ASSOC);
// }
//     if (!$result) {
//         echo '<p class="error">Username password combination is wrong!</p>';
//     } else {
//         if (password_verify($password, $result['usu_pas'])) {
//             $_SESSION['user_id'] = $result['usu_id'];
//             echo '<p class="success">Congratulations, you are logged in!</p>';
//         } else {
//             echo '<p class="error">Username password combination is wrong!</p>';
//         }
//     }
// }


