<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">

            <form  method="post">
                <?php 
                $exp = explode("/",$_GET["url"]);
                $columna = "id";
                $valor = $exp[2];
                $materia = MateriasC::VerMaterias2C($columna,$valor);

                $ins = MateriasC::VerInscripcionesMaterias2C("id_alumno",$_SESSION["id"]);

                echo'<h2>Inscribirse a : <b>'.$materia["nombre"].'</b></h2>
                <input type="hidden" name="id_alumno" value="'.$_SESSION["id"].'" id="">
                <input type="hidden" name="id_materia" value="'.$materia["id"].'" id="">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <h2>Codigo: '.$materia["codigo"].'</h2>
                        <h2>Grado : '.$materia["grado"].'</h2>
                        <h2>inscrito : '.$ins["id"].'</h2>
                        
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <h2>Tipo: '.$materia["tipo"].'</h2>
                        <p style="color:red">*Solo se puede incribir en una sola comision por unica vez*</p>
                        ';
                        $columna = "id_materia";
                        $valor = $exp[2];
                        $comisiones = MateriasC::VerComisionesC($columna, $valor);

                        foreach ($comisiones as $key => $value) {

                            $columna = "id_comision";
                            $valor = $value["id"];

                            $insc = MateriasC::VerInscripcionesMateriasC($columna,$valor);

                            if(count($insc) < $value["c_maxima"]){

                                $lugares = ($value["c_maxima"] - count($insc));

                            echo '<input type="radio" name="id_comision" value="'.$value["id"].'" required>'.$value["horas"].' - '.$value["horario"].' - Lugares: '.$lugares.' <br>';

                            }
                            

                        }

                        
                        if($ins["id"]==16){
                            echo'<p>Ya estas inscrito a una institucion</p> ';
                        }else{
                            echo'<button class="btn btn-info" type="submit">Inscribirse</button> ';
                        }
                ?>


                        <br><br>
                
                       
                        <?php
                        $incribir = new MateriasC();
                        $incribir -> InscribirMateriaC();
                        ?>
                    </div>
                    
                </div>
            </form>

            </div>
        </div>
    </section>
</div>