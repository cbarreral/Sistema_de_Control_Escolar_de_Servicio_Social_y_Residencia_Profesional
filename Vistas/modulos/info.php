<?php
if ($_SESSION["rol"] != "Admin") {
    echo '
    <script>
    window.location = "Inicio";
    </script>
    ';
}
?>

<div class="content-wrapper">
    <section class="content-header">

        <h2>Información de guía para Residencia</h2>

    </section>

    <section class="content">
        <div class="box">

            <div class="box-header">

                <form action="" method="post">
                    <div class="row">
                        <div class="col-9">
                            <h4>Objectivos</h4>
                            <?php
                            $respuesta = infoResidenciaC::VerInfoC();
                            echo '
                            <input type="text" name="objectivo" class="form-control" id="" value="' . $respuesta["objetivos"] . '" >
                            ';
                            ?>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-success" type="submit">Actulizar Objetivo</button>
                        </div>
                    </div>
                    <?php

                    $actualizarObjectivo = new infoResidenciaC();
                    $actualizarObjectivo->updateObjectivo();
                    ?>
                </form>
            </div>
        </div>

        <div class="box">

            <div class="box-header">

                <form action="<?php echo URL_SERVER ?>Controladores/subirCalendario.php" enctype="multipart/form-data" class="content" method="post">
                    <div class="row">
                        <div class="col-9">
                            <h4>Calendario</h4>
                            <?php
                            $respuesta = infoResidenciaC::VerInfoC();
                            echo '
                            <p>Calendario Vigente: <a target="blank" href="' . URL_SERVER . 'Documentacion/' . $respuesta["calendarioPDF"] . '">' . $respuesta["calendarioPDF"] . '</a></p>
                            <input type="file" name="nombreCalendario" class="form-control" id="nombreCalendario">
                            ';
                            ?>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-info" type="submit">Subir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="box">

            <div class="box-header">

                <form action="<?php echo URL_SERVER ?>Controladores/subirCatalogo.php" enctype="multipart/form-data" class="content" method="post">
                    <div class="row">
                        <div class="col-9">
                            <h4>Empresas Vinculadas</h4>
                            <?php
                            $respuesta = infoResidenciaC::VerInfoC();
                            echo '
                            <p>Catálogo Vigente: <a target="blank" href="' . URL_SERVER . 'Documentacion/' . $respuesta["empresasPDF"] . '">' . $respuesta["empresasPDF"] . '</a></p>
                            <input type="file" name="catalogo" class="form-control" id="catalogo">
                            ';
                            ?>
                        </div>
                        <div class="col-3">
                            <button class="btn btn-info" type="submit">Subir</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>


        <div class="box">

            <div class="box-header">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-8">
                            <h4>Procesos</h4>
                            <input type="text" name="info" class="form-control" id="info" placeholder="Proceso">

                        </div>
                        <div class="col-1">
                            <input type="text" name="num" class="form-control" id="num" placeholder="Número">
                        </div>
                        <div class="col-3">
                            <button class="btn btn-primary" type="submit">Agregar proceso</button>
                        </div>
                    </div>
                    <?php

                    $Crear_proceso = new infoResidenciaC();
                    $Crear_proceso->CrearProceso();
                    ?>

                </form>
            </div>

            <div class="box-body">
                <table class=" table align-middle table-hover table-responsive T">
                    <thead>
                        <tr>
                            <th>Número</th>
                            <th>Proceso</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <form action="" method="post">
                            <?php
                            $resultado = infoResidenciaC::VerProcesos();
                            foreach ($resultado as $keey => $proceso) {

                                echo '
                                    <tr>
                                    <td>' . $proceso["num"] . '</td>
                                    <td>' . $proceso["info"] . '</td>
                                    <td>
                                     <button type="submit" class="btn btn-danger">Borrar</button>
                                     <input type="hidden" name="idProceso" value="' . $proceso["id"] . '">
                                    
                                    </td>
                                    </tr>';
                            }


                            $eliminar = new infoResidenciaC();
                            $eliminar->BorrarProceso();

                            ?>
                        </form>

                    </tbody>
                </table>
            </div>
        </div>

        <div class="box">

            <div class="box-header">
                <form action="<?php echo URL_SERVER ?>Controladores/subirDoc.php" enctype="multipart/form-data" class="content" method="post">
                    <div class="row">
                        <h4>Documentos</h4>
                        <div class="col-5">

                            <input type="file" name="archivo" class="form-control" id="archivo" placeholder="Documento">

                        </div>
                        <div class="col-5">
                            <input type="text" name="NombreDoc" class="form-control" id="NombreDoc" placeholder="Nombre">
                        </div>
                        <div class="col-2">
                            <button class="btn btn-warning " type="submit">Subir</button>
                        </div>
                    </div>
                </form>
            </div>


            <div class="box-body">
                <table class=" table align-middle table-hover table-responsive T">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <form action="" method="post">
                            <?php
                            $resultado = infoResidenciaC::VerDocumentosC();
                            foreach ($resultado as $keey => $Doc) {

                                echo '
                            <tr>
                            <td> <a target="blank" href="' . URL_SERVER . 'Documentacion/' . $Doc["PDF"] . '">' . $Doc["nombre"] . '</a> </td>
                            <td>
                            <td>
                            <button type="submit" class="btn btn-danger">Borrar</button>
                            <input type="hidden" name="idDoc" value="' . $Doc["id"] . '">
                           
                           </td>
                           </tr>';
                   
                            }
                            
                            $eliminar = new infoResidenciaC();
                            $eliminar->BorrarDocumentos();

                            ?>
                        </form>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<?php

?>