

<div class="content-wrapper">
    <section class="content-header">
        
    </section>

    <section class="content">
        <div class="box">
            <?php
            if($_SESSION["rol"]!="Admin"){
                echo'
                <div class="alert alert-success">No tienes permisos para editar el catalogo</div> ';
            }else{echo'
            <div class="box-header">
                <a href="http://localhost/Sistema/ImportarExcel/catalogos.php">
                    <button class="btn btn-success " title="Importación masiva de usuarios desde excel">Importar usuarios de excel</button>
                </a>
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
            ';
        }
            ?>
            <h2>Gestor de catalogo de empresas</h2>
  <p>Filtra por Nombre, Tipo o cualquier otro campo</p>  
  <input class="form-control" id="myInput" type="text" placeholder="Buscar..">
  <!-- id="myTable" -->
            <div class="box-body">
                <table class="table table-bordered table-hover table-striped T">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Tipo</th>
                            <th>Carrera</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="myTable">
                        <?php
                        $resultado = MateriasC::VerMateriasC();
                        foreach ($resultado as $key => $value) {
                            $id =$value["id_carrera"];
                            $columna = "id";
                            $carrera =CarrerasC::verCarreraC($columna,$id);
                                echo'
                                <tr>
                                <td>'.$value["codigo"].'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["tipo"].'</td>
                                <td>'.$carrera["nombre"].'</td>
    
                                <td>
                                    <div class="btn-group">
                                        <a href="http://localhost/Sistema/crear-comisiones/'.$value["id"].'/'.$value["id_carrera"].'">
                                            <button class="btn btn-success">Comisiones</button>
                                        </a>';
                                        if($_SESSION["rol"]=="Alumno"){
                                            $inscrito = MateriasC::VerInscripcionesMaterias2C("id_alumno",$_SESSION["id"]);
                                            if($inscrito==true){
                                                echo' 
                                                <a >
                                                    <button class="btn btn-default">No puedes inscribirte</button>
                                                </a>';
                                            }else{
                                                echo' 
                                                <a href="http://localhost/Sistema/inscribir-materia/'.$value["id_carrera"].'/'.$value["id"].'">
                                                    <button class="btn btn-primary">Inscribir</button>
                                                </a>';
                                            }
                                           
                                        }
                                        if($_SESSION["rol"]=="Admin"){
                                            echo' <a href="#">
                                            <button class="btn btn-default EliminarMateria" Mid="'.$value["id"].'" Cid="'.$value["id_carrera"].'" >Eliminar</button>
                                        </a>';
                                        }echo'
                                       
                                    </div>
                                </td>
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
                    echo'<input type="text" name="Cid" value="'.$value["id"].'" class="form-control input-lg" id="Cid">
                   
                    ';
                    ?>
              
                <div class="form-group">
                    <h2>Nombre:</h2>
                    <input type="text" name="nombre" class="form-control input-lg" required id="nombre">

                </div>
                	<div class="form-group">

						<h2>Tipo:</h2>
						
						<select class="form-control input-lg" name="tipo">
							
							<option>Seleccionar...</option>

							<option value="Servicio Social">Servicio Social</option>
							<option value="Residencia Profecional">Residencia Profecional</option>

						</select>

					</div>
                    <div class="form-group">

<h2>Tipo:</h2>

<select class="form-control input-lg" name="tipo">
    
    <option>Seleccionar...</option>

    <option value="Servicio Social">Servicio Social</option>
    <option value="Residencia Profecional">Residencia Profecional</option>

</select>

</div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Añadir a catalogo</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                </div>
                </div>
                <?php
                $id_carrera = null;
                $crearM = new MateriasC();
                $crearM -> CrearMateriaC($id_carrera);
                ?>
            </form>
        </div>
    </div>
</div>