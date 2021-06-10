<?php
require_once "ConexionBD.php";
include 'simplexlsx.class.php';
include "class.upload.php";

if (isset($_FILES["name"])) {
    $up =($_FILES["name"]);
    
    print_r($up);
    $tablaBD = "usuarios";

    $datosC = array(
        "apellido" => $_POST['d1'],

        "nombre" => $_POST['d2'], "matricula" => $_POST['d3'],
        "clave" => $_POST['d4'], "id_carrera" =>$_POST['d5'],
        "rol" => $_POST['d6'],"telefono" => $_POST['d7'],"direccion" => $_POST['d8'],"correo" => $_POST['d9'],"tipo" => $_POST['d10']
    );

    $resultado = UsuariosM::CrearUsuariosM($tablaBD, $datosC);
    if ($resultado == true) {
        echo '<script>
        
        window.location = "'.URL_SERVER.'usuarios";
        </script>';
    }
}
    
   
/*<?php

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','prueba');

$servidor="mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8")
    );
    //echo "<script>alert('Conexión con exito a la base de datos');</script>";
}catch (PDOException $e){
    echo "<script>alert('error al conectar con la base de datos');</script>";
}



$d1 = $_POST['d1'];
$d2 = $_POST['d2'];
$d3 = $_POST['d3'];
$d4 = $_POST['d4'];


$fecha = "2020-03-11 00:00:00";
$estado = "1";

//echo $d1." - ".$d2." - ".$d3." - ".$d4;

$sentencia = $pdo->prepare("INSERT INTO tb_libros
      ( titulo, autor, ano_publicacion, paginas, estado) 
VALUES(:titulo,:autor,:ano_publicacion,:paginas,:estado)");

$sentencia->bindParam(':titulo',$d1);
$sentencia->bindParam(':autor',$d2);
$sentencia->bindParam(':ano_publicacion',$d3);
$sentencia->bindParam(':paginas',$d4);

$sentencia->bindParam(':estado',$estado);
$sentencia->execute(); */



























/*include "class.upload.php";

if(isset($_FILES["name"])){
	$up = new Upload($_FILES["name"]);
	if($up->uploaded){
		$up->Process("./uploads/");
		if($up->processed){ 
            /// leer el archivo excel
            require_once 'PHPExcel/Classes/PHPExcel.php';

            $archivo = "uploads/".$up->file_dst_name;
            $inputFileType = PHPExcel_IOFactory::identify($archivo);
            $objReader = PHPExcel_IOFactory::createReader($inputFileType);
            $objPHPExcel = $objReader->load($archivo);
            $sheet = $objPHPExcel->getSheet(0); 
            $highestRow = $sheet->getHighestRow(); 
            $highestColumn = $sheet->getHighestColumn();

            for ($row = 2; $row <= $highestRow; $row++){ 
                $matricula = $sheet->getCell("A".$row)->getValue();
                $clave = $sheet->getCell("B".$row)->getValue();
                $nombre = $sheet->getCell("C".$row)->getValue();
                $apellido = $sheet->getCell("D".$row)->getValue();
                $id_carrera = $sheet->getCell("E".$row)->getValue();
                $fechanac = $sheet->getCell("F".$row)->getValue();
                $telefono = $sheet->getCell("G".$row)->getValue();
                $direccion = $sheet->getCell("H".$row)->getValue();
                $correo = $sheet->getCell("I".$row)->getValue();
                $rol = $sheet->getCell("J".$row)->getValue();
                $tipo = $sheet->getCell("K".$row)->getValue();

                $sql = "insert into usuarios (matricula, clave, nombre, apellido, id_carrera, fechanac, telefono, direccion, correo, rol, tipo) value ";
                $sql .= " (\"$matricula\",\"$clave\",\"$nombre\",\"$apellido\",\"$id_carrera\",\"$fechanac\",\"$telefono\",\"$direccion\",\"$correo\",\"$rol\",\"$tipo\", NOW())";
               $con->query($sql);
            }
    	unlink($archivo);
        }	

}
echo "<script>
window.location = ''.URL_SERVER.'usuarios';
</script>
";

}*/
