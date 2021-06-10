
<?php

if($_SESSION["rol"] != "Admin"){
    echo '<script>

                window.location = "'.URL_SERVER.'inicio";

                </script>';
                return;
}
?>


<div class="content-wrapper">
    <section class="content-header">
        <?php 
        $exp =explode("/",$_GET["url"]);
        $columnaC = "id";
        $valorC = $exp[1];
        $carrera = CarrerasC::verCarreraC($columnaC, $valorC);
        echo '
        <a href="'.URL_SERVER.'carreras">
                     <button class="btn btn-primary"> Volver </button>
         </a>
         <br> <br>
        <h1>Estudiantes de: ' . $carrera["nombre"] . '</h1>
        <br>
        <button class="btn btn-danger ">Exportar a PDF</button>
        <button class="btn btn-success ">Exportar tabla a excel</button>

        ';
        ?>
    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Matricula</th>
                            <th>Apellido y Nombre</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    
                        $columna = null;
                        $valor = null;
                        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
                        foreach ($resultado as $key => $value) {

                            if($value["id_carrera"]==$exp[1] && $value["rol"]=="Alumno"){
                                 echo '
                        <tr>
                            <td>' . $value["matricula"] .'</td>
                            <td>' . $value["apellido"] ." ". $value["nombre"] .'</td>
                            
                            <td>
                                <a href="'.URL_SERVER.'verCarpeta/'.$value["id_carrera"].'/'.$value["matricula"].'">
                                    <button class="btn btn-info">Carpeta de archivos</button>
                                </a>
                            </td>
                        </tr>  ';
                            }
                           
                        }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>