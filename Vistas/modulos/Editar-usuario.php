<?php
$exp = explode("/", $_GET["url"]);
$id_carrera = $exp[1];
$matricula = $exp[2];
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar Usuario</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form method="post">

                    <div class="modal-body">

                        <div class="box-body">
                            <div class="form-grup">

                                <?php
                                $columna = "id";
                                $valor = 1;
                                $periodo = AjustesC::VerAjustesC($columna, $valor);
                                echo '
                <h2>Periodo</h2>
                <p>' . $periodo["periodo"] . '</p>
                <input type="hidden" name="periodoEU" required id="" value="' . $periodo["periodo"] . '">
                
                            </div>
                            <div class="form-group">

                                <h2>Apellido:</h2>
';
                                $columna = "matricula";
                                $valor = $exp[2];
                                $usuario = UsuariosC::VerUsuariosC($columna, $valor);
                                echo '
                                <input class="form-control input-lg" type="text" id="apellidoEU" name="apellidoEU" value="' . $usuario["apellido"] . '" required>
                                <input class="form-control input-lg" type="text" value="' . $usuario["id"] . '" id="Uid" name="Uid">

                            </div>

                            <div class="form-group">

                                <h2>Nombre:</h2>

                                <input class="form-control input-lg" type="text" id="nombreEU" value="' . $usuario["nombre"] . '" name="nombreEU" required>

                            </div>

                            <div class="form-group">

                                <h2>Usuario:</h2>

                                <input class="form-control input-lg" type="text" id="matriculaEU" value="' . $usuario["matricula"] . '" name="matriculaEU" required>

                            </div>

                            <div class="form-group">

                                <h2>Contraseña:</h2>

                                <input class="form-control input-lg" type="text"value="' . $usuario["clave"] . '" id="claveEU" name="claveEU" required>

                                <h2>Telefono</h2>

                                <input class="form-control input-lg" type="text" value="' . $usuario["telefono"] . '" name="telefonoEU" id="telefonoEU">

                                <h2>Dirección</h2>

                                <input class="form-control input-lg" type="text" name="direccionEU" value="' . $usuario["direccion"] . '"id="direccionEU">

                                <h2>Correo electronico</h2>

                                <input class="form-control input-lg" type="email" value="' . $usuario["correo"] . '" name="correoEU" id="correoEU">

                            </div>
                            ';
                                $columnaC = "id";
                                $valorC = $exp[1];
                                $carrera = CarrerasC::verCarreraC($columnaC, $valorC);
                                echo '

                            <div class="form-group" id="carrera">

                                <h2 id="">Seleccionar nueva Carrera:' . $valorC . '</h2>

                                <select class="form-control input-lg" name="carreraEU">
                                    <option  value="' . $valorC . '"></option>
                                    ';
                                $carreras = CarrerasC::VerCarrerasC();

                                foreach ($carreras as $key => $value) {

                                    echo '<option value="' . $value["id"] . '">' . $value["nombre"] . '</option>';
                                }

                                ?>

                                </select>

                            </div>

                            <?php
                            $columna = "matricula";
                            $valor = $exp[2];
                            $usuario = UsuariosC::VerUsuariosC($columna, $valor);
                            if ($usuario["rol"] == "Alumno") {
                                echo '   <div class="form-group" id="">

                                    <h2>Seleccionar nuevo AcesorAcademico:</h2>

                                    <select class="form-control input-lg" name="a_academicoEU">';

                                $columna =  null;
                                $valor = null;
                                echo $valor;
                                $verAlumno = UsuariosC::VerUsuariosC($columna, $valor);
                                echo '
                                        <option  value="' . $usuario["a_academico"] . '"></option>
                                ';
                                foreach ($verAlumno as $key => $value3) {
                                    if ($value3["rol"] == "a_Academico" && $value3["id_carrera"] == $exp[1]) {
                                        echo '<option value="' . $value3["nombre"] . '">' . $value3["nombre"] . '</option>';
                                    }
                                }
                                echo '   

                                        </select>

                                    </div>

                                    <div class="form-group" id="">

                                    <h2>Seleccionar nuevo Acesor Industrial:</h2>
    
                                    <select class="form-control input-lg" name="a_industrialEU">';
                                        
    
                                        $columna =  null;
                                        $valor = null;
                                        echo $valor;
                                        $verAlumno = UsuariosC::VerUsuariosC($columna, $valor);
                                        echo '
                                        <option  value="' . $usuario["a_industrial"] . '"></option>
                                        ';
                                        foreach ($verAlumno as $key => $value3) {
                                            if ($value3["rol"] == "a_Industrial" && $value3["id_carrera"] == $exp[1]) {
                                                echo '<option value="' . $value3["nombre"] . '">' . $value3["nombre"] . '</option>';
                                            }
                                        }
                                        
                                        echo'
                                    </select>
    
                                </div>
                                    ';
                            } else {
                                echo '
 
                                    ';
                            }
                            ?>


                           



                            <div class="form-group">

                                <h2 id="rolActual"></h2>

                                <h2>Seleccionar nuevo Rol:</h2>

                                <select name="rolEU" class="form-control " id="" required>

                                    <?php
                                    echo '
                                    <option  value="' . $usuario["rol"] . '"></option>
                    ';
                                    if ($_SESSION["rol"] != "Admin") {

                                        echo '
            
                                        <option value="Alumno">Alumno</option>
                                        ';
                                    } else {

                                        echo '
                                            <option value="Admin">Administrador</option>
                                            <option value="Alumno">Alumno</option>
                                            <option value="a_Academico">Acesor academico</option>
                                            <option value="a_Industrial">Acesor Idustrial</option>
                                            <option value="Jefe">Jefe de Carrera</option>
                                            ';
                                    }

                                    ?>
                                </select>

                            </div>


                            <div class="form-group">
                                <option id="tipoActual"></option>

                                <h2>Seleccionaer nuevo tipo: </h2>

                                <select name="tipoEU" class="form-control " required>

                                    <?php
                                    echo '
                                    <option  value="' . $usuario["tipo"] . '"></option>
';
                                    if ($_SESSION["rol"] != "Admin") {
                                        echo '
            
            <option value="Servicio_Social">Servicio Social</option>
            <option value="Residencia_Profecional">Residencia Profecional</option>
            ';
                                    } else {
                                        echo '
                    <option value="Servicio_Social">Servicio Social</option>
            <option value="Residencia_Profecional">Residencia Profecional</option>
            <option value="root">Root</option>
            <option value="a_Academico">Acesor academico</option>
            <option value="a_Industrial">Acesor Idustrial</option>
            <option value="Jefe">Jefe de Carrera</option>
            ';
                                    }
                                    ?>
                                </select>
                            </div>





                        </div>

                    </div>

                    <div class="modal-footer">

                        <button type="submit" class="btn btn-success">Guardar Cambios</button>

                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>

                    </div>

                    <?php

                    $actualizarU = new UsuariosC();
                    $actualizarU->ActualizarUsuariosC();

                    ?>

                </form>
            </div>
        </div>
    </section>
</div>