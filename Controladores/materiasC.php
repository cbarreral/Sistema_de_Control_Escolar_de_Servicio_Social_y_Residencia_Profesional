<?php

class MateriasC{

	public function CrearMateriaC(){

		if(isset($_POST["id_carrera"])){
 
				$tablaBD = "materias";

				$datosC = array("id_carrera"=>$_POST["id_carrera"], "codigo"=>$_POST["codigo"], "nombre"=>$_POST["nombre"], "direccion"=>$_POST["direccion"], "tipo"=>$_POST["tipo"]);

				$resultado = MateriasM::CrearMateriaM($tablaBD, $datosC);

				if($resultado == true){
                        echo '<script>

                        window.location = "'.URL_SERVER.'catalogo";
                       
                        </script>';
				}

		}

	}
    public function VerMateriasC(){
       $tablaBD = "materias";
       $resultado = MateriasM::VerMateriasM($tablaBD);
       return $resultado;
    }

    public function EliminarMateriaC($id_carrera){
        if(isset($_GET["Mid"])){

			$tablaBD = "materias";

            $id = $_GET["Mid"];
            $Cid = $_GET["Cid"];

			$resultado = MateriasM::EliminarMateriasM($tablaBD, $id);

			if($resultado == true){
                if($id_carrera ==null){
                    echo '<script>

                    window.location = "'.URL_SERVER.'crear-materias";
                   
                    </script>';

                }else{
                    echo '<script>

                    window.location = "'.URL_SERVER.'crear-materias/' . $id_carrera . '";
                    </script>';
                }
                
                echo '<script>

            
                </script>';

			}

		}
    }

    static public function VerMaterias2C( $columna,$valor){
        
       $tablaBD = "materias";
       $resultado = MateriasM::VerMaterias2M($tablaBD, $columna,$valor);
       return $resultado;
    }
	public function CrearComisionC($id_carrera){

		if(isset($_POST["id_materia"])){

			$tablaBD = "comisiones";

			$datosC = array("id_materia"=>$_POST["id_materia"], "numero"=>$_POST["numero"], "c_maxima"=>$_POST["c_maxima"], "horas"=>$_POST["horas"], "horario"=>$_POST["horario"]);

			$id_materia = $_POST["id_materia"];

			$resultado = MateriasM::CrearComisionM($tablaBD, $datosC);

			if($resultado == true){

					echo '<script>

					window.location = "'.URL_SERVER.'crear-comisiones/'.$id_materia.'/'.$id_carrera.'";
					</script>';

				}

		}

    }
    static public function VerComisionesC($columna, $valor){
        $tablaBD = "comisiones";
        $resultado = MateriasM::VerComisionesM($tablaBD, $columna, $valor);
        return $resultado;
        # code...
    }
    static public function VerComisiones2C($columna, $valor){
        $tablaBD = "comisiones";
        $resultado =MateriasM::VerComisiones2M($tablaBD,$columna,$valor);
        return $resultado;
    }

    public function BorrarComisionC($id_carrera){
        if(isset($_GET["Mid"])){

			$tablaBD = "comisiones";

            $id = $_GET["Mid"];
            $Cid = $_GET["Cid"];
            

			$resultado = MateriasM::EliminarComisionesM($tablaBD, $id);
            $id_carrer = $_POST[$id_carrera];
			if($resultado == true){

                echo '<script>

                window.location = "'.URL_SERVER.'crear-comisiones/'.$Cid.'/'.$id_carrer.'";
                </script>';

            }

		}
    }

    public function ColocarNotasC(){
       if(isset($_POST["id_alumno"])){
           $matricula = $_POST["matricula"];
           $id_carrera = $_POST["id_carrera"];

           $tablaBD = "notas";

           $datosC = array("id_alumno"=>$_POST["id_alumno"],"matricula"=>$_POST["matricula"],"id_materia"=>$_POST["id_materia"],"fecha"=>$_POST["fecha"],"a_academico"=>$_POST["a_academico"],"a_industrial"=>$_POST["a_industrial"],"nota_industrial"=>$_POST["nota_industrial"],"nota_final"=>$_POST["nota_final"],"tipo"=>$_POST["tipo"],"estado"=>$_POST["estado"],"nota_academico"=>$_POST["nota_academico"]);
           $resultado = MateriasM::ColocarNotasM($tablaBD,$datosC);

           if($resultado == true){

            echo '<script>

            window.location = "'.URL_SERVER.'verCarpeta/' . $id_carrera . '/' . $matricula . '";
            </script>';

        }
       }
        # code...
    }
    static public function VerNotasC($columna, $valor){
        $tablaBD = "notas";
        $resultado = MateriasM::VerNotasM($tablaBD,$columna,$valor);
        return $resultado;
    }

    static public function VerNotas2C($columna, $valor){
        $tablaBD = "notas";
        $resultado = MateriasM::VerNotas2M($tablaBD,$columna,$valor);
        return $resultado;
    }

    public function CambiarNotasC(){
        if(isset($_POST["id_alumno"])){
            $tablaBD = "notas";
            $matricula = $_POST["matricula"];
            $id_carrera = $_POST["id_carrera"];
 
            
 
            $datosC = array("id"=>$_POST["nota_id"],"matricula"=>$_POST["matricula"],"fecha"=>$_POST["fecha"],"a_academico"=>$_POST["a_academico"],"a_industrial"=>$_POST["a_industrial"],"nota_industrial"=>$_POST["nota_industrial"],"nota_final"=>$_POST["nota_final"],"tipo"=>$_POST["tipo"],"estado"=>$_POST["estado"],"nota_academico"=>$_POST["nota_academico"]);
           $resultado = MateriasM::CambiarNotasM($tablaBD,$datosC);
 
            if($resultado == true){
 
             echo '<script>
 
             window.location = "'.URL_SERVER.'verCarpeta/' . $id_carrera . '/' . $matricula . '";
             </script>';
 
         }
        }

    }
    public function InscribirMateriaC(){
        if(isset($_POST["id_alumno"]) ){
            $tablaBD = "inscripciones";
            if($_POST["id_comision"]==null){
                echo '<script>
    
                window.location = "'.URL_SERVER.'catalogo";
                alert("No se puede inscribir porque no hay una comision existente para esta institución");
                </script>';
            }
            $datosC = array("id_alumno"=>$_POST["id_alumno"], "id_materia"=>$_POST["id_materia"], "id_comision"=>$_POST["id_comision"]);
            $resultado = MateriasM::InscribirMateriaM($tablaBD, $datosC);
            if($resultado == true){
 
                echo '<script>
    
                window.location = "'.URL_SERVER.'inscrito";
                </script>';
    
            }else{
            echo '<script>
    
            window.location = "'.URL_SERVER.'materias";
            </script>';
        }
        }
    }

    static public function VerInscripcionesMateriasC($columna, $valor){
        $tablaBD = "inscripciones";
        $resultado = MateriasM::VerInscripcionesM($tablaBD, $columna, $valor);
        return $resultado;
    }

    static public function VerInscripcionesMaterias2C($columna, $valor){
        $tablaBD = "inscripciones";
        $resultado = MateriasM::VerInscripciones2M($tablaBD, $columna, $valor);
        return $resultado;
    }

    public function VaciarRegistrosMateriasC(){
        if(isset($_POST["E"])){
            $tablaBD = "inscripciones";

            $resultado = MateriasM::VaciarRegistrosMateriasM($tablaBD);
            if($resultado == true){
 
                echo '<script>
    
                window.location = "'.URL_SERVER.'carreras";
                </script>';
    
            }
        }
    }
}
