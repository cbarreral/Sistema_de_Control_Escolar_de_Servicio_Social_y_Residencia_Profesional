  <header class="main-header">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <!-- Container wrapper -->
      <div class="container-fluid">
        <!-- Toggle button -->
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarRightAlignExample" aria-controls="navbarRightAlignExample" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarRightAlignExample">
          <!-- Left links -->
          <ul class="navbar-nav ms-auto mb-3 mb-lg-0">
            <li>
              <input class="form-control  d-flex justify-content-start" id="myInput" type="text" placeholder="Buscar...">
            </li>
            
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="<?php echo URL_SERVER?>inicio">Inicio</a>
            </li>

            <!-- Navbar dropdown -->
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <?php echo $_SESSION["nombre"] . ' ' . $_SESSION["apellido"]  ?>
              </a>
              <!-- Dropdown menu -->
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                <li><a class="dropdown-item" href="<?php echo URL_SERVER?>mis-datos">Ver mi Perfil</a></li>
                <li>
                  <hr class="dropdown-divider" />
                </li>
                <li>
                  <a class="dropdown-item" href="<?php echo URL_SERVER?>salir">Cerrar Sesión</a>
                </li>
              </ul>
            </li>


          </ul>
          <!-- Left links -->
        </div>
        <!-- Collapsible wrapper -->
      </div>
      <!-- Container wrapper -->
    </nav>
  </header>