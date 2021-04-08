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
        <h1>Modificar Fechas</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">

               
                        <?php
                        $columna = "id";
                        $valor = 1;

                        $resultado = AjustesC::VerAjustesC($columna, $valor);
                        if($resultado["periodo"]=="Enero - Mayo"){
                            echo '
                            <div class="alert alert-info">
                             <h2>Periodo Actual: ' . $resultado["periodo"] . '  ' . $resultado["1_fecha_inicio"] . ' a ' . $resultado["1_fecha_fin"] . '</h2>
                            </div>';
                        }
                        if($resultado["periodo"]=="Agosto - Diciembre"){
                            echo '
                            <div class="alert alert-success">
                             <h2>Periodo Actual: ' . $resultado["periodo"] . '  ' . $resultado["2_fecha_inicio"] . ' a ' . $resultado["2_fecha_fin"] . '</h2>
                            </div>';
                        }
                      echo'
                <div class="row">
                    <div class="col-md">
                        <form action="" method="post">
                            <button type="submit" class="btn btn-primary">1er Periodo</button>
                            <input type="hidden" name="PeriodoA" class="form-control" value="Enero - Mayo" id="">';
                        $periodo = new AjustesC();
                        $periodo->CambiarPeriodoC();
                        //$valor = 1;
                        echo '
                        </form>
                        <br>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-success">2do Periodo</button>
                            <input type="hidden" name="PeriodoA" class="form-control" value="Agosto - Diciembre" id="">';
                        $periodo = new AjustesC();
                        $periodo->CambiarPeriodoC();
                        // $valor = 2;
                        echo '

                        </form>
                        <hr><br>
                        <form action="" method="post">
                            

                            <div class="row mb-4">
                            <h2>Periodo Ene-Mayo</h2>
                                <div class="col">
                                    <div class="form-outline"><label class="form-label" for="form3Example1">Inicio</label>
                                        <input type="date" id="form3Example1" name="1_fecha_inicio" value="' . $resultado["1_fecha_inicio"] . ' " class="form-control" />
                                        
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-outline"><label class="form-label" for="form3Example2">Fin</label>
                                        <input type="date" id="form3Example2" name="1_fecha_fin" value="' . $resultado["1_fecha_fin"] . ' " class="form-control" />
                                        
                                    </div>
                                </div>
                                <hr><br>
                                <h2>Periodo Ago-Dic</h2>

                                <div class="col">
                                <div class="form-outline"><label class="form-label" for="form3Example1">Inicio</label>
                                    <input type="date" id="form3Example1" name="2_fecha_inicio" value="' . $resultado["2_fecha_inicio"] . ' " class="form-control" />
                                    
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-outline"><label class="form-label" for="form3Example2">Fin</label>
                                    <input type="date" id="form3Example2" name="2_fecha_fin" value="' . $resultado["2_fecha_fin"] . ' " class="form-control" />
                                    
                                </div>
                            </div>

                    </div>



                            
                           
                   

                    <hr><br>
                    <div class="row mb-4">
                    <h2>Fechas proximas de evaluaciones y entrega de reportes</h2>
                        <div class="col">
                            <div class="form-outline"><label class="form-label" for="form3Example1">Inicio</label>
                                <input type="date" id="form3Example1" name="evaluacion_i" value="' . $resultado["evaluacion_i"] . ' " class="form-control" />
                                
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-outline"><label class="form-label" for="form3Example2">Fin</label>
                                <input type="date" id="form3Example2" name="evaluacion_f" value="' . $resultado["evaluacion_f"] . ' " class="form-control" />
                                
                            </div>
                        </div>
                        <hr><br>
                        <h2>Fechas Para inscribirce</h2>

                        <div class="col">
                        <div class="form-outline"><label class="form-label" for="form3Example1">Inicio</label>
                            <input type="date" id="form3Example1"name="inscripciones_i" value="' . $resultado["inscripciones_i"] . ' " class="form-control" />
                            
                        </div>
                    </div>

                    <div class="col">
                        <div class="form-outline"><label class="form-label" for="form3Example2">Fin</label>
                            <input type="date" id="form3Example2"name="inscripciones_f" value="' . $resultado["inscripciones_f"] . ' " class="form-control" />
                            
                        </div>
                    </div>

            </div>


                        <br><br>
                       
                        <button type="submit" class="btn btn-success ">Guardar Cambios</button>
                       
                       
                        ';

                        $guardarAjustes = new AjustesC();
                        $guardarAjustes->ActualizarAjustesC();
                        ?>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>