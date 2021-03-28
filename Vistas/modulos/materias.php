<div class="content-wrapper">
    <section class="content-header">
        <?php
        $columna = "id";
        $valor = $_SESSION["id_carrera"];
        $materias = CarrerasC::VerCarreraC($columna, $valor);
        echo '
        <h1>Catalogo habilitado para :' . $materias["nombre"] . ' </h1>
        ';
        ?>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <?php
                $columna = "id";
                $valor = 1;
                $ajustes = AjustesC::VerAjustesC($columna, $valor);
                if ($ajustes["h_inscripciones"] != 0) {
                    echo '
                    <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>';
                    $columna = "id_alumno";
                    $valor = $_SESSION["id"];
                    $notas = MateriasC::VerNotasC($columna, $valor);
                    foreach ($notas as $key => $N) {
                        if ($N["estado"] == "Aprobado" || $N["estado"] == "Regular") {
                            $columna = "id";
                            $valor = $N["id_materia"];

                            $resultado = MateriasC::VerMaterias2C($columna, $valor);
                            if ($ajustes["periodo"] == "Agosto - Diciembre") {
                                if ($resultado["tipo"] != "Agosto - Diciembre") {
                                    echo '
                                    <tr>
                                        <td>' . $resultado["codigo"] . '</td>
                                        <td>' . $resultado["nombre"] . '</td>
                                        <td>' . $resultado["grado"] . '</td>
                                        <td>' . $resultado["tipo"] . '</td>
                                        <td>
                                            <a href="http://localhost/Sistema/inscribir-materia/'.$_SESSION["id_carrera"].'/'.$resultado["id"].'">
                                                <button  class="btn btn-info">Ver detalles</button>
                                            </a>
                                        </td>
                                    </tr>
                                    ';
                                }
                            }else{
                                
                                    if ($resultado["tipo"] == "Agosto - Diciembre") {
                                        echo '
                                        <tr>
                                            <td>' . $resultado["codigo"] . '</td>
                                            <td>' . $resultado["nombre"] . '</td>
                                            <td>' . $resultado["grado"] . '</td>
                                            <td>' . $resultado["tipo"] . '</td>
                                            <td>
                                                <a href="http://localhost/Sistema/inscribir-materia/'.$_SESSION["id_carrera"].'/'.$resultado["id"].'">
                                                    <button  class="btn btn-info">Ver detalles</button>
                                                </a>
                                            </td>
                                        </tr>
                                        ';
                                    }
                                
                            }
                        }
                    }
                    echo '
</tbody>
</table>    ';
                } else {
                    echo '<div class="alert alert-warning"> Aún no estan habilitadas las fechas de incripciones</div>';
                }
                ?>

            </div>
        </div>
    </section>
</div>