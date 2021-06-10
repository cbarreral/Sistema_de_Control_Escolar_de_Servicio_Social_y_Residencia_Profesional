<?php

class ConstanciaC{
   
    public function Solicitar($id_carrera){

		if(isset($_POST["matricula"])){

			$tablaBD = "constancias";

			

			$datosC = array("matricula"=>$_POST["matricula"], "fecha"=>$_POST["fecha"],"estado"=>$_POST["estado"],"PDF"=>$_POST["PDF"]);

			$resultado = ConstanciaM::SolicitarM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "'.URL_SERVER.'constancia-alumno/'.$_POST["matricula"].'/'.$id_carrera.'";
				</script>';

			}

		}

	}
    static public function VerConstanciaC($columna,$valor){
        $tablaBD = "constancias";
        $resultado = ConstanciaM::VerConstanciaM($tablaBD,$columna,$valor);
        return $resultado;
    }
    public function Generar(){
        if (isset($_POST["PDF"])) {
            
            $tablaBD = "constancias";
          
        
            $datosC = array("matricula" => $_POST["matricula"], "id_carrera" => $_POST["id_carrera"], "fecha" => $_POST["fecha"]
            , "estado" => $_POST["estado"], "PDF" => $_POST["PDF"]);
        
           
            $resultado =  ConstanciaM::GenerarM($tablaBD, $datosC);
            if ($resultado == true) {
                echo '<script>
                window.location = "'.URL_SERVER.'solicitud-Constancia";
                </script>';
            }
        }
        
    }
}