<?
$fname=$_GET['Field1'];
$lname=$_GET['Field2'];
$amount=$_GET['Field8'];
$company=$_GET['Field4'];
$reference=$_GET['Field5'];
$notes=$_GET['Field6'];
$email=$_GET['email'];
?>
<!DOCTYPE html>
<html>
<head>

<title>
Honest Install Sales Entry
</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="generator" content="Wufoo">
<meta name="robots" content="index, follow">

<!-- CSS -->
<link href="css/structure.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">

<!-- JavaScript -->
<script src="scripts/wufoo.js"></script>

<script src="scripts/gen_validatorv4.js" type="text/javascript"></script>
<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>
label.desc, legend.desc{font-weight:normal}
</style>
</head>

<body id="public">

<img src="https://honestinstall.com/images/Payment-Gateway-Header.png" style="margin-bottom:-5px;padding:0"/>
<div id="container" class="ltr">


<form id="form2" name="form2" class="wufoo topLabel page" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
      action="https://honestinstall.com/payment/sales.php">
  
<header id="header" class="info">
<div style="float:right;padding-top:10px;"><a href="https://honestinstall.com/payment/sales/history.html" target="_blank">View History</a></div>
<h2>Honest Install Sales Entry</h2>
</header><ul>
<li id="foli2" class="notranslate      ">
<label class="desc" id="title2" for="Field2">
<strong>Name</strong>
<span id="req_2" class="req">*</span>
</label>
<span>
<input id="Field2" name="Field2" type="text" class="field text fn" value="<? if($fname!='') echo $fname; ?>" size="8" tabindex="1"       required />
<label for="Field2"><strong>First</strong></label>
</span>
<span>
<input id="Field3" name="Field3" type="text" class="field text ln" value="<? if($lname!='') echo $lname; ?>" size="14" tabindex="2" required />
<label for="Field3"><strong>Last</strong></label>
</span>
</li>
<li id="foli5" class="notranslate      ">
<label class="desc" id="title5" for="Field5">
<strong>Amount</strong>
<span id="req_5" class="req">*</span>
</label>
<span class="symbol">$</span>
<span>
<input id="Field5" name="Field5" type="text" class="field text currency nospin" value="<? if($amount!='') echo $amount; ?>" size="10" tabindex="3" required />

</span>
</li>
<li id="foli9" class="notranslate      ">
<label class="desc" id="title9" for="Field9">
Company/Organization (optional)
</label>
<div>
<input id="Field9" name="Field9" type="text" class="field text medium" value="<? if($company!='') echo $company; ?>" maxlength="255" tabindex="5" onkeyup=""       />
</div>
</li>
<li id="foli19" class="notranslate      ">
<label class="desc" id="title9" for="Field9">
<span style="color:#1B6CF2">Email (sends receipt to cstmr)</span>
</label>
<div>
<input id="email" name="email" type="text" class="field text medium" value="<? if($email!='') echo $email; ?>" maxlength="255" tabindex="5" onkeyup=""       />
</div>
</li>
<li id="foli6" class="notranslate      ">
<label class="desc" id="title6" for="Field6">
Reference (optional)
</label>
<div>
<input id="Field6" name="Field6" type="text" class="field text medium" value="<? if($reference!='') echo $reference; ?>" maxlength="255" tabindex="6" onkeyup=""       />
</div>
</li>
<li id="foli7"
class="notranslate      "><label class="desc" id="title7" for="Field7">
Notes (optional)
</label>

<div>
<textarea id="Field7" name="Field7" class="field textarea medium" spellcheck="true" rows="10" cols="50" tabindex="7" onkeyup=""><? if($notes!='') echo $notes; ?></textarea>

</div>
</li> <li class="buttons ">
<div>

                    <input id="saveForm" name="saveForm" class="btTxt submit"
    type="submit" value="Generate link"
 /></div>
</li>

<li class="hide">
<label for="comment">Do Not Fill This Out</label>
<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
<input type="hidden" id="idstamp" name="idstamp" value="oQXn+kX+w+Xe2NAcU23ZrHoO8uwBhTXBRgNuTVaPsvQ=" />
</li>
</ul>
</form>
 

</div><!--container-->

<script language="JavaScript" type="text/javascript"
    xml:space="preserve">//<![CDATA[
//You should create the validator only after the definition of the HTML form
  var frmvalidator  = new Validator("form2");

 frmvalidator.EnableMsgsTogether();
 frmvalidator.addValidation("Field2","req","Please enter the First Name");

 /* frmvalidator.addValidation("Field2","alpha","Alphabetic chars only");*/
 frmvalidator.addValidation("Field3","req","Please enter the Last Name");

  /*frmvalidator.addValidation("Field3","alpha","Alphabetic chars only");*/
  
  
 frmvalidator.addValidation("Field5","req","Please enter the Amount");
  frmvalidator.addValidation("Field5","numeric","Please enter numbers only in amount");
  
  frmvalidator.addValidation("email","maxlen=50");
  /*frmvalidator.addValidation("email","req","Please enter the Email");*/
  frmvalidator.addValidation("email","email");
  


//]]></script>

</body>
</html>