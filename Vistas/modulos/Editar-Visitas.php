<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">
                <he>Retificar datos de visitas de alumno</he>
                <?php
                $fecha = date("d-m-Y H:i:s");
                $exp = explode("/", $_GET["url"]);

                $idVisita = $exp[1];
                $status = $exp[2];

                
                    $estado =$status;
                    $visita = VisitasC::VerVisitasC("id", $idVisita);
                    $alumno = UsuariosC::VerUsuariosC("matricula",$visita["matricula"]);

                    echo'
                    <form method="post">
                        <h3>Alumno:' . $alumno["apellido"] . ' ' . $alumno["nombre"] . '</h3> ';

                    $columna = "id";
                    $valor = $alumno["id_carrera"];

                    $carrera = CarrerasC::verCarreraC($columna, $valor);
                    echo ' <h2>Carrera: ' . $carrera["nombre"] . '</h2> 
                                <h3>Matricula: ' . $alumno["matricula"] . '</h3> 
                                <h4>Fecha actual: ' . $fecha . '</h4> 
                                
                                <input type="hidden" name="id" value="' . $idVisita . '">
                                <input type="hidden" name="matricula" value="' . $alumno["matricula"] . '">
                                <h3>fecha</h3> 
                                <input type="text" name="fecha" value="' . $visita["fecha"] . '">
                                <h3>Hora</h3> 
                                <input type="text" name="hora" value="' . $visita["hora"] . '">
                                <h3>Lugar de encuentro:</h3> 
                                <input type="text" name="lugar" value="' . $visita["lugar"] . '">
                                <h3>Observaciones</h3> 
                                <input type="textarea" name="obser" value="' . $visita["obser"] . '">
                                ';
                  
                    $editarVisita = new VisitasC();
                    $editarVisita->EditarVisitaC($estado);
                    echo '
                    <hr>  
                    <button type="submit" class="btn btn-success">Confirmar</button>
                    </form>';
                
                ?>

            </div>
            
        </div>
    </section>
</div>