<?php

require_once "../Modelos/infoResidenciaM.php";
/*  
 
    $nombre =$_FILES["PDF"]["name"];
    $guardado = $_FILES["PDF"]["tmp_name"];

    if(!file_exists("Documentos")){
        mkdir("Documentos", 0777, true);
        if(file_exists("Documentos")){
            if(move_uploaded_file($guardado, 'Documentos/'.$nombre)){

                
            }else{
                echo "
                <script>
                    window.location = ''.URL_SERVER.'verCarpeta';
                </script>
                ";
            }
        }
    }else{

        if(move_uploaded_file($guardado, 'Documentos/'.$nombre)){
            echo "Ok";
        }else{
            echo "Error al subir";
        }
    }*/

    $rutaPrograma = "";
    $fecha1 = date("d-m-Y");
    $nombreDocumento= $_POST["NombreDoc"];
   
   // if ($_FILES["archivo"]["type"] == "application/docx") {

        $nombre = $_FILES["archivo"]["name"];
        $archivo = $fecha1."_".$nombre;
        $rutaPrograma = "../Documentacion/".$archivo;

        move_uploaded_file($_FILES["archivo"]["tmp_name"], $rutaPrograma);

        $fecha = date("d-m-Y H:i:s");

        $tablaBD = "documentacion";

        $empresasPDF = $archivo;

        $resultado = infoResidenciaM::CrearDocumentacion($tablaBD,$empresasPDF,$nombreDocumento);
        if ($resultado == true) {
            echo '<script>

                window.location = "http://localhost/Sistema/info";

                </script>';
        }


