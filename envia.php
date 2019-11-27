<?php

session_start();
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../PHPMailer-master/src/Exception.php';
require '../PHPMailer-master/src/PHPMailer.php';
require '../PHPMailer-master/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

$nome = $_POST['nome'];
$email = $_POST['email'];
$assunto = $_POST['assunto'];
$mensagem = $_POST['msg'];

try {
    //Server settings
    //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
    $mail->isSMTP();                                              // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                         // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                     // Enable SMTP authentication
    $mail->Username   = 'testeemailkamile@gmail.com';             // SMTP username
    $mail->Password   = 'kamile18';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;           // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                      // TCP port to connect to

    //Recipients
    $mail->setFrom($email, $nome);
    //$mail->addAddress('joe@example.net', 'Joe User');           // Add a recipient
    $mail->addAddress('nicolypossebon123@gmail.com');              // Name is optional
    $mail->addReplyTo($email, $nome);
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    // Attachments
    // $mail->addAttachment('/var/tmp/file.tar.gz');              // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');          // Optional name

    // Content
    $mail->isHTML(true);                                         // Set email format to HTML
    $mail->Subject = $assunto;
    $mail->Body    = $mensagem;
    $mail->AltBody = $mensagem;

    $mail->send();
    if(isset($_SESSION['tipo'])){
        if($_SESSION['tipo'] == 1){
        header('locaion:home_contribuidor');
        }else if ($_SESSION['tipo'] == 0){
        header('location:home_adm.php');  
        }
    }else{   
    header('location:home_usuario.php');
    }

} catch (Exception $e) {
    echo "Email não enviado. Mailer Error: {$mail->ErrorInfo}";
}