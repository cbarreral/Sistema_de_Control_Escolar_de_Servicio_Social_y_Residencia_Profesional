<?php

require_once "ConexionBD.php";

class VisitasM extends ConexionBD
{

    static public function VerVisitasM($tablaBD, $columna, $valor)
    {
        if ($columna == null && $valor == null) {
            $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD ORDER BY fecha");

            $pdo->execute();

            return $pdo->fetchAll();

            $pdo->close();
            $pdo = null;
        } else {
            $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna");
            $pdo  -> bindParam(":".$columna,$valor, PDO::PARAM_STR);
            $pdo -> execute();
            return $pdo -> fetch();
    
            $pdo -> close();
            $pdo = null;
           
        }
    }
     static public function CrearVisitaM($tablaBD, $datosC){
        
        $pdo = ConexionBD::conBD() -> prepare("INSERT INTO $tablaBD (matricula, fecha, hora, lugar, estatus,obser) VALUES (:matricula, :fecha, :hora, :lugar, :estatus, :obser)");

        $pdo -> bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo -> bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
        $pdo -> bindParam(":lugar", $datosC["lugar"], PDO::PARAM_STR);
        $pdo -> bindParam(":estatus", $datosC["estatus"], PDO::PARAM_INT);
        $pdo -> bindParam(":obser", $datosC["obser"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;
    } 

    static function BorrarCVisitasM($tablaBD, $id){
        $pdo = ConexionBD::conBD() -> prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo ->bindParam(":id", $id ,PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close(); 
        $pdo = null;
    }
    static public function EditarVisitaM($tablaBD,$datosC){
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET id=:id, matricula=:matricula, fecha=:fecha, hora=:hora, lugar=:lugar, estatus=:estatus WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_STR);
        $pdo->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo->bindParam(":hora", $datosC["hora"], PDO::PARAM_STR);
        $pdo->bindParam(":lugar", $datosC["lugar"], PDO::PARAM_STR);
        $pdo->bindParam(":estatus", $datosC["estatus"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();

        $pdo = null;

    }
}
