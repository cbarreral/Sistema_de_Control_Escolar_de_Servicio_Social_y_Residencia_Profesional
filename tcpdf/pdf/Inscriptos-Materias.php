<?php

require_once "../../Controladores/materiasC.php";
require_once "../../Modelos/materiasM.php";

require_once "../../Controladores/usuariosC.php";
require_once "../../Modelos/usuariosM.php";


class pdfInscriptosMateria
{

	public function pdfInscriptos()
	{

		require_once('tcpdf_include.php');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->setPrintHeader(false);

		$pdf->AddPage();

		$link = $_SERVER['REQUEST_URI'];

		$exp = explode("/", $link);

		$columna = "id";
		$valor = $exp[5];

		$materia = MateriasC::VerMaterias2C($columna, $valor);

		$columna = "id";
		$valor = $exp[6];

		$comision = MateriasC::VerComisiones2C($columna, $valor);

		$html1 = <<<EOF

	<center><img  width="200" src="images/logo.png"></center>
	
	<p>INSTITUTO TECNOLOGICO SUPERIOR DEL OCCIDENTE DEL ESTADO DE HIDALGO</p>
	<br>
	<h2>Inscriptos para la Materia: $materia[nombre]</h2>

	<h2>Comisión: $comision[numero] - Horas: $comision[horas] - Horario: $comision[horario]</h2>

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">Comisión</td>
			<td style="border: 1px solid black width:115px;">Matricula</td>
			<td style="border: 1px solid black width:250px;">Alumno</td>

		</tr>

	</table>

EOF;


		$pdf->writeHTML($html1, false, false, false, false, '');

		$columna = "id_materia";
		$valor = $exp[5];

		$inscriptos = MateriasC::VerInscripcionesMateriasC($columna, $valor);

		foreach ($inscriptos as $key => $value) {

			$columna = "id";
			$valor = $value["id_alumno"];

			$alumnos = UsuariosC::VerUsuarios2C($columna, $valor);

			foreach ($alumnos as $key => $v) {

				if ($value["id_comision"] == $exp[6]) {

					$columna = "id";
					$valor = $exp[6];

					$comision = MateriasC::VerComisiones2C($columna, $valor);

					$html2 = <<<EOF

	<table style="border: 1px solid black; text-align:center; font-size:15px">

		<tr>

			<td style="border: 1px solid black width:115px;">$value[id_comision]</td>
			<td style="border: 1px solid black width:115px;">$v[matricula]</td>
			<td style="border: 1px solid black width:250px;">$v[apellido], $v[nombre]</td>

		</tr>

	</table>

EOF;


					$pdf->writeHTML($html2, false, false, false, false, '');
				}
			}
		}


		$pdf->Output('Insc-Comision-' . $comision["numero"] . '-' . $materia["nombre"] . '.pdf');
	}
}

$a = new pdfInscriptosMateria();
$a->pdfInscriptos();
