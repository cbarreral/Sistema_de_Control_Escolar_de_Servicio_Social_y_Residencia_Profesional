<?php

require_once "../../Controladores/materiasC.php";
require_once "../../Modelos/materiasM.php";

require_once "../../Controladores/usuariosC.php";
require_once "../../Modelos/usuariosM.php";

require_once "../../Controladores/carrerasC.php";
require_once "../../Modelos/carrerasM.php";



class pdfInscriptosExamen
{

    public function pdfInscriptos()
    {

        require_once('tcpdf_include.php');
        $fecha = date("d-m-Y H:i:s");

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);

  $pdf->AddPage('L');



        $html1 = <<<EOF

	<center><img  width="150px" src="images/logo.png"></center>
	<br><br>

	<h2>Catalogo de empresas</h2>

	<h2>Fecha: $fecha</h2>

	<table style="border: 1px solid black; text-align:center; font-size:12px" >

        <tr>
            <th style="border: 1px solid black ;width:120px" >Codigo</th>
            <th style="border: 1px solid black ;width:120px" >Nombre</th>
            <th style="border: 1px solid black ;width:120px" >Tipo</th>
            <th style="border: 1px solid black ;width:120px" >Carrera</th>

    </tr>

	</table>

EOF;


        $pdf->writeHTML($html1, false, false, false, false, '');


        
        $resultado = MateriasC::VerMateriasC();
        foreach ($resultado as $key => $value) {
            $columna = "id";
            $id_carrera = $value["id_carrera"];
            $carrera = CarrerasC::verCarreraC($columna,$id_carrera);
           
                $html2 = <<<EOF

	<table style="border: 1px solid black; text-align:center; font-size:11px" >

		<tr>

            <td style="border: 1px solid black ;width:120px">$value[codigo]</td>
            <td style="border: 1px solid black ;width:120px">$value[nombre]</td>
            <td style="border: 1px solid black ;width:120px">$value[tipo]</td>
            <td style="border: 1px solid black ;width:120px">$carrera[nombre]</td>

		</tr>

	</table>

EOF;


                $pdf->writeHTML($html2, false, false, false, false, '');
          
    }        
  

        $pdf->Output('Inscriptos-Usuarios'.$fecha. '.pdf');
    }
}

$a = new pdfInscriptosExamen();
$a->pdfInscriptos();
