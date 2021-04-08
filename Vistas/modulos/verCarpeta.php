<div class="content-wrapper">
    <section class="content-header">
        
    <h2>Carpeta de archivos</h2>
        <?php
        $promediototal = 0;
        $promedio = 0;
        $exp = explode("/", $_GET["url"]);
        $columna = "matricula";
        $valor = $exp[2];

        $estudiante = UsuariosC::VerUsuariosC($columna, $valor);
        $columna = "id";
        $valor = $exp[1];
        $carrera = CarrerasC::verCarreraC($columna, $valor);
        $inscto = MateriasC::VerInscripcionesMaterias2C("id_alumno", $estudiante["id"]);
        if ($_SESSION["rol"] == "Alumno" && $inscto != null) {
            echo '
            <button  type="button"  class="btn btn-primary"  data-mdb-toggle="modal"  data-mdb-target="#SubirPDF">Subir PDF</button>
            <button  type="button"  class="btn btn-info"  data-mdb-toggle="modal"  data-mdb-target="#SubirReportesPDF">Subir Reporte en PDF</button>
         
            ';
        } else {
            if ($_SESSION["rol"] == "Alumno") {
                echo '<p class="alert alert-danger">No tienes permisos para subir documentos, Primero debes ser haceptado y ser inscrito a una empresa</p> ';
            }
        }

        echo ' <a href="http://localhost/Sistema/detalles-usuario/' . $exp[1] . '/' . $exp[2] . '" type="button" class="btn btn-success">Ver Perfil</a>';


        ?>
    </section>
    <section class="content">


        <!-- Tabla de Documentos ecenciales -->

        <div class="box">
            <div class="box-body">
                <p class="text-center">Tabla de Documentos ecenciales</p>
                <table class=" table align-middle table-hover table-responsive T">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Fecha</th>
                            <th>Nombre de documento</th>
                            <th>Ver Documento / Observaciones</th>
                            
                            <?php
                            if ($_SESSION["rol"] == "Alumno") {
                                echo '
                            <th>Eliminar</th>
                            ';
                            } ?>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $resultado = MateriasC::VerMaterias2C("id_carrera", $exp[1]);
                        $i = 0;
                        if ($resultado["id_carrera"] == $estudiante["id_carrera"]) {

                            $i++;

                            $valor = $exp[2];
                            $columna = "matricula";
                            $documentosEcenciales = DocumentosEcenC::VerDocumentosEcenC($columna, $valor);

                            foreach ($documentosEcenciales as $key => $N) {

                                echo '
                            <tr>
                                <td>' . $i . '</td>
                                <td>' . $N["fecha"] . '</td>
                                <td>' . $N["nombre"] . '</td>
                                   
                                 '; echo '
                                <td>
                                <a href="http://localhost/Sistema/Obcervaciones/' . $exp[2] .'/' . $N["id"] .'/1">  
                                  <button class="btn btn-primary btn-sm pull-left"><i class="fa fa-delt"></i>Ver PDF</button>
                                </a>
                             </td>
                            ';
                                if ($_SESSION["rol"] == "Alumno") {
                                    echo '
                                    <td>
                                    <a href="http://localhost/Sistema/verCarpeta/' . $exp[1] . '/' . $exp[2] . '/' . $N["id"] . '">  
                                      <button class="btn btn-danger btn-sm pull-left"><i class="fa fa-delt"></i>Eliminar</button>
                                    </a>
                                 </td>

                                    

                                     ';
                                }

                               
                            }
                        }



                        ?>
