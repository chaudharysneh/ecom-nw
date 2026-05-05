<?php
namespace App\Libraries;

require APPPATH . 'Libraries/PHPMailer/src/Exception.php';
require APPPATH . 'Libraries/PHPMailer/src/PHPMailer.php';
require APPPATH . 'Libraries/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class EmailSender
{
   public function sendEmail($to, $subject, $message)
{
    
    $mail = new PHPMailer(true);

    try {
        // Server settings
        // $mail->`SMTPDebug` = 2; // Set to 2 for detailed debug output
        $mail->isSMTP(); // Set mailer to use SMTP
        $mail->Host = 'fableadtechnolabs.com'; // Specify main SMTP server
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'smtp@fableadtechnolabs.com'; // SMTP username
        $mail->Password = '#w8(_4@wdc0M'; // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        // Recipients
        $mail->setFrom('info@fableadtechnolabs.com', 'Order Comments');
        $mail->addAddress($to); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message); // Plain text alternative for non-HTML email clients

        // Send email
        $sendStatus = $mail->send();
        // print_r($sendStatus);die;
       if($sendStatus)
       {
        return json_encode(["status" => 'success',]);
       }
       else
       {
        return json_encode(["status" => 'error',]);
       }
       

    }  catch (Exception $e) {
            return json_encode([
                "status" => false, 
                "message" => "Message could not be sent."
            ]);
    }
}

}
