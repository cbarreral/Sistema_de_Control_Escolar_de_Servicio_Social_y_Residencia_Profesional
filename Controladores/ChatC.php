<?php
class ChatC{
    static public function VerMensajes($columna,$valor){

        $tablaBD = "observacionesdoc";
        $resultado = ChatM::VerMensajesM($tablaBD,$columna,$valor);
        return $resultado;
    }
}