</tr>
                    </tbody>
                </table>
            </div>
        </div>
        <br>






        <!-- Tabla de Reportes y evaluaciones -->

        <div class="box">
            <div class="box-body">
                <p class="text-center">Tabla de Reportes y Evaluaciones</p>
                <table class=" table align-middle table-hover table-responsive T">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Fecha</th>
                            <th>Nombre del reporte</th>
                            <th>Ver Reporte / Observaciones</th>
                            <th>Nota de Acesor Academico</th>
                            <th>Nota de Acesor Industrial</th>
                            <th>Revisado por Jefe</th>
                            <th>Revisado por Control Escolar</th>
                            <th>Promedio</th>
                            <?php
                            if ($_SESSION["rol"] != "Alumno") {
                                echo '
                            <th>Evaluar</th>
                            ';
                            } ?>
                        </tr>
                        </tr>
                    </thead>


                    <tbody id="myTable">
                        <?php
                        $i = 0;
                        $resultado2 = MateriasC::VerMaterias2C("id_carrera", $exp[1]);

                        if ($resultado2["id_carrera"] == $estudiante["id_carrera"]) {


                            $valor = $exp[2];
                            $columna = "matricula";
                            $documentosEcenciales = DocumentosEcenC::VerDocumentosRepC($columna, $valor);

                            foreach ($documentosEcenciales as $key => $N) {
                                $i++;
                                echo '
                                <tr>
                                <td>' . $i . '</td>
                                <td>' . $N["fecha"] . '</td>
                                <td>' . $N["nombre"] . '</td>';
                                if ($N["PDF"] != "") {
                                    echo '
                                   
                                    <td>
                                    <a href="http://localhost/Sistema/Obcervaciones/' . $exp[2] .'/' . $N["id"] .'/2">  
                                      <button class="btn btn-primary btn-sm pull-left"><i class="fa fa-delt"></i>Ver PDF</button>
                                    </a>
                                 </td>

                                    ';
                                } else {
                                    echo ' <td  data-placement="top" title="No se encontro un archivo PDF" style="color: red">No se adjunto un archivo PDF</td>';
                                }

                                $promedio = ($N["nota_industrial"] + $N["nota_academico"]);
                                $promediototal = $promediototal + ($promedio / 2);
                                echo '
                                <td>' . $N["nota_academico"] . '</td>
                                <td>' . $N["nota_industrial"] . '</td>';
                                if ($N["revisadoJefe"] >= 1) {
                                    echo '
                                    <td>Si</td>
                                    ';
                                } else {
                                    echo '
                                    <td>No</td>
                                    ';
                                }
                                if ($N["revisadoAdmin"] >= 1) {
                                    echo '
                                    <td>Si</td>
                                    ';
                                } else {
                                    echo '
                                    <td>No</td>
                                    ';
                                }
                                echo '
                                
                                <td>' . ($promedio / 2) . '</td>
                                    <td>
                                        
                                       <div class="btn-grup">
                                       ';

                                if ($_SESSION["rol"] != "Alumno") {
                                    echo '
                                       <a href="https://localhost/Sistema/nota-materia/' . $exp[1] . '/' . $exp[2] . '/' . $N["id"] . '">
                                            
                                            <button class="btn btn-success btn-sm pull-left">Evaluar</button>
    
                                        </a>';
                                }
                                echo '
                                        </div>
    
                                    </td>
    
                                </tr>
                                ';
                            }

                            if ($promediototal == 0) {
                                $total = 0;
                            } else {
                                $total = (($promediototal) / $i);
                            }
                            echo '<h2>Promedio Total: ' . $total . '</h2> ';
                        }


                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>


<!-- SUBIR DOCUMENTOS ESENCIALES  -->


<div class="modal fade" id="SubirPDF">
    <div class="modal-dialog">
        <div class="modal-content">


            <form action="../../Controladores/subirPDF.php" enctype="multipart/form-data" enctype="multipart/form-data" class="content" method="post">

                <?php echo '
            <input type="hidden" name="id_materia" value="' . $exp[1] . '">
                <input type="hidden" name="matricula" value="' . $exp[2] . '">
                ';
                ?>
                <div class="form-group">

                    <h2>PDF:</h2>

                    <input type="file" class="file file-lg input-lg" name="PDF" id="PDF" required>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Subir PDF</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                ?>
            </form>

        </div>
    </div>
</div>

<!-- SUBIR DOCUMENTOS REPORTES  -->


<div class="modal fade" id="SubirReportesPDF">
    <div class="modal-dialog">
        <div class="modal-content">


            <form action="../../Controladores/subirReportePDF.php" enctype="multipart/form-data" enctype="multipart/form-data" class="content" method="post">

                <?php echo '
            <input type="hidden" name="id_materia" value="' . $exp[1] . '">
                <input type="hidden" name="matricula" value="' . $exp[2] . '">
                ';
                ?>
                <div class="form-group">

                    <h2>PDF:</h2>

                    <input type="file" class="file file-lg input-lg" name="PDF" id="PDF" required>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Subir PDF</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                ?>
            </form>

        </div>
    </div>
</div>

<?php
$eliminarDoc = new DocumentosEcenC();
$eliminarDoc->EliminarDocumento();

$eliminarChat = new ChatC();
$eliminarChat->EliminarChat();

?>