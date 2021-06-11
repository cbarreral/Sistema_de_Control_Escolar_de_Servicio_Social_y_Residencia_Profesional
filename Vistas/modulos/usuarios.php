<?php

if ($_SESSION["rol"] == "Alumno" || $_SESSION["rol"] == "a_Industrial") {

    echo '<script>

	window.location = "inicio";
	</script>';

    return;
}

?>



<div class="content-wrapper">

    <section class="content-header">
        <h1>Gestor de Usuarios</h1>
        <br>
        <a href="<?php echo URL_SERVER?>ImportarExcel/usuarios.php">
            <button class="btn btn-success " title="Importación masiva de usuarios desde excel">Importar usuarios de excel</button>
        </a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#CrearUsuario">Crear Nuevo Usuario</button>

        <button type="button" class="btn btn-success " style="display:none" data-toggle="modal" data-target="#impExcel">Importar lista masiva de usuarios desde excel</button>
        <a href="<?php echo URL_SERVER?>tcpdf/pdf/expUsuarios.php" target="blank">
            <button class="btn btn-danger ">Exportar tabla a PDF</button>
        </a>
        <a href="<?php echo URL_SERVER?>expExcel/UsuariosExcel.php">
            <button class="btn btn-success ">Exportar tabla a excel</button>
        </a>



        <br>

        <!-- id="myTable" -->

    </section> <br>
    <div class="box">

        <div class="box-header">


            <!-- Pills navs -->
            <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active " id="ex3-tab-1" data-mdb-toggle="pill" href="#ex3-pills-1" role="tab" aria-controls="ex3-pills-1" aria-selected="true">
                        Alumnos
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-2" data-mdb-toggle="pill" href="#ex3-pills-2" role="tab" aria-controls="ex3-pills-2" aria-selected="false">
                        Acesor Academico
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-3" data-mdb-toggle="pill" href="#ex3-pills-3" role="tab" aria-controls="ex3-pills-3" aria-selected="false">
                        Acesor Industrial
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-4" data-mdb-toggle="pill" href="#ex3-pills-4" role="tab" aria-controls="ex3-pills-4" aria-selected="false">
                        Jefe de Carrera
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="ex3-tab-5" data-mdb-toggle="pill" href="#ex3-pills-5" role="tab" aria-controls="ex3-pills-5" aria-selected="false">
                        Administrador
                    </a>
                </li>
            </ul>
            <!-- Pills navs -->



            <!-- Pills content -->
            <div class="tab-content" id="ex2-content">
                <div class="tab-pane fade show active" id="ex3-pills-1" role="tabpanel" aria-labelledby="ex3-tab-1">
                    <div class="table-responsive">
                        <table class=" table align-middle table-hover table-responsive T">

                            <thead class="table-light">
                                <tr>
                                    <th>Apellido</th>
                                    <th>Nombres</th>
                                    <th>Carreras</th>
                                    <th>Matricula</th>
                                    <th>tipo</th>
                                    <th>Correo</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>

                            <tbody id="myTable">
                                <?php
                                $columna = null;
                                $valor = null;
                                $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                                foreach ($resultado as $key => $value) {
                                    if ($value["rol"] == "Alumno") {
                                        if ($value["a_academico"] == "" || $value["a_academico"] == $_SESSION["nombre"]) {
                                            if ($value["id_carrera"] == $_SESSION["id_carrera"]) {
                                                $columnaC = "id";
                                                $valorC = $value["id_carrera"];

                                                $carrera = CarrerasC::verCarreraC($columnaC, $valorC);

                                                echo '
                                                <tr>
                                                    <td>' . $value["apellido"] . '</td>
                                                    <td>' . $value["nombre"] . '</td>';

                                                if ($value["id_carrera"] == 0 && $value["rol"] == "Admin") {
                                                    echo ' <th style="color: blue">Administrador</th>';
                                                } else {

                                                    echo '
                                                    <td>' . $carrera["nombre"] . '</td>

                                                    ';
                                                }
                                                echo '
                                                    <td>' . $value["matricula"] . '</td>

                                                    <td>' . $value["tipo"] . '</td>

                                                    <td>' . $value["correo"] . '</td>';


                                                    echo '

                                                    <td>

                                                        <div class="btn-group">
                                                        <a href="detalles-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-info btn-sm px-3 ">Detalles</a>    
                                                        </div>

                                                    </td>
                                                    <td>
                                                        
                                                        <div class="btn-group">
                                                            
                                                        <a href="Editar-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-success btn-sm px-3 "><i class="fas fa-pen-alt"></i> </a>   

                                                        <button class="btn btn-danger btn-sm px-3 EliminarUsuario" Uid="' . $value["id"] . '"><i class="fas fa-times"></i></button>

                                                        </div>

                                                    </td>

                                                </tr>';
                                            }
                                        }
                                        if ($_SESSION["rol"] == "Admin") {
                                            $columnaC = "id";
                                            $valorC = $value["id_carrera"];

                                            $carrera = CarrerasC::verCarreraC($columnaC, $valorC);

                                            echo '
                                                <tr>
                                                    <td>' . $value["apellido"] . '</td>
                                                    <td>' . $value["nombre"] . '</td>';

                                            if ($value["id_carrera"] == 0 && $value["rol"] == "Admin") {
                                                echo ' <th style="color: blue">Administrador</th>';
                                            } else {

                                                echo '
                                                    <td>' . $carrera["nombre"] . '</td>

                                                    ';
                                            }
                                            echo '
                                                    <td>' . $value["matricula"] . '</td>

                                                    <td>' . $value["tipo"] . '</td>

                                                    <td>' . $value["correo"] . '</td>';


                                            echo '

                                                    <td>

                                                        <div class="btn-group">
                                                        <a href="detalles-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-info btn-sm px-3 ">Detalles</a>    
                                                        </div>

                                                    </td>
                                                    <td>
                                                        
                                                        <div class="btn-group">
                                                            
                                                        <a href="Editar-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-success btn-sm px-3 "><i class="fas fa-pen-alt"></i> </a>   

                                                        <button class="btn btn-danger btn-sm px-3 EliminarUsuario" Uid="' . $value["id"] . '"><i class="fas fa-times"></i></button>

                                                        </div>

                                                    </td>

                                                </tr>';
                                        }
                                    }
                                }

                                ?>

                            </tbody>

                        </table>
                    </div>

                </div>
                <div class="tab-pane fade" id="ex3-pills-2" role="tabpanel" aria-labelledby="ex3-tab-2">
                <table class=" table align-middle table-hover table-responsive T">

                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombres</th>
                            <th>Carreras</th>
                            <th>Matricula</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            if ($value["rol"] == "a_Academico") {

                                $columnaC = "id";
                                $valorC = $value["id_carrera"];

                                $carrera = CarrerasC::verCarreraC($columnaC, $valorC);

                                echo '
                                        <tr>
                                        <td>' . $value["apellido"] . '</td>
                                        <td>' . $value["nombre"] . '</td>';

                                if ($value["id_carrera"] == 0 && $value["rol"] == "Admin") {
                                    echo ' <th style="color: blue">Administrador</th>';
                                } else {

                                    echo '
                                        <td>' . $carrera["nombre"] . '</td>
                                    
                                        ';
                                }
                                echo '
                                    <td>' . $value["matricula"] . '</td>
                                    ';
                            
                                echo '
                                    <td>' . $value["correo"] . '</td>';

                                if ($value["rol"] == "a_Academico") {
                                    echo ' <th style="color: green">' . $value["rol"] . '</th>';
                                } else {
                                    if ($value["rol"] == "a_Industrial") {
                                        echo ' <th style="color: purpuple">' . $value["rol"] . '</th>';
                                    } else {

                                        if ($value["rol"] == "Admin") {
                                            echo ' <th style="color: blue">' . $value["rol"] . '</th>';
                                        } else {

                                            echo '
                                                <td>' . $value["rol"] . '</td>
                                            ';
                                        }
                                    }
                                }
                                echo '

                                <td>

                                    <div class="btn-group">
                                    <a href="detalles-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-info btn-sm px-3 ">Detalles</a>    
                                    </div>

                                </td>
                                <td>
                                    
                                    <div class="btn-group">
                                        
                                    <a href="Editar-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-success btn-sm px-3 "><i class="fas fa-pen-alt"></i> </a>   

                                    <button class="btn btn-danger btn-sm px-3 EliminarUsuario" Uid="' . $value["id"] . '"><i class="fas fa-times"></i></button>

                                    </div>

                                </td>

                            </tr>';
                            }
                        }

                        ?>

                    </tbody>

                </table>
              </div>


                <div class="tab-pane fade" id="ex3-pills-3" role="tabpanel" aria-labelledby="ex3-tab-3">
                <table class=" table align-middle table-hover table-responsive T">

                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombres</th>
                            <th>Carreras</th>
                            <th>Matricula</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            if ($value["rol"] == "a_Industrial") {

                                $columnaC = "id";
                                $valorC = $value["id_carrera"];

                                $carrera = CarrerasC::verCarreraC($columnaC, $valorC);

                                echo '
                                        <tr>
                                        <td>' . $value["apellido"] . '</td>
                                        <td>' . $value["nombre"] . '</td>';

                                if ($value["id_carrera"] == 0 && $value["rol"] == "Admin") {
                                    echo ' <th style="color: blue">Administrador</th>';
                                } else {

                                    echo '
                                            <td>' . $carrera["nombre"] . '</td>
                                        
                                            ';
                                }
                                echo '
                                        <td>' . $value["matricula"] . '</td>
                                

                                        <td>' . $value["correo"] . '</td>';
                                
                                if ($value["rol"] == "a_Academico") {
                                    echo ' <th style="color: green">' . $value["rol"] . '</th>';
                                } else {
                                    if ($value["rol"] == "a_Industrial") {
                                        echo ' <th style="color: purpuple">' . $value["rol"] . '</th>';
                                    } else {

                                        if ($value["rol"] == "Admin") {
                                            echo ' <th style="color: blue">' . $value["rol"] . '</th>';
                                        } else {

                                            echo '
                                                    <td>' . $value["rol"] . '</td>
                                                ';
                                        }
                                    }
                                }
                                echo '

                                            <td>

                                                <div class="btn-group">
                                                <a href="detalles-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-info btn-sm px-3 ">Detalles</a>    
                                                </div>

                                            </td>
                                            <td>
                                                
                                                <div class="btn-group">
                                                    
                                                <a href="Editar-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-success btn-sm px-3 "><i class="fas fa-pen-alt"></i> </a>   

                                                <button class="btn btn-danger btn-sm px-3 EliminarUsuario" Uid="' . $value["id"] . '"><i class="fas fa-times"></i></button>

                                                </div>

                                            </td>

                                        </tr>';
                            }
                        }

                        ?>

                    </tbody>

                </table>
                </div>

                <div class="tab-pane fade" id="ex3-pills-4" role="tabpanel" aria-labelledby="ex3-tab-4">
                <table class=" table align-middle table-hover table-responsive T">

                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombres</th>
                            <th>Carreras</th>
                            <th>Matricula</th>
                            <th>Correo</th>
                            <th>Rol</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            if ($value["rol"] == "Jefe") {

                                $columnaC = "id";
                                $valorC = $value["id_carrera"];

                                $carrera = CarrerasC::verCarreraC($columnaC, $valorC);

                                echo '
                            <tr>
                            <td>' . $value["apellido"] . '</td>
                            <td>' . $value["nombre"] . '</td>';

                                if ($value["id_carrera"] == 0 && $value["rol"] == "Admin") {
                                    echo ' <th style="color: blue">Administrador</th>';
                                } else {

                                    echo '
                                <td>' . $carrera["nombre"] . '</td>
                            
                                ';
                                }
                                echo '
                            <td>' . $value["matricula"] . '</td>';
                                
                                echo '
                            <td>' . $value["correo"] . '</td>';

                                if ($value["rol"] == "a_Academico") {
                                    echo ' <th style="color: green">' . $value["rol"] . '</th>';
                                } else {
                                    if ($value["rol"] == "a_Industrial") {
                                        echo ' <th style="color: purpuple">' . $value["rol"] . '</th>';
                                    } else {

                                        if ($value["rol"] == "Admin") {
                                            echo ' <th style="color: blue">' . $value["rol"] . '</th>';
                                        } else {

                                            echo '
                            <td>' . $value["rol"] . '</td>
                        ';
                                        }
                                    }
                                }
                                echo '

                                <td>

                                    <div class="btn-group">
                                    <a href="detalles-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-info btn-sm px-3 ">Detalles</a>    
                                    </div>

                                </td>
                                <td>
                                    
                                    <div class="btn-group">
                                        
                                    <a href="Editar-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-success btn-sm px-3 "><i class="fas fa-pen-alt"></i> </a>   

                                    <button class="btn btn-danger btn-sm px-3 EliminarUsuario" Uid="' . $value["id"] . '"><i class="fas fa-times"></i></button>

                                    </div>

                                </td>

                            </tr>';
                            }
                        }

                        ?>

                    </tbody>

                </table>
                </div>

                <div class="tab-pane fade" id="ex3-pills-5" role="tabpanel" aria-labelledby="ex3-tab-5">
                <table class=" table align-middle table-hover table-responsive T">

                    <thead>
                        <tr>
                            <th>Apellido</th>
                            <th>Nombres</th>
                            <th>Carreras</th>
                            <th>Matricula</th>
                            <th>Rol</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody id="myTable">
                        <?php
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {
                            if ($value["rol"] == "Admin") {

                                $columnaC = "id";
                                $valorC = $value["id_carrera"];

                                $carrera = CarrerasC::verCarreraC($columnaC, $valorC);

                                echo '
                                                            <tr>
                                                            <td>' . $value["apellido"] . '</td>
                                                            <td>' . $value["nombre"] . '</td>';

                                if ($value["id_carrera"] == 0 && $value["rol"] == "Admin") {
                                    echo ' <th style="color: blue">Administrador</th>';
                                } else {

                                    echo '
                                                                <td>' . $carrera["nombre"] . '</td>
                                                            
                                                                ';
                                }
                                echo '
                                                            <td>' . $value["matricula"] . '</td>
                                                        
                                                        ';
                            
                                if ($value["rol"] == "a_Academico") {
                                    echo ' <th style="color: green">' . $value["rol"] . '</th>';
                                } else {
                                    if ($value["rol"] == "a_Industrial") {
                                        echo ' <th style="color: purpuple">' . $value["rol"] . '</th>';
                                    } else {

                                        if ($value["rol"] == "Admin") {
                                            echo ' <th style="color: blue">' . $value["rol"] . '</th>';
                                        } else {

                                            echo '
                                                                        <td>' . $value["rol"] . '</td>
                                                                        ';
                                        }
                                    }
                                }
                            echo '

                                                                        <td>

                                                                            <div class="btn-group">
                                                                            <a href="detalles-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-info btn-sm px-3 ">Detalles</a>    
                                                                            </div>

                                                                        </td>
                                                                        <td>
                                                                            
                                                                            <div class="btn-group">
                                                                                
                                                                            <a href="Editar-usuario/' . $value["id_carrera"] . '/' . $value["matricula"] . '" type="button" class="btn btn-success btn-sm px-3 "><i class="fas fa-pen-alt"></i> </a>   

                                                                            <button class="btn btn-danger btn-sm px-3 EliminarUsuario" Uid="' . $value["id"] . '"><i class="fas fa-times"></i></button>

                                                                            </div>

                                                                        </td>

                                                                    </tr>';
                            }
                        }

                        ?>

                    </tbody>
                </table>
                </div>

            </div>
            <!-- Pills content -->











            
        </div>

    </div>



    <!-- CREAR  
    
    -->

    <div class="modal fade" id="CrearUsuario">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-body">
                        <div class="box-body ">

                            <div class="form-group">

                                <?php
                                $columna = "id";
                                $valor = 1;
                                $periodo = AjustesC::VerAjustesC($columna, $valor);
                                echo '
                                <h2>Periodo</h2>
                                <p>' . $periodo["periodo"] . '</p>
                                <input type="hidden" name="periodoU" required id="" value="' . $periodo["periodo"] . '">
                                ';

                                ?>
                            </div>
                            <div class="form-grup">
                                <h2>Apellido</h2>
                                <input class="form-control" type="text" name="apellidoU" required id="">
                            </div>

                            <div class="form-grup">
                                <h2>Nombres</h2>
                                <input class="form-control" type="text" name="nombreU" required id="">
                            </div>

                            <div class="form-grup">
                                <h2>Seleccionar Carrera</h2>
                                <select name="carreraU" class="form-control " id="">
                                    <option value="0">Selecciona una de las carreras ya registradas</option>
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
                            <div class="form-grup">
                                <h2>Matricula</h2>
                                <input class="form-control" type="text" name="matriculaU" required id="Validarmatricula">
                            </div>
                            <div class="form-grup">
                                <h2>Contraseña</h2>
                                <input class="form-control" type="text" name="claveU" required id="">
                            </div>
                            <div class="form-grup">
                                <h2>Telefono</h2>
                                <input class="form-control" type="text" name="telefonoU" required id="telefonoU">
                                <h2>Dirección</h2>
                                <input class="form-control" type="text" name="direccionU" id="direccionU">
                                <h2>Correo electronico</h2>
                                <input class="form-control" type="email" name="correoU" id="correoU">
                            </div>
                            <div class="form-grup">
                                <h2>Seleccionar Rol</h2>
                                <select name="rolU" class="form-control" class="form-control " id="" required>
                                    <option>Selecciona un rol de usuario</option>
                                    <?php
                                    if ($_SESSION["rol"] != "Admin") {
                                        echo '
                                
                                <option value="Alumno">Alumno</option>
                                ';
                                    }
                                    if ($_SESSION["rol"] == "Jefe") {
                                        echo '
                                <option value="a_Academico">Acesor academico</option>
                                <option value="a_Industrial">Acesor Idustrial</option>
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
                                <h2>Tipo</h2>
                                <select name="tipoU" class="form-control " id="" required>
                                    <option>Selecciona el tipo</option>
                                    <?php

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
                        <button type="submit" class="btn btn-success">Crear</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                    </div>

                    <?php
                    $crearUsuario = new UsuariosC();
                    $crearUsuario->CrearUsuarioC();

                    ?>
                </form>
            </div>
        </div>
    </div>




    <!-- EDITAR -->




    <div class="modal fade" id="EditarUsuario">

        <div class="modal-dialog">

            <div class="modal-content">



            </div>

        </div>

    </div>



    <?php

    $eliminarU = new UsuariosC();
    $eliminarU->EliminarUsuariosC();

    ?>