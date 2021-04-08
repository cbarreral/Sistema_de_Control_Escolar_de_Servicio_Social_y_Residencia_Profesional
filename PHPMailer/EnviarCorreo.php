<?php

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
$exp = explode("/",$_GET["url"]);
$matricula = $exp[1];
$asunto=$exp[2];
$mensaje =$exp[3];
$Destinatario = UsuariosC::VerUsuariosC("matricula",$exp[1]);
try{
$oMail =new PHPMailer();
$oMail->isSMTP();
$oMail->Host="smtp.gmail.com";
$oMail->Port=587;
$oMail->SMTPSecure="tls";
$oMail->SMTPAuth=true;
$oMail->Username="nose.kponer1230@itsoeh.edu.mx";
$oMail->Password="nosekponer";
$oMail->setFrom("nose.kponer1230@itsoeh.edu.mx",$_SESSION["nombre"]);
$oMail->addAddress($Destinatario["correo"],($Destinatario["nombre"]." ".$Destinatario["apellido"]));
$oMail->Subject=$asunto;
$oMail->msgHTML($mensaje);

 if($oMail->send()){

    echo "Mailer Error: " . $oMail->ErrorInfo;
   }
   else{
    echo "Message has been sent successfully";
   }
}
catch(Exception $e){
    return $omail->ErrorInfo;
}
?>