<?php

session_start();
try {
    $pdo = new PDO("mysql:dbname=emailconf;host=INFDB3", "emailc", "jAnup3ya!");
} catch (PDOException $e) {
    echo $e->getMessage();
}

$appointment = $_POST['appointment'];
$appointment_date = $_POST['appointment_date'];

if (
        (isset($appointment['first_name'])) &&
        (isset($appointment['last_name'])) &&
        (isset($appointment['email'])) &&
        (isset($appointment['phone'])) &&
        (isset($appointment_date['date1'])) &&
        (isset($appointment_date['time1'])) &&
        (isset($appointment_date['date2'])) &&
        (isset($appointment_date['time2']))
) {
    mysql_connect("INFDB3", "emailc", "jAnup3ya!") or die(mysql_error());
    mysql_selectdb("emailconf");

    $firstname = mysql_real_escape_string(trim($appointment['first_name']));
    $lastname = mysql_real_escape_string(trim($appointment['last_name']));
    $email = mysql_real_escape_string(trim($appointment['email']));
    $phone = mysql_real_escape_string(trim($appointment['phone']));
    $comments = mysql_real_escape_string(trim($appointment['comments']));

    $date1 = mysql_real_escape_string(trim($appointment_date['date1']));
    $time1 = mysql_real_escape_string(trim($appointment_date['time1']));
    $date2 = mysql_real_escape_string(trim($appointment_date['date2']));
    $time2 = mysql_real_escape_string(trim($appointment_date['time2']));

    $inputTime = strtotime(date('Y-m-d'));

    $query = "INSERT INTO appointment_visitors
      (firstname,
      lastname,
      email,
      phone,
      first_preference_date,
      first_preference_time,
      second_preference_date,
      second_preference_time,
      comments,
      status_confirm,
      input_time)
      VALUES
      ('{$firstname}',
      '{$lastname}',
      '{$email}',
      '{$phone}',
      '{$date1}',
      '{$time1}',
      '{$date2}',
      '{$time2}',
      '{$comments}',
      0,
      {$inputTime})";

    $result = mysql_query($query);
    $id = mysql_insert_id();

    //mail to visitor
    $query = $pdo->prepare('SELECT * FROM email_templates WHERE id = 2');
    $query->execute();
    $row = $query->fetch();

    $to = $email;
    $subject = "Thank you for contacting us";
    $message = $row["content"];

    if ($_POST['appoinment-type'] == 'install')
        $headers = "From: Honest Install - Request <noreply@honestinstall.com>\r\n";
    else
        $headers = "From: Honest Install - Appointment Confirmation <noreply@honestinstall.com>\r\n";
    $headers.= "MIME-Version: 1.0" . "\r\n";
    $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";

    mail($to, $subject, $message, $headers);

    foreach ($pdo->query("SELECT * FROM teams") as $row) {
        $to = $row["email"];
        $subject = "HonestInstall - Visitor Confirmation";
        $message = "
A visitor has scheduled a consultation. To confirm please click <a href='http://www.honestinstall.com/admin/app/webroot/index.php/appointments/confirm/$id'>here</a>
";

        if ($_POST['appoinment-type'] == 'install')
            $headers = "From: Honest Install - Request <noreply@honestinstall.com>\r\n";
        else
            $headers = "From: Honest Install - Appointment Confirmation <noreply@honestinstall.com>\r\n";

        $headers.= "MIME-Version: 1.0" . "\r\n";
        $headers.= "Content-type: text/html; charset=iso-8859-1\r\n";

        mail($to, $subject, $message, $headers);
    }

    mysql_close();

    $_SESSION['send_confirmation'] = 'Thank you for your request. We will contact you soon to firm up the details.';
    header('Location: ../contact_test.php');
} else {
    header('Location: ../contact_test.php?e=1');
}

