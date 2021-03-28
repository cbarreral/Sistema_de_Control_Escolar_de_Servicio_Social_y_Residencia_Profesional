<?php

class EvaluacionesC{
   
    public function CrearExamenC(){

		if(isset($_POST["estado"])){

			$tablaBD = "examenes";

			$id_carrera = $_POST["id_carrera"];

			$datosC = array("estado"=>$_POST["estado"], "id_carrera"=>$_POST["id_carrera"], "id_materia"=>$_POST["id_materia"], "profesor"=>$_POST["profesor"], "aula"=>$_POST["aula"], "fecha"=>$_POST["fecha"], "hora"=>$_POST["hora"]);

			$resultado = EvaluacionesM::CrearExamenM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/Sistema/crear-evaluaciones/'.$id_carrera.'";
				</script>';

			}

		}

	}

	static public function VerExamenC($columna,$valor){
		$tablaBD = "examenes";
		$resultado = EvaluacionesM::VerExamenesM($tablaBD, $columna, $valor);
		return $resultado;
	}
	static public function VerInscritosExamenC($columna,$valor){
		$tablaBD = "inscribir_examenes";
		$resultado = EvaluacionesM::VerInscritosExamesM($tablaBD, $columna, $valor);
		return $resultado;
	}

	public function InscribirseExamenC(){
		if(isset($_POST["id_alumno"])){
			$tablaBD = "inscribir_examenes";
			$datosC = array("id_alumno"=>$_POST["id_alumno"],"id_examen"=>$_POST["id_examen"],"matricula"=>$_POST["matricula"]);
			$id_carrera = $_POST["id_carrera"];
			$resultado = EvaluacionesM::InscribirseExamenM($tablaBD, $datosC);

			if($resultado==true){
				echo '<script>

				window.location = "http://localhost/Sistema/ver-evaluaciones/'.$id_carrera.'";
				</script>';

			}
		}
	}
}