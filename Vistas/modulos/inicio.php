    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="box">
            <div class="box-header with-border">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Bienvenido al Sistema de Control Escolar
                    </h1>

                </section>

                <!-- Main content -->
                <section class="content">


                    <?php

                    $columna = "id";
                    $valor = 1;

                    $resultado = AjustesC::VerAjustesC($columna, $valor);
                    echo '
            <div class="alert alert-success">Semestre actual:' . $resultado["periodo"] . ' </div>

            <div class="d-flex flex-row mb-2">
                <div class="p-2">
                    <div class="alert alert-primary">
                        <h3>1er"periodo Enero - Mayo</h3>
                        <p>Inicio: ' . $resultado["1_fecha_inicio"] . '</p>
                        <p>Fin: ' . $resultado["1_fecha_fin"] . '</p>
                    </div>
                </div>
                <div class="p-2">
                ';

                if ($resultado["h_evaluacion"] != 0) {
                    echo '
                    <div class="alert alert-warning">
                        <h2>Fechas proximas de evaluaciones y entrega de reportes:</h2>
                        <h3>Desde de:' . $resultado["evaluacion_i"] . '</h3>
                        <h3>Hasta:' . $resultado["evaluacion_f"] . ' </h3>
                    </div>
                </div>

                <div class="p-2"> 
                    <div class="alert alert-danger">
                        <h3>1er"periodo Enero - Mayo</h3>
                        <p>Inicio: ' . $resultado["1_fecha_inicio"] . '</p>
                        <p>Fin: ' . $resultado["1_fecha_fin"] . '</p>
                    </div>
                </div>
                
            </div>
';

                   
    
                    }
                    if ($resultado["h_inscripciones"] != 0) {
                        echo '
                        <div class="alert alert-info">
                            <h2>Fechas para inscribircer a una Institución púbica / Empresa:</h2>
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
                            Control escolar de Residencia profecional y Servicio Social | 20'; echo  date("y"); echo'
                        </div>
';
                    }
                    ?>





            </div>
            <!-- /.box -->

            </section>
            <!-- /.content -->
        </div>