<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/./PHPMailer/src/PHPMailer.php';
require __DIR__.'/./PHPMailer/src/SMTP.php';
require __DIR__.'/./PHPMailer/src/Exception.php';

$subject = 'Newsletter Subscription';        
$email = $_GET['email'];
 $mail = new PHPMailer(true);

 try {
     // Server settings
     $mail->isSMTP();
     $mail->Host = 'africaunitedspace.org';
     $mail->SMTPAuth = true;
     $mail->Username = 'testing@africaunitedspace.org';
     $mail->Password = 'j4VS_+x@%10[';
     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
     $mail->Port = 465;
 
     // Recipients for the first email
     $mail->setFrom('contact@africaunitedspace.org', 'Africa United Space');
     $mail->addAddress($email);  // First recipient
     $mail->addReplyTo('contact@africaunitedspace.org', 'Successful Purchase');
 
     // Content of the first email
     $mail->isHTML(true);
     $mail->Subject = $subject;
     $mail->Body = "You've been Added to our Newsletter, we'll be bringing you Update from our Stores suited just for you - AUS";
     $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
 
     // Send the first email
     $mail->send();
 
     // Send the second email
     if ($mail) {
         header("Location: .");
         echo "<script type='text/javascript'> alert('Subcribed Successfully') </script>";
     } else {
         echo "email could not be sent. Mailer Error: {$mail->ErrorInfo}";
     }
 
 } catch (Exception $e) {
     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
 }


?>