<?php

date_default_timezone_set('Etc/UTC');

require '../mailer/PHPMailerAutoload.php';

$sendto = $_POST['email'];
$usermail = $_POST['from'];
$content = nl2br($_POST['msg']);
$subject = $_POST['subject'];

/*
  $headers = "From: " . strip_tags($usermail) . "\r\n";
  //$headers .= "Reply-To: ". strip_tags($usermail) . "\r\n";
  $headers .= "MIME-Version: 1.0\r\n";
  $headers .= "Content-Type: text/html;charset=utf-8 \r\n";

  $msg = "<html><body style='font-family:Arial,sans-serif;'>";
  $msg .= $content;
  $msg .= '<br/><br/> Please visit ' . $_POST['url'];
  $msg .= "</body></html>";

  mail($sendto, $subject, $msg, $headers);
 * 
 */

exit("test...");

$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Debugoutput = 'html';
$mail->Host = "mail.honestinstall.com";
$mail->Port = 366;
$mail->SMTPAuth = true;
$mail->Username = "inquiry@honestinstall.com";
$mail->Password = "Question147*";
$mail->setFrom(strip_tags($usermail), '');
$mail->addAddress(strip_tags($sendto), '');
$mail->Subject = $subject;
$mail->msgHtml($content);
$mail->AltBody = 'This is a plain-text message body';

/*
$currenturl = $_SERVER['HTTP_REFERER'];
header("Location: $currenturl");
 * 
 */
exit ("test....");
?>