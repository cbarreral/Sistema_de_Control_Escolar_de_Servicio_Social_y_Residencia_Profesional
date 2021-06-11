<?php
$user = UsuariosC::VerUsuariosC("matricula", $_SESSION["matricula"]);
?>
<div class="content-wrapper">

    <div class="content-header">
        <div class="box">
            <div class="container">
                <br>
                <h2>Carpeta de alumno</h2>
                <br>



                <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex3-pills-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <div class="table-responsive">
                            <table class=" table align-middle table-hover table-responsive T "style="background-color: #ECEFF1;"> 
                                <thead>
                                    <tr>
                                        <th>Matricula</th>
                                        <th>Nombre</th>
                                        <th>Carrera</th>
                                        <th>Ver Carpeta</th>
                                        <th>Ver Visitas</th>
                                        <th>Ver Constancias</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php

                                    $resultado = UsuariosC::VerUsuariosC(null, null);
                                    $estado = SolicitudResidenciaC::VerSolicitudes("estado", 2);

                                    foreach ($estado as $key => $estatus) {
                                        //$estatus = SolicitudResidenciaC::VerSolicitud("matricula", $estatus["matricula"]);
                                        // $Constancia = ConstanciaC::VerConstanciaC("matricula", $value["matricula"]);
                                        $col = "id";
                                        $id_carrera = $estatus["carreraAlumno"];
                                        $carrera = CarrerasC::verCarreraC($col, $id_carrera);



                                        echo '
                                                        <tr>
                                                            <td>' . $estatus["matricula"] . '</td>
                                                            <td>' . $estatus["nombreAlumno"] . '</td>
                                                            <td>' . $carrera["nombre"] . '</td>
                                                            
                                                            
                                                            <td>
                                                                <a href="' . URL_SERVER . 'verCarpeta/' . $estatus["carreraAlumno"] . '/' . $estatus["matricula"] . '">
                                                                    <button class="btn btn-info" style="background-color: #4CAF50;">Carpeta de archivos</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="' . URL_SERVER . 'verCarpeta/' . $estatus["carreraAlumno"] . '/' . $estatus["matricula"] . '">
                                                                    <button class="btn btn-info" style="background-color: #01579B;">Ver visitas</button>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <a href="' . URL_SERVER . 'verCarpeta/' . $estatus["carreraAlumno"] . '/' . $estatus["matricula"] . '">
                                                                    <button class="btn btn-info" style="background-color: #E91E63;">Ver Constancia</button>
                                                                </a>
                                                            </td>
                                                        </tr>';
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>






                </div>
            </div>
        </div>
    </div>
</div>