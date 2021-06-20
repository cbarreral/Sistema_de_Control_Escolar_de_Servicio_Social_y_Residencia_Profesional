<?php



?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="box">
            <div class=" box-body">

                <?php
                $matricula = $_SESSION["matricula"];
                $columna = "matricula";
                $usuario = UsuariosC::VerUsuariosC($columna, $matricula);
             
                $columna = "id";
                $valor = $usuario["id"];
                $id_carrera = $usuario["id_carrera"];

                $materia = MateriasC::VerInscripcionesMaterias2C("id_alumno",$_SESSION["id"]);
                $inscrito = MateriasC::VerMaterias2C($columna,$materia["id_materia"]);
                $carrera = CarrerasC::verCarreraC($columna,$id_carrera);
                $usuarios = UsuariosC::VerUsuariosC("id",$_SESSION["id"]);
                echo '
                    <br> <div class="alert alert-success">Horario</div>
            <h2>Empresa: '.$inscrito["nombre"].'</h2>
            <h5>Acesor Academico: '.$usuarios["a_academico"].'</h5>
            <h5>Acesor Industrial: '.$usuarios["a_industrial"].'</h5>';
        
            
                ?>

                <div class="row">
                    <div class="col-md-12 col-xs-12"> 
                        <div class="box-header">
                       
                        </div>
                        <h2>Horarios: </h2>
                        <table class=" table align-middle table-hover table-responsive T">
                            <thead>
                                <tr>
                                    <th>Número</th>
                                    <th>Cantidad Máxima de Alumnos</th>
                                    <th>horas</th>
                                    <th>horarios</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $columna = "id_alumno";
                                $valor = $usuario["id"];
                                $comisiones = MateriasC::VerInscripcionesMateriasC($columna, $valor);
                              
                                foreach ($comisiones as $key => $value) {
                                   

                                    $columna2 = "id";
                                    $valor2 = $value["id_comision"];
                    
                                    $comision = MateriasC::VerComisiones2C($columna2, $valor2);
                                    echo '
                                    <tr>
                                    <td>' . $comision["numero"] . '</td>
                                    <td>' . $comision["c_maxima"] . '</td>
                                    <td>' . $comision["horas"] . '</td>
                                    <td>' . $comision["horario"] . '</td>
                                    <td>
                                    <a href="'.URL_SERVER.'tcpdf/pdf/Inscriptos-Materias.php/' . $usuario["id"] . '/' . $value["id"] . '" target="blank">
                                    <button class="btn btn-default"> Generar PDF</button>
                                    </a>
                                    </td>
                                </tr>
                                    
                                    ';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

