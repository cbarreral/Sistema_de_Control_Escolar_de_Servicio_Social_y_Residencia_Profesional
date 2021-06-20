<?php

require_once "../Modelos/SolicitudResidenciaM.php";
require_once "../Controladores/SolicitudResidenciaC.php";
$solita = new SolicitudResidenciaC();
$solita->CrearSolicitud();
$rutaPrograma = "";
$fecha1 = date("d-m-Y");
$matricula = $_POST["matricula"];
$num=$_POST["NoIMSS"];

if ($_FILES["kardex"]["type"] == "application/pdf"&&$_FILES["servicio"]["type"] == "application/pdf"&&$_FILES["IMSS"]["type"] == "application/pdf") {
    //Kardex
    $Kardex = $_FILES["kardex"]["name"];
    $arcKardex = $matricula . "_" . $Kardex;
    $rutaProgramaKardex = "../Kardex/" . $arcKardex;
    move_uploaded_file($_FILES["kardex"]["tmp_name"], $rutaProgramaKardex);
    //servicio
    $servicio = $_FILES["servicio"]["name"];
    $arcservicio = $matricula . "_" . $servicio;
    $rutaProgramaservicio = "../Servicio/" . $arcservicio;
    move_uploaded_file($_FILES["servicio"]["tmp_name"], $rutaProgramaservicio);
    //servicio
    $servicio = $_FILES["servicio"]["name"];
    $arcservicio = $matricula . "_" . $servicio;
    $rutaProgramaservicio = "../Servicio/" . $arcservicio;
     //IMSS
     $IMSS = $_FILES["IMSS"]["name"];
     $arcIMSS= $matricula . "_" . $IMSS;
     $rutaProgramaIMSS = "../IMSS/" . $arcIMSS;

    move_uploaded_file($_FILES["IMSS"]["tmp_name"], $rutaProgramaIMSS);
    //$fecha = date("d-m-Y H:i:s");

    $tablaBD = "requisitoscarta";

    $datosC = array("kardex" => $arcKardex, "servicioSocial" => $arcservicio, "IMSS" => $arcIMSS, "numIMSS"=>$num,"matricula" => $_POST["matricula"]);

    $resultado = SolicitudResidenciaM::SubirArchivosM($tablaBD, $datosC);
    if ($resultado == true) {

        echo '<script>

               // window.location = "http://localhost/Sistema/inicio";
               

                </script>';
    }
} else {
    echo '<div class="alert alert-info " style="background-color: #880E4F; color:#fff; font-family: Verdana; margin:25px ; border-radius: 20px;" > <br> <h3 style="margin:20px" >Upss. parece que tienes problemas para subir el documento, retifica que el documento sea en formato PDF.  <p> Ejemplo: Código de ética.pdf </p> </h3><br>
        <a style="background-color: #fff;  font-family: Verdana; width: 100px; margin:25px ;height: 50px; padding:10px; text-decoration:none; color: black; " type="button" href="http://localhost/Sistema/inicio" > Regresar</a> <br> <br>
        </div> ';
}
