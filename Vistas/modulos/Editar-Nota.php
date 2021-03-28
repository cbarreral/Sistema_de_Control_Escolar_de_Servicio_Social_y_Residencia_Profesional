<?php
if ($_SESSION["rol"] != "Admin") {
    echo '
    <script>
    window.location ="inicio";
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
                        $exp = explode("/",$_GET["url"]);
                        $columna = "matricula";
                        $comuna2 = "id";
                        $valor = $exp[2];
                        $valor2 = $exp[1];
                        $materia = MateriasC::VerMaterias2C($comuna2,$valor2);
                        $estudiante = UsuariosC::VerUsuariosC($columna,$valor);
                        echo'
                        <h4>Carpeta de archivos del estudiante: <b>'.$estudiante["apellido"].' '.$estudiante["nombre"].'</b></h4>
                        <h4  name="matricula">Matricula: <b>'.$estudiante["matricula"].'</b></h4>
                        <h4>Lugar: <b>'.$materia["nombre"].'</b></h4>
                        ';
                        echo '
                        <input type="hidden" name="id_alumno"value="'.$estudiante["id"].'" class="" id="">
                        <input type="hidden" name="matricula"value="'.$estudiante["matricula"].'" class="" id="">
                        <input type="hidden" name="id_carrera"value="'.$exp[1].'" class="" id="">
                        <input type="hidden" name="id_materia"value="'.$materia["id"].'" class="" id="">
                        
                        ';

                    ?>

                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                        <?php 
                            $columna ="id";
                            $valor = $exp[3];

                            $resultado = MateriasC::VerNotas2C($columna, $valor);
                            
                             
                                echo '
                                <input type="text" name="nota_id" class="input-lg" id="" value="'.$resultado["id"].'">
    
                                <h3>fecha:</h3>
                                <input type="date" name="fecha" class="input-lg" id="" value="'.$resultado["fecha"].'">
    
                                <h3>Acesor Academico:</h3>
                                <input type="text" name="a_academico" class="input-lg" value="'.$resultado["a_academico"].'">
                                <input type="text" name="nota_academico" class="input-lg" value="'.$resultado["nota_academico"].'">
    
                                <h3>Accesor Industrial:</h3>
                                <input type="text" name="a_industrial" class="input-lg" value="'.$resultado["a_industrial"].'">
                                <input type="text" name="nota_industrial" class="input-lg" value="'.$resultado["nota_industrial"].'">
                                
                                </div>

                                <div class="col-md-6">
                                    <h3>Estado Actual: <b>'.$resultado["estado"].'</b></h3>
                                    <select name="estado" id="">
                                        <option value="">Seleccionar</option>
                                        <option value="Aprobado">Aprobado</option>
                                        <option value="Regular">Regular</option>
                                        <option value="Desaprobado">Desaprobado</option>
                                        <option value="Pendiente">Pendiente</option>
                                    </select>
                                    <h3>Nota Final:</h3>
                                    <input type="text" name="nota_final" class="input-lg" id="" value="'.$resultado["nota_final"].'">
                                ';
                                # code...
                            
                            ?>
                         
                      
                            <br><br>
                            <button class="btn btn-info btn-lg" type="submit">Guardar</button>
                        </div>
                    </div>

                    <?php 
                    $notas = new MateriasC();
                    $notas ->CambiarNotasC();
                    ?>
                </form>
            </div>
        </div>
    </section>
</div>