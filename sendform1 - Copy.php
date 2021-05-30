<?php

if(isset($_POST['submit-form'])) {

    if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
    
        $secret = '6LfRrhAUAAAAAPK3Kj0pKqiq-kGQSvJ2DqM6J8G6';
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $verifyResponse = curl_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha&remoteip=$ip");
        $responseData = json_decode($verifyResponse);
    
        if($responseData->success){
            
            $subject        = "Request Quote/Service";
        
            $name           = $_POST['fname']." ".$_POST['lname'];
        
            $email          = $_POST['email'];
        
            $phone          = $_POST['phone'];
            
            $webpage          = $_POST['webpage'];
        
            $company        = $_POST['company'];
            
            $address        = $_POST['address'];
            $city           = $_POST['city'];
            $state          = $_POST['state'];
            $zip            = $_POST['zip'];
        
            $im             = $_POST['im'];
        
            $desc           = $_POST['txtarea'];
        
            if(isset($_POST['res_com'])) $res_com = $_POST['res_com'];
            $rgroup_txt_1   = $_POST['rgroup_txt_1'];
            $rgroup_txt_0   = $_POST['rgroup_txt_0'];
            $cgroup_txt_1 = $_POST['cgroup_txt_1'];
            $cgroup1_txt = $_POST['cgroup1_txt'];
            $cgroup2_txt = $_POST['cgroup2_txt'];
            $cgroup_cbox_txt_0 = $_POST['cgroup_cbox_txt_0'];
            $rgroup_cbox_txt_2 = $_POST['rgroup_cbox_txt_2'];
            $rgroup_cbox_txt_3 = $_POST['rgroup_cbox_txt_3'];
            $cgroup_txt_0 = $_POST['cgroup_txt_0'];


            $dir="jquery-upload/uploads";
            $files = scandir($dir);

            $image_files= array();
            foreach($files as $file)
            {
                if($file == "." || $file == "..")
                    continue;
                $filePath=$dir."/".$file;
                $details = array();
                $details['name']=$file;
                $details['path']=$filePath;
                $details['size']=filesize($filePath);
                if (file_exists($filePath)) {
                    $image_files[] = $details;
                }
            }

            $image_status = sizeof($image_files) > 0 ? "Yes" : "No";

            $to             = "inquiry@honestinstall.com";
        
            
        
            $body .= "<table border='0' width='100%' cellspacing='0' cellpadding='0' bgcolor='#f7f9fc'><tbody><tr><td height='30' style='font-family:arial'></td></tr><tr><td>";
            $body .= '<table border="0" width="800px" cellspacing="0" cellpadding="0" bgcolor="#eeeeee"  style="font-family:arial"><tbody><tr><td style="font-size:16px;vertical-align:middle;color:#f9922b;padding-top:2px;line-height:20px;width:800px" align="left" bgcolor="#EEEEEE"><strong>Honest Install Contact Us</strong></td></tr></tbody></table>';
            $body .="<table border='0' width='800px' cellspacing='0' cellpadding='5' bgcolor='#eeeeee'  style='font-family:arial'><tr><td style='padding:5px!important' valign='top' bgcolor='white'>Option:</td><td style='padding:5px!important' valign='top' bgcolor='white'> $im</td></tr><tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>Name:</td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> $name</td></tr>";
        
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>Company: </td><td style='padding:5px!important' valign='top' bgcolor='white'> $company</td></tr>";
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>Address: </td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> $address</td></tr>";
        
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>City: </td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> $city</td></tr>";
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>State: </td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> $state</td></tr>";
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>Zip: </td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> $zip</td></tr>";
        
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>Phone number:</td><td style='padding:5px!important' valign='top' bgcolor='white'>  $phone</td></tr>";
        
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>E-Mail address:</td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>  $email</td></tr>";
        
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>Project Description: </td><td style='padding:5px!important' valign='top' bgcolor='white'> $desc</td></tr>";
        

            //$body .= "Tell us a bit more (if you dare)...\<br/>";
            
            if($res_com){
            $body .=  "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>Tell us a bit more</td><td style='padding:5px!important' valign='top' bgcolor='F3F3F3'>$res_com</td></tr>";
            }
        
            
            
            if ($res_com == "Residential"){
        
                /* Residential */
        
                $rgroup         = $_POST['rgroup'];
        
                $rgroup_txt     = $_POST['rgroup_txt'];
        
                $rgroup1        = $_POST['rgroup1'];
        
                $rgroup2        = $_POST['rgroup2'];
        
                $rgroup3        = $_POST['rgroup3'];
        
                $rgroup4        = $_POST['rgroup4'];
        
                $rgroup5        = "1";
        
                $rgroup_cbox    = $_POST['rgroup_cbox'];
        
                $rgroup6        = $_POST['rgroup6'];
                $rgroup7        = $_POST['rgroup7'];
        
                //$rgroup8        = $_POST['rgroup8'];
                $rgroup8_areatxt = $_POST['rgroup8_areatxt'];
        
                
        
                
        
                if ($rgroup){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>I found Honest: </td><td style='padding:5px!important' valign='top' bgcolor='white'> ";
        
                    $body .= $rgroup . "<br />";
        
                    if ($rgroup_txt_0){
        
                        $body .= $rgroup_txt_0 . "<br />";
        
                    }
        
                    if ($rgroup_txt_1){
        
                        $body .= $rgroup_txt_1 . "<br />";
        
                    }
                    echo "</td></tr>";
        
                }
        
                if ($rgroup1){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>About My Home:</td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>  ";
        
                    $body .= $rgroup1 . "</td></tr>";
        
                }
        
                if ($rgroup2){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>Home Tech History:</td><td style='padding:5px!important' valign='top' bgcolor='white'>  ";
        
                    $body .= $rgroup2 . "</td></tr>";
        
                }
        
                if ($rgroup3){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>Budget:</td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> ";
        
                    $body .= $rgroup3 . "</td></tr>";
        
                }
        
                if ($rgroup4){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>I need a quote/design by:</td><td style='padding:5px!important' valign='top' bgcolor='white'>  ";
        
                    $body .= $rgroup4 . "</td></tr>";
        
                }
        
                if ($rgroup5){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>I am interested in:</td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>  ";
        
                    if ($rgroup_cbox){
                        foreach ($rgroup_cbox as $value){
        
                            if($value!="Other") $body .= $value. "<br/>";
        
                        }
        
                    }
        
                    $rgroup_cbox_txt_0 = $_POST['rgroup_cbox_txt_0'];
        
                    $rgroup_cbox_txt_1 = $_POST['rgroup_cbox_txt_1'];
        
                    $rgroup_cbox_txt_2 = $_POST['rgroup_cbox_txt_2'];
        
                    $rgroup_cbox_txt_3 = $_POST['rgroup_cbox_txt_3'];
        
                    
        
                    if ($rgroup_cbox_txt_0){
        
                        $body .= $rgroup_cbox_txt_0 . "<br/>";
        
                    }
        
                    if ($rgroup_cbox_txt_1){
        
                        $body .= $rgroup_cbox_txt_1 . "<br/>";
        
                    }
        
                    if ($rgroup_cbox_txt_2){
        
                        $body .= $rgroup_cbox_txt_2 . "<br/>";
        
                    }
        
                    if ($rgroup_cbox_txt_3){
        
                        $body .= $rgroup_cbox_txt_3 . "<br/>";
        
                    }
        
                    echo "</td></tr>";
        
                }
        
                if ($rgroup6){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>If my project requires product/equipment:</td><td style='padding:5px!important' valign='top' bgcolor='white'>  ";
        
                    $body .= $rgroup6 . "</td></tr>";
        
                }
        
                if ($rgroup7){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>Website: </td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> ";
        
                    $body .= $rgroup7 . "</td></tr>";
        
                }
        
                if ($rgroup8_areatxt){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>More to say:</td><td style='padding:5px!important' valign='top' bgcolor='white'>  ";
        
                    $body .= $rgroup8_areatxt . "</td></tr>";
        
                }
        
            } else {
        
                /* Commercial */
        
               if(isset($_POST['cgroup'])) $cgroup = $_POST['cgroup'];
        
                $cgroup_txt     = $_POST['cgroup_txt'];
        
                $cgroup1        = $_POST['cgroup1'];
        
                $cgroup1_txt     = $_POST['cgroup1_txt'];
        
                $cgroup2        = $_POST['cgroup2'];
        
                $cgroup2_txt     = $_POST['cgroup2_txt'];
        
                $cgroup3        = $_POST['cgroup3'];
        
                $cgroup4        = $_POST['cgroup4'];
        
                $cgroup5        = $_POST['cgroup5'];
        
                $cgroup_cbox    = $_POST['cgroup_cbox'];
        
                $cgroup6        = $_POST['cgroup6'];
        
                $cgroup7        = $_POST['cgroup7'];
        
                //$cgroup8        = $_POST['cgroup8'];
                $cgroup8_areatxt = $_POST['cgroup8_areatxt'];
        
                
        
                if ($cgroup){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>I found Honest: </td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> ";
        
                    $body .= $cgroup . "<br/>";
        
                    if ($cgroup_txt_0){
        
                        $body .= $cgroup_txt_0 . "<br/>";
        
                    }
        
                    if ($cgroup_txt_1){
        
                        $body .= $cgroup_txt_1 . "<br/>";
        
                    }
                    echo "</td></tr>";
        
                }
        
                if ($cgroup1){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>My Facility:</td><td style='padding:5px!important' valign='top' bgcolor='white'>  ";
        
                    $body .= $cgroup1 . "<br/>";
        
                    if ($cgroup1_txt){
        
                        $body .= $cgroup1_txt . "<br/>";
        
                    }
                    
                    echo "</td></tr>";
                }
        
                if ($cgroup2){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>My Industry:</td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>  ";
        
                    $body .= $cgroup2 . "<br/>";
        
                    if ($cgroup2_txt){
        
                        $body .= $cgroup2_txt . "<br/>";
        
                    }
                    echo "</td></tr>";
        
                }
        
                if ($cgroup3){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>Budget:</td><td style='padding:5px!important' valign='top' bgcolor='white'>  ";
        
                    $body .= $cgroup3 . "</td></tr>";
        
                }
        
                if ($cgroup4){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>I need a quote/design by:</td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>  ";
        
                    $body .= $cgroup4 . "</td></tr>";
        
                }
        
                if ($cgroup_cbox || $cgroup5){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>I am interested in: </td><td style='padding:5px!important' valign='top' bgcolor='white'>";
        
                    if ($cgroup_cbox){
        
                        foreach ($cgroup_cbox as $value){
        
                            $body .= $value. "<br/>";
        
                        }
        
                    }
        
                    if ($cgroup5){
        
                        $body .= $cgroup5 . "<br/>";
        
                    }
        
                    
        
                    $cgroup_cbox_txt_0 = $_POST['cgroup_cbox_txt_0'];
        
                    
        
                    if ($cgroup_cbox_txt_0){
        
                        $body .= $cgroup_cbox_txt_0 . "<br/>";
        
                    }
        
                    
                    echo "</td></tr>";
                }
        
                if ($cgroup6){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>If my project requires product/equipment:</td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>  ";
        
                    $body .= $cgroup6 . "</td></tr>";
        
                }
        
                if ($cgroup7){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>Website:</td><td style='padding:5px!important' valign='top' bgcolor='white'>  ";
        
                    $body .= $cgroup7 . "</td></tr>";
        
                }
        
                if ($cgroup8_areatxt){
        
                    $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>More to say: </td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> ";
        
                    $body .= $cgroup8_areatxt . "</td></tr>";
        
                }
        
                
        
            }
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'>Webpage: </td><td style='padding:5px!important' valign='top' bgcolor='#F3F3F3'> ";
            $body .= $webpage . "</td></tr>";
            $body .= "<tr><td style='padding:5px!important' valign='top' bgcolor='white'>Images: </td><td style='padding:5px!important' valign='top' bgcolor='white'> ";
            $body .= $image_status . "</td></tr>";            
             $body .= "</table></td></tr></table>";
            $body .="<BR><BR><!--[if mso]>
<style type='text/css'>
body, table, td {font-family: Arial, Helvetica, sans-serif !important;}
</style>
<![endif]-->
<table width='100%' border='1' cellpadding='5'>
  <tbody>
    <tr>
      <td colspan='2' width='50%' >Response Date:</td>
      <td >Timeline:</td>
    </tr>
    <tr>
      <td colspan='2' width='50%'>Assigned:</td>
      <td>Budget:</td>
    </tr>
    <tr>
      <td colspan='2'>Found us:</td>
      <td>Quote By:</td>
    </tr>
    <tr>
      <td colspan='3'>&nbsp;</td>
    </tr>
    <tr>
      <td colspan='3'>&nbsp;</td>
    </tr>
    <tr>
      <td colspan='3'>&nbsp;</td>
    </tr>
    <tr>
      <td colspan='3'>&nbsp;</td>
    </tr>
    <tr>
      <td colspan='3'>&nbsp;</td>
    </tr>
    <tr>
      <td colspan='3'>&nbsp;</td>
    </tr>
    <tr>
      <td width='100'><strong>Date:</strong></td>
      <td colspan='2'><strong>Log</strong></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td colspan='2'>&nbsp;</td>
    </tr>
  </tbody>
</table>
";
            require("mailer/class.phpmailer.php");
        
        
echo "1h";
        
            $mail = new PHPMailer();
        
            
        
            $mail->IsSMTP();
        
            
        
          $mail->Host = "smtp.gmail.com";  // specify main and backup server
            
            $mail->SMTPAuth = true;     // turn on SMTP authentication
        
            $mail->Port = 587;  // specify main and backup server
            
            //Set the encryption system to use - ssl (deprecated) or tls
            $mail->SMTPSecure = 'tls';
            //Whether to use SMTP authentication
            $mail->SMTPAuth = true;
            
            $mail->Username = "honestinstallinquiry@gmail.com";  // SMTP username
        
            $mail->Password = "GMZyrhiGbzLU"; // SMTP password
            
            $mail->AddAddress("inquiry@honestinstall.com", "Honest Install");
            
        
            $mail->From = $email;
        
            $mail->FromName = $name;
        
            $mail->AddAddress("inquiry@honestinstall.com", "Honest Install");
        
            //$mail->AddAddress("ellen@example.com");                  // name is optional
        
            $mail->AddReplyTo($email, $name);
        
            
        
            $mail->WordWrap = 2000;                                 // set word wrap to 50 characters

            if (sizeof($image_files) > 0) {
                foreach ($image_files as $img) {
                    $mail->AddAttachment($img['path'], $img['name']);    // optional name
                }
            }
            //$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments
            // $mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name
        
            $mail->IsHTML(true);                                  // set email format to HTML
        
            
        
            $mail->Subject = "Honest Install Contact Us Inquiry";
        
            $mail->Body    = $body;
        
            $mail->AltBody = $body;
        
            
        
            if(!$mail->Send())
        
            {
                
                $mail->Host = "smtp.gmail.com";  // specify main and backup server
            
                $mail->SMTPAuth = true;     // turn on SMTP authentication
            
                $mail->Port = 587;  // specify main and backup server
                
                //Set the encryption system to use - ssl (deprecated) or tls
                $mail->SMTPSecure = 'tls';
                //Whether to use SMTP authentication
                $mail->SMTPAuth = true;
                
                $mail->Username = "honestinstallinquiry@gmail.com";  // SMTP username
            
                $mail->Password = "GMZyrhiGbzLU"; // SMTP password
                
                $mail->AddAddress("inquiry@honestinstall.com", "Honest Install");
            
            
                if(!$mail->Send()){
            
                   echo "Message could not be sent. <p>";
            
                   echo "Mailer Error: " . $mail->ErrorInfo;
            
                   exit;
                }
        
            }
        
            
        
echo "h";
            echo "<script>window.location='https://honestinstall.com/thanksinquiry.php';</script>";
        } else {
            echo "The Captcha code must be retyped correctly.";
            exit;
        }
    
    } else {
        echo "The Captcha code must be retyped correctly.";
        exit;
    }

}

function curl_get_contents($url)
{
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($ch);
  curl_close($ch);
  return $data;
}
echo "3h";
?>