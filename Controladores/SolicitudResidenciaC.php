<?php
class SolicitudResidenciaC
{
    public function AceptarSolicitud()
    {
        if (isset($_POST["matricula"])&& $_POST["estado"]!=0 ) {
        
            $tablaBD ="solicitudes";
            $datosC = array("id_dataE"=>$_POST["id_dataE"], "id_dataC"=>$_POST["id_dataC"], "id_files"=>$_POST["id_files"], "obcervaciones"=>$_POST["obcervaciones"],"estado"=>$_POST["estado"], "matricula"=>$_POST["matricula"]);
            $respuesta = SolicitudResidenciaM::AceptarSolicitud($tablaBD,$datosC);
            //return $respuesta;

            if($respuesta==true);
            echo'
            <script>
            alert("OK: el valor de respuesta: '.$respuesta.' \n el valor de status: '.$_POST["estado"].'");
            window.location = "' . URL_SERVER . 'verSolicitudes/1/";
            </script>
            ';
        } 
    }

    public function ActualizarSolicitud($Seccion)
    {
        if (isset($_POST["estado"])) {
            $tablaBD = "solicitudes";
            $matricula = $_POST["matricula"];
            print_r($matricula);
            $valor = $_POST["estado"];
            if ($valor > 0) {
                $resultado = SolicitudResidenciaM::ActualizarSolicitudM($tablaBD, $valor, $matricula);
                if ($resultado == true) {

                    echo '<script>
                       
                        window.location = "' . URL_SERVER . 'verSolicitudes/' . $Seccion . '";
                        </script>';
                }
            } else {
                echo '
                <script>
                Alert("No se selecciono un estado");
                </script>
                ';
            }
        }
    }

    static public function ContarSolicitud($columna, $valor)
    {
        $tablaBD = "solicitudes";
        $resultado = SolicitudResidenciaM::ContarSolicitudM($tablaBD, $columna, $valor);
        return $resultado;
    }
    public function CrearSolicitud()
    {
        if (isset($_POST["matricula"]) && isset($_POST["fecha"])) {


            $estado = 1;
            $tabla_datosestudiante = "datosestudiante";
            $tabla_datoscarta = "datoscarta";
            $tabla_solicitud = "solicitudes";

            $datos_datosestudiante = array(
                "fechaRegistro" => $_POST["fecha"], "periodo" => $_POST["periodo"], "nombre" => $_POST["nombreAlumno"], "sexo" => $_POST["sexo"], "matricula" => $_POST["matricula"], "id_carrera" => $_POST["carrera"], "especialidad" => $_POST["especialidad"], "telefono" => $_POST["telefono"], "semestre" => $_POST["semestre"],
                "100Mate" => $_POST["100materias"], "cursandoMate" => $_POST["cursandomaterias"], "cuantasMateCursando" => $_POST["cuantasmaterias"], "platicaInfo" => $_POST["platica"]

            );
            $datos_datoscarta = array(
                "nombre" => $_POST["nombreEmpresa"], "direccion" => $_POST["domicilio"], "municipio" => $_POST["municipio"], "estado" => $_POST["estadoEmpresa"], "telefono" => $_POST["telefonoEmpresa"], "persona" => $_POST["persona"], "cargo" => $_POST["cargo"],
                "correo" => $_POST["correoEmpresa"], "matricula" => $_POST["matricula"]
            );

            $matricula = $_POST["matricula"];
            $columna = "matricula";

            /*  print_r($datos_datosestudiante);
            print_r("<br> <br>");
            print_r($datos_datoscarta);
*/

            $res_datosestudiante = SolicitudResidenciaM::Tabla_datosestudianteM($tabla_datosestudiante, $datos_datosestudiante);
            $res_datoscarta = SolicitudResidenciaM::Tabla_datoscartaM($tabla_datoscarta, $datos_datoscarta);
            if ($res_datoscarta == true) {
                echo 'OK 1 <br>';
                if ($res_datosestudiante == true) {

                   /* $respuestaVer = SolicitudResidenciaM::Verdatos($columna, $matricula);
                   // foreach ($respuestaVer as $key => $value) {
                        
                        $datos_solicitud = array(
                        "id_datosEstudiante" => $respuestaVer["id_datosestudiante"], "id_datoscarta" => $respuestaVer["id_datoscarta"], "id_requisitoscarta" => $respuestaVer["id"], "estado" => $estado, "matricula" => $matricula
                    );
                   // }
                   print_r($datos_solicitud);

                    $solicitud = SolicitudResidenciaM::CrearSolicitudM($tabla_solicitud, $datos_solicitud);
                    print_r("<br>solicitud_ ".$solicitud);
                    if ($solicitud == true) {
                        echo 'OK 3 <br>';
                        echo '<script>
                        window.location = "http://localhost/Sistema/inicio";
                         </script>';
                    }else{
                        echo'err 3';
                    }*/
                    echo '<script>
                        window.location = "http://localhost/Sistema/inicio";
                         </script>';
                     echo '<br>OK 2';

                } else {
                    echo 'err 2 res_datosestudiante';
                    echo '
                    <div class="alert alert-danger">Upss!, algo ocurrio, No se realizo el registro correctamente</div>
                    ';
                }
            } else {
                echo 'err 1 res_datoscarta';
                echo '
                    <div class="alert alert-danger">Upss!, algo ocurrio, No se realizo el registro correctamente</div>
                    ';
            }
        } else {
            echo '
                <div class="alert alert-primary">Upss. Ocurrio un error, no olvides llenar todos los campos, tal vez pasaste por alto un campo, reviza detalladamente todos los campos</div>
                ';
        }
    }

    static public function VerSolicitud($columna, $valor)
    {
        $tablaBD = "solicitudes";
        $resultado = SolicitudResidenciaM::VerSolicitudM($tablaBD, $columna, $valor);
 return $resultado;
    }
    static public function VerSolicitudes($columna, $valor)
    {
        $tablaBD = "solicitudes";
        $resultado = SolicitudResidenciaM::VerSolicitudesM($tablaBD, $columna, $valor);
        return $resultado;
    }
    static public function VerdatosC(){
        
        $resultado = SolicitudResidenciaM::VerdatosM();
        return $resultado;
    }
    static public function VerEstudiantesC(){
        $tablaBD="datosestudiante";
        $resultado = SolicitudResidenciaM::VerEstudiantesM($tablaBD);
        return $resultado;
    }
    static public function VerDataEstudiantesC($columna,$valor){
        $tablaBD="datosestudiante";
        $resultado = SolicitudResidenciaM::VerDataEstudiantesM($tablaBD,$columna,$valor);
        return $resultado;
    }
    static public function VerDataCartaC($columna,$valor){
        $tablaBD="datoscarta";
        $resultado = SolicitudResidenciaM::VerDataEstudiantesM($tablaBD,$columna,$valor);
        return $resultado;
    }
    static public function VerArchivosC($columna,$valor){
        $tablaBD="requisitoscarta";
        $resultado = SolicitudResidenciaM::VerDataEstudiantesM($tablaBD,$columna,$valor);
        return $resultado;
    }
}
