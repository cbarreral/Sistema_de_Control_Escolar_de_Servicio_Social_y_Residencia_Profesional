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

          </div>
      </nav>

      <!-- Background image -->
      <div id="intro" class="bg-image shadow-2-strong">

          <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
              <div class="container">
                  <div class="row justify-content-center">
                      <div class="">

                          <form class="bg-white rounded shadow-5-strong p-5" method="post">
                              <!-- Email input -->
                              <h1>Crear cuenta</h1>
                              <p> Residencia Profecional</p>
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-outline mb-4 bg-gray-light rounded " >
                                          <input type="text"  name="matriculaU"  id="Validarmatricula" class="form-control"  />
                                          <label class="form-label" for="form1Example1">Matricula:</label>
                                      </div>

                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-outline mb-4 bg-gray-light rounded ">
                                          <input type="text" id="form1Example1" name="apellido" class="form-control" re/>
                                          <label class="form-label" for="form1Example1">Apellidos:</label>
                                      </div>

                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-outline mb-4 bg-gray-light rounded ">
                                          <input type="name" id="form1Example1" name="nombre" class="form-control" />
                                          <label class="form-label" for="form1Example1">Nombre:</label>
                                      </div>

                                  </div>


                                  <div class="col-md-4">
                                      <div class="form-outline mb-4 bg-gray-light rounded ">
                                      <select name="carrera" class="form-control " id="" >
                                    <option value="0"></option>
                                    <?php
                                    $carreras = CarrerasC::VerCarrerasC();

                                    foreach ($carreras as $key => $value) {
                                        echo '
                                        
                                    <option value="' . $value["id"] . '">' . $value["nombre"] . '</option>
                                        ';
                                    }



                                    ?>
                                </select>
                                          <label class="form-label" for="form1Example1">Seleccionar carrera</label>
                                      </div>

                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-outline mb-4 bg-gray-light rounded ">
                                          <input type="text" id="form1Example1" name="especialidad" class="form-control" />
                                          <label class="form-label" for="form1Example1">Especialidad:</label>
                                      </div>

                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-outline mb-4 bg-gray-light rounded ">
                                          <input type="email" id="form1Example1" name="correo" class="form-control" />
                                          <label class="form-label" for="form1Example1">Email:</label>
                                      </div>

                                  </div>
                              </div>

                              <!-- Password input -->
                             <div class="col-md-4 ">
                             <div class="form-outline mb-4 bg-gray-light rounded ">
                                  <input type="tel" name="telefono" id="form1Example2" class="form-control" />
                                  <label class="form-label" for="form1Example2">Teléfono:</label>
                              </div>
                              <input type="text" name="rol" id="rol" class="form-control" value="Alumno" />
                             </div>

                              <br>

                              <!-- Submit button -->
                              <button type="submit" class="btn btn-primary btn-block">Crear cuenta de acceso</button>
                              <?php

                                $crearCuenta = new UsuariosC();
                                $crearCuenta->CrearCuenta();

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