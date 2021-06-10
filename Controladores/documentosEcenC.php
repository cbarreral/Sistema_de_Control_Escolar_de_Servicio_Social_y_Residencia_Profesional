<?php

class DocumentosEcenC
{



    public function VerDocumentosEcenC($columna, $valor)
    {
        $tablaBD = "documentos";
        $resultado = DocumentosEcenM::VerDocumentosEcenM($tablaBD, $columna, $valor);
       
        return $resultado;

    }
    public function VerDocumentosRepC($columna, $valor)
    {
        $tablaBD = "reportes";
        $resultado = DocumentosEcenM::VerDocumentosRepM($tablaBD, $columna, $valor);
        return $resultado;
    }

  
   

    public function EliminarDocumento()
    {
        $exp = explode("/", $_GET["url"]);
        

        if (isset($exp[3])) {
            $tablaBD = "documentos";

            $resultado = DocumentosEcenM::BorrarDocumentosM($tablaBD, $exp[3]);
            $resultado2 =ChatM::BorrarChatM("observacionesdoc",$exp[3]);

            if ($resultado == true&&$resultado2 == true) {
                echo '<script>

                window.location = "'.URL_SERVER.'verCarpeta/' . $exp[1] . '/' . $exp[2] . '";

                </script>';
            }
        }
    }

    public function ActualizarNotasC($id_materia, $matricula){
        if (isset($_POST["nota_industrial"])||isset($_POST["nota_academico"])) {
            
            $tablaBD = "reportes";
            $promedio = ($_POST["nota_academico"]+$_POST["nota_industrial"])/2;
        
            $datosC = array("id" => $_POST["id"], "nota_academico" => $_POST["nota_academico"], "nota_industrial" => $_POST["nota_industrial"], "promedioFinal" => $promedio
            , "revisadoJefe" => $_POST["revisadoJefe"], "revisadoAdmin" => $_POST["revisadoAdmin"]);
        
           
            $resultado =  DocumentosEcenM::ActualizarNotasM($tablaBD, $datosC);
            if ($resultado == true) {
                print_r("true");
                if($id_materia==null&&$$matricula==null){

                    echo '<script>
                
                    window.location = "'.URL_SERVER.'calificaciones";
                    </script>';
                }else{
                    
                echo '<script>
                
                window.location = "'.URL_SERVER.'verCarpeta/'.$id_materia.'/'.$matricula.'";
                </script>';
                }
            }
        }
        
    }
    public function ActualizarNotas2C(){
        if (isset($_POST["revisadoAdmin"])||isset($_POST["revisadoJefe"])) {
            
            $tablaBD = "reportes";
            
        
            $datosC = array("revisadoJefe" => $_POST["revisadoJefe"], "revisadoAdmin" => $_POST["revisadoAdmin"]);
        
           
            $resultado =  DocumentosEcenM::ActualizarNotas2M($tablaBD, $datosC);
            if ($resultado == true) {
                print_r("true");
                echo '<script>
                
                window.location = "'.URL_SERVER.'calificaciones";
                </script>';
            }
        }
        
    }
}
