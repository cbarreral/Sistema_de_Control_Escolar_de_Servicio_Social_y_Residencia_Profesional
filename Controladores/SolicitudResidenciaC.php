<?php
class SolicitudResidenciaC
{
    public function ActualizarSolicitud($Seccion){
        if(isset($_POST["estado"])){
            $tablaBD ="solicitudes";
            $matricula=$_POST["matricula"];
            print_r($matricula);
            $valor =$_POST["estado"];
            $resultado = SolicitudResidenciaM::ActualizarSolicitudM($tablaBD,$valor,$matricula);
            if ($resultado == true) {

                echo '<script>
                   
                    window.location = "' . URL_SERVER . 'verSolicitudes/'.$Seccion.'";
                    </script>';
            }
        }
    }

    static public function ContarSolicitud($columna, $valor)
    {
        $tablaBD = "solicitudes";
        $resultado = SolicitudResidenciaM::ContarSolicitudM($tablaBD,$columna,$valor);
        return $resultado;
    }
    public function CrearSolicitud()
    {
        if (isset($_POST["matricula"])) {

            $estado = 1;
            $tablaBDsolicitudes = "solicitudes";
            $datosC = array(
                "fecha" => $_POST["fecha"], "periodo" => $_POST["periodo"], "nombreCarta" => $_POST["nombreCarta"], "nombreEmpresa" => $_POST["nombreEmpresa"], "domicilioEmpresa" => $_POST["domicilioEmpresa"], "telefonoEmpresa" => $_POST["telefonoEmpresa"], "emailEmpresa" => $_POST["correoEmpresa"],
                "nombreAlumno" => $_POST["nombreAlumno"], "carreraAlumno" => $_POST["carrera"], "especialidadalumno" => $_POST["especialidad"], "matricula" => $_POST["matricula"], "emailAlumno" => $_POST["correo"], "telefonoAlumno" => $_POST["telefono"], "tipoProyecto" => $_POST["tipoProyecto"], "IMSS" => $_POST["IMSS"],
                "polizaSeguroAlumno" => $_POST["poliza"], "estado" => $estado
            );
            print_r($datosC);
            $resultado = SolicitudResidenciaM::CrearSolicitudM($tablaBDsolicitudes, $datosC);
            if ($resultado == true) {

                echo '<script>
                    window.location = "' . URL_SERVER . 'inicio";
                    </script>';
            } else {
                echo '
                <div class="alert alert-danger">Upss!, algo ocurrio, revisa que todos los campos esten llenados de formacorrecta</div>
                ';
            }
        } else {
        }
    }

    static public function VerSolicitud($columna,$valor){
        $tablaBD = "solicitudes";
        $resultado = SolicitudResidenciaM::VerSolicitudM($tablaBD,$columna,$valor);
        return $resultado;
    }
    static public function VerSolicitudes($columna,$valor){
        $tablaBD = "solicitudes";
        $resultado = SolicitudResidenciaM::VerSolicitudesM($tablaBD,$columna,$valor);
        return $resultado;
    }
}
