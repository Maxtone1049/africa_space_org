<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require __DIR__.'/./PHPMailer/src/PHPMailer.php';
require __DIR__.'/./PHPMailer/src/SMTP.php';
require __DIR__.'/./PHPMailer/src/Exception.php';



$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = 'New Product Purchase';
$message = $_POST["phone"];

$mail = new PHPMailer(true);

// try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'africaunitedspace.org';
    $mail->SMTPAuth = true;
    $mail->Username = 'testing@africaunitedspace.org';
    $mail->Password = 'j4VS_+x@%10[';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('testing@africaunitedspace.org', 'Africa United Space');
    // $mail->addAddress('info@findmybizz.com', 'FindMyBizz Admin');     //Add a recipient
    $mail->addAddress($email);               //Name is optional
    $mail->addReplyTo($email, 'Product Update');
    $mail->addCC($email);
    $mail->addBCC($email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = 'A Customer with email '.$email.' and phone number '.$phone.'  has registered check Customer info for proper documentation. Regards IT Team';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // $mail->send();
    // echo 'Message has been sent';

    // echo $mail->Send() ? header("Location: sent.html") : "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

   if($mail->send()) {
       header("Location: response.html");   
    }else {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>



