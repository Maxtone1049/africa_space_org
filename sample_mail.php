// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require './PHPMailer/src/Exception.php';
// require './PHPMailer/src/PHPMailer.php';
// require './PHPMailer/src/SMTP.php';

// if(isset($_POST['send'])){
//     $name = htmlentities($_POST['name']);
//     $email = htmlentities($_POST['email']);
//     $subject = htmlentities($_POST['country']);
//     $message = htmlentities($_POST['amount']);

//     $mail = new PHPMailer(true);
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'tonymax1049@gmail.com';
//     $mail->Password = 'prime@1122';
//     $mail->Port = 465;
//     $mail->SMTPSecure = 'ssl';
//     $mail->isHTML(true);
//     $mail->setFrom($email, $name);
//     $mail->addAddress('tonymax1049@gmail.com');
//     $mail->Subject = ($email."just ordered for a product");
//     $mail->Body = $message;
//     $mail->send();
//     header("Location: ./response.html");
// }