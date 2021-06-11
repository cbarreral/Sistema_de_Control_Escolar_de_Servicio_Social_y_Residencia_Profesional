<?php
$user = UsuariosC::VerUsuariosC("matricula", $_SESSION["matricula"]);
if ($user["rol"] != "Admin") {
    echo '
    <script>
    window.location ="' . URL_SERVER . 'inicio";
    </script>
    ';

    return;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <?php

        $exp = explode("/", $_GET["url"]);

        if ($exp[1] == 1) {
            echo '
        <h1>Solicitudes  </h1>
        ';
        } else  if ($exp[1] == 2) {
            echo '
            <h1>Aspirantes Vigentes  </h1>
            ';
        } else {
            echo '
                <h1>Aspirantes Rechazados / Dados de Baja Temporalmente  </h1>
                ';
        }
        ?>

    </section>
    <section class="content">
        <a href="<?php echo URL_SERVER ?>inicio">
            <button class="btn btn-info" style="background-color: #26A69A;">Atrás</button>
        </a>
        <div class="box">
            <div class="box-body">


                <table class="table table-bordered table-hover table-striped">
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
                            $notas = SolicitudResidenciaC::VerSolicitudes("estado", $exp[1]);
                            foreach ($notas as $key => $Solicitud) {
                                $carrera = CarrerasC::verCarreraC("id", $Solicitud["carreraAlumno"]);
                                echo '
                                    <tr>
                                        <td>' . $Solicitud["fechaSolicitud"] . '</td>
                                        <td>' . $Solicitud["periodo"] . '</td>
                                        <td>' . $Solicitud["matricula"] . '</td>
                                        <td>' . $Solicitud["nombreAlumno"] . '</td>
                                        <td>' . $carrera["nombre"] . '</td>
                                        <td>
                                            <a href="' . URL_SERVER . 'detallesSolicitud/' . $Solicitud["id"] . '/' . $exp[1] . '">
                                                <button  class="btn btn-info" style="background-color: #26A69A;" >Ver detalles</button>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                    ';
                            }



                            echo '
</tbody>
</table>    ';

                            ?>

            </div>
        </div>
    </section>
</div>