    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="box">
            <div class="box-header with-border">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <?php echo
                    '<h1>
                        Hola! ' . $_SESSION["nombre"] . ' ' . $_SESSION["apellido"] . '
                    </h1>
                    '; ?>
                </section>

                <!-- Main content -->
                <section class="content">

                    <div class="d-flex mb-3">
                        <?php
                        $user = UsuariosC::VerUsuariosC("matricula", $_SESSION["matricula"]);

                        if ($user["rol"] == "Alumno") {
                            echo '
                                    
                            <div class="p-2">
                                <div class="card w-70 " style="background-color: #FFB74D;">
                                    <div class="card-body">
                                        <h5 class="card-title">Realizar Solicitud de Residencia Profecional</h5>
                                        ';

                            $columna = "matricula";
                            $valor = $_SESSION["matricula"];
                            $solicitud = SolicitudResidenciaC::VerSolicitud($columna, $valor);
                            $estado;
                            if ($solicitud["estado"] == 0 || $solicitud["estado"] == null) {

                                echo '
                                            <p class="card-text">
                                            Aún no has realizado tu Solicitud
                                            </p>
                                            <a href="solicitudRecidencia" class="btn btn-primary"  >Solicitar</a>
                                            ';
                            }
                            if ($solicitud["estado"] == 1) {

                                echo '
                                                <p class="card-text">
                                                Enhorabuena se ha enviado tu solicitud!!
                                                </p>
                                            
                                                ';
                            }
                            echo '
                                        </div>
                                    </div>
                                </div>';


                                   // 2do NIVEL
                            echo '
                                    
                               
                            </div>
                            <div class="d-flex mb-3">
                            
                            ';


                            //  EVALUACIOES
                            echo '
                                    
                            <div class="p-2">
                                <div class="card w-80 " style="background-color: #26A69A;">
                                    <div class="card-body">
                                        <h5 class="card-title">Carpeta de evaluaciones y reportes parciales </h5>
                                        <p class="card-text">
                                            <h4>';

                        $columna = "estado";
                        $valor = 3;
                        $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                        echo '
                                            </h4> Archivos
                                            </p>
                                            <a href="verCarpeta/'.$_SESSION["id_carrera"].'/'.$_SESSION["matricula"].'" class="btn btn-primary"  style="background-color: #004D40;">Ver mi carpeta</a>
                                          
                                        </div>
                                    </div>
                                
                                    </div>';




                        //  VISITAS A EMPRESAS
                        echo '
                                
                            <div class="p-2">
                                <div class="card w-70 " style="background-color: #03A9F4;">
                                    <div class="card-body">
                                        <h5 class="card-title">Calendario de Visitas programadas a empresas </h5>
                                        <p class="card-text">
                                            <h4>';

                        $columna = "estado";
                        $valor = 3;
                        $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                        echo '
                                            </h4> Visitas Programadas 
                                            </p>
                                            <a href="verSolicitudes" class="btn btn-primary"  style="background-color: #01579B;">Ver Calendario de visitas</a>
                                          
                                        </div>
                                    </div>
                                
                                    </div>';
                        //  CONSTANCIAS
                        echo '
                            
                        <div class="p-2">
                            <div class="card w-70 " style="background-color: #26C6DA;  ">
                                <div class="card-body" style="color: #fff;">
                                    <h5 class="card-title">Constancias de los alumnos</h5>
                                    <p class="card-text">
                                        <h4>';

                        $columna = "estado";
                        $valor = 3;
                        $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                        echo '
                                        </h4> documentos
                                        </p>
                                        <a href="verSolicitudes" class="btn btn-primary" style="background-color: #311B92;">Ver Constancias</a>
                                      
                                    </div>
                                </div>
                            
                                </div>';



   // 2do NIVEL
   echo '
                                    
                               
   </div>
   <div class="d-flex mb-3">
   
   ';

                                  //  MI EMPRESA
                        echo '
                                
                        <div class="p-2">
                            <div class="card w-70 " style="background-color: #B9F6CA;">
                                <div class="card-body">
                                    <h5 class="card-title">Datos de la empresa</h5>
                                    <p class="card-text">
                                        <h4>Información de la empresa / Institución
                                        </h4>  
                                        </p>
                                        <a href="verSolicitudes" class="btn btn-primary"  style="background-color: #00C853;">Ver Calendario de visitas</a>
                                      
                                    </div>
                                </div>
                            
                                </div>';
                    //  HORARIOS
                    echo '
                        
                    <div class="p-2">
                        <div class="card w-70 " style="background-color: #FF80AB;">
                            <div class="card-body">
                                <h5 class="card-title">Mi Horario</h5>
                                <p class="card-text">
                                    <h4>Horarios que puedo realizar mi Residencia en la empresa
                                    </h4> 
                                    </p>
                                    <a href="inscrito" class="btn btn-primary" style="background-color: #880E4F;">Ver Constancias</a>
                                  
                                </div>
                            </div>
                        
                            </div>';
   // 3do NIVEL
   echo '
                                    
                               
   </div>
   <div class="d-flex mb-3">
   
   ';
                        }
                        if ($user["rol"] == "Admin") {

                            //  SOLICITUDES
                            echo '
                            
                            <div class="p-2">
                                <div class="card w-70 " style="background-color: #FFA726;">
                                    <div class="card-body">
                                        <h5 class="card-title">Solicitudes de aspirantes para Residencia Profecional</h5>
                                        <p class="card-text">
                                            <h4>';

                            $columna = "estado";
                            $valor = 1;
                            $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                            echo '
                                            </h4> Solicitudes sin revisar
                                            </p>
                                            <a href="verSolicitudes/1/" class="btn btn-warning" style="background-color: #EF6C00;">Ver Solicitudes</a>
                                          
                                        </div>
                                    </div>
                                </div>';

                            //  APECTADOS
                            echo '
                                    
                                <div class="p-2">
                                    <div class="card w-70 " style="background-color: #B9F6CA;">
                                        <div class="card-body">
                                            <h5 class="card-title">Aspirantes aceptados para registro a Residencia Profecional</h5>
                                            <p class="card-text">
                                                <h4>';

                            $columna = "estado";
                            $valor = 2;
                            $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                            echo '
                                                </h4> Candidatos
                                                </p>
                                                <a href="verSolicitudes/2" class="btn btn-success">Ver Solicitudes</a>
                                              
                                            </div>
                                        </div>
                                    </div>';




                            //  RECHAZADOS
                            echo '
                                    
                                <div class="p-2">
                                    <div class="card w-70 " style="background-color: #FF4081; color: #EEEEEE";>
                                        <div class="card-body">
                                            <h5 class="card-title">Aspirantes rechazados/BajaTemporal a Residencia Profecional</h5>
                                            <p class="card-text">
                                                <h4>';

                            $columna = "estado";
                            $valor = 3;
                            $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                            echo '
                                                </h4> Candidatos
                                                </p>
                                                <a href="verSolicitudes/3" class="btn btn-danger" style="background-color:#880E4F;" >Ver Descartados</a>
                                              
                                            </div>
                                        </div>
                                    
                                        </div>';


                            // 2do NIVEL
                            echo '
                                    
                               
                                    </div>
                                    <div class="d-flex mb-3">
                                    
                                    ';



                            //  CARPETAS
                            echo '
                                    
                                <div class="p-2">
                                    <div class="card w-70 " style="background-color: #00BCD4;">
                                        <div class="card-body">
                                            <h5 class="card-title">Carpetas de archivos de los alumnos</h5>
                                            <p class="card-text">
                                                <h4>';

                            $columna = "estado";
                            $valor = 2;
                            $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);
                            
                            echo '
                                                </h4> Alumnos tienen carpeta
                                                </p>
                                                <a href="Carpetas" class="btn btn-primary">Ver Carpetas</a>
                                              
                                            </div>
                                        </div>
                                    
                                        </div>';



                            //  EVALUACIOES
                            echo '
                                    
                                <div class="p-2">
                                    <div class="card w-80 " style="background-color: #26A69A; color: #EEEEEE;">
                                        <div class="card-body">
                                            <h5 class="card-title">Evaluaciones y reportes parciales </h5>
                                            <p class="card-text">
                                                <h4>';

                            $columna = "estado";
                            $valor = 3;
                            $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                            echo '
                                                </h4> Nueva evaluación
                                                </p>
                                                <a href="verSolicitudes" class="btn btn-primary"  style="background-color: #004D40;">Ver Evaluaciones</a>
                                              
                                            </div>
                                        </div>
                                    
                                        </div>';




                            //  VISITAS A EMPRESAS
                            echo '
                                    
                                <div class="p-2">
                                    <div class="card w-70 " style="background-color: #03A9F4;color: #EEEEEE;">
                                        <div class="card-body">
                                            <h5 class="card-title">Calendario de Visitas programadas a empresas </h5>
                                            <p class="card-text">
                                                <h4>';

                            $columna = "estado";
                            $valor = 3;
                            $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                            echo '
                                                </h4> Visitas Programadas 
                                                </p>
                                                <a href="verSolicitudes" class="btn btn-primary"  style="background-color: #01579B;">Ver Calendario de visitas</a>
                                              
                                            </div>
                                        </div>
                                    
                                        </div>';
                            //  CONSTANCIAS
                            echo '
                                
                            <div class="p-2">
                                <div class="card w-70 " style="background-color: #7E57C2;color: #EEEEEE"">
                                    <div class="card-body">
                                        <h5 class="card-title">Constancias de los alumnos</h5>
                                        <p class="card-text">
                                            <h4>';

                            $columna = "estado";
                            $valor = 3;
                            $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                            echo '
                                            </h4> documentos
                                            </p>
                                            <a href="verSolicitudes" class="btn btn-primary" style="background-color: #311B92;">Ver Constancias</a>
                                          
                                        </div>
                                    </div>
                                
                                    </div>';




                            // 3er NIVEL
                            echo '
                                    
                              
                                </div>
                                <br><hr><br>
                                <div class="d-flex mb-3">
                                
                                ';




                            //  FINALIZADOS
                            echo '
                                
                            <div class="p-2">
                                <div class="card w-80 " style="background-color: #1DE9B6;">
                                    <div class="card-body">
                                        <h5 class="card-title">Alumnos de Residencia que han concluido </h5>
                                        <p class="card-text">
                                            <h4>';

                            $columna = "estado";
                            $valor = 3;
                            $solicitud = SolicitudResidenciaC::ContarSolicitud($columna, $valor);

                            echo '
                                            </h4> Alumnos finalizados
                                            </p>
                                            <a href="verSolicitudes" class="btn btn-primary"  style="background-color: #00BFA5;">Ver Alumnos</a>
                                          
                                        </div>
                                    </div>
                                
                                    </div>';




                            //  CONFIGURACION


                        }

                        ?>

                        <div class="p-2">
                            <div class="card w-70 " style="background-color: #4CAF50;">
                                <div class="card-body">
                                    <h5 class="card-title">Ajustes y Configuraciones del Sistema</h5>
                                    <p class="card-text">
                                    <h4>
                                    </h4> Actualiza calendario, Documentos de guia, Fechas, Catálogo de empresas, Respaldo
                                    </p>
                                    <a href="verSolicitudes" class="btn btn-primary" style="background-color: #1B5E20;">Ver Ajustes</a>

                                </div>
                            </div>

                        </div>


                    </div>














            </div>
            <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>