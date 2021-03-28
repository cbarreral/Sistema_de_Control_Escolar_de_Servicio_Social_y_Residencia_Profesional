<?php
require_once "ConexionBD.php";

class DocumentosEcenM extends ConexionBD
{


    static public function ActualizarNotasM($tablaBD, $datosC){
        
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET nota_academico = :nota_academico, nota_industrial=:nota_industrial, promedioFinal=:promedioFinal, revisadoJefe=:revisadoJefe, revisadoAdmin=:revisadoAdmin WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":nota_academico", $datosC["nota_academico"], PDO::PARAM_INT);
        $pdo->bindParam(":nota_industrial", $datosC["nota_industrial"], PDO::PARAM_INT);
        $pdo->bindParam(":promedioFinal", $datosC["promedioFinal"], PDO::PARAM_INT);
        $pdo->bindParam(":revisadoJefe", $datosC["revisadoJefe"], PDO::PARAM_INT);
        $pdo->bindParam(":revisadoAdmin", $datosC["revisadoAdmin"], PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }
    static public function ActualizarNotas2M($tablaBD, $datosC){
        
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET revisadoJefe=:revisadoJefe, revisadoAdmin=:revisadoAdmin WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":revisadoJefe", $datosC["revisadoJefe"], PDO::PARAM_INT);
        $pdo->bindParam(":revisadoAdmin", $datosC["revisadoAdmin"], PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }



    static public function VerDocumentosEcenM($tablaBD, $columna, $valor)
    {
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetchAll();

        $pdo->close();
        $pdo = null;
    } 

    static public function VerDocumentosRepM($tablaBD, $columna, $valor)
    {
        if ($columna != null) {
            $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
        $pdo->execute();
        return $pdo->fetchAll();

        $pdo->close();
        $pdo = null;
        } else {
            $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD ORDER BY matricula  DESC");

            $pdo->execute();
            return $pdo->fetchAll();
            $pdo->close();

            $pdo = null;
        }
    }
    
    

    static public function BorrarDocumentosM($tablaBD, $id)
    {
        # code...
        $pdo = ConexionBD::conBD() -> prepare("DELETE FROM $tablaBD WHERE id = :id");

        $pdo ->bindParam(":id", $id ,PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
    } 

    static public function SubirDocEscM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD() -> prepare("INSERT INTO $tablaBD (nombre, PDF, fecha, matricula, id_materia) VALUES (:nombre, :PDF, :fecha, :matricula, :id_materia)");

        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":PDF", $datosC["PDF"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo -> bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
    }
    static public function SubirDocRepM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD() -> prepare("INSERT INTO $tablaBD (nombre, PDF, fecha, matricula, id_materia) VALUES (:nombre, :PDF, :fecha, :matricula, :id_materia)");

        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":PDF", $datosC["PDF"], PDO::PARAM_STR);
        $pdo -> bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo -> bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo -> bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);

        if($pdo -> execute()){
            return true;
        }

        $pdo = null;
    }

}
