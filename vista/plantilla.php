<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FORCAGYM</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="styles.css">

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
</head>

<body>
  <?php
  if (isset($_GET["pagina"])) {
    if (
      $_GET["pagina"] == "login_usuario" ||
      $_GET["pagina"] == "login_admin" ||
      $_GET["pagina"] == "lista_pagos" ||
      $_GET["pagina"] == "lista_usuario" ||
      $_GET["pagina"] == "registro_pagos" ||
      $_GET["pagina"] == "registro_usuario" ||
      $_GET["pagina"] == "dashboard" ||
      $_GET["pagina"] == "editar_usuarios" ||
      $_GET["pagina"] == "editar_pagos" ||
      $_GET["pagina"] == "salir"
    ) {
      include "paginas/" . $_GET["pagina"] . ".php";
    } else {
      include "paginas/error404.php";
    }
  } else {
    include "paginas/login_admin.php";
  }
  ?>
</body>

</html>