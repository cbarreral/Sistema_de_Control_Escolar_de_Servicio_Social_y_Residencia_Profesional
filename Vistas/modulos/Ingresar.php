  <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(https://st4.depositphotos.com/27313554/31102/v/600/depositphotos_311028970-stock-illustration-abstract-white-grey-geometric-background.jpg);
        height: 240vh;
      }

      /* Height for devices larger than 576px */
      @media (min-width:900px) {
        #intro {
          margin-top: -450.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }

      ul {
        list-style: none;
      }
    </style>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark d-none d-lg-block" style="z-index: 2000;">
      <div class="container-fluid">
        <!-- Navbar brand -->
        <a class="navbar-brand nav-link" href="#">
          <strong>ITSOEH</strong>
        </a>
        <!--  <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarExample01" aria-controls="navbarExample01" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
      <div class="collapse navbar-collapse" id="navbarExample01">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="#intro">Inicio</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" type="button" data-mdb-toggle="modal" data-mdb-target="#Ingresar">Ingresar</a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" aria-current="page" href="#Registro">Registrar</a>
            </li>
          </ul>

          <ul class="navbar-nav d-flex flex-row">
      
            <li class="nav-item me-3 me-lg-0">
              <a class="nav-link" href="https://www.youtube.com/" rel="nofollow" target="_blank">
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
        </div>-->
      </div>
    </nav>

    <!-- Background image -->
    <div id="intro" class="bg-image shadow-2-strong">
      <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
        <div class="container">


          <?php
          $info = infoResidenciaC::VerInfoC();

          echo '
          <div class="">
            <div class="row justify-content-center">
              <div class="bg-white rounded shadow-5-strong p-5">
                <h1>Residencia Profesional</h1>
                <p>
                <h4>Objetivos</h4>
                ' .  $info["objetivos"] ?>
          </p>
          <h4>¿Como puedes iniciar con este proceso?</h4>
          <p>De conformidad con el reglamento de residencia profesional del Instituto, los requisitos que deberás cumplir para ser residente son:</p>
          <?php
          $proceso = infoResidenciaC::VerProcesos();
          foreach ($proceso as $key => $value) {

            echo '
                <ul >
                  <li>' . $value["num"] . " " . $value["info"] . '</li>
                </ul>';
          }
          ?>
          <p>
          <h4>¿Dónde puedes realizar la Residencia Profesional?</h4>

          <?php
          $respuesta = infoResidenciaC::VerInfoC();
          echo '
            <p>Empresas Vinculadas: <a target="blank" href="' . URL_SERVER . 'Documentacion/' . $respuesta["empresasPDF"] . '">Descagar</a></p>
            
              ';
          ?>
          <div class="accordion" id="accordionExample">
            <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-mdb-toggle="collapse" data-mdb-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Formatos de Residencia Profesional (DESCARGAR AQUÍ)
                </button>
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse " aria-labelledby="headingOne" data-mdb-parent="#accordionExample">
                <div class="accordion-body">
                  <ol>
                    <?php
                    $resul = infoResidenciaC::VerDocumentosC();
                    foreach ($resul as  $Doc) {
                      echo '
                    <li><a target="blank" href="' . URL_SERVER . 'Documentacion/' . $Doc["PDF"] . '">' . $Doc["nombre"] . '</a> </li>
                   ';
                    }; ?>
                  </ol>
                </div>
              </div>
              <br>

            </div>

          </div>
          <?php
          $respuesta = infoResidenciaC::VerInfoC();
          echo '
            <p>Calendario: <a target="blank" href="' . URL_SERVER . 'Documentacion/' . $respuesta["calendarioPDF"] . '">Descagar </a></p>
            
              ';
          ?>
          <hr>
          <div class="row">
            <div class="col-2">
              <a type="button" class="btn btn-primary btn-lg" href="crearCuenta">Crear cuenta</a>
            </div>

            <div class="col-2">
              <button class="btn btn-success btn-lg" type="button" data-mdb-toggle="modal" data-mdb-target="#Ingresar">Ingresar</button>
            </div>
           
          </div>
        </div>

      </div>
    </div>



    </div>
    </div>
    </div>
  </header>
  <!--Main Navigation-->


  <!--Modal Ingresar -->








  <div class="modal fade " id="Ingresar">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="" method="post">
          <div class="modal-body">
            <div class="box-body ">

              <div class="form-outline mb-4 bg-gray-light rounded">
                <input type="text" id="form1Example1" name="matricula" class="form-control" />
                <label class="form-label" for="form1Example1">Usuario</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4 bg-gray-light rounded">
                <input type="password" name="clave" id="form1Example2" class="form-control" />
                <label class="form-label" for="form1Example2">Contraseña</label>
              </div>

              <br>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button>
              <?php

              $ingreso = new UsuariosC();
              $ingreso->IniciarSesionC();

              ?>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>














  <!--Footer-->
  <footer class="bg-light text-lg-start">


    <hr class="m-0" />

    <div class="text-center py-4 align-items-center">
      <p>Siguenos en nuestras comunidades en facebook</p>
      <a href="https://www.facebook.com/groups/ITSOEH" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
        <i class="fab fa-facebook-f"></i> - Grupo ITSOEH
      </a>
      <a href="https://www.facebook.com/Residencias-Profesionales-y-Servicio-Social-Itsoeh-1393408057656461" class="btn btn-primary m-1" role="button" rel="nofollow" target="_blank">
        <i class="fab fa-facebook-f"></i>
        - Grupo Residencia y Servicio
      </a>

    </div>

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
      © <?php echo '20' . date("y"); ?> Copyright:
      <a class="text-dark" href="http://www.itsoeh.edu.mx/">ITSOEH</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!--Footer-->