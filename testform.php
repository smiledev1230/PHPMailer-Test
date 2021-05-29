<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<form name="serviceform"  action='/scripts/serviceform.php' method="post">
<table width="100%" border="0" cellpadding="0">
  <tr>
    <td><input name="question" type="checkbox" value="" />I have a question</td>
    <td><input name="service" type="checkbox" value="" />Iwant to schedule a service</td>
    <td>Phone * 
      <input name="phone" type="text" /></td>
  </tr>
  <tr>
  <td colspan="2">Full Name * <input name="Name" type="text" /><br />
Company/Org. <input name="Company" type="text" /><br />
Email <input name="Email" type="text" /></td>
  <td valign="top">Comments <textarea name="Comments" cols="50" rows="10"></textarea></td>
  </tr>
</table>

</form>
</body>
</html>
