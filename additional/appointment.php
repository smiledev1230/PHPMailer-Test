<?php

$dbc = mysqli_connect("INFDB3", "emailc", "jAnup3ya!", "emailconf");

echo '<pre>' . print_r($_POST, true) . '</pre>';

$appointment = $_POST['appointment'];
$appointment_date = $_POST['appointment_date'];
$check_for_human = $_POST['check_for_human'];

var_dump(isset($appointment['first_name']));
if (($check_for_human == 'human') &&
        (isset($appointment['first_name'])) &&
        (isset($appointment['last_name'])) &&
        (isset($appointment['email'])) &&
        (isset($appointment['phone'])) &&
        (isset($appointment_date['date1'])) &&
        (isset($appointment_date['time1'])) &&
        (isset($appointment_date['date2'])) &&
        (isset($appointment_date['time2']))
) {
    $first_name = mysqli_real_connect($dbc, trim($appointment['first_name']));
    $last_name = mysqli_real_connect($dbc, trim($appointment['last_name']));
    $email = mysqli_real_connect($dbc, trim($appointment['email']));
    $phone = mysqli_real_connect($dbc, trim($appointment['phone']));
    $comments = mysqli_real_connect($dbc, trim($appointment['comments']));

    $date1 = mysqli_real_connect($dbc, trim($appointment_date['date1']));
    $time1 = mysqli_real_connect($dbc, trim($appointment_date['time1']));
    $date2 = mysqli_real_connect($dbc, trim($appointment_date['date2']));
    $time2 = mysqli_real_connect($dbc, trim($appointment_date['time2']));

    $query = "INSERT INTO appointments_visitors
              (first_name, 
               last_name, 
               email, 
               phone, 
               first_preference_date, 
               first_preference_time, 
               second_preference_time, 
               second_preference_date,
               comments,
               status_confirm)
               ";
} else {
    //header('Location: contact_test_staging.php');
    echo 'invalid';
}

