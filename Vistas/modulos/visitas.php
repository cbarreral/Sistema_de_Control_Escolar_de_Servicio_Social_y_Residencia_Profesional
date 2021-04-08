<div class="content-wrapper">
    <section class="content-header">
        <?php

        ?>
        <h2>Visitas a empresas</h2>
        <p>Filtra por Apellido, Nombres, Carrera o cualquier otro campo</p>
        <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
    </section>
    <section class="content">
        <?php
        if ($_SESSION["rol"] == "Alumno") {
            echo '
    <p>Agendar una nueva cita con la empresa</p>
    <form action="" method="post">
  
        <div class="box-body ">


            <div class="form-grup">
                
               
                        <input type="hidden" name="matricula" value="' . $_SESSION["matricula"] . '" required id="matricula">
                 
                <div class="col-md-2">
                <h2>Lugar:</h2>
                <input type="text" name="lugar" required>
                </div>
               <div class="col-md-2">
               <h2>Fecha</h2>
               <input type="text" name="fecha" required>
               </div>
               <div class="col-md-2"> 
               <h2>Hora</h2>
                <input type="text" name="hora" required>
               
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

        <!-- Tabla de Documentos ecenciales -->

        <div class="box">
            <div class="box-body">
                <p class="text-center">Agenda de visitas</p>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Carrera</th>
                            <th>Matricula</th>
                            <th>Alumno</th>
                            <th>A. Academico</th>
                            <th>A. Industrial</th>
                            <th>Lugar</th>
                            <th>Fecha</th>
                            <th>Hora</th>
                            <th>Empresa</th>
                            <th>Estatus</th>
                            <th>Observaciones</th>
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
                            $materias = MateriasC::VerMaterias2C("id", $inscripcion["id_comision"]);
                            echo '
                                <tr>
                                <td>' . $carrera["nombre"] . '</td>
                                <td>' . $alumno["matricula"] . '</td>
                                <td>' . $alumno["nombre"] . '</td>
                                <td>' . $alumno["a_academico"] . '</td>
                                <td>' . $alumno["a_industrial"] . '</td>
                                <td>' . $Vervisita["lugar"] . '</td>
                                <td>' . $Vervisita["fecha"] . '</td>
                                <td>' . $Vervisita["hora"] . '</td>
                                
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
                            echo '<td>' . $Vervisita["obser"] . '</td>';
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
                                    } else {
                                        echo '
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
                                }
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
                            } else{
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