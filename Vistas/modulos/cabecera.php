  <header class="main-header">
    <!-- Logo -->
    <a href="http://localhost/Sistema/inicio" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b class=" fa fa-university" style="font-size:29px; color:black"></b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Control</b> Escolar</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">ok</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <?php
              echo '<spam class="hidden-xs"  data-toggle="tooltip" data-placement="left" title="Perfil de: ' . $_SESSION["rol"] . " " . $_SESSION["nombre"] . ' " >' . $_SESSION["apellido"] . " " . $_SESSION["nombre"] . '</spam>';
              ?>

            </a>
            <ul class="dropdown-menu" style="border: ipx solid black">
              <!-- User image -->
              <li class="user-header" style="height: 150px;">
                <?php
                if ($_SESSION["rol"] == "Admin") {
                  echo '<p target="blank" >Administrador <br>' . $_SESSION["apellido"] . " " . $_SESSION["nombre"] . '</p>';
                }else if ($_SESSION["rol"] == "Alumno"){
                  echo '<p target="blank" >Alumno <br>' . $_SESSION["apellido"] . " " . $_SESSION["nombre"] ." - " . $_SESSION["matricula"] . '</p>';
                  $columna ="id";
                  $valor =$_SESSION["id_carrera"];
                  $carrera = CarrerasC::verCarreraC($columna, $valor);
                  
                  echo ' <p>'.$carrera["nombre"].'</p>';
                }else if ($_SESSION["rol"] == "a_Academico"){
                  echo '<p target="blank" >Acesor Academico <br>' . $_SESSION["apellido"] . " " . $_SESSION["nombre"] ." - " . $_SESSION["matricula"] . '</p>';
                  $columna ="id";
                  $valor =$_SESSION["id_carrera"];
                  $carrera = CarrerasC::verCarreraC($columna, $valor);
                  
                  echo ' <p>'.$carrera["nombre"].'</p>';
                }else if ($_SESSION["rol"] == "a_Industrial"){
                  echo '<p target="blank" >Acesor Industrial <br>' . $_SESSION["apellido"] . " " . $_SESSION["nombre"] ." - " . $_SESSION["matricula"] . '</p>';
                  
                }
                ?>
              </li>
             
              <!-- Menu Footer-->
              
            </ul><li class="user-footer">
                <div class="pull-left">
                  <a href="http://localhost/Sistema/mis-datos" class="btn btn-primary btn-flat">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="http://localhost/Sistema/salir" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
          </li>

        </ul>
      </div>
    </nav>
  </header>