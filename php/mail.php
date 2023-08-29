<?php

$name = $_POST["name"];
$number = $_POST["number"];


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "vendor/autoload.php";

$mail = new PHPMailer(true);

//Enable SMTP debugging.
$mail->SMTPDebug = 0;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
$mail->setLanguage("ru");
$mail->CharSet = "utf-8";
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "sitezayavki330@gmail.com";
$mail->Password = "gewoaobmsdbfnmyj";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;


$mail->From = "sitezayavki330@gmail.com";
$mail->FromName = "Sitezayavki";
$mail->addAddress("sitezayavki330@gmail.com", "Site");

$mail->isHTML(true);

$mail->Subject = $name;
$mail->Body = $number;


try {
$mail->send();
  header("Location: ../sent.html");
} catch (Exception $e) {
echo "Mailer Error: " . $mail->ErrorInfo;
}