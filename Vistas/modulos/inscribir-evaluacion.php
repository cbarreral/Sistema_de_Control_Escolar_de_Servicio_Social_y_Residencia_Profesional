<?php

$exp = explode("/", $_GET["url"]);

if ($_SESSION["id_carrera"] != $exp[1]) {

    echo '<script>

	window.location = "http://localhost/Sistema/inicio";
	</script>';

    return;
}

$columna = "id_materia";
$valor = $exp[2];
?>
<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="" method="post">
                    <?php
                    $columna = "id";    
                    $valor = $exp[2];

                    $resultado = EvaluacionesC::VerExamenC($columna, $valor);

                    $columna = "id";
                    $valor = $resultado["id_materia"];

                    $materia = MateriasC::VerMaterias2C($columna, $valor);
                    echo '
                <h2>Inscribirse a el examen para <b>' . $materia["nombre"] . '</b></h2>
                <input type="text" name="id_alumno" value="'.$_SESSION["id"].'" id="">
                <input type="text" name="id_carrera" value="'.$_SESSION["id_carrera"].'" id="">
                <input type="text" name="id_examen" value="'.$resultado["id"].'" id="">
                <input type="text" name="matricula" value="'.$_SESSION["matricula"].'" id="">

                <div class="row">
                    <div class="col-md-6 col-md-12">
                        <h2>Fecha:'.$resultado["fecha"].'</h2>
                        <h2>Hora:'.$resultado["hora"].'</h2>
                    </div>

                    <div class="col-md-6 col-md-12">
                        <h2>Profesor:'.$resultado["profesor"].'</h2>
                        <h2>Aula:'.$resultado["aula"].'</h2>

                        <br> <br>

                        <button type="submit"class="btn btn-success btn-lg">Inscribirse</button>
                    </div>
                </div>
                ';
                $Iexamen = new EvaluacionesC();
                $Iexamen ->InscribirseExamenC();
                    ?>
                </form>
            </div>
        </div>
    </section>
</div>