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
$exp =explode("/", $_GET["url"]);

        $columna = "id";
        $valor = $exp[1];
        $carrera= CarrerasC::verCarreraC($columna,$valor);
        echo'
        <a href="http://localhost/Sistema/carreras">
        <button class="btn btn-primary"> Volver </button></a>
        <br> <br>
        <h1>Gestor de Catalogo de la carrera de  '.$carrera["nombre"].'</h1>
        
        ';
        ?>
<h2>Filtrar datos en Tabla</h2>
    <p>Filtra por Nombres, Carreras o cualquier otro campo</p>  
    <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
    <!-- id="myTable" -->


        
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <button class="btn btn-info btn-gl" data-toggle="modal" data-target="#CrearMateria">Crear Catalogo</button>
                <a href="#" style="display:none">
                    <button class="btn btn-success ">Importar lista desde excel</button>
                </a>
                <a href="http://localhost/Sistema/tcpdf/pdf/expCatalogo.php" target="blank">
                    <button class="btn btn-danger ">Exportar a PDF</button>
                </a>
                <a href="http://localhost/Sistema/expExcel/CatalogoExcel.php">
                    <button class="btn btn-success ">Exportar tabla a excel</button>
                </a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped T">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $resultado = MateriasC::VerMateriasC();
                        foreach ($resultado as $key => $value) {
                            if($value["id_carrera"]== $exp[1]){
                                echo'
                                <tr>
                                <td>'.$value["codigo"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["tipo"].'</td>
    
                                <td>
                                    <div class="btn-group">
                                        <a href="http://localhost/Sistema/crear-comisiones/'.$value["id"].'/'.$value["id_carrera"].'">
                                            <button class="btn btn-success">Detalles</button>
                                        </a>
                                        <a href="#">
                                            <button class="btn btn-default EliminarMateria" Mid="'.$value["id"].'" Cid="'.$exp[1].'" >Eliminar</button>
                                        </a>
                                    </div>
                                </td>
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


<?php
$eliminarM = new MateriasC();
$eliminarM -> EliminarMateriaC();
?>
<div class="modal fade" id="CrearMateria">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="" enctype="multipart/form-data" class="content" method="post">
                <div class="modal-body">
                    <h2>Codigo: </h2>
                    <input type="text" name="codigo" class="form-control input-lg" required id="codigo">
                     <?php
                    echo'<input type="hidden" name="Cid" value="'.$exp[1].'" class="form-control input-lg" id="Cid">
                   
                    ';
                    ?>
                </div>
                <div class="form-group">
                    <h2>Nombre:</h2>
                    <input type="text" name="nombre" class="form-control input-lg" required id="nombre">

                </div>
               	<div class="form-group">

						<h2>Tipo:</h2>
						
						<select class="form-control input-lg" name="tipo">
							
							<option>Seleccionar...</option>

							<option value="Servicio_Social">Servicio Social</option>
							<option value="Residencia_Profecional">Residencia Profecional</option>

						</select>

					</div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Añadir a catalogo</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>

                <?php
                $id_carrera = $exp[1];
                $crearM = new MateriasC();
                $crearM -> CrearMateriaC($id_carrera);
                ?>
            </form>
        </div>
    </div>
</div>