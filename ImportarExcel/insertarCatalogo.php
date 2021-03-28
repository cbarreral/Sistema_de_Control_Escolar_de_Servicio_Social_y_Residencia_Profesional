<?php
/**
 * Created by PhpStorm.
 * User: HILARI
 * Date: 02/01/2020
 * Time: 10:40
 */

define('SERVIDOR','localhost');
define('USUARIO','root');
define('PASSWORD','');
define('BD','sistemacontrolescolar');

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
$d5 = $_POST['d5'];
$d6 = $_POST['d6'];


//echo $d1." - ".$d2." - ".$d3." - ".$d4;

$sentencia = $pdo->prepare("INSERT INTO materias
      (id_carrera, codigo, nombre, grado, tipo,PDF)
        VALUES (:id_carrera, :codigo, :nombre, :grado, :tipo, :PDF)");


$sentencia->bindParam(":id_carrera", $d1, PDO::PARAM_INT);
$sentencia->bindParam(":codigo",$d2, PDO::PARAM_STR);
$sentencia->bindParam(":nombre", $d3, PDO::PARAM_STR);
$sentencia->bindParam(":grado", $d4, PDO::PARAM_INT);
$sentencia->bindParam(":tipo", $d5, PDO::PARAM_STR);
$sentencia->bindParam(":PDF", $d6, PDO::PARAM_STR);

$sentencia->execute();