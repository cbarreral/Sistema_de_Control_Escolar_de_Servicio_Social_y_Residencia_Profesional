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

}