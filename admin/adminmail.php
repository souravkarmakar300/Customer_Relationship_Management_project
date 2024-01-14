<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';


function sendMail($email, $subject, $body)
{
    $mail = new PHPMailer(true);

    $mail->isSMTP(); //Send using SMTP
    $mail->Host       = 'smtp.gmail.com'; //Set the SMTP server to send through
    $mail->SMTPAuth   = true; //Enable SMTP authentication
    $mail->Username   = 'dking7763@gmail.com'; //SMTP username
    $mail->Password   = 'wmkidndetvzjkjrg'; //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
    $mail->Port       = 465;

    $mail->setFrom('dking7763@gmail.com', 'login');

    $mail->addAddress($email);

    $mail->isHTML(true); //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->send();
}
?>