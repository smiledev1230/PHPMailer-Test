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
Honest Install Paypal Form
</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="generator" content="Wufoo">
<meta name="robots" content="index, follow">

<!-- CSS -->
<link href="css/structure.css" rel="stylesheet">
<link href="css/form.css" rel="stylesheet">
<link href="css/theme.css" rel="stylesheet">

<!-- JavaScript -->
<script src="scripts/wufoo.js"></script>
<script>
    document.addEventListener('DOMContentLoaded',function(){
        document.getElementById("saveForm").click();
    });
</script>
<!--[if lt IE 10]>
<script src="https://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
</head>
<body id="public" style="display:none;visibility:none">

<div id="container" class="ltr">

<h1 id="logo">
<a href="http://www.wufoo.com" title="Powered by Wufoo">Wufoo</a>
</h1>

<form id="form4" name="form4" class="wufoo topLabel page" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
      action="https://honestinstall.wufoo.com/forms/r10u5ui503ip1cr/#public">
  
<header id="header" class="info">
<h2>Honest Install Paypal Form</h2>
<div></div>
</header><ul>
<li id="foli1" class="notranslate      ">
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
<li id="foli8" class="notranslate      ">
<label class="desc" id="title8" for="Field8">
Custom Deposit/Payment
<span id="req_8" class="req">*</span>
</label>
<span class="symbol">$</span>
<span>
<input id="Field8" name="Field8" type="text" class="field text currency nospin" value="<? echo $amount_dollar; ?>" size="10" tabindex="3" required />
<label for="Field8">Dollars</label>
</span>
<span class="symbol radix">.</span>
<span class="cents">
<input id="Field8-1" name="Field8-1" type="text" class="field text nospin" value="<? echo $amount_cents; ?>" size="2" maxlength="2" tabindex="4"       />
<label for="Field8-1">Cents</label>
</span>
</li>
<li id="foli111" class="notranslate      ">
<label class="desc" id="title111" for="Field111">
Email
</label>
<div>
<input id="Field111" name="Field111" type="email" spellcheck="false" class="field text medium" value="<? echo $email; ?>" maxlength="255" tabindex="5"       />
</div>
</li>
<li id="foli4" class="notranslate      ">
<label class="desc" id="title4" for="Field4">
Company
</label>
<div>
<input id="Field4" name="Field4" type="text" class="field text medium" value="<? echo $company; ?>" maxlength="255" tabindex="6" onkeyup=""       />
</div>
</li>
<li id="foli5" class="notranslate      ">
<label class="desc" id="title5" for="Field5">
Reference
</label>
<div>
<input id="Field5" name="Field5" type="text" class="field text medium" value="<? echo $reference; ?>" maxlength="255" tabindex="7" onkeyup=""       />
</div>
</li>
<li id="foli6"
class="notranslate      "><label class="desc" id="title6" for="Field6">
Notes
</label>

<div>
<textarea id="Field6"
name="Field6"
class="field textarea medium"
spellcheck="true"
rows="10" cols="50"

tabindex="8"
onkeyup=""
       ><? echo $notes; ?></textarea>

</div>
</li> <li class="buttons ">
<div>

                    <input id="saveForm" name="saveForm" class="btTxt submit"
    type="submit" value="Submit"
 /></div>
</li>

<li class="hide">
<label for="comment">Do Not Fill This Out</label>
<textarea name="comment" id="comment" rows="1" cols="1"></textarea>
<input type="hidden" id="idstamp" name="idstamp" value="dzrYDSfyYieYS/X9bZahzfxDPmXVK7NvrmdSYa4zNNQ=" />
</li>
</ul>
</form>
 

</div><!--container-->

<a class="powertiny" href="http://www.wufoo.com/" title="Powered by Wufoo"
style="display:block !important;visibility:visible !important;text-indent:0 !important;position:relative !important;height:auto !important;width:95px !important;overflow:visible !important;text-decoration:none;cursor:pointer !important;margin:0 auto !important">
<span style="background:url(./images/powerlogo.png) no-repeat center 7px; margin:0 auto;display:inline-block !important;visibility:visible !important;text-indent:-9000px !important;position:static !important;overflow: auto !important;width:62px !important;height:30px !important">Wufoo</span>
<b style="display:block !important;visibility:visible !important;text-indent:0 !important;position:static !important;height:auto !important;width:auto !important;overflow: auto !important;font-weight:normal;font-size:9px;color:#777;padding:0 0 0 3px;">Designed</b>
</a></body>
</html>