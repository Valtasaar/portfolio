<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class MailController
{
    /**
     * Send email.
     *
     * @return string
     */
    public function sendMail()
    {
        $mail = new PHPMailer(true);
        $data = json_decode(file_get_contents('php://input'));

        try {
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host = 'mail.hostland.ru';
            $mail->SMTPAuth = true;
            $mail->Username = 'info@daniweb.ru';
            $mail->Password = $_ENV['SMTP_HOST_PASS'];
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            $mail->setFrom('info@daniweb.ru', 'Contact form');
            $mail->addAddress('daniil.kirien@gmail.com');

            $mail->isHTML(true);
            $mail->Subject = 'Contact form';
            $mail->Body = "
                <p>$data->text</p> 
                <div>From: $data->name</div>
                <div>Email: $data->email</div>";
            $mail->send();
            echo json_encode(['status' => true]);
        } catch ( Exception $e ) {
            echo json_encode([
                'status' => false,
                'error'  => $mail->ErrorInfo
            ]);
        }
    }
}


