<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require __DIR__.'/./PHPMailer/src/PHPMailer.php';
require __DIR__.'/./PHPMailer/src/SMTP.php';
require __DIR__.'/./PHPMailer/src/Exception.php';

$name = $_POST["first_name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$subject = 'New Product Purchase';
$message = $_POST["phone"];
$reference = $_POST["tx_ref"];
$amount = $_POST["amount"];

// First email
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
    $mail->Body = 'Congratulations on your exciting new purchase from us, below is your tracking details to make sure your order is delivered <br> Tracking Number:'.$reference.'<br> Please Keep this Safe, as we will not be liable for any Loss of Tracking Number. Cheers - AUS';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    // Send the first email
    $mail->send();

    // Second email
    $mail2 = new PHPMailer(true);
    $mail2->isSMTP();
    $mail2->Host = 'africaunitedspace.org';
    $mail2->SMTPAuth = true;
    $mail2->Username = 'testing@africaunitedspace.org';
    $mail2->Password = 'j4VS_+x@%10[';
    $mail2->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail2->Port = 465;

    $mail2->setFrom('contact@africaunitedspace.org', 'Africa United Space');
    $mail2->addAddress('contact@africaunitedspace.org');  // Second recipient
    $mail2->addReplyTo('contact@africaunitedspace.org', 'Successful Purchase');

    // Content of the second email
    $mail2->isHTML(true);
    $mail2->Subject =  'Purchase Notification';
    $mail2->Body = 'A Customer with email:'.$email.' and phone number:'.$phone.'  has Purchased goods worth South African Rands ZAR'.$amount.'<br><br>Check Customer info for proper documentation. Regards IT Team';

    // Send the second email
    if ($mail2->send()) {
        echo 'Both emails have been sent successfully.';
    } else {
        echo "Second email could not be sent. Mailer Error: {$mail2->ErrorInfo}";
    }

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
