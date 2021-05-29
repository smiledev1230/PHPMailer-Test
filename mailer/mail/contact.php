<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Honestinstall Contact Mail</title>
    </head>
    <body>
        <?php
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
        date_default_timezone_set("America/Belize");

        require '../PHPMailerAutoload.php';
		$datesent=date('F d, Y');
		$datesent .= ' at ';
		$datesent.=date('h:i A T');
        $body = "
            NAME: $_POST[realname] \n<BR>
            PHONE: $_POST[phone] \n<BR>
            EMAIL: $_POST[email] \n<BR>
            SERVICE TYPE: $_POST[servicetype] \n<BR>
            PROJECT: $_POST[PROJECT] \n\n<BR><BR>
                ";

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
		$message .=" Below is Web Inquiry.<BR> \n It was submitted by $_POST[realname] ($_POST[email]) on $datesent <BR><BR>\n\n";
        $message .= $body;
        $message .= "</body>\n";
        $message .= "</html>";

        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Debugoutput = 'html';
        $mail->Host = "mail.honestinstall.com";
        $mail->Port = 366;
        $mail->SMTPAuth = true;
        $mail->Username = "inquiry@honestinstall.com";
        $mail->Password = "Question147*";
        $mail->setFrom($_POST[email], $_POST[realname] );
        $mail->addAddress('inquiry@honestinstall.com', '');
        $mail->addAddress('info@honestinstall.com', '');
        $mail->addAddress('honestinstall@gmail.com', '');
//        $mail->addAddress('suyadi@gmail.com', '');
        $mail->Subject = $_POST[subject];
        $mail->msgHtml($message);
        $mail->AltBody = 'This is a plain-text message body';

//send the message, check for errors
        if (!$mail->send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        } else {
            header("Location: ../../thanks.php");
        }
        ?>
    </body>
</html>
