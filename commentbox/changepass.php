<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Honest Install - Human Resources Portal</TITLE>
<style>

body{
	
	background-image: url(../images/portalskin.jpg);

	background-repeat: no-repeat;

	background-position: center top;font-family: 'archivo_narrowregular', sans-serif;font-size:16px;color:#6f6f6f;line-height:23px;
	}
	
	h2{font-family: 'archivo_narrowregular', sans-serif;font-size:25px;color:#6f6f6f;text-align:center}
	fieldset{width:450px;margin:0 auto;margin-top:150px}
</style>
    <link rel="stylesheet" href="/assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
</head>

<body>
<br />
<br />

<div id="content">
<?php 

//read file, get passwd
$password = "honest14";

if ($_POST['txtChangePassword'] != '') { 
$myFile = "../commentpw.inc";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $_POST['txtChangePassword']);
fclose($fh);
}

if (($_POST['txtPassword'] != $password) && $_POST['txtChangePassword'] == '') { 
?> 
<br /><br />

 <fieldset style="text-align:center;">
      <legend align="center"><h2>Login</h2></legend>

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    
    <label for="txtpassword">Password:</label> 
    <br /><input type="password" title="Enter your password" name="txtPassword" />

    <p><input type="submit" name="Submit" value="Login" /></p> 

</form> 
<? if ($_POST['txtPassword']!='') echo "<p style='color:red'>Invalid password</p>"; ?>
</fieldset>
<?php 

} 
else { 

echo "<BR><BR><fieldset style='text-align:center'>";
//read file, get passwd
$myFile = "../commentpw.inc";
$fh = fopen($myFile, 'r');
$password = fread($fh, filesize($myFile));
echo "<p style='color:orange'>Current password is $password</p>";
?>

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
 <label for="txtpassword">Change Password:</label> 
    <br /><input type="changepassword" title="Enter your password" name="txtChangePassword" />
    <p><input type="submit" name="Submitpass" value="Change Password" /></p> 
<?
echo "</fieldset>";
} 

?> 
</div>
</body>
</html>
