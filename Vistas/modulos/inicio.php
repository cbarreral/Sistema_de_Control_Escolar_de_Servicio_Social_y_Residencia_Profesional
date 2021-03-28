    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Bienvenido al Sistema de Control Escolar
            </h1>

        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <?php

                    $columna = "id";
                    $valor = 1;

                    $resultado = AjustesC::VerAjustesC($columna, $valor);
                    echo '
                <h3>Semestre actual:' . $resultado["periodo"] . ' </h3>

                </div>
                <div class="box-body">

                    <div class="col-md-6 col-xs-12">
                        <h2>1er"periodo Enero - Mayo</h2>
                        <h3>Inicio: ' . $resultado["1_fecha_inicio"] . '</h3>
                        <h3>Fin: ' . $resultado["1_fecha_fin"] . '</h3>

                        <hr>

                        <h2>2do"periodo Agosto - Diciembre</h2>
                        <h3>Inicio: ' . $resultado["2_fecha_inicio"] . '</h3>
                        <h3>Fin: ' . $resultado["2_fecha_fin"] . '</h3>
                    </div>
                    ';

                    if ($resultado["h_evaluacion"] != 0) {
                        echo '
                        <div class="col-md-6 col-xs-12 bg-success">
                        <h2>Fechas proximas de evaluaciones y entrega de reportes:</h2>
                        <h3>Desde de:' . $resultado["evaluacion_i"] . '</h3>
                        <h3>Hasta:' . $resultado["evaluacion_f"] . ' </h3>
                        

                    </div>
                        ';
                    }
                    if ($resultado["h_inscripciones"] != 0) {
                        echo '
                        <div class="col-md-6 col-xs-12 bg-info">
                        <h2>Fechas para inscribircer a Recidencia:</h2>
                        <h3>Desde de:' . $resultado["inscripciones_i"] . '</h3>
                        <h3>Hasta:' . $resultado["inscripciones_f"] . ' </h3>
                    
                    </div>

                        ';
                    }
                    if ($_SESSION["rol"] == "Admin") {


                        echo '
                 
                    <div class="box-footer">
                    <a href="Editar-Inicio">
                    <button class="btn btn-success btn-lg">Editar</button>
                    </a>
                    </div>
                
                </div>
                <div class="box-footer">
                    Control escolar de Residencia profecional y Servicio Social | 2021
                </div>
                ';
                    }
                    ?>
                    <!-- /.box-footer-->

                </div>
                <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>