<?php
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';
  
$mail = new PHPMailer(true);
  
try {
    $mail->SMTPDebug = 2;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'sunglahelpdesk@gmail.com';  
    $mail->Password   = 'sungla123';  
    $mail->SMTPSecure = 'tls';                               
    $mail->Port       = 967;  
  
    $mail->setFrom('sunglahelpdesk@gmail.com', 'Sungla Helpdesk');          
    $mail->addAddress('sargundeepkaur.s@somaiya.edu');
       
    $mail->isHTML(true);                                  
    $mail->Subject = 'EXP-6';
    $mail->Body    = ' Hi this is Shriya';
    $mail->AltBody = 'Experiment finally successfully';
    $mail->send();
    echo "Mail has been sent successfully!";
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
  
?>