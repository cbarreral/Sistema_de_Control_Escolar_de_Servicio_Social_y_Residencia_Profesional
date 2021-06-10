<?php
if($_SESSION["rol"] =! "Admin"||$_SESSION["rol"] != "Jefe"){
    echo '
    <script>
    window.location ="'.URL_SERVER.'inicio";
    </script>

    ';

    return;
    
	
}
?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Editar Carrera</h1>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-body">
                <form action="" method="post">
                   <?php
                   $editarCarrera = new CarrerasC();
                   $editarCarrera -> EditarCarreraC();
                   $editarCarrera -> ActualizarCarrerasC();
                   ?>
                </form>
            </div>
        </div>
    </section>
</div>