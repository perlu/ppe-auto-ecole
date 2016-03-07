<?php
require '../vendor/phpmailer/phpmailer/PHPMailerAutoload.php';



$mail = new PHPMailer;
/*$mail->SMTPDebug = 4;  */ // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'castelane.auto@gmail.com';                 // SMTP username
$mail->Password = 'admincastelane';                           // SMTP password
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to

$mail->setFrom('bridet.bv@gmail.com', $titremail);
$mail->addAddress($adresseMailReceveur, $titremailReceveur);     // Add a recipient               // Name is optional
/*$mail->addReplyTo('bridet.bv@gmail.com', 'Information');*/
/*$mail->addCC('bridet.bv@gmail.com');*/
/*$mail->addBCC('bcc@example.com');*/

/*$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');*/    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Here is the subject';
$mail->Body    = $messageMail;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) 
{
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}