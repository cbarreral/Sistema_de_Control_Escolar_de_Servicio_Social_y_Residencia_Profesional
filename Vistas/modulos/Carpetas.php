<div class="content-wrapper">

    <div class="content-header">
        <div class="box">
            <div class="container">
                <br>
                <h2>Carpeta de alumno</h2>
                <br>
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <!-- Pills navs -->
                    <?php
                    if ($_SESSION["rol"] == "Alumno" && $_SESSION["tipo"] == "Servicio_Social" ) {
                    echo '
                
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active " id="ex3-tab-1" data-mdb-toggle="pill" href="#ex3-pills-1" role="tab" aria-controls="ex3-pills-1" aria-selected="true">
                            Servicio Social
                        </a>
                    </li>';}
                    if ($_SESSION["rol"] == "Alumno" && $_SESSION["tipo"] == "Residencia_Profecional" ) {
                        echo '
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="pill" href="#ex3-pills-2" role="tab" aria-controls="ex3-pills-2" aria-selected="false">
                            Recidencia Profecional
                        </a>
                    </li>
                    ';}
                    if ($_SESSION["rol"] != "Alumno") {
                        echo '
                        <li class="nav-item" role="presentation">
                        <a class="nav-link active " id="ex3-tab-1" data-mdb-toggle="pill" href="#ex3-pills-1" role="tab" aria-controls="ex3-pills-1" aria-selected="true">
                            Servicio Social
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="pill" href="#ex3-pills-2" role="tab" aria-controls="ex3-pills-2" aria-selected="false">
                            Recidencia Profecional
                        </a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="pill" href="#ex3-pills-3" role="tab" aria-controls="ex3-pills-3" aria-selected="false">
                            Alumnos Terminados
                        </a>
                    </li>
    ';
                    }
                    ?>

                </ul>
                <!-- Pills navs -->


                <div class="tab-content" id="ex2-content">
                    <div class="tab-pane fade show active" id="ex3-pills-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                        <div class="table-responsive">
                            <table class=" table align-middle table-hover table-responsive T">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Matricula</th>
                                        <th>Apellido y Nombre</th>
                                        <th>Carrera</th>
                                        <th>Carpeta</th>
                                        <th>Certificado</th>
                                        <th>visitas</th>
                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php

                                    $columna = null;
                                    $valor = null;
                                    $suma = 1;
                                    $resultado = UsuariosC::VerUsuariosC($columna, $valor);

                                    foreach ($resultado as $key => $value) {
                                        $Constancia = ConstanciaC::VerConstanciaC("matricula", $value["matricula"]);
                                        $col = "id";
                                        $id_carrera = $value["id_carrera"];
                                        $carrera = CarrerasC::verCarreraC($col, $id_carrera);
                                        if ($value["rol"] == "Alumno" && $value["tipo"] == "Servicio_Social" || $value["rol"] == "Alumno" && $value["tipo"] == "Servicio_Social") {
                                            if ($_SESSION["rol"] == "Alumno" && $_SESSION["matricula"] == $value["matricula"] && $value["id_carrera"] == $_SESSION["id_carrera"]) {

                                                echo '
                                                        <tr>
                                                            <td>' . $suma . '</td>
                                                            <td>' . $value["matricula"] . '</td>
                                                            <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                            <td>' . $carrera["nombre"] . '</td>
                                                            
                                                            
                                                            <td>
                                                                <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                    <button class="btn btn-info">Carpeta de archivos</button>
                                                                </a>
                                                            </td>';
                                                if ($Constancia["estado"] == 2) {
                                                    echo '<td>
                                                            <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"]  .'/'.$value["id_carrera"].'" >
                                                            <button class="btn btn-success" >Constancia</button>
                                                            </a>
                                                        </td>
                                                        </tr>  ';
                                                }
                                                $suma = ($key + 1);
                                            }
                                            if ($_SESSION["rol"] != "Alumno") {
                                                if ($_SESSION["rol"] == "a_Academico" && $value["a_academico"] == $_SESSION["nombre"]) {
                                                    echo '
                                                            <tr>
                                                                <td>' . $suma . '</td>
                                                                <td>' . $value["matricula"] . '</td>
                                                                <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                                <td>' . $carrera["nombre"] . '</td>
                                                                
                                                                
                                                                <td>
                                                                    <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                        <button class="btn btn-info btn-rounded">Carpeta de archivos</button>
                                                                    </a>
                                                                </td>';
                                                    if ($Constancia["estado"] == 2) {
                                                        echo '<td>
                                                                <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '/'.$value["id_carrera"].'" >
                                                                <button class="btn btn-success" >Constancia</button>
                                                                </a>
                                                            </td>
                                                            </tr>  ';
                                                    }
                                                    $suma = ($key + 1);
                                                } else  if ($_SESSION["rol"] == "a_Industrial" && $value["a_industrial"] == $_SESSION["nombre"]) {
                                                    echo '
                                                            <tr>
                                                                <td>' . $suma . '</td>
                                                                <td>' . $value["matricula"] . '</td>
                                                                <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                                <td>' . $carrera["nombre"] . '</td>
                                                                
                                                                
                                                                <td>
                                                                    <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                        <button class="btn btn-info">Carpeta de archivos</button>
                                                                    </a>
                                                                </td>';
                                                    if ($Constancia["estado"] == 2) {
                                                        echo '<td>
                                                                <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] .  '/'.$value["id_carrera"].'" >
                                                                <button class="btn btn-success" >Constancia</button>
                                                                </a>
                                                            </td>
                                                            </tr>  ';
                                                    }
                                                    $suma = ($key + 1);
                                                } else if ($_SESSION["rol"] == "Jefe" && $value["id_carrera"] == $_SESSION["id_carrera"]) {
                                                    echo '
                                                            <tr>
                                                                <td>' . $suma . '</td>
                                                                <td>' . $value["matricula"] . '</td>
                                                                <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                                <td>' . $carrera["nombre"] . '</td>
                                                                
                                                                
                                                                <td>
                                                                    <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                        <button class="btn btn-info">Carpeta de archivos</button>
                                                                    </a>
                                                                </td>';
                                                    if ($Constancia["estado"] == 2) {
                                                        echo '<td>
                                                                <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '/'.$value["id_carrera"].'" >
                                                                <button class="btn btn-success" >Constancia</button>
                                                                </a>
                                                            </td>
                                                            </tr>  ';
                                                    }
                                                    $suma = ($key + 1);
                                                }
                                                if ($_SESSION["rol"] == "Admin") {
                                                    echo '
                                                            <tr>
                                                                <td>' . $suma . '</td>
                                                                <td>' . $value["matricula"] . '</td>
                                                                <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                                <td>' . $carrera["nombre"] . '</td>
                                                                
                                                                
                                                                <td>
                                                                    <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                        <button class="btn btn-info">Carpeta de archivos</button>
                                                                    </a>
                                                                </td>';
                                                    if ($Constancia["estado"] == 2) {
                                                        echo '<td>
                                                                <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] .  '/'.$value["id_carrera"].'" >
                                                                <button class="btn btn-success" >Constancia</button>
                                                                </a>
                                                            </td>
                                                            </tr>  ';
                                                    }
                                                    
                                                }$suma = ($key + 1);
                                            }
                                        }
                                    }
                                    ?>

                                </tbody>
                            </table>
                        </div>
                    </div>




                    <div class="tab-pane fade show " id="ex3-pills-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                        <div class="table-responsive">
                            <table class=" table align-middle table-hover table-responsive T">
                                <thead>
                                    <tr>
                                        <th>N°</th>
                                        <th>Matricula</th>
                                        <th>Apellido y Nombre</th>
                                        <th>Carrera</th>
                                        <th>Carpeta</th>
                                        <th>Certificado</th>
                                        <th>visitas</th>

                                    </tr>
                                </thead>
                                <tbody id="myTable">
                                    <?php

                                    $columna = null;
                                    $valor = null;
                                    $suma = 1;
                                    $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                                    foreach ($resultado as $key => $value) {
                                        $col = "id";
                                        $id_carrera = $value["id_carrera"];
                                        $carrera = CarrerasC::verCarreraC($col, $id_carrera);
                                        if ($value["rol"] == "Alumno" && $value["tipo"] == "Residencia_Profecional" || $value["rol"] == "Alumno" && $value["tipo"] == "Residencia_profecional") {
                                            if ($_SESSION["rol"] == "Alumno" && $_SESSION["matricula"] == $value["matricula"]) {

                                                echo '
                                                    <tr>
                                                        <td>' . $suma . '</td>
                                                        <td>' . $value["matricula"] . '</td>
                                                        <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                        <td>' . $carrera["nombre"] . '</td>
                                                        
                                                        <td>
                                                            <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                <button class="btn btn-info">Carpeta de archivos</button>
                                                            </a>
                                                        </td>';
                                                if ($Constancia["estado"] == 2) {
                                                    echo '<td>
                                                        <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] .  '/'.$value["id_carrera"].'" >
                                                        <button class="btn btn-success" >Constancia</button>
                                                        </a>
                                                    </td>
                                                    </tr>  ';
                                                }
                                                $suma = ($key + 1);
                                            }
                                            if ($_SESSION["rol"] != "Alumno") {

                                                echo '
                                                        <tr>
                                                            <td>' . $suma . '</td>
                                                            <td>' . $value["matricula"] . '</td>
                                                            <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                            <td>' . $carrera["nombre"] . '</td>
                                                            
                                                            <td>
                                                                <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                    <button class="btn btn-info">Carpeta de archivos</button>
                                                                </a>
                                                            </td>';
                                                if ($Constancia["estado"] == 2) {
                                                    echo '<td>
                                                            <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] .  '/'.$value["id_carrera"].'" >
                                                            <button class="btn btn-success" >Constancia</button>
                                                            </a>
                                                        </td>
                                                        </tr>  ';
                                                }
                                                $suma = ($key + 1);
                                            }
                                        }
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