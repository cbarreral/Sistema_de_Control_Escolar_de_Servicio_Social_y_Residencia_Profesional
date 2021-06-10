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
                    window.location = 'https://localhost/Sistema/verCarpeta';
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
    //$nombreCalendario = $_POST["nombreCalendario"];
   
    if ($_FILES["nombreCalendario"]["type"] == "application/pdf") {

        $nombre = $_FILES["nombreCalendario"]["name"];
        $archivo = $fecha1."_".$nombre;
        $rutaPrograma = "../Documentacion/".$archivo;

        move_uploaded_file($_FILES["nombreCalendario"]["tmp_name"], $rutaPrograma);

        $fecha = date("d-m-Y H:i:s");

        $tablaBD = "inforesidencia";

        $calendarioPDF = $archivo;

        $resultado = infoResidenciaM::ActialzarCalendario($tablaBD,$calendarioPDF);
        if ($resultado == true) {
            echo '<script>

                window.location = "http://localhost/Sistema/info";

                </script>';
        }


    } else {
        echo 'Error 1';
        }

