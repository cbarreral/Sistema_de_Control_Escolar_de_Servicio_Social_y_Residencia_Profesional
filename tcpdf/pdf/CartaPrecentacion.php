<?php

require_once "../../Controladores/materiasC.php";
require_once "../../Modelos/materiasM.php";

require_once "../../Controladores/usuariosC.php";
require_once "../../Modelos/usuariosM.php";

require_once "../../Controladores/carrerasC.php";
require_once "../../Modelos/carrerasM.php";

require_once "../../Controladores/SolicitudResidenciaC.php";
require_once "../../Modelos/SolicitudResidenciaM.php";

class CartaPresentacionPDF
{

    public function CartaPresentacion()
    {
        require_once('tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);

        $pdf->AddPage();

        $link = $_SERVER['REQUEST_URI'];
        $exp = explode("/", $link);
        $matricula = 1212;
        $dia = date("d");
        $mes = date("F");
        $año =date("y");

        $dataE = SolicitudResidenciaC::VerDataEstudiantesC("matricula", $matricula);
        $dataC = SolicitudResidenciaC::VerDataCartaC("matricula", $matricula);
        $carrera = CarrerasC::verCarreraC("id", $dataE["id_carrera"]);



        $html1 = <<<EOF


<table>
<thead>
    <tr>
       <th scope="col"><img  width="100px" src="images/logo.png" ></th>
      </tr>
  </thead>
</table>

	<h3 style="text-align:center; "><br>Guía para la carta de aceptación de Residencia Profesional</h3><br><br>
    <p>Mtro. Luis Armando Officer Arteaga<br>Director del Instituto Tecnológico Superior del Occidente del Estado de Hidalgo</p>
    <br>
    <p style="text-align:right; " ><br>At´n: Lic. Beatriz Sánchez Delgado<br>Jefe(a) del Departamento de Residencias Profesionales y Servicio Social
    </p>
    <br>
    <br>
    <p>Por este medio me permito informarle que el (la)</p>
    <p>C. <u> $dataE[nombre] </u> con número de matrícula <u> $dataE[matricula] </u>, de la carrera <u> $carrera[nombre] </u>,
    ha sido aceptado(a) para realizar  su Residencia Profesional en la empresa/dependencia <u> $dataC[nombre] </u>, en el departamento/área, 
    ____________________________, desempeñando el  proyecto denominado _______________________________________________, donde cubrirá un 
    total de 500 horas en un periodo de 4 meses mínimo y 6  meses como máximo que comprenden del ____ de ____ al __ de ____ de 20____; “Asesorado”(a) 
    por ________________________________. </p>
    <br><br>En la Ciudad de <u> $dataC[estado] </u>, a los_<u>$dia </u>__ días del mes de__<u>$mes </u>___ del año_<u>20$año </u>, se extiende la presente Carta de Aceptación de Residencia Profesional, para los fines que el (la) interesado(a) convenga
	
    <br><br><br>
    <p>ATENTAMENTE</p>
    <br>
    _____________________________________ <br>
    $dataC[persona], $dataC[cargo] de, $dataC[nombre]<br> <span style="word-spacing: 5pt;">Firma del responsable</span>  <br>Sello de la dependencia u organismo
	

EOF;


        $pdf->writeHTML($html1, false, false, false, false, '');





        $pdf->Output('Inscriptos-Usuarios.pdf');
    }
}

$a = new CartaPresentacionPDF();
$a->CartaPresentacion();
