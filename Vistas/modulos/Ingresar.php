  <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(https://st4.depositphotos.com/27313554/31102/v/600/depositphotos_311028970-stock-illustration-abstract-white-grey-geometric-background.jpg);
        height: 100vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" href="#">
          <strong>ITSOEH</strong>
        </a>
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01"
          aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="#intro">Inicio</a>
            </li>
            
          </ul>

          <ul class="navbar-nav d-flex flex-row">
            <!-- Icons -->
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.youtube.com/" rel="nofollow"
                target="_blank">
                <i class="fab fa-youtube"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.facebook.com/groups/ITSOEH" rel="nofollow" target="_blank">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="#" rel="nofollow" target="_blank">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
           
          </ul>
        </div>
      </div>
    </nav>

   <!-- Background image -->
   <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <form class="bg-white rounded shadow-5-strong p-5" method="post">
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form1Example1" name="matricula" class="form-control" />
                  <label class="form-label" for="form1Example1">Usuario</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="clave" id="form1Example2" class="form-control" />
                  <label class="form-label" for="form1Example2">Contraseña</label>
                </div>

           <br>

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
                <?php

      $ingreso = new UsuariosC();
      $ingreso -> IniciarSesionC();

      ?>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    </header>
  <!--Main Navigation-->

  <!--Footer-->
  <footer class="bg-light text-lg-start">
    <div class="py-4 text-center">
      <a role="button" class="btn btn-info btn-lg m-2"
        href="http://www.itsoeh.edu.mx/front/servicio.html" rel="nofollow" target="_blank">
        Información para Servicio Social
      </a>
      <a role="button" class="btn btn-info btn-lg m-2" href="http://www.itsoeh.edu.mx/front/residencia.html" target="_blank">
        Información para Residencia Profecional
      </a>
    </div>

    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>Siguenos en nuestras comunidades en facebook</p>
      <a href="https://www.facebook.com/groups/ITSOEH" class="btn btn-primary m-1" role="button"
        rel="nofollow" target="_blank"> 
        <i class="fab fa-facebook-f"></i> - Grupo ITSOEH 
      </a>
      <a href="https://www.facebook.com/Residencias-Profesionales-y-Servicio-Social-Itsoeh-1393408057656461" class="btn btn-primary m-1" role="button" rel="nofollow"
        target="_blank">
        <i class="fab fa-facebook-f"></i>
        - Grupo Residencia y Servicio  
      </a>
     
    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © <?php echo '20'. date("y"); ?> Copyright:
      <a class="text-dark" href="http://www.itsoeh.edu.mx/">ITSOEH</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->