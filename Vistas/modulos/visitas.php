<div class="content-wrapper">
    <section class="content-header">
      
        <h2>Visitas a empresas</h2>
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#crearvisita"> Agendar</button>

    </section>
    <section class="content">


        <br>
        <!-- Tabla de Documentos ecenciales -->

        <div class="box">
            <div class="box-body">
                <p class="text-center">Agenda de visitas</p>
                <table class=" table align-middle table-hover table-responsive T">
                    <thead>
                        <tr>
                            <th>Carrera</th>
                            <th>Matricula</th>
                            <th>Alumno</th>
                            <th>Lugar</th>
                            <th>Fecha / Hora</th>
                            <th>Empresa</th>
                            <th>Estatus</th>
                            <th>Evidencias / Observaciones</th>
                            <th>Controles</th>

                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                      
                      
                          $visita = VisitasC::VerVisitasC(null, null);
                      


                        foreach ($visita as $key => $Vervisita) {
                            $alumno = UsuariosC::VerUsuariosC("matricula", $Vervisita["matricula"]);
                            $carrera = CarrerasC::verCarreraC("id", $alumno["id_carrera"]);
                            $inscripcion = MateriasC::VerInscripcionesMaterias2C("id_alumno", $alumno["id"]);
                            // $comision = MateriasC::VerComisionesC("id",$inscripcion["id_materia"]);
                            $materias = MateriasC::VerMaterias2C("id", $inscripcion["id_materia"]);
                            echo '
                                <tr>
                                <td>' . $carrera["nombre"] . '</td>
                                <td>' . $alumno["matricula"] . '</td>
                                <td>' . $alumno["nombre"] . '</td>
                                <td>
                                
                                <a type="button" class="btn btn-success "  href="https://google.cl/maps/place/' . $Vervisita["lugar"] . '" target="_blank">Google Maps</a></td>
                                <td>' . $Vervisita["fecha"] . ' / ' . $Vervisita["hora"] . '</td>
                                <td>' . $materias["nombre"] . '</td>';
                            if ($Vervisita["estatus"] == 1) {
                                echo '
                                <td>solicitando</td>
                                    ';
                            }
                            if ($Vervisita["estatus"] == 2) {
                                echo '
                                <td>Confirmado por acesor academico</td>
                                    ';
                            }
                            if ($Vervisita["estatus"] == 3) {
                                echo '
                                <td style="color:red" >Visita negada</td>
                                ';
                            }
                            echo '
                                <td>
                                <a href="'.URL_SERVER.'Obcervaciones/' . $alumno["matricula"] .'/' . $Vervisita["id"] .'/3">  
                                  <button class="btn btn-primary btn-sm pull-left"><i class="fa fa-delt"></i>Ver PDF</button>
                                </a>
                             </td>
                            ';
                            /**
                             * estatus :
                             * 1 = solicitando ->alumno
                             * 2 = aceptatod ->acesor academico
                             * 3 = solicitud denegada
                             * 4 =solicitud aceptada por accesor industrial
                             */
                            if ($_SESSION["rol"] == "Alumno") {
                                if ($_SESSION["rol"] == "a_Academico") {
                                    if ($Vervisita["estatus"] == 4) {
                                        echo '
                                <td>Confirmado</td>
                                            ';
                                    } 
                                }echo '
                                <td>
                                    <div class="btn-group">
                                        <a href="visitas/' . $Vervisita["id"] . '">
                                            <button class="btn btn-danger">Borrar</button>
                                        </a>
                                        <a href="Editar-Visitas/' . $Vervisita["id"] . '/1">
                                            <button class="btn btn-success">Editar</button>
                                        </a>
                                    </div>
                                </td>
                                 ';
                            }
                            if ($_SESSION["rol"] == "a_Academico") {
                                if ($Vervisita["estatus"] == 2) {
                                    echo '
                                <td>Has confirmado esta visita</td>
                                        ';
                                } else
                                    echo '
                                <td>
                                    <div class="btn-group">
                                        <a href="Editar-Visitas/' . $Vervisita["id"] . '/2">
                                            <button class="btn btn-success">Confirmar</button>
                                        </a>
                                        <a href="Editar-Visitas/' . $Vervisita["id"] . '/3">
                                            <button class="btn btn-warning">Negar</button>
                                        </a>
                                    </div>
                                </td>
                                     ';
                            }

                            if ($_SESSION["rol"] == "a_Industrial") {
                                if ($Vervisita["estatus"] == 4) {
                                    echo '
                                <td>Has confirmado esta visita</td>
                                    ';
                                } else {
                                    echo '
                                <td>
                                    <div class="btn-group">
                                            <a href="Editar-Visitas/' . $Vervisita["id"] . '/4">
                                                <button class="btn btn-success">Confirmar</button>
                                            </a>
                                            <a href="Editar-Visitas/' . $Vervisita["id"] . '/3">
                                                <button class="btn btn-warning">Negar</button>
                                            </a>
                                    </div>
                                </td>
                                 ';
                                }
                            }
                        }

                        echo '
                                </tr>';

                        ?>

                    </tbody>
                </table>
            </div>
        </div>
        <br>
        
    </section>
</div>
<?php
$eliminar = new VisitasC();
$eliminar->BorrarVisitasC();
?>

<!-- Modal -->
<div class="modal fade" id="crearvisita" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendar Visita a empresa</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if ($_SESSION["rol"] == "Alumno") {
                    echo '
                    <form action="" method="post">
                
                        <div class="box-body ">


                            <div class="form-grup">
                                
                            
                                        <input type="hidden" name="matricula" value="' . $_SESSION["matricula"] . '" required id="matricula">
                                
                                <div class="mb-3">
                                <h2>Lugar:</h2>
                                <input type="text" class="form-control lg" name="lugar" required>
                                </div>
                            <div class="mb-3">
                            <h2>Fecha</h2>
                            <input type="text" class="form-control lg" name="fecha" required>
                            </div>
                            <div class="mb-3"> 
                            <h2>Hora</h2>
                                <input type="text"class="form-control lg" name="hora" required>
                            
                                <input type="hidden"  name="obser" value="" >
                            </div>
                            

                                <input type="hidden" name="estatus" value="1">
                            </div>


                        </div>
                        <button type="submit" class="btn btn-success">Solicitar</button>
                    
                    

                         ';
                                    $crearUsuario = new VisitasC();
                                    $crearUsuario->CrearVisitaC();
                                    echo '
                    
                    </form>
                    ';
                } 
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-mdb-dismiss="modal">
                    Cancelar
                </button>
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </div>
    </div>
</div>

