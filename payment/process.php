<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?
$fname=$_POST['Field2'];
$lname=$_POST['Field3'];
$amount_dollar=$_POST['Field5'];
$amount_cents=$_POST['Field5-1'];
$company=$_POST['Field9'];
$reference=$_POST['Field6'];
$notes=$_POST['Field7'];
$link="https://honestinstall.wufoo.com/forms/honestinstall/def/Field1=$fname&Field2=$lname&Field8=$amount_dollar&Field8-1=$amount_cents&Field4=$company&Field5=$reference&Field6=$notes";

//echo "$fname $lname <BR>$amount_dollar $amoun_cents <BR>company: $company<BR> $reference<BR>$notes";
echo "Here's the link to the payment form: <BR><BR>$link<BR><BR><a href='$link'>Go to link</a>";
?>
</body>
</html>
