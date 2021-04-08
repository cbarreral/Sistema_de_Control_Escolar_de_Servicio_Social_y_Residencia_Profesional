<?php
class ChatC{
    static public function VerMensajes($columna,$valor){

        $tablaBD = "observacionesdoc";
        $resultado = ChatM::VerMensajesM($tablaBD,$columna,$valor);
        return $resultado;
    }
    static public function EnviarMensajeC(){
        if(isset($_POST["mensaje"])){
            $tablaBD="observacionesdoc";
			

			$datosC = array("matricula"=>$_POST["matricula"], "id_doc"=>$_POST["id_doc"], "fecha"=>$_POST["fecha"], "id_De"=>$_POST["id_De"], "mensaje"=>$_POST["mensaje"], "tipo"=>$_POST["tipo"]);

			$resultado = ChatM::EnviarMensajeM($tablaBD, $datosC);

			if($resultado == true){

				echo '<script>

				window.location = "http://localhost/Sistema/Obcervaciones/'.$_POST["matricula"].'/'.$_POST["id_doc"].'/'.$_POST["tipo"].'";
				</script>';

			}
        }
    }
    public function EliminarChat()
    {
        $exp = explode("/", $_GET["url"]);
        
        
        if (isset($exp[3])) {
            $tablaBD = "documentos";

            $resultado = ChatM::BorrarChatM($tablaBD, $exp[3]);

            if ($resultado == true) {
                echo '<script>

                window.location = "http://localhost/Sistema/verCarpeta/' . $exp[1] . '/' . $exp[2] . '";

                </script>';
            }
        }
    }
}