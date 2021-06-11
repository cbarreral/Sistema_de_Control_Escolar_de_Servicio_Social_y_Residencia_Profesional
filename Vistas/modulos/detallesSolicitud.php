    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="box container">
            <div class="box-header with-border ">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <div class="d-flex justify-content-center">
                        <img src="<?php echo URL_SERVER ?>Vistas/img/logo.png" width="200px" alt="ITSOEH" srcset="">
                    </div>
                    <?php 
                    $exp = explode("/",$_GET["url"]);
                    $id = $exp[1];
                    $Seccion = $exp[2];
                    $detalles = SolicitudResidenciaC::VerSolicitud("id",$id);
                    ?>
                    <form action="" method="post">
                    <div class="d-flex justify-content-end">

                        <label class="form-label" for="form1Example1">Fecha de Solicitud:</label>
                        <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">

                            <input disabled type="text" id="fecha" name="fecha" value="<?php echo $detalles["fechaSolicitud"] ?>" class="form-control"  />

                        </div>
                    </div>
                    <div class="d-flex justify-content-end">

                        <label class="form-label" for="form1Example1">Periodo</label>
                        <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">

                        <input disabled type="text" id="periodo" name="periodo" value="<?php echo $detalles["periodo"] ?>" class="form-control"  />


                        </div>
                    </div>
                </section>

                <!-- Main content -->
                <section class="content">
                    <p>Nota: Esta solicitud no es válida si no viene acompañada de la documentación y fotografías solicitadas en la convocatoria.</p>

                    <br>
                    <div class="row">
                        <div class="col-md-12"> <label class="form-label" for="form1Example1">1.- Grado académico (Ing., Lic., Mtro., D.) y nombre de la persona a quien se va a dirigir la carta de presentación y cargo que desempeña dentro de la Empresa y/o Institución:</label>
                            
                            <div class="form-outline mb-4  rounded " style="background-color: #E1F5FE;">
                                <input disabled type="text" name="nombreCarta" id="nombreCarta" value="<?php echo $detalles["nombreCarta"] ?>" class="form-control"  />
                               </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">2.- Nombre de la Empresa y/o Institución:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="text" name="nombreEmpresa" id="nombreEmpresa" value="<?php echo $detalles["nombreEmpresa"] ?> "class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">3.- Domicilio de la empresa:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="text" id="domicilioEmpresa" name="domicilioEmpresa" value="<?php echo $detalles["domicilioEmpresa"] ?> " class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4">  <label class="form-label" for="form1Example1">4.- Teléfono </label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="tel" id="telefonoEmpresa" name="telefonoEmpresa" value="<?php echo $detalles["telefonoEmpresa"] ?> " class="form-control"  />
                              
                            </div>

                        </div>

                        <div class="col-md-4"><label class="form-label" for="form1Example1">5.- Correo Electrónico </label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="email" name="correoEmpresa" value="<?php echo $detalles["emailEmpresa"] ?> " id="correoEmpresa" class="form-control"  />
                                
                            </div>

                        </div>
                        <br>
                        <div class="col-md-12">
                            <div class="alert alert-info">DATOS DEL ALUMNO</div>
                        </div>
                        <br>
                        <?php
                        $alumno = UsuariosC::VerUsuariosC("matricula",$_SESSION["matricula"]);
                        ?>
                        <div class="col-md-4"><label class="form-label" for="nombreAlumno">6.- Nombre completo:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="text" id="nombreAlumno" value="<?php echo $detalles["nombreAlumno"] ?>" name="nombreAlumno" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">7.- Carrera:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                            <input disabled type="text" id="carrera" value="<?php echo $detalles["carreraAlumno"] ?>" name="nombreAlumno" class="form-control"  />
                               
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">8.- Especialidad:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="text" id="especialidad" name="especialidad" value="<?php echo $detalles["especialidadAlumno"]?>" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"> <label class="form-label" for="form1Example1">9- Matricula:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="text" id="matricula" value="<?php echo $detalles["matricula"]?>" name="matricula" class="form-control"  />
                                <input  type="hidden" id="matricula" value="<?php echo $detalles["matricula"]?>" name="matricula" class="form-control"  />
                               
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">10.- Correo electrónico:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="email" id="correo" value="<?php echo $detalles["emailAlumno"]?>" name="correo" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">11.- Teléfono celular:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="tel" id="telefono" value="<?php echo $detalles["telefonoAlumno"]?>"  name="telefono" class="form-control"  />
                                
                            </div>

                        </div>
                       <!-- <div class="col-md-4"><label class="form-label" for="form1Example1">Kardex (PDF)</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;"> 
                                <input type="file" id="form1Example1" name="kardexPDF" class="form-control"  />

                            </div>

                        </div> -->
                        <br>
                        <div class="col-md-12">
                            <div class="alert alert-info">12.- PROYECTO (Opción elegida)</div>
                        </div>
                        <br>
                        <div class="col-md-12"> 
                           
                            <div class=""><label class="form-label" for="form1Example1">Tipo de proyecto:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="name" id="tipoProyecto" name="tipoProyecto" value="<?php echo $detalles["tipoProyecto"]?>"  class="form-control"  />
                                
                            </div>

                        </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">13.- No. De afiliación al IMSS:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="name" id="IMSS" name="IMSS" value="<?php echo $detalles["IMSS"]?>" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">14.- No. De póliza de seguro AXA</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input disabled type="name" id="poliza" name="poliza" value="<?php echo $detalles["polizaSeguroAlumno"]?>"  class="form-control"  />
                                
                            </div>

                        </div>
                        <br>

                    </div>

                    <br>
                    <div class="col-md-12"> <label class="form-label" for="form1Example1">Selecionar opción</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                               
                                <select name="estado" id="estado" class="form-control" >
                                <option value="*">Selecionar opción</option>
                                    <option value="2">Aceptar Solicitud</option>
                                    <option value="3">Rechazar Solicitud</option>
                                </select>

                            </div>

                        </div>
                    <button class="btn btn-success btn-lg" type="submit">Aceptar</button>
                     <?php
                $solita = new SolicitudResidenciaC();
               $solita->ActualizarSolicitud($Seccion);
                ?>
                </section>
               
                </form>
                <!-- /.content -->
            </div>

        </div>
        <br>

    </div>