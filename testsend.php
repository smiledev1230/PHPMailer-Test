<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require './phpmailer/PHPMailer.php';
require './phpmailer/SMTP.php';
require './phpmailer/Exception.php';

$developmentMode = true;
$mailer = new PHPMailer($developmentMode);

try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
    $mailer->SMTPOptions = [
        'ssl'=> [
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
        ]
    ];
    }

    $mailer->Host = 'mail.honestinstall.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'honestinstallinquiry@gmail.com';
    $mailer->Password = 'GMZyrhiGbzLU';
    $mailer->SMTPSecure = 'ssl';
    $mailer->Port = 465;

    $mailer->setFrom('honestinstallinquiry@gmail.com', 'Name of sender');
    $mailer->addAddress('fidero1230@outlook.com', 'Name of recipient');

    $mailer->isHTML(true);
    $mailer->Subject = 'PHPMailer Test';
    $mailer->Body = 'This is a <b>SAMPLE<b> email sent through <b>PHPMailer<b>';

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}