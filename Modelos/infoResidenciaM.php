<?php
require_once "ConexionBD.php";

class infoResidenciaM extends ConexionBD
{

    public static function VerInfoM($tablaBD){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD" );
        $pdo->execute();

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }
    public static function VerProcesos($tablaBD){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD ORDER BY num ASC" );
        $pdo->execute();

        return $pdo->fetchAll();

        $pdo->close();

        $pdo = null;
    }
    public static function VerDocM($tablaBD){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD " );
        $pdo->execute();

        return $pdo->fetchAll();

        $pdo->close();

        $pdo = null;
    }

    static public function ActialzarObjectivos($tablaBD,$objectivo){

        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET 
        objetivos=:objetivos
         WHERE id = 1");

        $pdo->bindParam(":objetivos", $objectivo, PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }
    static public function ActialzarCalendario($tablaBD,$CalendarioPDF){

        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET 
        calendarioPDF=:calendarioPDF
         WHERE id = 1");

        $pdo->bindParam(":calendarioPDF", $CalendarioPDF, PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }

    static public function ActialzarCatalogo($tablaBD, $empresasPDF){
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET 
        empresasPDF=:empresasPDF
         WHERE id = 1");

        $pdo->bindParam(":empresasPDF", $empresasPDF, PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }
    static public function CrearPorcesoM($tablaBD,$info,$num){
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (info, num) VALUES (:info, :num)");

        $pdo->bindParam(":info", $info, PDO::PARAM_STR);
        $pdo->bindParam(":num", $num, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }
    static public function CrearDocumentacion($tablaBD, $PDF,$nombre){
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (PDF, nombre) VALUES (:PDF, :nombre)");

        $pdo->bindParam(":PDF", $PDF, PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $nombre, PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }

    static public function BorrarPorcesoM($tablaBD,$id){
        $pdo = ConexionBD::conBD()->prepare("DELETE FROM $tablaBD WHERE id =:id");

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }

    static public function BorrarDocumentoM($tablaBD,$id){
        $pdo = ConexionBD::conBD()->prepare("DELETE FROM $tablaBD WHERE id =:id");

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }

}