<?php


require "../PHPMailer/PHPMailer.php";
require "../PHPMailer/SMTP.php";
require "../PHPMailer/Exception.php";
 use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

  class  EnviarCorreo{
    
    public function EnviarCorreo(int $matricula,string $asunto,string $mensaje)
    {
    
    $Destinatario = UsuariosC::VerUsuariosC("matricula",$matricula);
    try{
    $oMail =new PHPMailer();
    $oMail->isSMTP();
    $oMail->Host="smtp.gmail.com";
    $oMail->Port=587;
    $oMail->SMTPSecure="tls";
    $oMail->SMTPAuth=true;
    $oMail->Username="nose.kponer1230@gmail.com";
    $oMail->Password="nosekponer";
    $oMail->setFrom("nose.kponer1230@gmail.com",$_SESSION["nombre"]);
    $oMail->addAddress($Destinatario["correo"],$Destinatario["nombre"]);
    $oMail->Subject=$asunto;
    $oMail->msgHTML($mensaje);
    
     if($oMail->send()){
    
        echo "Mailer Error: " . $oMail->ErrorInfo;
       }
       else{
        echo "Successfully";
       }
    }
    catch(Exception $e){
        return $oMail->ErrorInfo;
    }
    }
 }

