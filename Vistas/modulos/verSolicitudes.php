<?php
$user = UsuariosC::VerUsuariosC("matricula", $_SESSION["matricula"]);
if ($user["rol"] != "Admin") {
    echo '
    <script>
    window.location ="' . URL_SERVER . 'inicio";
    </script>
    ';

    return;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <?php
        echo '
        <h1>Solicitudes  </h1>
        ';
        $exp = explode("/", $_GET["url"]);

        /* if ($exp[1] == 1) {
       
        } else  if ($exp[1] == 2) {
            echo '
            <h1>Aspirantes Vigentes  </h1>
            ';
        } else {
            echo '
                <h1>Aspirantes Rechazados / Dados de Baja Temporalmente  </h1>
                ';
        }*/



        $matricula = $exp[1];


        $dataE = SolicitudResidenciaC::VerDataEstudiantesC("matricula", $matricula);
        $dataC = SolicitudResidenciaC::VerDataCartaC("matricula", $matricula);
        $files = SolicitudResidenciaC::VerArchivosC("matricula", $matricula);

        ?>

    </section>

    <div class="d-flex">
        <div class="p-2 flex-grow-1">
            <div class="">
                <section class="" style="background-color: white;">

                    <div class="box">
                        <div class="">
                        
                            <table class="table table-bordered table-hover table-striped T">
                                <thead>
                                    <tr>
                                        <th>Fecha de solicitud</th>
                                        <th>Periodo</th>
                                        <th>Matricula</th>
                                        <th>Nombre</th>
                                        <th>Carrera</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> <?php


                                        $respuestaVer = SolicitudResidenciaC::VerEstudiantesC();
                                          $a=0;
                                        foreach ($respuestaVer as $key => $value) {
                                            

                                            $status = SolicitudResidenciaC::VerSolicitud("matricula", $value["matricula"]);

                                            if ($value["matricula"] != $status["matricula"]) {
$a++;
                                           if($a==1){
                                                $carrera = CarrerasC::verCarreraC("id", $value["id_carrera"]);

                                                echo ' <tr>
                                                <td>' . $value["fechaRegistro"] . '</td>
                                                <td>' . $value["periodo"] . '</td>
                                                <td>' . $value["matricula"] . '</td>
                                                <td>' . $value["nombre"] . '</td>
                                                <td>' . $carrera["nombre"] . '</td>
                                                <td>
                                                    <a href="' . URL_SERVER . 'verSolicitudes/' . $value["matricula"] . '/">
                                                        <button  class="btn btn-info" style="background-color: #26A69A;" >Ver detalles</button>
                                                    </a>
                                                </td>
                                                
                                            </tr>';
                                            }  
                                           }
                                        }




                                        echo '
                            </tbody>
                            </table>    ';

                                        ?>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                    
                    
                    </div>
                        <div class="col-md-12">
                            <div class="p-2">
                                <div class="card w-70 " style="background-color: #E0F7FA;">
                                    <div class="card-body">
                                        <h5 class="card-title">Obcervaciones</h5>
                                        <div class="d-flex">
                                            <div class="p-2 flex-grow-1">
                                                <div class="container">
                                                    <form action="" method="post">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <p>Escribe un obcervación (opcional)</p>
                                                            </div>
                                                            <div class="col-md-6">

                                                                <select name="plantilla"  id="plantilla" class="form-control">
                                                                     <option value="0">Selecciona una plantilla</option>
                                                                     <?php
                                                                   $plantilla = infoResidenciaC::VerPlantillas(null,null);
                                                                 
                                                                   foreach ($plantilla as $key => $value) {
                                                                    echo'
                                                                    <option style="background-color: #E0F7FA;" value="'.$value["id_plantila"].'">'.$value["nombre"].'</option>
                                                                    '
                                                                    ;
                                                                   }
                                                                   ?>
                                                                    <option style="background-color: #F8BBD0;" value="0">Borrar texto escrito</option>
                                                                </select>
                                                            </div>
                                                            
                                                    </div>

                                                    <script>
                                                        var select = document.getElementById('plantilla');
                                                        select.addEventListener('change',
                                                        function(){
                                                            var selectedOption = this.options[select.selectedIndex];
                                                            var nombre = "<?php echo $value["nombre"]; ?>";
                                                            if(nombre == selectedOption.text){
                                                                document.getElementById('plantillaText').value ="<?php echo $value["texto"]; ?>";
                                                            }else{
                                                                document.getElementById('plantillaText').value ="";
                                                            }
                                                            
                                                            //alert(selectedOption.value + ': ' + selectedOption.text);
                                                            
                                                        });
                                                    </script>
                                                        <?php
                                                      
                                                        echo '
                                                        
                                                        <input type="hidden" name="matricula" value="' . $dataE["matricula"] . '" id="">
                                                        <input type="hidden" name="id_dataE" value="' . $dataE["id_datosestudiante"] . '" id="">
                                                        <input type="hidden" name="id_dataC" value="' . $dataC["id_datoscarta"] . '" id="">
                                                        <input type="hidden" name="id_files" value="' . $files["id_files"] . '" id=""> 
                                                       

                                                     
                                                        <textarea name="obcervaciones" id="plantillaText" cols="30" rows="2" class="form-control ">

                                                        </textarea> <br>
                                                       <div class="row">
                                                            <div class="col-md-2">
                                                            <a href="'.URL_SERVER.'tcpdf/pdf/CartaPrecentacion.php/' . $dataC["matricula"] . '" target="blank" > Pre-Visualizar carta</a> 
                                                            </div>
                                                           
                                                           <div class="col-md-4"> 
                                                                <select name="estado" id="estado " class="form-control" >
                                                                    <option value="0">Selecciona una opción</option>
                                                                    <option style="background-color: #B9F6CA;" value="1">Aceptar y Generar Carta de presentación</option>
                                                                    <option style="background-color: #FF8A80;" value="2">Rechazar solicitud</option>
                                                                </select>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <button type="submit" class="btn btn-info" style="background-color: #26A69A;">Aceptar</button>
                                                           </div>
                                                       </div>
                                                            
                                                       
                                                        
                                                       
                                                        ';

                                                        $solicitud = new SolicitudResidenciaC();
                                                        $solicitud->AceptarSolicitud();

                                                        ?>

                                                        <?php

                                                        ?>
 </form>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="p-2">
                                <div class="card w-70 " style="background-color: #d9efed;">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos del estudiante</h5>
                                        <p class="card-text">

                                        <table class=" table align-middle table-hover table-responsive T">
                                            <?php
                                            $carrera = CarrerasC::verCarreraC("id", $dataE["id_carrera"]);
                                            echo '
                                            <tr>
                                                <th>Fecha de Registro</th>
                                                <td>' . $dataE["fechaRegistro"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Periodo</th>
                                                <td>' . $dataE["periodo"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Estudiante</th>
                                                <td>' . $dataE["nombre"] . '</td>
                                            </tr>
                                            <tr>
                                                <th>Mátricula</th>
                                                <td>' . $dataE["matricula"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Carrera</th>
                                                <td>' . $carrera["nombre"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Especialidad</th>
                                                <td>' . $dataE["especialidad"] . '</td>
                                            </tr>
                                            <tr>
                                                <th>Semestre</th>
                                                <td>' . $dataE["semestre"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Sexo</th>
                                                <td>' . $dataE["sexo"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Teléfono</th>
                                                <td>' . $dataE["telefono"] . '</td>
                                            </tr>
                                            <tr>
                                                <th>100% de matrias aprobadas</th>
                                                <td>' . $dataE["100Mate"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Cursará materias en Residencia</th>
                                                <td>' . $dataE["cursandoMate"] . '</td>
                                            </tr>
                                            <tr>
                                                <th>Cuantas materias</th>
                                                <td>' . $dataE["cuantasMateCursando"] . '</td>
                                            </tr>
                                            <tr>
                                                <th>Platica informativa</th>
                                                <td>' . $dataE["platicaInfo"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>No. de IMSS</th>
                                                <td>' . $files["numIMSS"] . '</td>
                                            </tr>
                                        ' ?>
                                        </table>


                                        </p>


                                        </p>

                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="p-2">
                                <div class="card w-70 " style="background-color: #d9efed;">
                                    <div class="card-body">
                                        <h5 class="card-title">Datos para la carta de presentación</h5>
                                        <p class="card-text">

                                        <table class=" table align-middle table-hover table-responsive T">
                                            <?php
                                            echo '
                                            <tr>
                                                <th>Nombre de la empresa</th>
                                                <td>' . $dataC["nombre"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Dirección de la empresa</th>
                                                <td>' . $dataC["direccion"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Municipio o Delegación</th>
                                                <td>' . $dataC["municipio"] . '</td>
                                            </tr>
                                            <tr>
                                                <th>Estado</th>
                                                <td>' . $dataC["estado"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Teléfono de la empresa</th>
                                                <td>' . $dataC["telefono"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>A quien se va a dirigir la carta de presentación</th>
                                                <td>' . $dataC["persona"] . '</td>
                                            </tr>
                                            <tr>
                                                <th>Cargo de la persona</th>
                                                <td>' . $dataC["cargo"] . '</td>
                                            </tr>

                                            <tr>
                                                <th>Correo electrónico</th>
                                                <td>' . $dataC["correo"] . '</td>
                                            </tr>

                                        '; ?>

                                        </table>


                                        </p>


                                    </div>
                                </div>

                            </div>


                        </div>

                        <div class="col-md-5">
                            <div class="p-2">
                                <div class="card " style="background-color: #E0F2F1;">

                                    <!-- Pills navs -->
                                    <ul class="nav nav-pills mb-3" id="ex1" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link active" id="ex1-tab-1" data-mdb-toggle="pill" href="#ex1-pills-1" role="tab" aria-controls="ex1-pills-1" aria-selected="true">Kardex</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="ex1-tab-2" data-mdb-toggle="pill" href="#ex1-pills-2" role="tab" aria-controls="ex1-pills-2" aria-selected="false">Servicio</a>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <a class="nav-link" id="ex1-tab-3" data-mdb-toggle="pill" href="#ex1-pills-3" role="tab" aria-controls="ex1-pills-3" aria-selected="false">IMSS</a>
                                        </li>
                                    </ul>
                                    <!-- Pills navs -->

                                    <!-- Pills content -->
                                    <?php echo '
                                    <div class="tab-content" id="ex1-content">
                                        <div class="tab-pane fade show active" id="ex1-pills-1" role="tabpanel" aria-labelledby="ex1-tab-1">
                                            <div class="p-2 flex-grow-1">
                                                <div class="">
                                                    <iframe style="width: 500px; height: 500px;" class="responsive-iframe" src="' . URL_SERVER . 'Kardex/' . $files["kardex"] . '"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="ex1-pills-2" role="tabpanel" aria-labelledby="ex1-tab-2">
                                            <div class="p-2 flex-grow-1">
                                                <div class="">
                                                    <iframe style="width: 500px; height: 500px;" class="responsive-iframe" src="' . URL_SERVER . 'Servicio/' . $files["servicioSocial"] . '"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="ex1-pills-3" role="tabpanel" aria-labelledby="ex1-tab-3">
                                            <div class="p-2 flex-grow-1">
                                                <div class="">
                                                    <iframe style="width: 500px; height: 500px;" class="responsive-iframe" src="' . URL_SERVER . 'IMSS/' . $files["IMSS"] . '"></iframe>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    '; ?>
                                    <!-- Pills content -->


                                </div>
                            </div>


                        </div>

                </section>


            </div>
        </div>
    </div>

</div>