<?php
if ($_SESSION["rol"] != "Admin") {
    echo '<script>
        window.location = "inicio";
    </script>';
    return;
}
?>
<div class="content-wrapper">
    <section class="content">
        <divbox>
            <div class="box-body">
                <form action="" method="post">
                    <?php
                    $exp = explode("/", $_GET["url"]);
                    $columna = "id";
                    $valor = $exp[2];
                    $materia = MateriasC::VerMaterias2C($columna,$valor);
                    echo '
                    <h1>Crear examen para: <b>'.$materia["nombre"].'</b></h1>
                    <input type="hidden" name="id_materia" value="'.$exp[2].'" id="">
                    <input type="hidden" name="estado" value="1" id="">
                    <input type="hidden" name="id_carrera" value="'.$exp[1].'" id="">
                    ';
                    ?>
                    <div class="row">
                    
                        <div class="col-md-6 col-md-12">
                            <h2>Fecha</h2>
                            <input type="date" class="input-lg" name="fecha" id="">

                            <h2>Hora</h2>
                            <input type="time" class="input-lg" name="hora" id="">
                        </div>

                        <div class="col-md-6 col-md-12">

                            <h2>Profesor</h2>
                            <input type="text" class="input-lg" name="profesor" id="">
                            <h2>Aula</h2>
                            <input type="text" class="input-lg" name="aula" id="">
                            <br><br>
                            <button class="btn btn-info" type="submit">Crear Examen</button>
                        </div>
                    </div>
                    <?php
                    $crearE = new EvaluacionesC();
                    $crearE -> CrearExamenC();
                    ?>
                </form>
            </div>
        </divbox>
    </section>
</div>