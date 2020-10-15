<?php
require_once("phpmailer/class.phpmailer.php");
require_once("phpmailer/class.smtp.php");
    class MailHelper{

        public function __construct(){

        }
        public function sendMail($token, $direccion, $username){
        $nombre= "ScrumGame";
        $smtpHost = "smtp.gmail.com";  // Server Smtp que utilizo
        $smtpUsuario ="viejosagiles@gmail.com";  // Cuenta de gmail
        $smtpClave = "ViejosAgiles2020";  // Mi contraseña
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 2;
        $mail->SMTPAuth = true;
        $mail->Port = 587; 
        $mail->SMTPSecure = 'tls';
        $mail->IsHTML(true); 
        $mail->CharSet = "utf-8";
        $mail->Host = $smtpHost; 
        $mail->Username = $smtpUsuario; 
        $mail->Password = $smtpClave;
        $mail->From = $smtpUsuario; // Email desde donde envio el correo.
        $mail->FromName = $nombre;
        $mail->AddAddress($direccion); // Direccion de mail donde enviamos
        $mail->Subject = "Solicitud de acceso"; // Este es el titulo del email.
        $mail->Body = "
        <html> 

        <body> 

        <h1>Solicitud de acceso aceptada</h1>

        <p>Usuario: {$username}</p>
         <p>Clave: {$token}</p>
      

        </body> 

        </html>

        ";
         $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        ); 
        $success = $mail->send();
        if($success){
            return TRUE;
            }else{
                return FALSE;
            }
        }
    }