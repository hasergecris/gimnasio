<?php 
  require("cabecera.php");  
?>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 texto" href="../vista/login_admin.php">FORCAGYM</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-50" type="text" placeholder="Buscar" aria-label="Search">

  <div class="col-1 icono_noti">
    <i class="fas fa-bell"></i>
    </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="./login_usuario.php">
              Ingreso de Usuarios
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="./registro_usuario.php">
              Registro de Usuarios
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./lista_usuario.php">
              Lista Usuarios
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./lista_pagos.php">
              Lista de Pagos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./registro_pagos.php">
              Registro de Pagos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../controladores/logout.php">
              Cerrar sesion
            </a>
          </li>
        </div>
      </nav>
  
      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 contenido">
          
      
      <!-- </main>
      </div>
    </div>
     -->
          
          
       
      

  
      

     
