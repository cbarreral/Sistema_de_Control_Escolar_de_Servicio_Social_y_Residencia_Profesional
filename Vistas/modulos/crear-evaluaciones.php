<?php
if ($_SESSION["rol"] != "Admin") {
    echo '<script>
        window.location = "inicio";
    </script>';
    return;
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <?php
        $columna = "id";
        $exp = explode("/",$_GET["url"]);
        $columna ="id";
        $valor = $exp[1];

        $carrera = CarrerasC::verCarreraC($columna,$valor);
        echo'
        <h1>Gestor de exmanes de <b>'.$carrera["nombre"].'</b></h1>
        ';
        ?>
        
        <br>

    </section>
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped">

                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Grado</th>
                        <th>Tipo</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $materias = MateriasC::VerMateriasC();
                    foreach ($materias as $key => $value) {
                        if($value["id_carrera"]== $exp[1]){
                        echo '
                        <tr>
                        <th>'.$value["id"].'</th>
                        <th>'.$value["nombre"].'</th>
                        <th>'.$value["grado"].'</th>
                        <th>'.$value["tipo"].'</th>
                        <th>
                            <div class="btn-group">
                                
                                <a href="'.URL_SERVER.'c-e/'.$value["id_carrera"].'/'.$value["id"].'">
                                <button class="btn btn-default">Crear Examen</button>
                                </a>
                        </div>
                        </th>
                    </tr>
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