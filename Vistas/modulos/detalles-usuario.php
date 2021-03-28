


<div class="content-wrapper">

    <section class="content-header">
        <h1>Detalles de Usuario</h1>
        <br>
<?php 

?>

    </section> <br>
    <div class="box">



        <div class="box content">
            <div class="box-body">
                <?php
                $exp = explode("/", $_GET["url"]);
                $id_carrera = $exp[1];
                $matricula = $exp[2];
                $columna = "matricula";
                $columnaCarrera = "id";
                $resultado = UsuariosC::VerUsuariosC($columna, $matricula);
               $inscrito = MateriasC::VerInscripcionesMaterias2C("id_alumno",$resultado["id"]);
               $materia = MateriasC::VerMaterias2C("id",$inscrito["id_materia"]);
                $carrera = CarrerasC::verCarreraC($columnaCarrera, $id_carrera);
                echo '
                        <div class="col-md-6">
                        <label >Nombre</label>
                        <p >' . $resultado["nombre"] . '  ' . $resultado["apellido"] . '</p>

                        <label >Matricula</label>
                        <p >' . $resultado["matricula"] . '</p>
                        ';
                        if ($carrera["id"] == $id_carrera) {
                            echo '
                                <label >Carrera</label>
                                <p >' . $carrera["nombre"] . '  </p>
                                ';
                        } echo ' 
                        <hr> 
                        <label >Clave/Contraseña</label>
                        <p >' . $resultado["clave"] . '</p>

                        <label >Enviar correo a </label>
                        <a href="mailto:'.$resultado["correo"].'">'.$resultado["correo"].'</a> 
                        <hr>
                        <div class="col-md-6">
                        <label >Fecha de nacimiento</label>
                        <p >' . $resultado["fechanac"] . '</p>

                        <label >Domicilio</label>
                        <p >' . $resultado["direccion"] . '</p>

                        <label >Telefono</label>
                        <p >' . $resultado["telefono"] . '</p>
                        </div>

                       
                        <div class="col-md-6">
                        <label >Rol</label>
                        <p >' . $resultado["rol"] . '</p>

                        <label >Tipo de usuario </label>
                        <p >' . $resultado["tipo"] . '</p>


                    
                    </div>

                    </div>
                    <div class="col-md-6">
                    <label >Periodo</label>
                    <p >' . $resultado["periodo"] . '</p>
                    <hr>

                    <label >Asesor Academico</label>
                    <p >' . $resultado["a_academico"] . '</p>

                    <label >Acesor Industrial</label>
                    <p >' . $resultado["a_industrial"] . '</p>

                    
                    <label >Institucion</label>
                    <p >' . $materia["nombre"] . '</p>
                   

                    '; ?>

            </div>

        </div>