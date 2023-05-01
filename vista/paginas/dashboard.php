<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 texto" href="index.php?pagina=login_admin">FORCAGYM</a>
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

          <?php if(isset($_GET["pagina"])):?>

            <?php if($_GET["pagina"] == "registro_usuario"):?>
              <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=registro_usuario">Registro de Usuarios</a>
              </li>
              <?php else:?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=registro_usuario">Registro de Usuarios</a>
              </li>
            <?php endif?>

            <?php if($_GET["pagina"] == "login_usuario"):?>
              <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=login_usuario">Ingreso de Usuarios</a>
              </li>
              <?php else:?>
                <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=login_usuario">Ingreso de Usuarios</a>
              </li>
            <?php endif?>

            <?php if($_GET["pagina"] == "lista_usuario"):?>
              <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=lista_usuario">Lista Usuarios</a>
              </li>
              <?php else:?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?pagina=lista_usuario">Lista Usuarios</a>
                </li>
            <?php endif?>

            <?php if($_GET["pagina"] == "lista_pagos"):?>
              <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=lista_pagos">Lista de Pagos</a>
              </li>
              <?php else:?>
                <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=lista_pagos">Lista de Pagos</a>
              </li>
            <?php endif?>

            <?php if($_GET["pagina"] == "registro_pagos"):?>
              <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=registro_pagos">Registro de Pagos</a>
              </li>
              <?php else:?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?pagina=registro_pagos">Registro de Pagos</a>
                </li>
            <?php endif?>

            <?php if($_GET["pagina"] == "salir"):?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=salir">Cerrar sesion</a>
              </li>
              <?php else:?>
                <li class="nav-item">
                  <a class="nav-link" href="index.php?pagina=salir">Cerrar sesion</a>
                </li>
            <?php endif?>

            <?php else:?>

              <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=registro_usuario">Registro de Usuarios</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=login_usuario">Ingreso de Usuarios</a>
              </li>
            
              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=lista_usuario">Lista Usuarios</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=lista_pagos">Lista de Pagos</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=registro_pagos">Registro de Pagos</a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="index.php?pagina=salir">Cerrar sesion</a>
              </li>
          <?php endif?>

        </ul>
      </div>
    </nav>
  
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 contenido">


