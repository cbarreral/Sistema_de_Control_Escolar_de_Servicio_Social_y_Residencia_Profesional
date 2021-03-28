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

	<h2>Usuarios inscriptos</h2>

	<h2>Fecha: $fecha</h2>

	<table style="border: 1px solid black; text-align:center; font-size:12px" >

        <tr>
            <th style="border: 1px solid black ;width:80px" >Apellido</th>
            <th style="border: 1px solid black ;width:80px" >Nombre</th>
            <th style="border: 1px solid black ;width:80px" >Carrera</th>
            <th style="border: 1px solid black ;width:80px" >Matricula</th>
            <th style="border: 1px solid black ;width:80px" >Contraseña</th>
            <th style="border: 1px solid black ;width:80px" >tipo</th>
            <th style="border: 1px solid black ;width:80px" >telefono</th>
            <th style="border: 1px solid black ;width:80px" >Direccion</th>
            <th style="border: 1px solid black ;width:80px" >Correo</th>
            <th style="border: 1px solid black ;width:80px" >Rol</th>
    </tr>

	</table>

EOF;


        $pdf->writeHTML($html1, false, false, false, false, '');


        $columna = null;
        $valor = null;
        $resultado = UsuariosC::VerUsuariosC($columna, $valor);
        foreach ($resultado as $key => $value) {
            

            $carrera = CarrerasC::verCarreraC( "id", $value["id_carrera"]);


      
           
          

                $html2 = <<<EOF

	<table style="border: 1px solid black; text-align:center; font-size:11px" >

		<tr>

            <td style="border: 1px solid black ;width:80px">$value[apellido]</td>
            <td style="border: 1px solid black ;width:80px">$value[nombre]</td>
            <td style="border: 1px solid black ;width:80px">$carrera[nombre]</td>
            <td style="border: 1px solid black ;width:80px">$value[matricula]</td>
            <td style="border: 1px solid black ;width:80px">$value[clave]</td>
            <td style="border: 1px solid black ;width:80px">$value[tipo]</td>
            <td style="border: 1px solid black ;width:80px">$value[telefono]</td>
            <td style="border: 1px solid black ;width:80px">$value[direccion]</td>
            <td style="border: 1px solid black ;width:80px">$value[correo]</td>
            <td style="border: 1px solid black ;width:80px">$value[rol]</td>

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
