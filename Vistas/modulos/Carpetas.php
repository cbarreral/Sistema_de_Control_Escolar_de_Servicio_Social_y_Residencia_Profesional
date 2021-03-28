
<div class="content-wrapper">

    <div class="content-header">
    <?php
if($_SESSION["rol"]!="Alumno"){
    echo '<h2>Carpetas de los alumnos</h2>
    <p>Filtra por Apellido, Nombres, Carreras o cualquier otro campo</p>  
    <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
    <!-- id="myTable" -->';
}
?>
<br>
        <ul class="nav nav-pills mb-3" role="tablist">
            <li class="nav-item active">
                <a class="nav-link " id="Servicio_button" data-toggle="pill" href="#Servicio" role="tab" aria-controls="Servicio" aria-expanded="true">Servicio Social</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="Residencia_button" data-toggle="pill" href="#Residencia" role="tab" aria-controls="Residencia" aria-expanded="true">Residencia Profecional</a>
            </li>
        </ul>
    </div>



    <div class="box content">
        <div class="tab-content">

            <div class="tab-pane fade active in" id="Servicio" role="presentation" aria-labelledby="Servicio_button">
                <div role=" tabpanel" class="tab-pane">
                    <section class="content">


                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Matricula</th>
                                            <th>Apellido y Nombre</th>
                                            <th>Carrera</th>
                                            <th>Carpeta</th>
                                            <th>Certificado</th>
                                            <th>visitas</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php

                                        $columna = null;
                                        $valor = null;
                                        $suma = 1;
                                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                                        
                                        foreach ($resultado as $key => $value) {
                                            $Constancia = ConstanciaC::VerConstanciaC("matricula",$value["matricula"]);
                                            $col = "id";
                                            $id_carrera = $value["id_carrera"];
                                            $carrera = CarrerasC::verCarreraC($col, $id_carrera);
                                            if ($value["rol"] == "Alumno" && $value["tipo"] == "Servicio Social" || $value["rol"] == "Alumno" && $value["tipo"] == "Servicio_social") {
                                                if ($_SESSION["rol"] == "Alumno" && $_SESSION["matricula"] == $value["matricula"] && $value["id_carrera"]==$_SESSION["id_carrera"]) {
                                                   
                                                    echo '
                                                    <tr>
                                                        <td>' . $suma . '</td>
                                                        <td>' . $value["matricula"] . '</td>
                                                        <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                        <td>' . $carrera["nombre"] . '</td>
                                                        
                                                        
                                                        <td>
                                                            <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                <button class="btn btn-info">Carpeta de archivos</button>
                                                            </a>
                                                        </td>';
                                                        if($Constancia["estado"]==2){
                                                           echo'<td>
                                                           <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '" >
                                                           <button class="btn btn-success" >Constancia</button>
                                                           </a>
                                                       </td>
                                                    </tr>  ';
                                                }
                                                    $suma = ($key + 1);
                                                }
                                                if ($_SESSION["rol"] != "Alumno") {
                                                    if($_SESSION["rol"]=="a_Academico" && $value["a_academico"]==$_SESSION["nombre"]){
                                                        echo '
                                                        <tr>
                                                            <td>' . $suma . '</td>
                                                            <td>' . $value["matricula"] . '</td>
                                                            <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                            <td>' . $carrera["nombre"] . '</td>
                                                            
                                                            
                                                            <td>
                                                                <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                    <button class="btn btn-info">Carpeta de archivos</button>
                                                                </a>
                                                            </td>';
                                                            if($Constancia["estado"]==2){
                                                               echo'<td>
                                                               <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '" >
                                                               <button class="btn btn-success" >Constancia</button>
                                                               </a>
                                                           </td>
                                                        </tr>  ';
                                                    }
                                                    $suma = ($key + 1);
                                                    } else  if($_SESSION["rol"]=="a_Industrial" && $value["a_industrial"]==$_SESSION["nombre"]){
                                                        echo '
                                                        <tr>
                                                            <td>' . $suma . '</td>
                                                            <td>' . $value["matricula"] . '</td>
                                                            <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                            <td>' . $carrera["nombre"] . '</td>
                                                            
                                                            
                                                            <td>
                                                                <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                    <button class="btn btn-info">Carpeta de archivos</button>
                                                                </a>
                                                            </td>';
                                                            if($Constancia["estado"]==2){
                                                               echo'<td>
                                                               <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '" >
                                                               <button class="btn btn-success" >Constancia</button>
                                                               </a>
                                                           </td>
                                                        </tr>  ';
                                                    }
                                                    $suma = ($key + 1);
                                                    }else if($_SESSION["rol"]=="Jefe" && $value["id_carrera"]==$_SESSION["id_carrera"]){
                                                        echo '
                                                        <tr>
                                                            <td>' . $suma . '</td>
                                                            <td>' . $value["matricula"] . '</td>
                                                            <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                            <td>' . $carrera["nombre"] . '</td>
                                                            
                                                            
                                                            <td>
                                                                <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                    <button class="btn btn-info">Carpeta de archivos</button>
                                                                </a>
                                                            </td>';
                                                            if($Constancia["estado"]==2){
                                                               echo'<td>
                                                               <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '" >
                                                               <button class="btn btn-success" >Constancia</button>
                                                               </a>
                                                           </td>
                                                        </tr>  ';
                                                    }
                                                    $suma = ($key + 1);
                                                    }if($_SESSION["rol"]=="Admin"){
                                                        echo '
                                                        <tr>
                                                            <td>' . $suma . '</td>
                                                            <td>' . $value["matricula"] . '</td>
                                                            <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                            <td>' . $carrera["nombre"] . '</td>
                                                            
                                                            
                                                            <td>
                                                                <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                    <button class="btn btn-info">Carpeta de archivos</button>
                                                                </a>
                                                            </td>';
                                                            if($Constancia["estado"]==2){
                                                               echo'<td>
                                                               <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '" >
                                                               <button class="btn btn-success" >Constancia</button>
                                                               </a>
                                                           </td>
                                                        </tr>  ';
                                                    }
                                                    $suma = ($key + 1);
                                                    }
                                                    
                                                }
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
            <div class="tab-pane fade" id="Residencia" role="presentation" aria-labelledby="Residencia_button">

                <div role="tabpanel" class="tab-pane" id="">
                    <section class="content">


                        <div class="box">
                            <div class="box-body">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>N°</th>
                                            <th>Matricula</th>
                                            <th>Apellido y Nombre</th>
                                            <th>Carrera</th>

                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php

                                        $columna = null;
                                        $valor = null;
                                        $suma = 1;
                                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                                        foreach ($resultado as $key => $value) {
                                            $col = "id";
                                            $id_carrera = $value["id_carrera"];
                                            $carrera = CarrerasC::verCarreraC($col, $id_carrera);
                                            if ($value["rol"] == "Alumno" && $value["tipo"] == "Residencia Profecional" || $value["rol"] == "Alumno" && $value["tipo"] == "Residencia_profecional") {
                                                if ($_SESSION["rol"] == "Alumno" && $_SESSION["matricula"] == $value["matricula"]) {

                                                    echo '
                                                <tr>
                                                    <td>' . $suma . '</td>
                                                    <td>' . $value["matricula"] . '</td>
                                                    <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                    <td>' . $carrera["nombre"] . '</td>
                                                    
                                                    <td>
                                                        <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                            <button class="btn btn-info">Carpeta de archivos</button>
                                                        </a>
                                                    </td>';
                                                    if($Constancia["estado"]==2){
                                                       echo'<td>
                                                       <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '" >
                                                       <button class="btn btn-success" >Constancia</button>
                                                       </a>
                                                   </td>
                                                </tr>  ';
                                            }
                                                    $suma = ($key + 1);
                                                }
                                                if ($_SESSION["rol"] != "Alumno") {

                                                    echo '
                                                    <tr>
                                                        <td>' . $suma . '</td>
                                                        <td>' . $value["matricula"] . '</td>
                                                        <td>' . $value["apellido"] . " " . $value["nombre"] . '</td>
                                                        <td>' . $carrera["nombre"] . '</td>
                                                        
                                                        <td>
                                                            <a href="http://localhost/Sistema/verCarpeta/' . $value["id_carrera"] . '/' . $value["matricula"] . '">
                                                                <button class="btn btn-info">Carpeta de archivos</button>
                                                            </a>
                                                        </td>';
                                                        if($Constancia["estado"]==2){
                                                           echo'<td>
                                                           <a href="http://localhost/Sistema/constancia-alumno/' . $value["matricula"] . '" >
                                                           <button class="btn btn-success" >Constancia</button>
                                                           </a>
                                                       </td>
                                                    </tr>  ';
                                                }
                                                    $suma = ($key + 1);
                                                }
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
        </div>
    </div>
</div>