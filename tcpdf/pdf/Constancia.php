<?php

require_once "../../Controladores/materiasC.php";
require_once "../../Modelos/materiasM.php";

require_once "../../Controladores/usuariosC.php";
require_once "../../Modelos/usuariosM.php";

require_once "../../Controladores/carrerasC.php";
require_once "../../Modelos/carrerasM.php";

require_once "../../Controladores/ConstanciaC.php";
require_once "../../Modelos/ConstanciaM.php";

class Constancia
{

    public function pdfConstancia()
    {

        require_once('tcpdf_include.php');
        $fecha = date("d-m-Y H:i:s");

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);

        $pdf->AddPage();

        $link = $_SERVER['REQUEST_URI'];

        $exp = explode("/", $link);
        $columna = "matricula";
        $valor = $exp[5];

        $resultado = ConstanciaC::VerConstanciaC($columna, $valor);
        $alumno = UsuariosC::VerUsuariosC("matricula", $resultado["matricula"]);
        $inscrip = MateriasC::VerInscripcionesMaterias2C("id_alumno", $alumno["id"]);
        $materias = MateriasC::VerMaterias2C("id", $inscrip["id"]);

        $html1 = <<<EOF

	<center><img  width="120px" src="images/logo.png"></center>
	<br><br>
    <h1>$materias[nombre]</h1>
	<h2 >Constancia a $alumno[apellido] $alumno[nombre]</h2>

	<h2>Fecha: $fecha</h2>
<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque commodi totam aliquam possimus repellat
 dolorum ullam pariatur architecto exercitationem placeat quisquam voluptate est temporibus optio, officiis 
 deserunt impedit sed at.</p>
	
 <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque commodi totam aliquam possimus repellat
 dolorum ullam pariatur architecto exercitationem placeat quisquam voluptate est temporibus optio, officiis 
 deserunt impedit sed at.</p>
 <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cumque commodi totam aliquam possimus repellat
 dolorum ullam pariatur architecto exercitationem placeat quisquam voluptate est temporibus optio, officiis 
 deserunt impedit sed at.</p>
EOF;


        $pdf->writeHTML($html1, false, false, false, false, '');




        $html2 = <<<EOF

	

EOF;


        $pdf->writeHTML($html2, false, false, false, false, '');




        $pdf->Output('Constancia_de_'.$alumno["nombre"].'_' . $fecha . '.pdf');
    }
}

$a = new Constancia();
$a->pdfConstancia();
