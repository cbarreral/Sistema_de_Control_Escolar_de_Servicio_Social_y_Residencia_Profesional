<?php
if ($_SESSION["rol"] != "Admin") {
    echo '<script>
        window.location = "inicio";
    </script>';
    return;
}
?>

<div class="content-wrapper">
    <section class="content-header">

        <h2>Gestor de Carreras</h2>

    </section>

    <section class="content">
        <div class="box">

            <div class="box-header">

                <form action="" method="post">
                    <div class="col-md-6 col-xs-12">
                        <input type="text" name="carrera" class="form-control" id="" placeholder="Ingresar Nueva Carrera" required>

                    </div>
                    <button class="btn btn-info" type="submit">Crear Carrera</button>
                </form>

                <?php
                $crearCarrera = new CarrerasC();
                $crearCarrera->crearCarreraC();

                ?>

                <br>
                <?php
                $columna = "id";
                $valor = 1;
                $resultado = AjustesC::VerAjustesC($columna, $valor);

                if ($resultado["h_inscripciones"] == 0) {
                    echo '
                    <div class="alert alert-danger">Inscripcion a Catalogo se encuentra desabilitado </div>
                    
                    <button class="btn btn-success" type="submit" data-toggle="modal" data-target="#DM">
                   Habilitar inscripciones a Catalogo </button>
                    ';
                } else {
                    echo '
                    <div class="alert alert-info">Inscripcion a Catalogo se encuentra habilitado  </div>
                   
                    <button class="btn btn-default" type="submit" data-toggle="modal" data-target="#HM">
                    Desabilitar inscripciones a Catalogo </button>
                    ';
                }
                ?>
                <button class="btn btn-danger pull-right" type="submit" data-toggle="modal" data-target="#VaciarRegistrosMaterias">Vacias Registros de Inscripciones del Catalogo</button>

            </div>

            <div class="box-body">
                <table class=" table align-middle table-hover table-responsive T">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>Nombre</th>
                            <th>Jefe de carrera</th>
                            <th>Correo</th>
                            <th>Controles</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $resultado = CarrerasC::VerCarrerasC();
                        foreach ($resultado as $keey => $value) {
                            $columna2 = "id_carrera";
                            $valor2 = $value["id"];
                            $user = UsuariosC::VerUsuarios2C($columna2, $valor2);

                            echo '
                                    <tr>
                                    <td>' . $value["id"] . '</td>
                                    <td>' . $value["nombre"] . '</td>';
                            foreach ($user as $key => $jefe) {
                                if ($jefe["rol"] == "Jefe") {
                                    echo '
                                    <td>' . $jefe["nombre"] . '</td>
                                    <td><a href="mailto:' . $jefe["correo"] . '">
                                    ' . $jefe["correo"] . '</a> 
                                    </td>
                                    <td>
                                        <div class="btn-grup">
                                            <a href="Editar-Carrera/' . $value["id"] . '">
                                                <button class="btn btn-success">Editar</button>
                                            </a>
                                            <a href="carreras/' . $value["id"] . '">
                                                <button class="btn btn-danger">Borrar</button>
                                            </a>
                                            <a href="crear-materias/' . $value["id"] . '">
                                                <button class="btn btn-warning">Catalogo</button>
                                            </a>
                                            <a href="estudiantes/' . $value["id"] . '">
                                                <button class="btn btn-primary">Estudiantes</button>
                                            </a>
                                    </div>
                                </td>
                                
                                    ';
                                }
                                if ($jefe["id_carrera"] != $value["id"]) {
                                    echo ' 
                                        <td>
                                            <a href="Editar-Carrera/' . $value["id"] . '">
                                                <button class="btn btn-success">Editar</button>
                                            </a>
                                        </td>
                                   ';
                                }
                                echo '</tr>';
                            }
                            # code...
                        }
                        ?>


                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="HM">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Esta seguro de que quiere deshabilitar el registro a Catalogo</h2>
                            <input type="hidden" name="h_inscripciones" value="0">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Confirmar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $HM = new AjustesC();
                $HM->HMC();
                ?>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="DM">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Esta seguro de que quiere habilitar el registro a Catalogo</h2>
                            <input type="hidden" name="h_inscripciones" value="1">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Confirmar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>
            </form>

        </div>
    </div>
</div>

<div class="modal fade" id="VaciarRegistrosMaterias">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" method="post">
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <h2>Esta seguro de que quiere Eliminar todas las inscripciones de los Catalogos</h2>
                            <input type="hidden" name="E" value="E">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn btn-success" type="submit">Confirmar</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>
                </div>
                <?php
                $vaciar = new MateriasC();
                $vaciar->VaciarRegistrosMateriasC();
                ?>
            </form>

        </div>
    </div>
</div>

<?php
$eliminar = new CarrerasC();
$eliminar->BorrarCarrerasC();
?>