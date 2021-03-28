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
<h1>Tabla de registro de usuarios</h1>
<br><br>
<thead>
<tr style='background-color:lightslategray'>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Apellido</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Nombres</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Carreras</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Matricula</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>clave</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>tipo</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>telefono</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Direccion</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Correo</th>
    <th style='border: 1px solid black; text-align:center; font-weight: bold; font-size:15px'>Rol</th>
    
</tr>
</thead>
<tbody>";
$columna = null;
$valor = null;
$resultado = UsuariosC::VerUsuariosC($columna, $valor);
foreach ($resultado as $key => $value) {
    $columnaC = "id";
    $valorC = $value["id_carrera"];

    $carrera = CarrerasC::verCarreraC($columnaC, $valorC);
$salida .= 	"
            <thead >
            <tr>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["apellido"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["nombre"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$carrera["nombre"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["matricula"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["clave"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["tipo"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["telefono"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["direccion"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["correo"]."</th>
                <th style='border: 1px solid black; text-align:center; font-size:15px'>".$value["rol"]."</th>
            </tr>
        </thead>
        ";
}
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=usuarios_$fecha.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $salida;
?>