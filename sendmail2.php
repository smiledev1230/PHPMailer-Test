<?php  
if(isset($_POST['submit'])) {

$from = "info@honestinstall.com";
$subject = "Honest Install Service Request";
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$company = $_POST['company'];
$comments = $_POST['comments'];
$type = $_POST['type'];
$to = "info@honestinstall.com";

$headers = 'From: "'. $name . '" <' . $email . '>' . "\r\n";

$body = " Message From: $name\n Company: $company\n Phone number: $phone\n E-Mail address: $email\n\n Reason for contact: $type\n Comments: $comments";
mail($to, $subject, $body, $headers);

echo "<script>alert('Your message has been sent - a Service Representative will contact you shortly.')</script>"; 
echo "<script>window.location='index.php';</script>"; 

}

?>