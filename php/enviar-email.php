<?php
require '../mailer-src/Exception.php';
require '../mailer-src/PHPMailer.php';
require '../mailer-src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'oharinhoreal@gmail.com';                     //SMTP username
    $mail->Password   = 'jofyjdtccvjkgzyq';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('oharinhoreal@gmail.com', 'Ricardo Ohara');
    $mail->addAddress('oharinhoreal@gmail.com', 'Yuri Viado');     //Add a recipient

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'E-Mail teste';
    $mail->Body    = 'Esse e-mail foi enviado <b>em supervisão de Marcelo!</b>';
    $mail->AltBody = 'Esse e-mail foi enviado em supervisão de';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

?>