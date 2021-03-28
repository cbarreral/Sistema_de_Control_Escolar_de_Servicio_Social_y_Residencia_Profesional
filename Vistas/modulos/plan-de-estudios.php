<div class="content-wrapper">
    <section class="content-header">
        <?php
        $columna = "id";
        $valor = $_SESSION["id_carrera"];
        $carrera = carrerasC::VerCarreraC($columna, $valor);
        echo '<h1>plan de estudios: ' . $carrera["nombre"] . '</h1>';
        ?>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Grado</th>
                            <th>Tipo</th>
                            <th>Programa</th>
                            <th>Nota</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $resultado = MateriasC::VerMateriasC();
                        foreach ($resultado as $key => $value) {
                            if ($value["id_carrera"] == $_SESSION["id_carrera"]) {
                                echo '
                                <tr>
                                    <td>'.$value["codigo"].'</td>
                                    <td>'.$value["nombre"].'</td>
                                    <td>'.$value["grado"].'</td>
                                    <td>'.$value["tipo"].'</td>';
                                    if($value["PDF"]!=""){
                                        echo '<td href="'.$value["PDF"].'">Ver PDF</td>';
                                    }else{
                                        echo '<td style="color: red">*No se adjunto PDF</td>';
                                    }
                                    $columna = "id_materia";
                                    $valor = $value["id"];

                                    $nota = MateriasC::VerNotasC($columna, $valor);
                                    foreach ($nota as $key => $N) {
                                        if($N["id_alumno"]==$_SESSION["id"] && $N["id_materia"] == $value["id"]){
                                           
                                            if ($N["estado"] == "Aprobado") {
                                                echo '
                                        <td class="bg-success">'.$N["nota_final"].' - Aprobado</td>';
                                            } else if ($N["estado"] == "Desaprobado") {
                                                echo '
                                        <td class="bg-danger">'.$N["nota_final"].' - Desaprobado</td>';
                                            } else if ($N["estado"] == "Regular") {
                                                echo '
                                        <td class="bg-warning">'.$N["nota_final"].' - Regular</td>';
                                            } else if ($N["estado"] == "Pendiente") {
                                                echo '
                                        <td class="bg-warning">Pendiente por capturar</td>';
                                            } else {
                                                echo '
                                        <td class="bg-info">No se registro una nota</td>';
                                            }
                                        
                                        }
                                    }
                                   echo'
                                </tr>
                           ';
                            }
                        }
                        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>