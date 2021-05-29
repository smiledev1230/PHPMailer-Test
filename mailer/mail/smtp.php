<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>PHPMailer - SMTP test</title>
    </head>
    <body>
        <?php
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set('Etc/UTC');

        require '../PHPMailerAutoload.php';

        $body = "Message goes here...";
        
        $form['title'] = 'Title goes here';
        $bgcolor = isset($form['bgcolor']) ? ('background-color: ' . htmlspecialchars($form['bgcolor']) . ';') : ('background-color: #FFF;');
        $background = isset($form['background']) ? ('background-image: url(' . htmlspecialchars($form['background']) . ');') : NULL;
        $text_color = isset($form['text_color']) ? ('color: ' . htmlspecialchars($form['text_color']) . ';') : ('color: #000;');
        $link_color = isset($form['link_color']) ? ('color: ' . htmlspecialchars($form['link_color']) . ';') : NULL;
        $alink_color = isset($form['alink_color']) ? ('color: ' . htmlspecialchars($form['alink_color']) . ';') : NULL;
        $vlink_color = isset($form['vlink_color']) ? ('color: ' . htmlspecialchars($form['vlink_color']) . ';') : NULL;

        $message = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">\n";
        $message .= "<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"en-US\" lang=\"en-US\">\n";
        $message .= "<head>\n";
        $message .= "  <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />\n";
        $message .= "  <meta name=\"robots\" content=\"noindex,nofollow\" />\n";
        $message .= "  <title>" . htmlspecialchars($form['title']) . "</title>\n";
        $message .= "  <style type=\"text/css\">\n";
        $message .= "    body {" . trim($bgcolor . ' ' . $text_color . ' ' . $background) . "}\n";
        if (isset($link_color))
            $message .= "    a {" . $link_color . "}\n";
        if (isset($alink_color))
            $message .= "    a:active {" . $alink_color . "}\n";
        if (isset($vlink_color))
            $message .= "    a:visited {" . $vlink_color . "}\n";
        $message .= "    h1 {font-size: 14pt; font-weight: bold; margin-bottom: 20pt}\n";
        $message .= "    .crit {font-size: 12pt; font-weight: bold; color: #F00; margin-bottom: 10pt;}\n";
        $message .= "    .returnlink {font-size: 12pt; margin-top: 20pt; margin-bottom: 20pt;}\n";
        $message .= "    .validbutton {margin-top: 20pt; margin-bottom: 20pt;}\n";
        $message .= "  </style>\n";
        if (isset($form['css']))
            $message .= "  <link rel=\"stylesheet\" href=\"" . htmlspecialchars($form['css']) . "\">\n";
        $message .= "</head>\n\n";
        $message .= "<body>\n";
        $message .= $body;
        $message .= "<div class=\"validbutton\"><a href=\"http://validator.w3.org/check/referer\" target=\"_blank\"><img src=\"http://www.w3.org/Icons/valid-xhtml10\" style=\"border:0;width:88px;height:31px\" alt=\"Valid XHTML 1.0!\" /></a></div>\n";
        $message .= "</body>\n";
        $message .= "</html>";

//Create a new PHPMailer instance
        $mail = new PHPMailer();
//Tell PHPMailer to use SMTP
        $mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 2;
//Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
//Set the hostname of the mail server
        $mail->Host = "mail.honestinstall.com";
//Set the SMTP port number - likely to be 25, 465 or 587
        $mail->Port = 366;
//Whether to use SMTP authentication
        $mail->SMTPAuth = true;
//Username to use for SMTP authentication
        $mail->Username = "test@honestinstall.com";
//Password to use for SMTP authentication
        $mail->Password = "Q!W@e3r4";
//Set who the message is to be sent from
        $mail->setFrom('inquiry@honestinstall.com', 'Honestinstall');
//Set an alternative reply-to address
//$mail->addReplyTo('replyto@example.com', 'First Last');
//Set who the message is to be sent to
        $mail->addAddress('gerrysabar@gmail.com', 'Gerry Sabar');
//Set the subject line
        $mail->Subject = 'PHPMailer SMTP test';
//Read an HTML message body from an external file, convert referenced images to embedded,
//convert HTML into a basic plain-text alternative body
        $mail->msgHtml($message);
//$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
        $mail->AltBody = 'This is a plain-text message body';
        
//Attach an image file
        $mail->addAttachment('images/phpmailer_mini.gif');

//send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            echo "Message sent!";
        }
        ?>
    </body>
</html>
