<?php  

if(isset($_POST['submit-form'])) {



    $subject        = "Request Quote/Service";

    $name           = $_POST['fname']." ".$_POST['lname'];

    $email          = $_POST['email'];

    $phone          = $_POST['phone'];

    $company        = $_POST['company'];

    $city           = $_POST['city'];

    $im             = $_POST['im'];

    $desc           = $_POST['txtarea'];

    $res_com        = $_POST['res_com'];

    $to             = "suyadi@gmail.com";

    

    $body = $im . "<br/>";

    $body .= "Message From: $name<br/>";

    $body .= "Company: $company<br/>";

    $body .= "City: $city<br/>";

    $body .= "Phone number: $phone<br/>";

    $body .= "E-Mail address: $email<br/>";

    $body .= "Project Description: $desc<br/><br/>";

    //$body .= "Tell us a bit more (if you dare)...\<br/>";

    $body .= $res_com . "<br/>";

    

    if ($res_com == "Residential"){

        /* Residential */

        $rgroup         = $_POST['rgroup'];

        $rgroup_txt     = $_POST['rgroup_txt'];

        $rgroup1        = $_POST['rgroup1'];

        $rgroup2        = $_POST['rgroup2'];

        $rgroup3        = $_POST['rgroup3'];

        $rgroup4        = $_POST['rgroup4'];

        $rgroup5        = $_POST['rgroup5'];

        $rgroup_cbox    = $_POST['rgroup_cbox'];

        $rgroup6        = $_POST['rgroup6'];

        $rgroup7        = $_POST['rgroup7'];

        //$rgroup8        = $_POST['rgroup8'];
        $rgroup8_areatxt = $_POST['rgroup8_areatxt'];

        

        

        if ($rgroup){

            $body .= "I found Honest: ";

            $body .= $rgroup . "<br/>";

            if ($rgroup_txt_0){

                $body .= $rgroup_txt_0 . "<br/>";

            }

            if ($rgroup_txt_1){

                $body .= $rgroup_txt_1 . "<br/>";

            }

        }

        if ($rgroup1){

            $body .= "Tell us about your Home: ";

            $body .= $rgroup1 . "<br/>";

        }

        if ($rgroup2){

            $body .= "AV Provider History: ";

            $body .= $rgroup2 . "<br/>";

        }

        if ($rgroup3){

            $body .= "Budget:";

            $body .= $rgroup3 . "<br/>";

        }

        if ($rgroup4){

            $body .= "I need a quote/design by: ";

            $body .= $rgroup4 . "<br/>";

        }

        if ($rgroup5){

            $body .= "I am interested in: ";

            $body .= $rgroup5 . "<br/>";

            if ($rgroup_cbox){

                foreach ($rgroup_cbox as $value){

                    $body .= " + ".$value. "<br/>";

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

            

        }

        if ($rgroup6){

            $body .= "If my project requires product/equipment: ";

            $body .= $rgroup6 . "<br/>";

        }

        if ($rgroup7){

            $body .= "Website: ";

            $body .= $rgroup7 . "<br/>";

        }

        if ($rgroup8_areatxt){

            $body .= "More to say: ";

            $body .= $rgroup8_areatxt . "<br/>";

        }

    } else {

        /* Commercial */

        $cgroup         = $_POST['cgroup'];

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

            $body .= "I found Honest: ";

            $body .= $cgroup . "<br/>";

            if ($cgroup_txt_0){

                $body .= $cgroup_txt_0 . "<br/>";

            }

            if ($cgroup_txt_1){

                $body .= $cgroup_txt_1 . "<br/>";

            }

        }

        if ($cgroup1){

            $body .= "My Facility: ";

            $body .= $cgroup1 . "<br/>";

            if ($cgroup1_txt){

                $body .= $cgroup1_txt . "<br/>";

            }

        }

        if ($cgroup2){

            $body .= "My Industry: ";

            $body .= $cgroup2 . "<br/>";

            if ($cgroup2_txt){

                $body .= $cgroup2_txt . "<br/>";

            }

        }

        if ($cgroup3){

            $body .= "Budget: ";

            $body .= $cgroup3 . "<br/>";

        }

        if ($cgroup4){

            $body .= "I need a quote/design by: ";

            $body .= $cgroup4 . "<br/>";

        }

        if ($cgroup_cbox || $cgroup5){

            $body .= "I am interested in: <br/>";

            if ($cgroup_cbox){

                foreach ($cgroup_cbox as $value){

                    $body .= " + ".$value. "<br/>";

                }

            }

            if ($cgroup5){

                $body .= $cgroup5 . "<br/>";

            }

            

            $cgroup_cbox_txt_0 = $_POST['cgroup_cbox_txt_0'];

            

            if ($cgroup_cbox_txt_0){

                $body .= $cgroup_cbox_txt_0 . "<br/>";

            }

            

        }

        if ($cgroup6){

            $body .= "If my project requires product/equipment: ";

            $body .= $cgroup6 . "<br/>";

        }

        if ($cgroup7){

            $body .= "Website: ";

            $body .= $cgroup7 . "<br/>";

        }

        if ($cgroup8_areatxt){

            $body .= "More to say: ";

            $body .= $cgroup8_areatxt . "<br/>";

        }

        

    }

    

    require("mailer/class.phpmailer.php");



    $mail = new PHPMailer();

    

    $mail->IsSMTP();

    

    $mail->Host = "localhost";  // specify main and backup server

    $mail->SMTPAuth = true;     // turn on SMTP authentication

    $mail->Username = "web@honestinstall.com";  // SMTP username

    $mail->Password = "GMZyrhiGbzLU"; // SMTP password

    

    $mail->From = $email;

    $mail->FromName = $name;

    $mail->AddAddress("suyadi@gmail.com", "Honest Install");

    //$mail->AddAddress("ellen@example.com");                  // name is optional

    //$mail->AddReplyTo("info@example.com", "Information");

    

    $mail->WordWrap = 2000;                                 // set word wrap to 50 characters

    //$mail->AddAttachment("/var/tmp/file.tar.gz");         // add attachments

    //$mail->AddAttachment("/tmp/image.jpg", "new.jpg");    // optional name

    $mail->IsHTML(true);                                  // set email format to HTML

    

    $mail->Subject = "Honest Install Contact Us Inquiry";

    $mail->Body    = $body;

    $mail->AltBody = $body;

    

    if(!$mail->Send())

    {

       echo "Message could not be sent. <p>";

       echo "Mailer Error: " . $mail->ErrorInfo;

       exit;

    }

    

    echo "<script>alert('Your message has been sent - a Service Representative will contact you shortly.')</script>"; 

    echo "<script>window.location='index.php';</script>";

}



?>