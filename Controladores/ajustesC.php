<?php
class AjustesC{
    static public function VerAjustesC($columna,$valor){
        $tablaBD = "ajustes";

        $resultado = AjustesM::VerAjustesM($tablaBD,$columna,$valor);

        return $resultado;
    }

    public function CambiarPeriodoC(){
        if(isset($_POST["PeriodoA"])){
            $tablaBD = "ajustes";
            $periodo = $_POST["PeriodoA"];
            $resultado = AjustesM::CambiarPeriodoM($tablaBD,$periodo);
            if($resultado==true){
                echo '
                <script>
                    window.location = "Editar-Inicio"
                </script>
                ';
            }
        }
    }

    public function ActualizarAjustesC(){

		if(isset($_POST["1_fecha_inicio"])){

			$tablaBD = "ajustes";

            $datosC = array("1_fecha_inicio"=>$_POST["1_fecha_inicio"], "1_fecha_fin"=>$_POST["1_fecha_fin"], "2_fecha_inicio"=>$_POST["2_fecha_inicio"], "2_fecha_fin"=>$_POST["2_fecha_fin"], "evaluacion_i"=>$_POST["evaluacion_i"], "evaluacion_f"=>$_POST["evaluacion_f"],"inscripciones_i"=>$_POST["inscripciones_i"],"inscripciones_f"=>$_POST["inscripciones_f"]);

			$resultado = AjustesM::ActualizarAjustesM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "inicio";
				</script>';

			}

		}

    }
    
    public function HMC(){

        if(isset($_POST["h_inscripciones"])){
            $tablaBD = "ajustes";
            $datosC = array("id"=>1,"h_inscripciones"=>$_POST["h_inscripciones"]);
            $resultado = AjustesM::HMM($tablaBD, $datosC);
            if($resultado == true){

				echo '<script>

				window.location = "carreras";
				</script>';

			}
        }
    }
   /* public function DMC(){

        if(isset($_POST["h_inscripciones"])){
            $tablaBD = "ajustes";
            $datosC = array("id"=>1,"h_inscripciones"=>$_POST["h_inscripciones"]);
            $resultado = AjustesM::DMM($tablaBD, $datosC);
            if($resultado == true){

				echo '<script>

				window.location = "carreras";
				</script>';

			}
        }
    }?*/
   
}
