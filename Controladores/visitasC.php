<?php
class VisitasC
{
    public function VerVisitasC($columna, $valor)
    {
        $tablaBD = "visitas";

        $resultado = VisitasM::VerVisitasM($tablaBD, $columna, $valor);

        return $resultado;
    }
     public function CrearVisitaC(){
       
        if (isset($_POST["matricula"])) { 
           
            $tablaBD = "visitas";
            $datosC = array("matricula"=>$_POST["matricula"],"fecha"=>$_POST["fecha"],"hora"=>$_POST["hora"],"lugar"=>$_POST["lugar"],"estatus"=>$_POST["estatus"],"obser"=>$_POST["obser"]);

            $resultado = VisitasM::CrearVisitaM($tablaBD, $datosC);

            if ($resultado == true) {
                echo '<script>

                window.location = "visitas";

                </script>';
            }
        }
    }
    public function BorrarVisitasC(){
        
        
        $exp = explode("/", $_GET["url"]);
        $id = $exp[1];

        if(isset($id)){
            $tablaBD="visitas";

            $resultado = VisitasM::BorrarCVisitasM($tablaBD, $id);

            if($resultado == true){
                echo '<script>

                window.location = "http://localhost/Sistema/visitas";

                </script>';
            }
        }
    }
    public function EditarVisitaC($estado){
        if(isset($_POST["matricula"])){
            $tablaBD = "visitas";
            $datosC = array("id"=>$_POST["id"],"matricula"=>$_POST["matricula"],"fecha"=>$_POST["fecha"],"hora"=>$_POST["hora"],"lugar"=>$_POST["lugar"],"estatus"=>$estado,"obser"=>$_POST["obser"]);

            $resultado = VisitasM::EditarVisitaM($tablaBD, $datosC);

            if ($resultado == true) {
                echo '<script>

                window.location = "http://localhost/Sistema/visitas";

                </script>';
            }
        }
    }
}
