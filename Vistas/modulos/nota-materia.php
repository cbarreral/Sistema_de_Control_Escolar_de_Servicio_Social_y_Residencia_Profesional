<?php

$exp = explode("/", $_GET["url"]);
$columna = "id_materia";
$valor = $exp[3];
$nota = MateriasC::VerNotasC($columna, $valor);

if ($_SESSION["rol"] == "Alumno") {
    echo '
    <script>
    window.location ="'.URL_SERVER.'inicio";
    </script>
    ';

    return;
}

?>
<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">


                <form action="" method="post">
                    <?php
                    $exp = explode("/", $_GET["url"]);
                    $columna = "matricula";
                    $comuna2 = "id_carrera";
                    $val = $exp[1];
                    $valor = $exp[2];
                    $valor2 = $exp[3];
                    $materia = MateriasC::VerMaterias2C($comuna2, $val);
                    $estudiante = UsuariosC::VerUsuariosC($columna, $valor);
                    echo '
                        <h4>Carpeta de archivos del estudiante: <b>' . $estudiante["apellido"] . ' ' . $estudiante["nombre"] . '</b></h4>
                        <h4  name="matricula">Matricula: <b>' . $estudiante["matricula"] . '</b></h4>
                        <h4>Lugar: <b>' . $materia["nombre"] . '</b></h4>
                        ';


                    ?>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">

                            <h3>fecha:</h3>
                            <?php
                            $columna = "id";
                            $valor = $exp[3];
                            $notas = DocumentosEcenC::VerDocumentosRepC($columna, $valor);
                            if($_SESSION["rol"]=="a_Academico"){
                                foreach ($notas as $key => $n) {
                                    echo ' 
                               <input type="text" name="fecha" class="input-lg " disabled value="' . $n["fecha"] . '">
                               <input type="hidden" name="id" id="id" class="input-lg "  value="' . $n["id"] . '">
                                
                                <h3>Acesor Academico:</h3>
                                <input type="text" name="" disabled class="input-lg" value="'.$_SESSION["nombre"].' '.$_SESSION["apellido"].'" id="">
                                <input type="text" name="nota_academico"  value="' . $n["nota_academico"] . '" class="input-lg" id="">
                                <br><br>
                                <input type="hidden" name="nota_industrial" value="' . $n["nota_industrial"] . '" class="input-lg" id="">
                                <button class="btn btn-info btn-lg"  type="submit">Guardar</button>
                                ';
                                }
                            }else if($_SESSION["rol"]=="a_Industrial"){
                                foreach ($notas as $key => $n) {
                                    echo ' 
                               <input type="text" name="fecha" class="input-lg " disabled value="' . $n["fecha"] . '">
                               <input type="hidden" name="id" id="id" class="input-lg "  value="' . $n["id"] . '">

                               <input type="hidden" name="nota_academico"  value="' . $n["nota_academico"] . '" class="input-lg" id="">

                                <h3>Accesor Industrial:</h3>
                                <input type="text" name="" disabled class="input-lg" value="'.$_SESSION["nombre"].' '.$_SESSION["apellido"].'" id="">
                                <input type="text" name="nota_industrial" value="' . $n["nota_industrial"] . '" class="input-lg" id="">
                                
                                <br><br>
                                <button class="btn btn-info btn-lg"  type="submit">Guardar</button>
                                ';
                                }
                            }else{
                            foreach ($notas as $key => $n) {
                                echo ' 
                           <input type="text" name="fecha" class="input-lg " disabled value="' . $n["fecha"] . '">
                           <input type="hidden" name="id" id="id" class="input-lg "  value="' . $n["id"] . '">
                            
                            <h3>Acesor Academico:</h3>
                            <input type="text" name="" disabled class="input-lg" value="' . $estudiante["a_academico"] . '" id="">
                            <input type="text" name="nota_academico"  value="' . $n["nota_academico"] . '" class="input-lg" id="">

                            <h3>Accesor Industrial:</h3>
                            <input type="text" name="" disabled class="input-lg" value="' . $estudiante["a_industrial"] . '" id="">
                            <input type="text" name="nota_industrial" value="' . $n["nota_industrial"] . '" class="input-lg" id="">
                            
                            <br><br>
                            <button class="btn btn-info btn-lg"  type="submit">Guardar</button>
                            ';
                            } }?>

                        </div>
                    </div>

                    <?php

                    $actualizarNotas = new DocumentosEcenC();
                    $actualizarNotas->ActualizarNotasC($exp[1], $exp[2]);

                    ?>
                </form>
            </div>
        </div>
    </section>
</div>