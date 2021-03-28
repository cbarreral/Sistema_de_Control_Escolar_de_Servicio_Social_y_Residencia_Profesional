<?php

require_once "../../Controladores/materiasC.php";
require_once "../../Modelos/materiasM.php";

require_once "../../Controladores/usuariosC.php";
require_once "../../Modelos/usuariosM.php";

require_once "../../Controladores/evaluacionesC.php";
require_once "../../Modelos/evaluacionesM.php";

class pdfInscriptosExamen{

public function pdfInscriptos(){

require_once('tcpdf_include.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->setPrintHeader(false);

$pdf->AddPage();

$link = $_SERVER['REQUEST_URI'];

$exp = explode("/", $link);

$columna = "id";
$valor = $exp[5];

$examen = EvaluacionesC::VerExamenC($columna, $valor);

$columna = "id";
$valor = $examen["id_materia"];

$materia = MateriasC::VerMaterias2C($columna, $valor);

$html1 = <<<EOF

	<center><img  stile='width:115px;' src="images/logo.png"></center>
	<br><br>

	<h2>Inscriptos para el Exámen de: $materia[nombre]</h2>

	<h2>Fecha: $examen[fecha] - Hora: $examen[hora] - Aula: $examen[aula]</h2>

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">N°</td>
			<td style="border: 1px solid black width:115px;">Matricula</td>
			<td style="border: 1px solid black width:250px;">Alumno</td>

		</tr>

	</table>

EOF;


$pdf->writeHTML($html1, false, false, false, false, '');


$columna = "id_examen";
$valor = $exp[5];

$insc = EvaluacionesC::VerInscritosExamenC($columna, $valor);

foreach ($insc as $key => $value) {
	
$columna = "id";
$valor = $value["id_alumno"];

$alumnos = UsuariosC::VerUsuarios2C($columna, $valor);

foreach ($alumnos as $key => $v) {
	
$n = ($key+1);
$html2 = <<<EOF

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">$n</td>
			<td style="border: 1px solid black width:115px;">$value[matricula]</td>
			<td style="border: 1px solid black width:250px;">$v[apellido], $v[nombre]</td>

		</tr>

	</table>

EOF;


$pdf->writeHTML($html2, false, false, false, false, '');

}

}


$pdf->Output('Inscriptos-Examen-'.$materia["nombre"].'.pdf');


}


}

$a = new pdfInscriptosExamen();
$a -> pdfInscriptos();