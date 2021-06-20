<section class="content" style="background-color: white;">

    <div class="box">
        <div class="box-body">
        <table class="table table-bordered table-hover table-striped T">
                                <thead>
                                    <tr>
                                        <th>Fecha de solicitud</th>
                                        <th>Periodo</th>
                                        <th>Matricula</th>
                                        <th>Nombre</th>
                                        <th>Carrera</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody> <?php


                                        $respuestaVer = SolicitudResidenciaC::VerEstudiantesC();

                                        foreach ($respuestaVer as $key => $value) {
                                            $status = SolicitudResidenciaC::VerSolicitud("matricula", $value["matricula"]);

                                            if ($value["matricula"] != $status["matricula"]) {

                                                $carrera = CarrerasC::verCarreraC("id", $value["id_carrera"]);

                                                echo ' <tr>
                                                <td>' . $value["fechaRegistro"] . '</td>
                                                <td>' . $value["periodo"] . '</td>
                                                <td>' . $value["matricula"] . '</td>
                                                <td>' . $value["nombre"] . '</td>
                                                <td>' . $carrera["nombre"] . '</td>
                                                <td>
                                                    <a href="' . URL_SERVER . 'verSolicitudes/' . $value["matricula"] . '/">
                                                        <button  class="btn btn-info" style="background-color: #26A69A;" >Ver detalles</button>
                                                    </a>
                                                </td>
                                                
                                            </tr>';
                                            }
                                        }




                                        echo '
                            </tbody>
                            </table>    ';

                                        ?>

        </div>
    </div>
</section>