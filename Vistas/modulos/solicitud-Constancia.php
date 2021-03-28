<?php

?>
<div class="content-wrapper">
    <section class="content-header">
        
        <h1>Gestor de Constancias / Liberación</h1>
        <h2>Filtrar datos en Tabla</h2>
        <p>Filtra por Apellido, Nombres, Carrera o cualquier otro campo</p>
        <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
    </section>
    <section class="content">

        <!-- Tabla de Reportes y evaluaciones -->

        <div class="box">
            <div class="box-body">
                <p class="text-center">Constancia</p>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Matricula</th>
                            <th>Nombre</th>
                            <th>Carrera</th>
                            <th>Fecha de solicitud</th>
                            <th>Generar Constancia</th>
                            <th>Ver Carpeta</th>
                            <th>PDF</th>
                        
                        </tr>
                    </thead>


                    <tbody id="myTable">
                        <?php
                        $i = 0;
                        $resultado2 = ConstanciaC::VerConstanciaC(null,null);
                       
                            foreach ($resultado2 as $key => $N) {
                                $user = UsuariosC::VerUsuariosC("matricula",$N["matricula"]);
                                $carrera = CarrerasC::verCarreraC("id",$user["id_carrera"]);
                                $i++;
                                if($N["estado"]==2){

                                }else{
                                     echo '
                                            <form method="post">
                                                <tr>
                                                    <td>' . $i . '</td>
                                                    <td>' . $N["matricula"] . '</td>
                                                    <td>' . $user["apellido"] . ' ' . $user["nombre"] . '</td>
                                                    <td>' . $carrera["nombre"] . '</td>
                                                    <td> '.$N["fecha"] . '</td> 
                                                    <td> 
                                                        <input type="hidden" name="matricula" value="'.$N["matricula"].'">
                                                        <input type="hidden" name="id_carrera" value="'.$user["id_carrera"].'">
                                                        <input type="hidden" name="fecha" value="'.$N["fecha"].'">
                                                        <input type="hidden" name="estado" value="2">
                                                        <input type="hidden" name="PDF" value=http://localhost/Sistema/tcpdf/pdf/Constancia.php/' . $N["matricula"] . '">
                                                    <a href="http://localhost/Sistema/tcpdf/pdf/Constancia.php/' . $N["matricula"] . '" target="_blank">
                                                    <button class="btn btn-success" target="_blank""> Generar Constancia</button>
                                                    </a>
                                                    </td>
                                                    <td > <a href="verCarpeta/'.$user["id_carrera"].'/'.$user["matricula"].'" class="btn btn-default">Ver carpeta</a> </td>
                                                ';
                                                if($N["PDF"]!="en espera"){
                                                    echo'<td>Listo <a href="http://localhost/Sistema/tcpdf/pdf/Constancia.php/' . $N["matricula"] . '"> ver PDF</a> </td> ';
                                                }
                                                   echo'
                                                </tr>
                                            </form>
                                        ';
                                }
                              
                                        
                               
                            }
                        
                        $generarConstancia = new ConstanciaC();
                        $generarConstancia->Generar();

                        ?> 

                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
