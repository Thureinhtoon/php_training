<?php
include_once('./connect.php');
require_once "./vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



session_start();
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $mail = new PHPMailer(true);
    
    
    try {
 
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                       //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'your_username@gmail.com';                    //SMTP username
        $mail->Password   = 'your_password';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    

        $mail->setFrom('admin@example.com', 'Mailer');
        $mail->addAddress($email);     //Add a recipient
    
 
        $url = "http://". $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF'])."/confirm_password.php";
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Reset password link';
        $mail->Body    = "<h1>Hey here is the link that is to change new password for you.</h1>
                            HERE WE GO <a href='{$url}'> CLICK this link</a>";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    
        $mail->send();
        echo 'Message has been sent successfully';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

?>
