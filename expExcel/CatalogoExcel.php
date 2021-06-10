<?php

require_once "../Controladores/materiasC.php";
require_once "../Modelos/materiasM.php";

require_once "../Controladores/usuariosC.php";
require_once "../Modelos/usuariosM.php";

require_once "../Controladores/evaluacionesC.php";
require_once "../Modelos/evaluacionesM.php";

require_once "../Controladores/carrerasC.php";
require_once "../Modelos/carrerasM.php";

$fecha = date("d-m-Y H:i:s");
//require_once("class.mysql.php");
$salida ="";
$salida .= "<table>

<br>
<h1>Tabla de empresas en Catalogo</h1>
<br><br>
<thead>
<tr style='background-color:lightslategray'>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Codigo</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Nombre</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Tipo</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Carrera</th>
    
</tr>
</thead>
<tbody>";
$columna = null;
$valor = null;
$resultado = MateriasC::VerMateriasC();
foreach ($resultado as $key => $value) {
    $id_carrera = $value["id_carrera"];
    $valor = "id";

    $carrera =CarrerasC::verCarreraC($valor,$id_carrera);
$salida .= 	"
            <thead >
            <tr>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["codigo"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["nombre"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["tipo"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$carrera["nombre"]."</th>
            </tr>
        </thead>
        ";
}
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=Catalogo_$fecha.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>