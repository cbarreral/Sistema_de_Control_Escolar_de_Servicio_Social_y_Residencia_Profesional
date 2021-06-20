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
$materia = $_POST["id_materia"];
$matricula = $_POST["matricula"];

if ($_FILES["PDF"]["type"] == "application/pdf") {

    $nombre = $_FILES["PDF"]["name"];
    $archivo = "Doc__" . $matricula . "__" . $fecha1 . "__" . $nombre;
    $rutaPrograma = "../Documentos/" . $archivo;

    move_uploaded_file($_FILES["PDF"]["tmp_name"], $rutaPrograma);

    $fecha = date("d-m-Y H:i:s");

    $tablaBD = "documentos";

    $datosC = array("nombre" => $nombre, "PDF" => $archivo, "fecha" => $fecha, "matricula" => $_POST["matricula"], "id_materia" => $_POST["id_materia"]);

    $resultado = DocumentosEcenM::SubirDocEscM($tablaBD, $datosC);
    if ($resultado == true) {
        echo '<script>

                window.location = "http://localhost/Sistema/verCarpeta/' . $materia . '/' . $matricula . '";
               

                </script>';
    }
} else {
    echo '<div class="alert alert-info " style="background-color: #880E4F; color:#fff; font-family: Verdana; margin:25px ; border-radius: 20px;" > <br> <h3 style="margin:20px" >Upss. parece que tienes problemas para subir el documento, retifica que el documento sea en formato PDF.  <p> Ejemplo: Código de ética.pdf </p> </h3><br>
        <a style="background-color: #fff;  font-family: Verdana; width: 100px; margin:25px ;height: 50px; padding:10px; text-decoration:none; color: black; " type="button" href="http://localhost/Sistema/verCarpeta/' . $materia . '/' . $matricula . '" > Regresar</a> <br> <br>
        </div> ';
}
