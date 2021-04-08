<?php
require_once "ConexionBD.php";

class ChatM extends ConexionBD{
    static function VerMensajesM($tablaBD,$columna,$valor){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna");
        $pdo  -> bindParam(":".$columna,$valor, PDO::PARAM_STR);
        $pdo -> execute();
        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo = null;
    }
    static public function EnviarMensajeM($tablaBD, $datosC){
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (matricula, id_doc, id_De, mensaje, fecha,tipo) VALUES (:matricula, :id_doc, :id_De, :mensaje, :fecha,:tipo)");

        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":id_doc", $datosC["id_doc"], PDO::PARAM_INT);
        $pdo->bindParam(":id_De", $datosC["id_De"], PDO::PARAM_INT);
        $pdo->bindParam(":mensaje", $datosC["mensaje"], PDO::PARAM_STR);
        $pdo->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }

       
        $pdo = null;
    }
    static public function BorrarChatM($tablaBD, $id)
    {
        # code...
        $pdo = ConexionBD::conBD() -> prepare("DELETE FROM $tablaBD WHERE id_doc = :id");

        $pdo ->bindParam(":id", $id ,PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
    } 

}