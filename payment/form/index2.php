<?

$fname=$_GET['Field1'];
$lname=$_GET['Field2'];
$amount_dollar=$_GET['Field8'];
$amount_cents=$_GET['Field8-1'];
$company=$_GET['Field4'];
$reference=$_GET['Field5'];
$notes=$_GET['Field6'];
$email=$_GET['email'];

?>
<!DOCTYPE html>
<html>
<head>

<title>
Honest Install - Secure Payment Gateway
</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="generator" content="Wufoo">
<meta name="robots" content="index, follow">

<!-- CSS -->
<link href="css/structure.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">
<style>
body{font-size:16px;color:#262626}
</style>
<!-- JavaScript -->
<script src="scripts/wufoo.js"></script>

<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<style>

  .paypal{position:relative;z-index:9999;float:right;margin-top:-260px;padding-right:20px}
  @media (min-width: 500px) and (max-width: 600px) {
    
  }
  @media (max-width: 640px) {
    .logohead {max-width:100%;
    }
	.email{float:none!important}
	.paypalimg {width:250px;}
	.selecthead{float:left}
	.ccimg{width:250px;float:none;margin:0 auto}
	.paypal{display:block;float:none!important;margin-top:0px;padding-left:20px;margin:0 auto;}
  }
</style>

</head>

<body id="public">
<img src="https://honestinstall.com/images/Payment-Gateway-Header.png" style="margin-bottom:-5px;padding:0" class="logohead"/>
<div id="container" class="ltr">

<form id="form1" name="form1" class="wufoo topLabel page" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
      action="https://honestinstall.wufoo.com/forms/z18av1dz01qsv6q/#public">
  <ul>

<li id="foli1" class="notranslate      " >
<? 
if($company!='') echo "$company";
echo "<BR>$fname $lname"; if($email!='') echo "<BR>$email";
if($reference!='') echo "<BR><strong>Reference:</strong> $reference";
if($notes!='') echo "<BR><small><strong>Notes:</strong> $notes</small>";
if($amount_cents==NULL) $amount_cents="00" ;
echo "<BR><BR><div style='float:right;font-size:12px;font-weight:normal;padding-top:30px;color:blue;' class='email'>";
?>
<a href="javascript:void(0);" onclick="javascript:window.location.href='mailto:payments@honestinstall.com?Subject=Payment%20Gateway%20Help'; return false;">contact us/make a correction</a></div>
<strong>Amount:</strong><BR>
<? echo "$$amount_dollar.$amount_cents<BR><BR><HR>"; ?>

<h3 align="center" style="padding-bottom:0;font-weight:normal" class="selecthead">Select a payment method:</h3>

</li>
<li id="foli1" class="notranslate      " style="display:none">
<label class="desc" id="title1" for="Field1">
Name
<span id="req_1" class="req">*</span>
</label>
<span>
<input id="Field1" name="Field1" type="text" class="field text fn" value="<? echo $fname; ?>" size="8" tabindex="1"       required />
<label for="Field1">First</label>
</span>
<span>
<input id="Field2" name="Field2" type="text" class="field text ln" value="<? echo $lname; ?>" size="14" tabindex="2" required />
<label for="Field2">Last</label>
</span>
</li>
<li id="foli8" class="notranslate      " style="display:none">
<label class="desc" id="title8" for="Field8">
Amount
<span id="req_8" class="req"></span>
</label>
<span class="symbol"></span>
<span>
<input id="Field8" name="Field8" type="text" class="field text currency nospin" value="<? echo $amount_dollar; ?>" size="10" tabindex="3" style="display:none"/>
<label for="Field8" style="display:none">Dollars</label>
</span>
<span class="symbol radix"></span>
<span class="cents">
<input id="Field8-1" name="Field8-1" type="text" class="field text nospin" value="<? echo $amount_cents; ?>" size="2" maxlength="2" tabindex="4"    style="display:none"   />
<label for="Field8-1" style="display:none">Cents</label>
</span>
</li>


<li id="fo1li111" 		class="notranslate      " style="display:none" ?>>
	<label class="desc" id="title111" for="Field111">
		Email
			</label>
	<div>
		<input id="Field111" 			name="Field111" 			type="email" 			spellcheck="false" 			class="field text medium" 			value="<? echo $email; ?>" 			maxlength="255" 			tabindex="5"       						onkeyup="handleInput(this);" 			onchange="handleInput(this);" 									/>
	</div>
	</li>


<li id="foli4" class="notranslate" style="display:none"' >
<label class="desc" id="title4" for="Field4">
Company
</label>
<div>
<input id="Field4" name="Field4" type="text" class="field text medium" value="<? echo $company; ?>" maxlength="255" tabindex="5" onkeyup=""       />
</div>
</li>
<li id="foli5" class="notranslate      " style="display:none" ?>>
<label class="desc" id="title5" for="Field5">
Reference
</label>
<div>
<input id="Field5" name="Field5" type="text" class="field text medium" value="<? echo $reference; ?>" maxlength="255" tabindex="6" onkeyup=""       />
</div>
</li>
<li id="foli6"
class="notranslate      " style="display:none" ><label class="desc" id="title6" for="Field6">
Notes
</label>

<div>
<textarea id="Field6"
name="Field6"
class="field textarea medium"
spellcheck="true"
rows="10" cols="50"

tabindex="7"
onkeyup=""
       ><? echo $notes; ?></textarea>

</div>
</li>
<li id="foli10" class=" notStacked     " style="display:none">
<fieldset>
<![if !IE | (gte IE 8)]>
<legend id="title10" class="desc notranslate">
<span id="req_10" class="req"></span>
</legend>
<![endif]>
<!--[if lt IE 8]>
<label id="title10" class="desc">
<span id="req_10" class="req">*</span>
</label>
<![endif]-->
</fieldset>
</li> <li class="buttons ">
<div>

<input type="image" src="https://honestinstall.com/images/CC-Square2.png" border="0" name="saveForm"  class="ccimg">
 </div>
</li>

<li class="hide">
<label for="comment">Do Not Fill This Out</label>
<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
<input type="hidden" id="idstamp" name="idstamp" value="j9wTYBxm4f06krcO62pTinc/PWVSHyEbgwYukLFY6zw=" />
</li><li>
</li>
</ul>
</form>
<div  class="paypal">
<form id="form1" name="form1" class="wufoo topLabel page" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
      action="https://honestinstall.wufoo.com/forms/z18av1dz01qsv6q/#public">
  <ul>

<li id="foli1" class="notranslate      " style="display:none">
<label class="desc" id="title1" for="Field1">
Name
<span id="req_1" class="req">*</span>
</label>
<span>
<input id="Field1" name="Field1" type="text" class="field text fn" value="<? echo $fname; ?>" size="8" tabindex="1"       required />
<label for="Field1">First</label>
</span>
<span>
<input id="Field2" name="Field2" type="text" class="field text ln" value="<? echo $lname; ?>" size="14" tabindex="2" required />
<label for="Field2">Last</label>
</span>
</li>
<li id="foli8" class="notranslate      " style="display:none">
<label class="desc" id="title8" for="Field8">
Amount
<span id="req_8" class="req"></span>
</label>
<span class="symbol"></span>
<span>
<input id="Field8" name="Field8" type="text" class="field text currency nospin" value="<? echo $amount_dollar; ?>" size="10" tabindex="3" style="display:none"/>
<label for="Field8" style="display:none">Dollars</label>
</span>
<span class="symbol radix"></span>
<span class="cents">
<input id="Field8-1" name="Field8-1" type="text" class="field text nospin" value="<? echo $amount_cents; ?>" size="2" maxlength="2" tabindex="4"    style="display:none"   />
<label for="Field8-1" style="display:none">Cents</label>
</span>
</li>


<li id="fo1li111" 		class="notranslate      " style="display:none" ?>>
	<label class="desc" id="title111" for="Field111">
		Email
			</label>
	<div>
		<input id="Field111" 			name="Field111" 			type="email" 			spellcheck="false" 			class="field text medium" 			value="<? echo $email; ?>" 			maxlength="255" 			tabindex="5"       						onkeyup="handleInput(this);" 			onchange="handleInput(this);" 									/>
	</div>
	</li>


<li id="foli4" class="notranslate" style="display:none"' >
<label class="desc" id="title4" for="Field4">
Company
</label>
<div>
<input id="Field4" name="Field4" type="text" class="field text medium" value="<? echo $company; ?>" maxlength="255" tabindex="5" onkeyup=""       />
</div>
</li>
<li id="foli5" class="notranslate      " style="display:none" ?>>
<label class="desc" id="title5" for="Field5">
Reference
</label>
<div>
<input id="Field5" name="Field5" type="text" class="field text medium" value="<? echo $reference; ?>" maxlength="255" tabindex="6" onkeyup=""       />
</div>
</li>
<li id="foli6"
class="notranslate      " style="display:none" ><label class="desc" id="title6" for="Field6">
Notes
</label>

<div>
<textarea id="Field6"
name="Field6"
class="field textarea medium"
spellcheck="true"
rows="10" cols="50"

tabindex="7"
onkeyup=""
       ><? echo $notes; ?></textarea>

</div>
</li>
<li id="foli10" class=" notStacked     " style="display:none">
<fieldset>
<![if !IE | (gte IE 8)]>
<legend id="title10" class="desc notranslate">
<span id="req_10" class="req"></span>
</legend>
<![endif]>
<!--[if lt IE 8]>
<label id="title10" class="desc">
<span id="req_10" class="req">*</span>
</label>
<![endif]-->
</fieldset>
</li> <li class="buttons ">
<div align="center">

<input type="image" src="https://honestinstall.com/images/e-Check-Square.png" border="0" name="saveForm"  class="ccimg">
 <br>

<small><strong>For electronic check click above then<br>
select the e-check icon on the next screen</strong></small></div>
</li>

<li class="hide">
<label for="comment">Do Not Fill This Out</label>
<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
<input type="hidden" id="idstamp" name="idstamp" value="j9wTYBxm4f06krcO62pTinc/PWVSHyEbgwYukLFY6zw=" />
</li><li>
</li>
</ul>
</form>
</div>
<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
<div align="center" style="clear:both">
<p style="font-size:13px;text-align:center">Stuck or Need Help?  972-470-3528 | <a href="mailto:payments@honestinstall.com">payments@honestinstall.com</a></p><br>

<img src="https://honestinstall.com/images/Authorize-Footer-Logo CM Ver.jpg"><br>
<br>
<span style="font-size:12px;">By utilizing this form, I agree to the <a href="#">Payment Terms</a> and <a href="#">Honest Install Terms & Conditions</a><br><br>
Copyright © Honest Install. All rights reserved.</span>
<br>
<br>

</div>

</div>
</div><!--container-->


</body>
</html>
