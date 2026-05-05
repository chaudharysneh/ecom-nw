<?php

namespace App\Libraries;

require_once 'PHPMailer/src/Exception.php';
require_once 'PHPMailer/src/PHPMailer.php';
require_once 'PHPMailer/src/SMTP.php';


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
class EmailSender
{
    public function sendEmail($to, $subject, $message)
    {
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP();
            $mail->Host       = 'mail.fableadtechnolabs.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'smtp@fableadtechnolabs.com';
            $mail->Password   = '#w8(_4@wdc0M';
            $mail->SMTPSecure = 'tls'; // Use 'ssl' for port 465
            $mail->Port       = 587; // Use 587 for TLS

            // Recipients
            $mail->setFrom('smtp@fableadtechnolabs.com', 'Ecom');
            $mail->addAddress($to);

            // Content
            $mail->isHTML(true);
            $mail->Subject = $subject;
            $mail->Body    = $message;

            // Send email
            if ($mail->send()) {
                
                return true;
            } else {
                // print_r($mail);die;
                return false;
            }
        } catch (Exception $e) {
            return json_encode([
                "status" => false,
                "message" => "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"
            ]);
        }
    }
}
