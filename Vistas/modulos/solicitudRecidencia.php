    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <br>
        <div class="box container">
            <div class="box-header with-border ">
                <!-- Content Header (Page header) -->
                <form action="<?php echo URL_SERVER ?>Controladores/subirKardex.php" enctype="multipart/form-data" enctype="multipart/form-data" class="content"  method="post">
                    <section class="content-header">
                        <div class="d-flex justify-content-center">
                            <img src="<?php echo URL_SERVER ?>Vistas/img/logo.png" width="200px" alt="ITSOEH" srcset="">
                        </div>

                        <div class="d-flex justify-content-end">

                            <label class="form-label" for="form1Example1">Fecha de Solicitud:</label>
                            <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                            <p class="p-2"> <?php echo date("d-m-y") ?></p>
                               
                                <input type="hidden" id="fecha" name="fecha" value="<?php echo date("d-m-y") ?>" class="form-control" />
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


                        <div class="row">


                            <br>
                            <div class="col-md-12">
                                <div class="alert " style="background-color: #009688; color:#E1F5FE;">Datos del estudiante</div>
                            </div>
                            <br>



                            <?php
                            $alumno = UsuariosC::VerUsuariosC("matricula", $_SESSION["matricula"]);
                            ?>
                            <div class="col-md-8"><label class="form-label" for="nombreAlumno">Empezando por apellido paterno (con el uso de mayúsculas y minúsculas) nombre completo del estudiante.</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="text" id="nombreAlumno" required value="<?php echo $alumno["apellido"] . " " . $alumno["nombre"] ?>" name="nombreAlumno" class="form-control" />

                                </div>

                            </div>
                            <div class="col-md-2"><label class="form-label" for="nombreAlumno">Sexo</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <select name="sexo" id="sexo" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Hombre">Hombre</option>
                                        <option value="Mujer">Mujer</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-2"> <label class="form-label" for="form1Example1">Matrícula:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="text" id="matricula" value="<?php echo $alumno["matricula"] ?>" name="matricula" class="form-control" required />

                                </div>

                            </div>
                            <div class="col-md-4"><label class="form-label" for="form1Example1">Carrera:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <select name="carrera" class="form-control " value="<?php echo $alumno["id_carrera"] ?>" id="" required>
                                        <option value=""></option>
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
                            <div class="col-md-4"><label class="form-label" for="form1Example1">Especialidad:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="text" id="especialidad" name="especialidad" value="<?php echo $alumno["especialidad"] ?>" class="form-control" required />

                                </div>

                            </div>
                            <div class="col-md-2"><label class="form-label" for="form1Example1">Teléfono celular:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="tel" id="telefono" value="<?php echo $alumno["telefono"] ?>" name="telefono" class="form-control" required />

                                </div>

                            </div>
                            <div class="col-md-2"><label class="form-label" for="form1Example1">Semestre por cursar</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <select name="semestre" id="semestre" class="form-control" required>
                                        <option value=""></option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                        <option value="13">13</option>

                                    </select>
                                </div>

                            </div>
                            <div class="col-md-2"><label class="form-label" for="form1Example1">Has terminado con el 100% de tus materias</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <select name="100materias" id="100materias" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-2"><label class="form-label" for="form1Example1">¿Harás la residencia cursando materias?</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <select name="cursandomaterias" id="cursandomaterias" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-3"><label class="form-label" for="form1Example1">En caso de responder "Sí" ¿Cuántas materias vas a cursar?</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <select name="cuantasmaterias" id="cuantasmaterias" class="form-control" required>
                                        <option value=""></option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="0">Ninguna</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3"><label class="form-label" for="form1Example1">¿Recibiste la plática informativa del proceso de residencia profesional?</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <select name="platica" id="platica" class="form-control" required>
                                        <option value=""></option>
                                        <option value="Si">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>

                            </div>




                            <br>
                            <div class="col-md-12">
                                <div class="alert " style="background-color: #009688; color:#E1F5FE;">Datos para la carta de presentación</div>
                            </div>
                            <br>



                            <div class="col-md-4"><label class="form-label" for="form1Example1">Nombre de la empresa o Institución:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="text" name="nombreEmpresa" id="nombreEmpresa" class="form-control" required />

                                </div>

                            </div>
                            <div class="col-md-4"><label class="form-label" for="form1Example1">Dirección de la empresa:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="text" id="domicilio" name="domicilio" class="form-control" required />

                                </div>

                            </div>
                            <div class="col-md-2"><label class="form-label" for="form1Example1">Municipio o Delegación:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="text" id="municipio" name="municipio" class="form-control" required />

                                </div>

                            </div>

                            <div class="col-md-2"><label class="form-label" for="form1Example1">Estado:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="text" id="estadoEmpresa" name="estadoEmpresa" class="form-control" required />

                                </div>

                            </div>
                            <div class="col-md-2"> <label class="form-label" for="form1Example1">Teléfono de la empresa:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="tel" id="telefonoEmpresa" name="telefonoEmpresa" class="form-control" />

                                </div>

                            </div>
                            <div class="col-md-10"> <label class="form-label" for="form1Example1">Grado académico(Ingeniero, Maestro, Doctor) y nombre completo de la persona a quien se va a dirigir la carta de presentación:</label>

                                <div class="form-outline mb-4  rounded " style="background-color: #E1F5FE;">
                                    <input type="text" name="persona" id="persona" class="form-control" required />
                                </div>

                            </div>
                            <div class="col-md-6"> <label class="form-label" for="form1Example1">Cargo de la persona a quien se va a dirigir la carta de presentación:</label>

                                <div class="form-outline mb-4  rounded " style="background-color: #E1F5FE;">
                                    <input type="text" name="cargo" id="cargo" class="form-control" required />
                                </div>

                            </div>
                            <div class="col-md-6"><label class="form-label" for="form1Example1">Correo electrónico de la persona a quien se dirige la carta de presentación:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="email" name="correoEmpresa" id="correoEmpresa" class="form-control" required />

                                </div>

                            </div>



                            <br>
                            <div class="col-md-12">
                                <div class="alert " style="background-color: #009688; color:#E1F5FE;">Requisitos para la carta de presentación</div>
                            </div>
                            <br>



                            <div class="col-md-3"><label class="form-label" for="form1Example1">Kardex actualizado:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="file" name="kardex" id="kardex" class="form-control" required/>

                                </div>

                            </div>

                            <div class="col-md-9"><label class="form-label" for="form1Example1">Copia de Constancia de liberación de Servicio Social o Carta de terminación expedida por la instancia donde se realizó:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="file" name="servicio" id="servicio" class="form-control" required/>

                                </div>

                            </div>
                            <div class="col-md-4"><label class="form-label" for="form1Example1">Copia de la Cartilla de afiliación al IMSS vigente:</label>
                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">
                                    <input type="file" name="IMSS" id="IMSS" class="form-control" required/>

                                </div>

                            </div>
                            <div class="col-md-12">
                                <img src="<?php echo URL_SERVER ?>Vistas/img/NoIMSS.png" width="35%" alt="" srcset="">
                            </div>
                            <div class="col-md-6"><label class="form-label" for="form1Example1">No. de afiliación al IMSS (Agregar número completo como se muestra en la imagen):</label>

                                <div class="form-outline mb-4 rounded " style="background-color: #E1F5FE;">

                                    <input type="text" name="NoIMSS" id="NoIMSS" class="form-control" required/>

                                </div>

                            </div>
                            <br>
                            <h4>¡Gracias!</h4>
                            <p class="p-4">Tendrás tu carta de presentación en las próximas 72 hrs de días hábiles y se te hará llegar a tu correo y deberás enviarla a la persona que te aceptará dentro de la empresa.</p>
                            <br>
                            <button class="btn btn-success btn-lg" type="submit">Solicitar</button>
                           
                    </section>
                </form>
                <!-- /.content -->
            </div>

        </div>
        <br>

    </div>


    