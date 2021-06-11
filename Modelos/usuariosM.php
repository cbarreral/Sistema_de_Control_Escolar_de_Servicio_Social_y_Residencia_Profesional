<?php

require_once "ConexionBD.php";

class UsuariosM extends ConexionBD
{
    //Iniciar sesión
    static public function IniciarSesionM($tablaBD, $datosC)
    {

        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE matricula = :matricula");

        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_STR);

        $pdo->execute();

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }

    //Ver mis datos
    static public function VerMisDatos($tablaBD, $id)
    {
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE id = :id");

        $pdo->bindParam(":id", $id, PDO::PARAM_INT);

        $pdo->execute();

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }

    //Guardar mis datos 

    public function GuardarDatosM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET 
        fechanac = :fechanac, 
        telefono = :telefono,
        direccion = :direccion,
        correo = :correo, 
        clave = :clave WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":fechanac", $datosC["fechanac"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_INT);

        if ($pdo->execute()) {
            return true;
        }

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }

    public function CrearUsuariosM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (periodo,matricula, clave, apellido, nombre, rol, id_carrera, telefono, direccion, correo, tipo)
        VALUES (:periodo, :matricula, :clave, :apellido, :nombre, :rol, :id_carrera, :telefono, :direccion, :correo, :tipo)");

        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_INT);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":periodo", $datosC["periodo"], PDO::PARAM_STR);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        # return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }

    public function CrearCuentaM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD (matricula, clave, nombre, apellido, id_carrera, telefono, correo,  rol, especialidad)
        VALUES (:matricula, :clave, :nombre, :apellido, :id_carrera, :telefono, :correo,  :rol, :especialidad)");

        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_INT);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
        $pdo->bindParam(":especialidad", $datosC["especialidad"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        # return $pdo -> fetch();

        //$pdo->close();

        $pdo = null;
    }

    //Ver usuarios
    public function verUsuarioM($tablaBD, $columna, $valor)
    {

        if ($columna != null) {
            $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            return $pdo->fetch();
            $pdo->close();

            $pdo = null;
        } else {
            $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD ");

            $pdo->execute();
            return $pdo->fetchAll();
            $pdo->close();

            $pdo = null;
        }
    }

    public function verUsuario2M($tablaBD, $columna, $valor)
    {

            $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna =:$columna");
            $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_STR);
            $pdo->execute();
            return $pdo->fetchAll();
            $pdo->close();
            $pdo = null;
        
    }

    static public function ActualizarUsuariosM($tablaBD, $datosC)
    {
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET apellido = :apellido, 
        nombre=:nombre,
        periodo=:periodo,
        a_academico=:a_academico,
        a_industrial=:a_industrial,
        matricula=:matricula,
        clave=:clave,
        id_carrera=:id_carrera, 
        rol=:rol,
        telefono =:telefono,
        direccion=:direccion, 
        correo=:correo,
        tipo=:tipo WHERE id = :id");

        $pdo->bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":clave", $datosC["clave"], PDO::PARAM_INT);
        $pdo->bindParam(":periodo", $datosC["periodo"], PDO::PARAM_STR);
        $pdo->bindParam(":a_academico", $datosC["a_academico"], PDO::PARAM_STR);
        $pdo->bindParam(":a_industrial", $datosC["a_industrial"], PDO::PARAM_STR);
        $pdo->bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":rol", $datosC["rol"], PDO::PARAM_STR);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":tipo", $datosC["tipo"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        # return $pdo -> fetch();

        $pdo->close();

        $pdo = null;
    }


    //Eliminar usuarios

    static public function EliminarUsuariosM($tablaBD,$id){
        $pdo = ConexionBD::conBD()->prepare("DELETE  FROM $tablaBD WHERE id = :id");
        $pdo ->bindParam(":id",$id,PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }

        $pdo->close();

        $pdo = null;
    }
    
}
