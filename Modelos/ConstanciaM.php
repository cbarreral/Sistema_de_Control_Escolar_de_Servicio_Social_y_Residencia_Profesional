<?php
require_once "ConexionBD.php";

class ConstanciaM extends ConexionBD
{
    static public function SolicitarM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD() -> prepare("INSERT INTO $tablaBD (matricula,fecha,estado,PDF) VALUES (  :matricula,:fecha,:estado,:PDF)");

        
        $pdo -> bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo -> bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
        $pdo -> bindParam(":PDF", $datosC["PDF"], PDO::PARAM_STR);
        if($pdo -> execute()){
            return true;
        }

        $pdo = null;
    }
    static public function VerConstanciaM($tablaBD, $columna, $valor){
		if($columna== null){
			$pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD");
			$pdo ->execute();
			return $pdo ->fetchAll();
		}else{
			$pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
			$pdo ->bindParam(":".$columna, $valor,PDO::PARAM_STR);
			$pdo ->execute();
			return $pdo ->fetch();
		}
		$pdo -> close();
		$pdo = null;
	}
    static public function GenerarM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET 
        matricula=:matricula,
        fecha=:fecha,
        estado =:estado,
        PDF=:PDF WHERE matricula = :matricula");

        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
        $pdo->bindParam(":PDF", $datosC["PDF"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

        # return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }

}