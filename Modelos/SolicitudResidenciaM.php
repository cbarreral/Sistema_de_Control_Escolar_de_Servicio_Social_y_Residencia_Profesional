<?php
require_once "ConexionBD.php";
class SolicitudResidenciaM extends ConexionBD
{

    static public function ActualizarSolicitudM($tablaBD,$valor,$matricula){
        $pdo = ConexionBD::conBD()->prepare("UPDATE $tablaBD SET estado=:estado WHERE matricula = :matricula");
        $pdo->bindParam(":estado", $valor, PDO::PARAM_INT);
        $pdo->bindParam(":matricula", $matricula, PDO::PARAM_INT);
        if ($pdo->execute()) {
            return true;
        }

         return $pdo -> fetch();

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
    static public function CrearSolicitudM($tablaBD, $datosC)
    {
        echo '
        <script>
        alert(' . $datosC["matricula"] . ');
        </script>
        ';
        /*
            ["telefono"],""=>$_POST["tipoProyecto"],"IMSS"=>$_POST["IMSS"],
            "polizaSeguroAlumno"=>$_POST["poliza"],"estado"=>$status);
        */
        $pdo = ConexionBD::conBD()->prepare("INSERT INTO $tablaBD 
        (fechaSolicitud, periodo,nombreCarta,nombreEmpresa,domicilioEmpresa,telefonoEmpresa,emailEmpresa,nombreAlumno,carreraAlumno,especialidadAlumno,matricula,emailAlumno,telefonoAlumno,tipoProyecto,IMSS,polizaSeguroAlumno,estado) VALUES(:fechaSolicitud,:periodo,:nombreCarta,:nombreEmpresa,:domicilioEmpresa,:telefonoEmpresa,:emailEmpresa,:nombreAlumno,:carreraAlumno,:especialidadAlumno,:matricula,:emailAlumno,:telefonoAlumno,:tipoProyecto,:IMSS,:polizaSeguroAlumno,:estado)");

        $pdo->bindParam(":fechaSolicitud", $datosC["fecha"], PDO::PARAM_STR);
        $pdo->bindParam(":periodo", $datosC["periodo"], PDO::PARAM_STR);
        $pdo->bindParam(":nombreCarta", $datosC["nombreCarta"], PDO::PARAM_STR);
        $pdo->bindParam(":nombreEmpresa", $datosC["nombreEmpresa"], PDO::PARAM_STR);
        $pdo->bindParam(":domicilioEmpresa", $datosC["domicilioEmpresa"], PDO::PARAM_STR);
        $pdo->bindParam(":telefonoEmpresa", $datosC["telefonoEmpresa"], PDO::PARAM_STR);
        $pdo->bindParam(":emailEmpresa", $datosC["emailEmpresa"], PDO::PARAM_STR);
        $pdo->bindParam(":nombreAlumno", $datosC["nombreAlumno"], PDO::PARAM_STR);
        $pdo->bindParam(":carreraAlumno", $datosC["carreraAlumno"], PDO::PARAM_STR);
        $pdo->bindParam(":especialidadAlumno", $datosC["especialidadalumno"], PDO::PARAM_STR);
        $pdo->bindParam(":matricula", $datosC["matricula"], PDO::PARAM_INT);
        $pdo->bindParam(":emailAlumno", $datosC["emailAlumno"], PDO::PARAM_STR);
        $pdo->bindParam(":telefonoAlumno", $datosC["telefonoAlumno"], PDO::PARAM_INT);
        $pdo->bindParam(":tipoProyecto", $datosC["tipoProyecto"], PDO::PARAM_STR);
        $pdo->bindParam(":IMSS", $datosC["IMSS"], PDO::PARAM_STR);
        $pdo->bindParam(":polizaSeguroAlumno", $datosC["polizaSeguroAlumno"], PDO::PARAM_STR);
        $pdo->bindParam(":estado", $datosC["estado"], PDO::PARAM_INT);



        if ($pdo->execute()) {
            return true;
        }

        return $pdo->fetch();

        $pdo->close();

        $pdo = null;
    }
}
