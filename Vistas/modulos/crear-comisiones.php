<?php



?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="box">
            <div class=" box-body">

                <?php
                $exp = explode("/", $_GET["url"]);
                $columna = "id";
                $valor = $exp[1];
                $id_carrera = $exp[2];

                $materia = MateriasC::VerMaterias2C($columna, $valor);
               
                echo '
                    <br>
            <h2>Horarios disponibles en ' .  $materia["nombre"] . '</h2>
            
            ';
                ?>

                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="box-header">
                            <?php
                            if ($_SESSION["rol"] == "Admin") {
                                echo '
                                <button type="button" class="btn btn-info" data-mdb-toggle="modal" data-mdb-target="#CrearComision">Crear Horarios</button>
                               ';
                            } else {
                                echo '<div class="alert alert-success">No tienes permisos para editar</div> ';
                            }
                            $columna = "id_materia";
                            $valor = $exp[1];
                            $comisiones = MateriasC::VerMaterias2C("id", $valor);
                            echo '<a type="button" class="btn btn-success "  href="https://google.cl/maps/place/' . $comisiones["direccion"] . '" target="_blank">Google Maps</a></td>
                            ';
                            ?>


                        </div>
                        <table class=" table align-middle table-hover table-responsive T">
                            <thead>
                                <tr>
                                    <th>Codigo</th>
                                    <th>Cantidad Máxima de Alumnos</th>
                                    <th>Horarios</th>
                                    <th>Días</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="myTable">
                                <?php
                                $columna = "id_materia";
                                $valor = $exp[1];
                                $id_carrera = $exp[2];
                                $comisiones = MateriasC::VerComisionesC($columna, $valor);
                                foreach ($comisiones as $key => $value) {
                                    echo '
                                    <tr>
                                    <td>' . $value["numero"] . '</td>
                                    <td>' . $value["c_maxima"] . '</td>
                                    <td>' . $value["horas"] . '</td>
                                    <td>' . $value["horario"] . '</td>
                                    <td>
                                    <a href="'.URL_SERVER.'tcpdf/pdf/Inscriptos-Materias.php/' . $exp[1] . '/' . $value["id"] . '" target="blank">
                                    <button class="btn btn-default"> Generar PDF</button>
                                    </a>';
                                    if ($_SESSION["rol"] == "Admin") {
                                        echo '
                                        <button class="btn btn-danger BorrarComision"Mid="' . $value["id"] . '"  Cid="' . $exp[1] . '">Borrar horario</button>
                                        ';
                                    }
                                    echo '
                                       
                                       
                                    </td>
                                </tr>
                                    
                                    ';
                                }
                                $id_carrera = $exp[2];
                                $crearC = new MateriasC();
                                $crearC->BorrarComisionC($id_carrera);
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<div class="modal fade" id="CrearComision">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" class="content" method="post">
                <div class="box-body">

                    <div class="form-group">

                        <h2>Código:</h2>

                        <input type="text" class="form-control input-lg" name="numero" >

                        <?php

                        echo '
						<input type="hidden" class="form-control input-lg" name="id_materia" value="' . $exp[1] . '" >';

                        ?>

                    </div>

                    <div class="form-group">

                        <h2>Cantidad Máxima de Alumnos:</h2>

                        <input type="number" class="form-control input-lg" name="c_maxima" required="">

                    </div>

                    <div class="form-group">

                        <h2>Horarios:</h2>

                        <input type="texto" class="form-control input-lg" name="horas" required="">

                    </div>

                    <div class="form-group">

                        <h2>Días:</h2>

                        <input type="text" class="form-control input-lg" name="horario" required="">

                    </div>

                </div>
                <div class="modal-footer">

                    <button class="btn btn-primary" type="submit">Crear horario</button>

                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

                </div>
                <?php

                $crearC = new MateriasC();
                $crearC->CrearComisionC($id_carrera);

                ?>
            </form>
        </div>
    </div>
</div>
