
<div class="content-wrapper">
    <section class="content">
        <div class="box">
            <div class="box-body">
                <he>Constancia de alumno</he> 
                <?php
                    $fecha = date("d-m-Y H:i:s");
                    $exp = explode("/",$_GET["url"]);
                   
                    $matricula = $exp[1];

                    if ($_SESSION["rol"]=="Alumno"){ 
                        $id_carrera = $exp[2];
                        $usuario = UsuariosC::VerUsuariosC("matricula",$matricula);
                    echo '
                    <form method="post">
                        <h3>Alumno:'.$usuario["apellido"].' '.$usuario["nombre"].'</h3> ';

                        $columna = "id";
                        $valor = $id_carrera;

                        $carrera = CarrerasC::verCarreraC($columna,$valor);
                        echo' <h2>Carrera: '.$carrera["nombre"].'</h2> 
                                <h3>Matricula: '.$matricula.'</h3> 
                                <h4>Fecha actual: '.$fecha.'</h4> 
                                <input type="hidden" name="matricula" value="'.$matricula.'">
                                <input type="hidden" name="id_carrera" value="'.$id_carrera.'">
                                <input type="hidden" name="fecha" value="'.$fecha.'">
                                <input type="hidden" name="estado" value="1">
                                <input type="hidden" name="PDF" value="en espera">
                                ';
                        $columna="matricula";
                        $valor=$matricula;
                        $solicitado = ConstanciaC::VerConstanciaC($columna,$valor);
                        if($solicitado["estado"]>=1){
                            echo'
                            <h5>Este proceso puede tardar, regresa en otro momento</h5>
                            ';
                        }else{
                            echo'
                            <button type="submit" class="btn btn-success">Solicitar</button>
                            ';
                        }
                        
                            $crearC = new ConstanciaC();
                            $crearC->Solicitar($id_carrera);
                        echo'
                    </form>';
                }
                ?>
   
        <?php
        $promediototal =0;
        $promedio=0;
       
        ?>
        
        
    <section class="content">

        <!-- Tabla de Constancias -->

        <div class="box">
            <div class="box-body">
                <p class="text-center">Constancia</p>
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>N°</th>
                            <th>Acesor Industrial</th>
                            <th>PDF</th>
                            <th>Fecha de solicitud</th>
                        </tr>
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
                               if($_SESSION["rol"]=="Alumno"&&$_SESSION["matricula"]==$user["matricula"]){
                                echo '
                                <form method="post">
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td>' . $user["a_industrial"] . '</td>
                                        ';
                                        if($N["PDF"]!="en espera"){
                                            echo'<td>Listo <a href="http://localhost/Sistema/tcpdf/pdf/Constancia.php/' . $N["matricula"] . '" target="blank" > ver PDF</a> </td> ';
                                        }
                                           
                                        if($N["estado"]==1){
                                            echo'
                                            <td>en proceso</td>
                                            ';
                                        }
                                        echo'
                                        <td>' . $N["fecha"]. '</td>     
                                       
                                    </tr>
                                </form>
                            ';
                               }
                               if($_SESSION["rol"]!="Alumno"&&$exp[1]==$user["matricula"]){
                                echo '
                                <form method="post">
                                    <tr>
                                        <td>' . $i . '</td>
                                        <td>' . $user["a_industrial"] . '</td>
                                        ';
                                        if($N["PDF"]!="en espera"){
                                            echo'<td>Listo <a href="http://localhost/Sistema/tcpdf/pdf/Constancia.php/' . $N["matricula"] . '" target="blank" > ver PDF</a> </td> ';
                                        }
                                           
                                        if($N["estado"]==1){
                                            echo'
                                            <td>en proceso</td>
                                            ';
                                        }
                                        echo'
                                        <td>' . $N["fecha"]. '</td>     
                                       
                                    </tr>
                                </form>
                            ';
                               }
                                           
                            
                            }
                        ?> 

                    </tbody>
                </table>
            </div>
        </div>

    </section>  

              
            </div>
        </div>
    </section>
</div>