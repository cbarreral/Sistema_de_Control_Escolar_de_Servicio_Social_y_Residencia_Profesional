<?php

class infoResidenciaC
{
    public function VerInfoC(){
        $tablaBD = "inforesidencia";
        $resultado = infoResidenciaM::VerInfoM($tablaBD);
        return $resultado;
    }

    public function VerPlantillas(){
        $tablaBD = "plantillas";
        $resultado = infoResidenciaM::VerPlantillasM($tablaBD);
        return $resultado;
    }
    public function VerProcesos(){
        $tablaBD = "procesos";
        $resultado = infoResidenciaM::VerProcesos($tablaBD);
        return $resultado;
    }

    public function VerDocumentosC(){
        $tablaBD = "documentacion";
        $resultado = infoResidenciaM::VerDocM($tablaBD);
        return $resultado;
    }

     public function updateObjectivo(){
        if(isset($_POST["objectivo"])){
             $tablaBD = "inforesidencia";
            $objectivo = $_POST["objectivo"];
            $resultado = infoResidenciaM::ActialzarObjectivos($tablaBD,$objectivo);
            if($resultado==true){

                echo '<script>

				window.location = "'.URL_SERVER.'info";
				</script>';
            }
        }
    }

    public function CrearProceso(){
        if(isset($_POST["info"]) ){
            $tablaBD = "procesos";
           $info = $_POST["info"];
           $num = $_POST["num"];
           $resultado = infoResidenciaM::CrearPorcesoM($tablaBD,$info,$num);
           if($resultado==true){

               echo '<script>

               window.location = "'.URL_SERVER.'info";
               </script>';
           }
       }
    }

    public function BorrarProceso(){
        if(isset($_POST["idProceso"]) ){
            $tablaBD = "procesos";
           $id = $_POST["idProceso"];
           $resultado = infoResidenciaM::BorrarPorcesoM($tablaBD,$id);
           if($resultado==true){

               echo '<script>

               window.location = "'.URL_SERVER.'info";
               </script>';
           }
       }
    }

    public function BorrarDocumentos(){
        if(isset($_POST["idDoc"]) ){
            $tablaBD = "documentacion";
           $id = $_POST["idDoc"];
           $resultado = infoResidenciaM::BorrarDocumentoM($tablaBD,$id);
           if($resultado==true){

               echo '<script>

               window.location = "'.URL_SERVER.'info";
               </script>';
           }
       }
    }
}