<?php
include_once('email.php');
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = 'New Product Purchase';
$message = $_POST["phone"];

$mail = new PHPMailer(true);

// try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
  
    // Server Setup for Admin
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host = 'africaunitedspace.org';
    $mail->SMTPAuth = true;
    $mail->Username = 'testing@africaunitedspace.org';
    $mail->Password = 'j4VS_+x@%10[';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port= 465;  
    //send to Admin of AUS 
    $mail->addAddress('tonymax1049@gmail.com');               //Name is optional
    $mail->addReplyTo('testing@africaunitedspace.org', 'Product Update');
    $mail->addCC('tonymax1049@gmail.com');
    $mail->addBCC('tonymax1049@gmail.com');

    // Content of the Email Below
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body = 'A Customer with email '.$email.' and phone number '.$phone.'  has Purchased goods worth South African Rands ZAR'.$amount.' check Customer info for proper documentation. Regards IT Team';
    $mail->AltBody = 'donotreplythismail';


    // $mail->send();
    // echo 'Message has been sent';

    // echo $mail->Send() ? header("Location: sent.html") : "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

   if($mail->send()) {
    //    header("Location: response.html");   
    print('Hello There');
    }else {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>



