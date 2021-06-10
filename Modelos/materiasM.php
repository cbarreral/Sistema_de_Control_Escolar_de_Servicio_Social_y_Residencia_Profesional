<?php

require_once "ConexionBD.php";

class MateriasM extends ConexionBD{

    static public function CrearMateriaM($tablaBD, $datosC){

		$pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (id_carrera, codigo, nombre,direccion, tipo) VALUES (:id_carrera, :codigo, :nombre, :direccion,:tipo)");

		$pdo -> bindParam("id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
		$pdo -> bindParam("codigo", $datosC["codigo"], PDO::PARAM_STR);
		$pdo -> bindParam("nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam("direccion", $datosC["direccion"], PDO::PARAM_STR);
		$pdo -> bindParam("tipo", $datosC["tipo"], PDO::PARAM_STR);

		if($pdo -> execute()){
			return true;
		}

		$pdo -> close();
		$pdo = null;

	}

    static public function VerMateriasM($tablaBD){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD ORDER BY tipo");
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
        $pdo = null;
    }
    static public function EliminarMateriasM($tablaBD, $id){
        $pdo = ConexionBD::conBD()->prepare("DELETE  FROM $tablaBD 
        WHERE id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();

        $pdo = null;
    }

    static public function VerMaterias2M($tablaBD, $columna, $valor){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna");

        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
        $pdo = null;
    }
    static public function CrearComisionM($tablaBD, $datosC){

        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (id_materia, c_maxima, numero, horas, horario) VALUES (:id_materia, :c_maxima, :numero, :horas, :horario)");

        $pdo->bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo->bindParam(":c_maxima", $datosC["c_maxima"], PDO::PARAM_INT);
        $pdo->bindParam(":numero", $datosC["numero"], PDO::PARAM_STR);
        $pdo->bindParam(":horas", $datosC["horas"], PDO::PARAM_STR);
        $pdo->bindParam(":horario", $datosC["horario"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();
        $pdo = null;
    }
    static public function VerComisionesM($tablaBD, $columna, $valor){

        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna ORDER BY numero ASC");

        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
        $pdo = null;
    }
    static public function VerComisiones2M($tablaBD, $columna, $valor){

        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna");

        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
        $pdo = null;
    }

    static public function EliminarComisionesM($tablaBD, $id){
        $pdo = ConexionBD::conBD()->prepare("DELETE  FROM $tablaBD 
        WHERE id = :id");
        $pdo->bindParam(":id", $id, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();

        $pdo = null;
    }

    static public function ColocarNotasM($tablaBD,$datosC){
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (id_alumno, matricula, id_materia, fecha, a_academico, a_industrial, tipo, estado, nota_final, nota_academico, nota_industrial) VALUES (:id_alumno, :matricula, :id_materia, :fecha, :a_academico, :a_industrial, :tipo, :estado, :nota_final, :nota_academico, :nota_industrial)");
       
        $pdo->bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo->bindParam(":a_academico", $datosC["a_academico"], PDO::PARAM_STR);
        $pdo->bindParam(":a_industrial", $datosC["a_industrial"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo->bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);
        $pdo->bindParam(":nota_academico", $datosC["nota_academico"], PDO::PARAM_STR);
        $pdo->bindParam(":nota_industrial", $datosC["nota_industrial"], PDO::PARAM_STR);
      
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();

        $pdo = null;
    }

    public function VerNotasM($tablaBD,$columna,$valor){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna ");

        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
        $pdo = null;
    }

    public function VerNotas2M($tablaBD,$columna,$valor){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna ");

        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
        $pdo = null;
    }

    static public function CambiarNotasM($tablaBD,$datosC){
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET fecha=:fecha,nota_industrial=:nota_industrial, nota_academico=:nota_academico,nota_final=:nota_final,estado=:estado WHERE id = :id");
        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":fecha", $datosC["fecha"], PDO::PARAM_STR);
        $pdo->bindParam(":nota_industrial", $datosC["nota_industrial"], PDO::PARAM_STR);
        $pdo->bindParam(":nota_academico", $datosC["nota_academico"], PDO::PARAM_STR);
        $pdo->bindParam(":nota_final", $datosC["nota_final"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();

        $pdo = null;

    }

    static public function InscribirMateriaM($tablaBD, $datosC){
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (id_alumno, id_materia, id_comision) VALUES (:id_alumno, :id_materia, :id_comision)");
       
        $pdo->bindParam(":id_alumno", $datosC["id_alumno"], PDO::PARAM_INT);
        $pdo->bindParam(":id_materia", $datosC["id_materia"], PDO::PARAM_INT);
        $pdo->bindParam(":id_comision", $datosC["id_comision"], PDO::PARAM_INT);
        
      
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();

        $pdo = null;
    }
    static public function VerInscripcionesM($tablaBD, $columna, $valor){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetchAll();

		$pdo->close();
		$pdo = null;
    }
    static public function VerInscripciones2M($tablaBD, $columna, $valor){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna = :$columna");

		$pdo -> bindParam(":".$columna, $valor, PDO::PARAM_STR);

		$pdo -> execute();

		return $pdo -> fetch();

		$pdo->close();
		$pdo = null;
    }

    static public function VaciarRegistrosMateriasM($tablaBD){
        $pdo = ConexionBD::conBD()->prepare("DELETE FROM $tablaBD");
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();

        $pdo = null;
    }
}
