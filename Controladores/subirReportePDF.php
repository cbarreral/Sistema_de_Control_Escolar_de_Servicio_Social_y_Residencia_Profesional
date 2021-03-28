<?php

require_once "../Modelos/documentosEcenM.php";
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
                    window.location = 'http://localhost/Sistema/verCarpeta';
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
    $materia =$_POST["id_materia"];
    $matricula = $_POST["matricula"];

    if ($_FILES["PDF"]["type"] == "application/pdf") {

        $nombre = $_FILES["PDF"]["name"];
        $archivo = "Rep__".$matricula."__".$fecha1."__".$nombre;
        $rutaPrograma = "../Documentos/".$archivo;

        move_uploaded_file($_FILES["PDF"]["tmp_name"], $rutaPrograma);

        $fecha = date("d-m-Y H:i:s");

        $tablaBD = "reportes";

        $datosC = array("nombre" => $nombre, "PDF" => $archivo, "fecha" => $fecha, "matricula" => $_POST["matricula"], "id_materia" => $_POST["id_materia"]);

        $resultado = DocumentosEcenM::SubirDocRepM($tablaBD, $datosC);
        if ($resultado == true) {
            echo '<script>

                window.location = "http://localhost/Sistema/verCarpeta/'.$materia.'/'. $matricula .'";

                </script>';
        }


    } else {
        echo 'Error 1';
        }

