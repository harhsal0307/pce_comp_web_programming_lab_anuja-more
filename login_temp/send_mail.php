<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      
    $mail->isSMTP();                                           
    $mail->Host       = $_GET['host_id'];                    
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = $_GET['host_email'];                     
    $mail->Password   = $_POST['password'];                               
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;           
    $mail->Port       = 465;                                   

    
    $mail->setFrom('from@example.com', 'Mailer');
    $mail->addAddress('joe@example.net', 'Joe User');    
    $mail->addAddress('ellen@example.com');               
    $mail->addReplyTo('info@example.com', 'Information');
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    // $mail->addAttachment('/var/tmp/file.tar.gz');        
    // $mail->addAttachment('/tmp/article.pdf', 'new.jpg');   


    $mail->isHTML(true);                                  
    $mail->Subject = $_POST['subject'];
    $mail->Body    = $_POST['subject'];;
    // $mail->AltBody = 'Yeh iski jarurat nhi';

    
    $mail->send();
    echo '
    <script>
    alert("Email Sent Successfully");
    </script>';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}