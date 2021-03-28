<?php 

class ConexionBD{

	public function conBD(){
/*
		$host = "bngvhshj15hsambmievv-mysql.services.clever-cloud.com";
		$BD = "bngvhshj15hsambmievv";
		$user = "upcmtyirtvon9isz";
		$password = "HSmsxLWR9ZXN5QsAUD4R";

		$bd = new PDO("mysql:host=bngvhshj15hsambmievv-mysql.services.clever-cloud.com;dbname=bngvhshj15hsambmievv", "upcmtyirtvon9isz", "HSmsxLWR9ZXN5QsAUD4R");
*/
		$bd = new PDO("mysql:host=localhost;dbname=sistemacontrolescolar", "root", "");

		$bd -> exec("set names utf8");

		return $bd;

		

    }
}