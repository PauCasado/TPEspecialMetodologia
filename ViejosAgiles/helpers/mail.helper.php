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
      $mail->Body= "
        <html> 

        <body> 

        <h1>Solicitud de acceso aceptada</h1>

        <p>Usuario: {$username}</p>
        <p>Clave: {$token}</p>
      
        </body> 

        </html>

        " ;
         $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        ); 
        return $mail->send();
       /*if($success){
            return TRUE;
            }else{
                return FALSE;
            }*/
        }

        public function sendInvitacion( $direccion){
            $nombre= "ScrumGame";
            $smtpHost = "smtp.gmail.com";  // Server Smtp que utilizo
            $smtpUsuario ="viejosagiles@gmail.com";  // Cuenta de gmail
            $smtpClave = "ViejosAgiles2020";  // Mi contraseña
            $mail = new PHPMailer();
            $mail->IsSMTP();
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
            $mail->Subject = "Invitacion a Scrum game"; // Este es el titulo del email.
            $mail->Body= "
            <html> 
    
            <body> 
            <h1>Para aceptar la invitacion, ingresa al siguiente link.</h1>
            <a href='http://localhost/ViejosAgiles/saveJugador'>ScrumGame </a>
    
            </body> 
    
            </html>
    
            " ;
             $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            ); 
            return $mail->send();
        }

        public function sendEncuesta($email,$p1, $p2, $p3, $p4, $p5, $p6, $p7, $p8, $p9, $p10){
            $nombre= "ScrumGame";
            $smtpHost = "smtp.gmail.com";  // Server Smtp que utilizo
            $smtpUsuario ="viejosagiles@gmail.com";  // Cuenta de gmail
            $smtpClave = "ViejosAgiles2020";  // Mi contraseña
            $mail = new PHPMailer();
            $mail->IsSMTP();
            $mail->SMTPAuth = true;
            $mail->Port = 587; 
            $mail->SMTPSecure = 'tls';
            $mail->IsHTML(true); 
            $mail->CharSet = "utf-8";
            $mail->Host = $smtpHost; 
            $mail->Username = $smtpUsuario; 
            $mail->Password = $smtpClave;
            $mail->From =$smtpUsuario; // Email desde donde envio el correo.
            $mail->FromName = $nombre;
            $mail->AddAddress($smtpUsuario); // Direccion de mail donde enviamos
            $mail->Subject = "Encuesta sobre Scrum Game"; // Este es el titulo del email.
          $mail->Body= "
            <html> 
            <body> 

            <label>¿Cómo te pareció la información que se muestra durante todo el juego?:<p> $p1</p></label>
            <label>Además de la información de la tabla de posiciones y ver tus logros ¿qué otra información agregarías para que te incentive a jugar?:<p> $p2</p></label>
            <label>¿Qué te pareció la navegabilidad del juego?: <p>$p3</p></label>
            <label>¿Visitaste la sección Logros?: <p>$p4</p></label>
            <label>¿cómo te resultó la utilización de la sección Mi Perfil?:<p> $p5</p></label>
            <label>En la sección Mi Perfil, se encuentra la información personal, mi imagen de perfil, Logros ¿te gustaría que éstas estén separadas en distintas opciones de menú?:<p> $p6 </p></label>
            <label>¿Te gustaría que salgan nuevas actualizaciones en el juegos?: <p>$p7</p></label>
            <label >Mejoras o sugerencias para enriquecer el juego: <p>$p8</p></label>
            <label>Contanos, ¿que otras metodologias agiles conoces?: <p>$p9</p></label>
            <label>¿Qué es lo que más te gustó del juego?:<p> $p10</p></label>

            </body> 
            </html>
    
            " ;
             $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            ); 
            return $mail->send();
        }

        public function enviarNotificacionRechazo( $direccion){
            $nombre= "ScrumGame";
            $smtpHost = "smtp.gmail.com";  // Server Smtp que utilizo
            $smtpUsuario ="viejosagiles@gmail.com";  // Cuenta de gmail
            $smtpClave = "ViejosAgiles2020";  // Mi contraseña
            $mail = new PHPMailer();
            $mail->IsSMTP();
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
            $mail->Subject = "Respuesta a solicitud a Scrum game"; // Este es el titulo del email.
          $mail->Body= "
            <html> 
    
            <body> 
            <h1>Usted ha sido rechazado</h1>    
            </body> 
    
            </html>
    
            " ;
             $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            ); 
            return $mail->send();
        }


    }