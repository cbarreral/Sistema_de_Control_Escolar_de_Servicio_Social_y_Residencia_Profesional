<?php
require_once "ConexionBD.php";
class SolicitudResidenciaM extends ConexionBD
{

    static public function ActualizarSolicitudM($tablaBD, $valor, $matricula)
    {
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET estado=:estado WHERE matricula = :matricula");
        $pdo->bindParam(":estado", $valor, PDO::PARAM_INT);
        $pdo->bindParam(":matricula", $matricula, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }

    static public function ContarSolicitudM($tablaBD, $columna, $valor)
    {
        $pdo = ConexionBD::conBD()->prepare("SELECT COUNT(*) FROM $tablaBD WHERE $columna=:$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        $total = $pdo->fetchColumn();
        echo $total;
        return $pdo->fetchColumn();
        $pdo->close();
        $pdo = null;
    }
    static public function VerSolicitudM($tablaBD, $columna, $valor)
    {
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetch();
        $pdo->close();
        $pdo = null;
    }
    static public function VerSolicitudesM($tablaBD, $columna, $valor)
    {
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna");
        $pdo->bindParam(":" . $columna, $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
        $pdo = null;
    }
    static public function SubirArchivosM($tablaBD, $datosC)
    {

        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD 
        (kardex, servicioSocial,IMSS,numIMSS,matricula) VALUES(:kardex, :servicioSocial, :IMSS, :numIMSS,:matricula)");

        $pdo->bindParam(":kardex", $datosC["kardex"], PDO::PARAM_STR);
        $pdo->bindParam(":servicioSocial", $datosC["servicioSocial"], PDO::PARAM_STR);
        $pdo->bindParam(":IMSS", $datosC["IMSS"], PDO::PARAM_STR);
        $pdo->bindParam(":numIMSS", $datosC["numIMSS"], PDO::PARAM_STR);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_STR);



        if ($pdo->execute()) {
            return true;
        }

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }
    static public function AceptarSolicitud($tablaBD, $datosC)
    {
/*"id_dataE"=>$_POST["id_dataE"], "id_dataC"=>$_POST["id_dataC"], "id_files"=>$_POST["id_files"], "obcervaciones"=>$_POST["obcervaciones"],"estado"=>$estado, "matricula"=>$_POST["matricula"]*/
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD 
        (id_datosEstudiante, id_datosCarta,id_requisitosCarta,estado,matricula,obcervaciones) VALUES(:id_datosEstudiante, :id_datosCarta,:id_requisitosCarta,:estado,:matricula,:obcervaciones)");

        $pdo->bindParam(":id_datosEstudiante", $datosC["id_dataE"], PDO::PARAM_INT);
        $pdo->bindParam(":id_datosCarta", $datosC["id_dataC"], PDO::PARAM_INT);
        $pdo->bindParam(":id_requisitosCarta", $datosC["id_files"], PDO::PARAM_INT);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":obcervaciones", $datosC["obcervaciones"], PDO::PARAM_STR);


        if ($pdo->execute()) {
            return true;
        }

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }



    static public function CrearSolicitudM($tablaBD, $datosC)
    {

        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD 
        (id_datosEstudiante, id_datosCarta,id_requisitosCarta,estado,matricula) VALUES(:id_datosEstudiante,:id_datoscarta,:id_requisitosCarta,:estado,:matricula)");

        $pdo->bindParam(":id_datosEstudiante", $datosC["id_datosEstudiante"], PDO::PARAM_INT);
        $pdo->bindParam(":id_datoscarta", $datosC["id_datoscarta"], PDO::PARAM_INT);
        $pdo->bindParam(":id_requisitosCarta", $datosC["id_requisitoscarta"], PDO::PARAM_INT);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);



        if ($pdo->execute()) {
            return true;
        }

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }



    static public function Tabla_datosestudianteM($tablaBD, $datosC)
    {

        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD 
        (fechaRegistro,periodo,nombre, sexo,matricula,id_carrera,especialidad,telefono,semestre,100Mate,cursandoMate,cuantasMateCursando,platicaInfo) VALUES(:fechaRegistro,:periodo,:nombre, :sexo,:matricula,:id_carrera,:especialidad,:telefono,:semestre,:100Mate,:cursandoMate,:cuantasMateCursando,:platicaInfo)");

        $pdo->bindParam(":fechaRegistro", $datosC["fechaRegistro"], PDO::PARAM_STR);
        $pdo->bindParam(":periodo", $datosC["periodo"], PDO::PARAM_STR);
        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":sexo", $datosC["sexo"], PDO::PARAM_STR);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":id_carrera", $datosC["id_carrera"], PDO::PARAM_INT);
        $pdo->bindParam(":especialidad", $datosC["especialidad"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_INT);
        $pdo->bindParam(":semestre", $datosC["semestre"], PDO::PARAM_INT);
        $pdo->bindParam(":100Mate", $datosC["100Mate"], PDO::PARAM_STR);
        $pdo->bindParam(":cursandoMate", $datosC["cursandoMate"], PDO::PARAM_STR);
        $pdo->bindParam(":cuantasMateCursando", $datosC["cuantasMateCursando"], PDO::PARAM_STR);
        $pdo->bindParam(":platicaInfo", $datosC["platicaInfo"], PDO::PARAM_STR);
       // $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_STR);

        if ($pdo->execute()) {
            return true;
        }

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }

    static public function Tabla_datoscartaM($tablaBD, $datosC)
    {

        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD 
        (nombre, direccion,municipio,estado,telefono,persona,cargo,correo,matricula) VALUES(:nombre, :direccion,:municipio,:estado,:telefono,:persona,:cargo,:correo,:matricula)");

        $pdo->bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo->bindParam(":direccion", $datosC["direccion"], PDO::PARAM_STR);
        $pdo->bindParam(":municipio", $datosC["municipio"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_STR);
        $pdo->bindParam(":telefono", $datosC["telefono"], PDO::PARAM_INT);
        $pdo->bindParam(":persona", $datosC["persona"], PDO::PARAM_STR);
        $pdo->bindParam(":cargo", $datosC["cargo"], PDO::PARAM_STR);
        $pdo->bindParam(":correo", $datosC["correo"], PDO::PARAM_STR);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_STR);
        if ($pdo->execute()) {
            return true;
        }

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }
    static public function VerdatosM()
    {

        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM datosestudiante INNER JOIN datoscarta INNER JOIN requisitoscarta ");
        //$pdo->bindParam(":matricula", $valor, PDO::PARAM_INT);
        $pdo->execute();
        return $pdo->fetchAll();
        $pdo->close();
        $pdo = null;
    }
    static public function VerEstudiantesM($tablaBD){
        /**
         * ORDER BY sale_date DESC
 LIMIT 10
         */
        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD ORDER BY fechaRegistro ASC");
        $pdo->execute();
            return $pdo->fetchAll();
            $pdo->close();

            $pdo = null;
    }static public function VerDataEstudiantesM($tablaBD,$columna,$valor){

        $pdo = ConexionBD::conBD()->prepare("SELECT * FROM $tablaBD WHERE $columna=:$columna");
        $pdo->bindParam(":".$columna,$valor,PDO::PARAM_INT);
        $pdo->execute();
            return $pdo->fetch();
            $pdo->close();

            $pdo = null;
    }
   
}
