<div class="content-wrapper">
    <section class="content-header">
        <?php
        $promediototal =0;
        $promedio=0;

        ?>
        
        <h2>Filtrar datos en Tabla</h2>
        <p>Filtra por Apellido, Nombres, Carrera o cualquier otro campo</p>
        <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
    </section>
    <section class="content">

        <!-- Tabla de Reportes y evaluaciones -->

        <div class="box">
            <div class="box-body">
                <p class="text-center">Evaluaciones</p>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Tipo</th>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Fecha</th>
                            <th>Promedio por parcial</th>
                            <th>Marcar</th>
                            <th></th>
                        </tr>
                        </tr>
                    </thead>


                    <tbody id="myTable">
                        <?php
                        $i = 0;
                        $resultado2 = DocumentosEcenC::VerDocumentosRepC(null,null);
                       
                            foreach ($resultado2 as $key => $N) {
                                $user = UsuariosC::VerUsuariosC("matricula",$N["matricula"]);
                                $carrera = CarrerasC::verCarreraC("id",$user["id_carrera"]);
                                $i++;
                                if(!$N["nota_industrial"]==0||!$N["nota_academico"]==0){
                                    if($_SESSION["rol"]=="Admin"){
                                        if($N["revisadoJefe"]>=1&&$N["revisadoAdmin"]==0){
                                            echo '
                                            <form method="post">
                                                <tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $user["tipo"] . '</td>
                                                    <td>' . $N["matricula"] . '</td>
                                                    <td>' . $user["apellido"] . ' ' . $user["nombre"] . '</td>
                                                    <td>' . $carrera["nombre"] . '</td>
                                                    <td> '.$N["fecha"] . '</td> 
                                                    <td > '.$N["promedioFinal"] . '</td>
                                                    <td> 
                                                    <input type="hidden" name="nota_industrial" value="'.$N["nota_industrial"] . '">
                                                    <input type="hidden" name="nota_academico" value="'.$N["nota_academico"] . '">
                                                    <input type="hidden" name="promedioFinal" value="'.$N["promedioFinal"] . '">
                                                    <input type="hidden" name="fecha" value="'.$N["fecha"] . '">
                                                    <input type="hidden" name="id" value="'.$N["id"] . '">

                                                    <input type="hidden" name="revisadoJefe" value="2">
                                                    <input type="hidden" name="revisadoAdmin" value="1">
                                                        <button class="btn btn-success"  type="submit">Marcar como hecho</button>
                                                    </td>
                                                    <td > <a href="verCarpeta/'.$user["id_carrera"].'/'.$user["matricula"].'" class="btn btn-default">Ver carpeta</a> </td>
                                                
                                                </tr>
                                            </form>
                                        ';
                                        }
                                    }else if($_SESSION["rol"]=="Jefe"){
                                        if($N["revisadoJefe"]==0&&$N["revisadoAdmin"]==0){
                                            echo '
                                            <form method="post">
                                                <tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $user["tipo"] . '</td>
                                                    <td>' . $N["matricula"] . '</td>
                                                    <td>' . $user["apellido"] . ' ' . $user["nombre"] . '</td>
                                                    <td>' . $carrera["nombre"] . '</td>
                                                    <td> '.$N["fecha"] . '</td> 
                                                    <td > '.$N["promedioFinal"] . '</td>
                                                    
                                                    <td> 
                                                    <input type="hidden" name="nota_industrial" value="'.$N["nota_industrial"] . '">
                                                    <input type="hidden" name="nota_academico" value="'.$N["nota_academico"] . '">
                                                    <input type="hidden" name="promedioFinal" value="'.$N["promedioFinal"] . '">
                                                    <input type="hidden" name="fecha" value="'.$N["fecha"] . '">
                                                    <input type="hidden" name="id" value="'.$N["id"] . '">

                                                    <input type="hidden" name="revisadoJefe" value="1">
                                                    <input type="hidden" name="revisadoAdmin" value="0">
                                                        <button class="btn btn-success"  type="submit">Marcar como hecho</button>
                                                    </td>
                                                    <td > <a href="verCarpeta/'.$user["id_carrera"].'/'.$user["matricula"].'" class="btn btn-default">Ver carpeta</a> </td>
                                                </tr>
                                            </form>
                                        ';
                                        }
                                    }


                                  
                                }
                               
                            }
                        
                        $actualizarNotas = new DocumentosEcenC();
                        $actualizarNotas->ActualizarNotasC(null,null);

                        ?> 

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
