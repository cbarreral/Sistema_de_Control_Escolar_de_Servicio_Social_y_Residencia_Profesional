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
                    <form action="" method="post">
                    <div class="d-flex justify-content-end">

                        <label class="form-label" for="form1Example1">Fecha de Solicitud:</label>
                        <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">

                            <input type="text" id="fecha" name="fecha" value="<?php echo date("d-m-y") ?>" class="form-control"  />

                        </div>
                    </div>
                    <div class="d-flex justify-content-end">

                        <label class="form-label" for="form1Example1">Periodo</label>
                        <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">

                            <select name="periodo" id="periodo" class="form-control">
                                <option value="Julio - diciembre">Julio - diciembre</option>
                                <option value="Enero -junio">Enero -junio</option>

                            </select>

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
                                <input type="text" name="nombreCarta" id="nombreCarta" class="form-control"  />
                               </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">2.- Nombre de la Empresa y/o Institución:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="text" name="nombreEmpresa" id="nombreEmpresa" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">3.- Domicilio de la empresa:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="text" id="domicilioEmpresa" name="domicilioEmpresa" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4">  <label class="form-label" for="form1Example1">4.- Teléfono </label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="tel" id="telefonoEmpresa" name="telefonoEmpresa" class="form-control"  />
                              
                            </div>

                        </div>

                        <div class="col-md-4"><label class="form-label" for="form1Example1">5.- Correo Electrónico </label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="email" name="correoEmpresa" id="correoEmpresa" class="form-control"  />
                                
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
                                <input type="text" id="nombreAlumno" value="<?php echo $alumno["apellido"]." ".$alumno["nombre"] ?>" name="nombreAlumno" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">7.- Carrera:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                            <select name="carrera" class="form-control "value="<?php echo $alumno["id_carrera"]?>"  id=""  >
                                    <option value="0">Selecciona Carrera</option>
                                    <?php
                                    $carreras = CarrerasC::VerCarrerasC();

                                    foreach ($carreras as $key => $value) {
                                        echo '
                                        
                                    <option value="' . $value["id"] . '">' . $value["nombre"] . '</option>
                                        ';
                                    }

                                    ?>
                                </select>
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">8.- Especialidad:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="text" id="especialidad" name="especialidad" value="<?php echo $alumno["especialidad"]?>" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"> <label class="form-label" for="form1Example1">9- Matricula:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="text" id="matricula" value="<?php echo $alumno["matricula"]?>" name="matricula" class="form-control"  />
                               
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">10.- Correo electrónico:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="email" id="correo" value="<?php echo $alumno["correo"]?>" name="correo" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">11.- Teléfono celular:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="tel" id="telefono" value="<?php echo $alumno["telefono"]?>"  name="telefono" class="form-control"  />
                                
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
                        <div class="col-md-12"> <label class="form-label" for="form1Example1">Selecionar opción</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                               
                                <select name="tipoProyecto" id="tipoProyecto" class="form-control" >
                                <option value="0">Selecionar opción</option>
                                    <option value="Banco de Proyectos">Banco de proyectos</option>
                                    <option value="Propuesta Propia">Propuesta Propia</option>
                                    <option value="Empresa">Empresa</option>
                                </select>

                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">13.- No. De afiliación al IMSS:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="name" id="IMSS" name="IMSS" class="form-control"  />
                                
                            </div>

                        </div>
                        <div class="col-md-4"><label class="form-label" for="form1Example1">14.- No. De póliza de seguro AXA</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                <input type="name" id="poliza" name="poliza" class="form-control"  />
                                
                            </div>

                        </div>
                        <br>

                    </div>

                    <br>
                    <button class="btn btn-success btn-lg" type="submit">Solicitar</button>
                     <?php
                $solita = new SolicitudResidenciaC();
                $solita->CrearSolicitud();
                ?>
                </section>
               
                </form>
                <!-- /.content -->
            </div>

        </div>
        <br>

    </div>