<?
$propos="Voir page suivante";
$url_propos="http://localhost/LBOUR/propos.php"

$Comp="Voir page suivante";
$url_Comp="http://localhost/LBOUR/Comp.php";

$Form="Voir page suivante";
$url_Form="http://localhost/LBOUR/Form.php";

$Cont="Voir page suivante";
$url_Cont="http://localhost/LBOUR/Cont.php";

$Exp="Voir page suivante";
$url_Exp="http://localhost/LBOUR/Exp.php";

?>
<?php
include_once 'vendor/autoload.php';
$config=include_once 'smtp.conf.php'
use PHPMailer\PHPMailer\PHPMailer;
 
function sendMail(string $to, string $from, string $from_name, string $subject, string $body) {
    $mail = new PHPMailer(true);  // Crée un nouvel objet PHPMailer
    $mail->IsSMTP(); // active SMTP
    $mail->SMTPDebug = 0;  // debogage: 1 = Erreurs et messages, 2 = messages seulement
    $mail->SMTPSecure = 'tls'; //or ssl
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587; 
 
    $mail->SMTPAuth = true;  // Authentification SMTP active
    $mail->Username = $config "youremail@gmail.com";
    $mail->Password = $config 'yourpassword';
 
        $mail->isHTML(true);
    $mail->SetFrom($from, $from_name);
    $mail->Subject = $subject;
    $mail->Body = $body;
    $mail->AddAddress($to);
    $mail->Send();
}
?>