<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';


if(isset($_POST['enviar'])){

 $nombre = $_POST['nombre'];
 $email = $_POST['email'];
 $mensaje = $_POST['mensaje'];





$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dsmerchan6@misena.edu.co';                     //SMTP username
    $mail->Password   = 'simonesimons12';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('dsmerchan6@gmisena.edu.co', $nombre);
    $mail->addAddress('merchangonzalesstiven@gmail.com', $nombre);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Contactenos';
    $mail->Body    = $mensaje.' .enviar respuesta a '.$email;

    $mail->send();
    echo 'El mensaje de envio correctamente';
} catch (Exception $e) {
    echo "Error Presentado: {$mail->ErrorInfo}";
}

}

?>