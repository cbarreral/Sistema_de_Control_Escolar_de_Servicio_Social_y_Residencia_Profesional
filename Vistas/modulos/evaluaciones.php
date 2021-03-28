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
        <h1>Gestor de exmanes</h1>
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
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $carrera = CarrerasC::VerCarrerasC();
                    foreach ($carrera as $key => $value) {
                        echo '
                        <tr>
                        <th>'.$value["id"].'</th>
                        <th>'.$value["nombre"].'</th>
                        <th>
                            <div class="btn-group">
                                <a href="ver-evaluaciones/'.$value["id"].'">
                                    <button class="btn btn-success">Ver Evaluacion</button>
                                    </a>
                                <a href="crear-evaluaciones/'.$value["id"].'">
                                <button class="btn btn-default">Crear Evaluaciones</button>
                                </a>
                        </div>
                        </th>
                    </tr>
                        ';
                    }
                    ?>
                    
                </tbody>
                </table>
            </div>
        </div>
    </section>
</div>