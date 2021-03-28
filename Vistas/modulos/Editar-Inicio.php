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

                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <?php
                        $columna = "id";
                        $valor = 1;

                        $resultado = AjustesC::VerAjustesC($columna, $valor);
                        echo '
                        <h2>Periodo Actual: ' . $resultado["periodo"] . ' </h2>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-primary">1er Periodo</button>
                            <input type="hidden" name="PeriodoA" value="Enero - Mayo" id="">';
                            $periodo = new AjustesC();
                            $periodo ->CambiarPeriodoC();
                            //$valor = 1;
echo'
                        </form>
                        <br>
                        <form action="" method="post">
                            <button type="submit" class="btn btn-success">2do Periodo</button>
                            <input type="hidden" name="PeriodoA" value="Agosto - Diciembre" id="">';
                            $periodo = new AjustesC();
                            $periodo ->CambiarPeriodoC();
                           // $valor = 2;
echo'

                        </form>
                        <br>
                        <form action="" method="post">
                            <h2>Periodo Ene-Mayo</h2>
                            <h3>inicio</h3>
                            <input type="text" class="input-lg" name="1_fecha_inicio" value="' . $resultado["1_fecha_inicio"] . ' " id="">
                            <h3>fin</h3>
                            <input type="text" class="input-lg" name="1_fecha_fin" value="' . $resultado["1_fecha_fin"] . ' " id="">
                            <br>

                            <h2>Periodo Ago-Dic</h2>
                            <h3>inicio</h3>
                            <input type="text" class="input-lg" name="2_fecha_inicio" value="' . $resultado["2_fecha_inicio"] . ' " id="">
                            <h3>fin</h3>
                            <input type="text" class="input-lg" name="2_fecha_fin" value="' . $resultado["2_fecha_fin"] . ' " id="">
                    </div>
                    <div class="col-xs-12 col-md-6">
                        <br>
                        <h2>Fechas proximas de evaluaciones y entrega de reportes</h2>
                        <h3>inicio</h3>
                        <input type="text" class="input-lg" name="evaluacion_i" value="' . $resultado["evaluacion_i"] . ' " id="">

                        <h3>fin</h3>
                        <input type="text" class="input-lg" name="evaluacion_f" value="' . $resultado["evaluacion_f"] . ' " id="">
                        <br>
                        <h2>Fechas Para inscribirce</h2>
                        <h3>inicio</h3>
                        <input type="text" class="input-lg" name="inscripciones_i" value="' . $resultado["inscripciones_i"] . ' " id="">
                        <h3>fin</h3>
                        <input type="text" class="input-lg" name="inscripciones_f" value="' . $resultado["inscripciones_f"] . ' " id="">
                    </div>
    
                   

                        <br><br>
                        <h4>Guardar Cambios </h4>
                        <button type="submit" class="btn btn-success ">Guardar Cambios</button>
                        ';

                        $guardarAjustes = new AjustesC();
                        $guardarAjustes ->ActualizarAjustesC();
                        ?>
                        </form>
                    </div>
                </div>
            </div>
    </section>
</div>