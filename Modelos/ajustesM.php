<?php

require_once "ConexionBD.php";
class AjustesM extends ConexionBD
{
    public function VerAjustesM($tablaBD, $columna, $valor)
    {
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);

        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
        $pdo = null;
    }

    public function CambiarPeriodoM($tablaBD, $periodo)
    {
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET periodo = :periodo WHERE id =1");
        $pdo->bindParam(":periodo", $periodo, PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        $pdo->close();
        $pdo = null;
    }
    static public function ActualizarajustesM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET 
        1_fecha_inicio = :1_fecha_inicio,
        1_fecha_fin = :1_fecha_fin,
        2_fecha_inicio = :2_fecha_inicio,
        2_fecha_fin = :2_fecha_fin,
        evaluacion_i = :evaluacion_i, 
        evaluacion_f = :evaluacion_f,
        inscripciones_i = :inscripciones_i, 
        inscripciones_f = :inscripciones_f 
        WHERE id=1");
        $pdo->bindParam(":1_fecha_inicio",$datosC["1_fecha_inicio"], PDO::PARAM_STR);
        $pdo->bindParam(":1_fecha_fin",$datosC["1_fecha_fin"], PDO::PARAM_STR);
        $pdo->bindParam(":2_fecha_inicio",$datosC["2_fecha_inicio"], PDO::PARAM_STR);
        $pdo->bindParam(":2_fecha_fin",$datosC["2_fecha_fin"], PDO::PARAM_STR);
        $pdo->bindParam(":evaluacion_i",$datosC["evaluacion_i"], PDO::PARAM_STR);
        $pdo->bindParam(":evaluacion_f",$datosC["evaluacion_f"], PDO::PARAM_STR);
        $pdo->bindParam(":inscripciones_i",$datosC["inscripciones_i"], PDO::PARAM_STR);
        $pdo->bindParam(":inscripciones_f",$datosC["inscripciones_f"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }
        
    }
    static public function HMM($tablaBD, $datosC){
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET h_inscripciones =:h_inscripciones WHERE id = :id");

        $pdo -> bindParam(":id",$datosC["id"],PDO::PARAM_INT);
        $pdo -> bindParam(":h_inscripciones",$datosC["h_inscripciones"],PDO::PARAM_STR);
   
        if ($pdo->execute()) {
            return true;
        }
        $pdo ->close();
        $pdo = null;
    }
   /* static public function DMM($tablaBD, $datosC){
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET h_inscripciones =:h_inscripciones WHERE id = :id");

        $pdo -> bindParam(":id",$datosC["id"],PDO::PARAM_INT);
        $pdo -> bindParam(":h_inscripciones",$datosC["h_inscripciones"],PDO::PARAM_STR);
   
        if ($pdo->execute()) {
            return true;
        }
        $pdo ->close();
        $pdo = null;
    }*/
}
