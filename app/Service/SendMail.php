<?php

namespace App\Service;

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

class SendMail
{
    /**
     * @throws Exception
     */
    public function send($email, $name, $subject, $html_content): bool
    {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = $_ENV['SMTP_PORT'];
        $mail->Host = $_ENV['SMTP_SERVER'];
        $mail->Username = $_ENV['SMTP_USER'];
        $mail->Password = $_ENV['SMTP_PASSWORD'];

        $mail->IsHTML(true);
        $mail->AddAddress($email, $name);
        $mail->SetFrom($_ENV['SMTP_USER'], $_ENV['SMTP_NAME']);
        $mail->AddReplyTo($_ENV['SMTP_USER'], $_ENV['SMTP_NAME']);
        #$mail->AddCC("cc-recipient-email", "cc-recipient-name");
        $mail->Subject = $subject;

        $mail->MsgHTML($html_content);

        if (!$mail->Send()) {
            return false;
        } else {
            return true;
        }
    }
}
