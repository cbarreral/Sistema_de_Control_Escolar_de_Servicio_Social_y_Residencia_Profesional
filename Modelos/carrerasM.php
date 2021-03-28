<?php

require_once "ConexionBD.php";

class CarrerasM extends ConexionBD{

    static public function CrearCarreraM($tablaBD, $carrera)
    {
        $pdo = ConexionBD::conBD() -> prepare("INSERT INTO $tablaBD (nombre) VALUES (:nombre)");

        $pdo -> bindParam(":nombre", $carrera, PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
    }

    //Ver carreras

    static function VerCarrerasM($tablaBD)
    {
        $pdo = ConexionBD::conBD() -> prepare("SELECT * FROM $tablaBD ORDER BY nombre");

        $pdo -> execute();

        return $pdo -> fetchAll();

        $pdo -> close();
        $pdo = null;
    }

    //Editar Carreras

    static public function EditarCarreraM($tablaBD, $id)
    {
        $pdo = ConexionBD::conBD() -> prepare("SELECT * FROM $tablaBD WHERE id = :id");

        $pdo ->bindParam(":id", $id,PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;
    }

    //Actualizar Carreras

    static public function ActualizarCarrerasM($tablaBD,$datosC)
    {
        $pdo = ConexionBD::conBD() -> prepare("UPDATE $tablaBD SET nombre= :nombre WHERE id = :id");

        $pdo ->bindParam(":id", $datosC["id"],PDO::PARAM_INT);
        $pdo ->bindParam(":nombre", $datosC["carrera"],PDO::PARAM_STR);

        if($pdo -> execute()){
            return true;
        }

        $pdo -> close();
        $pdo = null;
    }

    //Eliminar Carreras

    static public function BorrarCarreraM($tablaBD, $id)
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

    static public function vercarreraM($tablaBD,$columna,$valor){
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna");
        $pdo  -> bindParam(":".$columna,$valor, PDO::PARAM_STR);
        $pdo -> execute();
        return $pdo -> fetch();

        $pdo -> close();
        $pdo = null;
    }
}