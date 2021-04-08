<div class="content-wrapper">
    <section class="content-header">

    </section>

    <section class="content">

        <h2>Gestor de catalogo de empresas</h2>
        <div class="box-header">
            <?php
            if ($_SESSION["rol"] != "Admin" && $_SESSION["rol"] != "Jefe") {
                echo '
                <div class="alert alert-success">No tienes permisos para editar el catalogo</div> ';
            } else {
                echo '
            
                <a href="http://localhost/Sistema/ImportarExcel/catalogos.php">
                    <button class="btn btn-success " title="Importación masiva de usuarios desde excel">Importar usuarios de excel</button>
                </a>
                <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#CrearMateria">Agregar Empresa</button>
                
                <a href="#" style="display:none">
                    <button class="btn btn-success ">Importar lista desde excel</button>
                </a>
                <a href="http://localhost/Sistema/tcpdf/pdf/expCatalogo.php" target="blank">
                    <button class="btn btn-danger ">Exportar a PDF</button>
                </a>
                <a href="http://localhost/Sistema/expExcel/CatalogoExcel.php">
                    <button class="btn btn-success ">Exportar tabla a excel</button>
                </a>
           
            ';
            }
            ?>
        </div>
        <div class="box">
            <!-- id="myTable" -->
            <div class="box-body">
                <table class="table align-middle table-hover table-responsive T">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Carrera</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $resultado = MateriasC::VerMateriasC();
                        foreach ($resultado as $key => $value) {
                            $id = $value["id_carrera"];
                            $columna = "id";
                            $carrera = CarrerasC::verCarreraC($columna, $id);
                            echo '
                                <tr>
                                <td>' . $value["codigo"] . '</td>
                                <td>' . $value["nombre"] . '</td>
                                <td>' . $value["tipo"] . '</td>
                                <td>' . $carrera["nombre"] . '</td>
    
                                <td>
                                    <div class="btn-group">
                                        <a href="http://localhost/Sistema/crear-comisiones/' . $value["id"] . '/' . $value["id_carrera"] . '">
                                            <button class="btn btn-info">Horarios</button>
                                        </a>';
                            if ($_SESSION["rol"] == "Alumno") {
                                $inscrito = MateriasC::VerInscripcionesMaterias2C("id_alumno", $_SESSION["id"]);
                                if ($inscrito == true) {
                                    echo ' 
                                                <a >
                                                    <button class="btn btn-default">No puedes inscribirte</button>
                                                </a>';
                                } else {
                                    echo ' 
                                                <a href="http://localhost/Sistema/inscribir-materia/' . $value["id_carrera"] . '/' . $value["id"] . '">
                                                    <button class="btn btn-primary">Inscribir</button>
                                                </a>';
                                }
                            }
                            if ($_SESSION["rol"] == "Admin") {
                                echo ' 
                                <button class="btn btn-danger btn-sm px-3 EliminarMateria" Mid="' . $value["id"] . '" Cid="'.$value["id_carrera"].'"><i class="fas fa-times"></i></button>
                                    
                                           
                                        ';
                                        

                                        
                            }
                            echo '
                                       
                                    </div>
                                </td>
                            </tr>
                                ';
                        }


                        ?>

                    </tbody>
                </table>
            </div>

        </div>
    </section>
</div>


<!-- Modal -->
<div class="modal fade" id="CrearMateria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Empresa</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-group">
                        <h2>Codigo: </h2>
                        <input type="text" name="codigo" class="form-control " required id="codigo">
                        <h2>Nombre:</h2>
                        <input type="text" name="nombre" class="form-control " required id="nombre">

                    </div>
                    <div class="form-group">

                        <h2>Tipo:</h2>

                        <select class="form-control " name="tipo">

                            <option>Seleccionar...</option>

                            <option value="Servicio_Social">Servicio Social</option>
                            <option value="Residencia_Profecional">Residencia Profecional</option>

                        </select>

                    </div>
                    <div class="form-group">

                        <h2>Carrera:</h2>

                        <select class="form-control input-lg" name="id_carrera">
                            <option>Seleccionar...</option>
                            <?php
                            $carrera =  CarrerasC::verCarrerasC();
                            foreach ($carrera as $key => $verCarreras) {
                                echo '<option value="' . $verCarreras["id"] . '">' . $verCarreras["nombre"] . '</option>';
                            }
                            ?>

                        </select>

                    </div>

                    <button type="submit" class="btn btn-success">Guardar</button>
                    <?php
                    $id_carrera = null;
                    $crearM = new MateriasC();
                    $crearM->CrearMateriaC($id_carrera);
                    ?>
                </form>

            </div>

        </div>
    </div>
</div>

<?php
        $eliminarM = new MateriasC();
        $eliminarM->EliminarMateriaC(null);
?>