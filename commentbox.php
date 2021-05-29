<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<TITLE>Honest Install - Human Resources Portal</TITLE>
<style>

body{
	
	background-image: url(images/portalskin.jpg);

	background-repeat: no-repeat;

	background-position: center top;font-family: 'archivo_narrowregular', sans-serif;font-size:16px;color:#6f6f6f;line-height:23px;
	}
	
	h2{font-family: 'archivo_narrowregular', sans-serif;font-size:25px;color:#6f6f6f;text-align:center}
	fieldset{width:450px;margin:0 auto;margin-top:150px}
</style>
    <link rel="stylesheet" href="/assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
</head>

<body>

<div id="content">
<?php 

//read file, get passwd
$myFile = "commentpw.inc";
$fh = fopen($myFile, 'r');
$password = fread($fh, filesize($myFile));
fclose($fh);
if ($_POST['txtPassword'] != $password) { 
?> 
<br /><br />

 <fieldset style="text-align:center">
      <legend align="center"><h2>Login</h2></legend>

<form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"> 
    
    <label for="txtpassword">Password:</label> 
    <br /><input type="password" title="Enter your password" name="txtPassword" />

    <p><input type="submit" name="Submit" value="Login" /></p> 

</form> 
<?php if ($_POST['txtPassword']!='') echo "<p style='color:red'>Invalid password</p>"; ?>
</fieldset>
<?php 

} 
else { 

?> 
<script src="http://cdn.jotfor.ms/static/jotform.js?3.2.1197" type="text/javascript"></script>
<script type="text/javascript">
   JotForm.setConditions([{"action":[{"field":"10","visibility":"Show"},{"field":"8","visibility":"Hide"}],"id":"1395946503717","link":"Any","terms":[{"field":"8","operator":"equals","value":"honest14"}],"type":"field"},{"action":[{"field":"7","visibility":"Show"}],"id":"1395948327609","index":"1","link":"Any","priority":"1","terms":[{"field":"6","operator":"equals","value":"Indentify"}],"type":"field"}]);
   JotForm.init();
</script>
<link href="http://cdn.jotfor.ms/static/formCss.css?3.2.1197" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="http://cdn.jotfor.ms/css/styles/nova.css?3.2.1197" />
<link type="text/css" media="print" rel="stylesheet" href="http://cdn.jotfor.ms/css/printForm.css?3.2.1197" />
<style type="text/css">


    .form-label{
        width:150px !important;font-family: 'archivo_narrowregular', sans-serif;font-size:16px;color:#6f6f6f;line-height:23px;
    }
    .form-label-left{
        width:150px !important;font-family: 'archivo_narrowregular', sans-serif;font-size:16px;color:#6f6f6f;line-height:23px
    }
	#content{padding-top:180px;width:450px;margin:0 auto;text-align:center}
    .form-line{
        padding-top:12px;
        padding-bottom:12px;
    }
    .form-label-right{
        width:150px !important;font-family: 'archivo_narrowregular', sans-serif;font-size:16px;color:#6f6f6f;line-height:23px
    }
    .form-all{
        width:450px;
        background:no-repeat;
        color:rgb(0, 0, 0) !important;font-family: 'archivo_narrowregular', sans-serif;font-size:16px;color:#6f6f6f;line-height:23px
        font-family:'Arial';
        font-size:14px;margin:0 auto;
    }
	.form-single-column{ width:200px}
    .form-radio-item label, .form-checkbox-item label, .form-grading-label, .form-header{
        color:rgb(0, 0, 0);
    }
</style>
<form class="jotform-form" action="http://submit.jotform.us/submit/40847257563159/" method="post" name="form_40847257563159" id="40847257563159" accept-charset="utf-8">
  <input type="hidden" name="formID" value="40847257563159" />
  <div class="form-all">
    <ul class="form-section">
      <li class="form-line" id="id_1">
        <label class="form-label-left" id="label_1" for="input_1">
          Type of feedback<span class="form-required">*</span>
        </label>
        <div id="cid_1" class="form-input">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_1_0" name="q1_typeOf" value="Complaint" />
              <label for="input_1_0"> Complaint </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio validate[required]" id="input_1_1" name="q1_typeOf" value="Idea/Suggestion" />
              <label for="input_1_1"> Idea/Suggestion </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_6">
        <label class="form-label-left" id="label_6" for="input_6"> Option </label>
        <div id="cid_6" class="form-input">
          <div class="form-single-column"><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_6_0" name="q6_option" value="Anonymous" checked="checked" />
              <label for="input_6_0"> Anonymous </label></span><span class="clearfix"></span><span class="form-radio-item" style="clear:left;"><input type="radio" class="form-radio" id="input_6_1" name="q6_option" value="Indentify" />
              <label for="input_6_1"> Indentify </label></span><span class="clearfix"></span>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_7">
        <label class="form-label-left" id="label_7" for="input_7"> Name </label>
        <div id="cid_7" class="form-input">
          <input type="text" class=" form-textbox" data-type="input-textbox" id="input_7" name="q7_name" size="20" value="" />
        </div>
      </li>
      <li class="form-line" id="id_5">
        <label class="form-label-left" id="label_5" for="input_5"> Comments </label>
        <div id="cid_5" class="form-input">
          <textarea id="input_5" class="form-textarea" name="q5_comments" cols="40" rows="6"></textarea>
        </div>
      </li>
      <li class="form-line" id="id_2">
        <div id="cid_2" class="form-input-wide">
          <div style="margin:0 auto" class="form-buttons-wrapper">
            <button id="input_2" type="submit" class="form-submit-button">
              Submit
            </button>
          </div>
        </div>
      </li>
      <li class="form-line" id="id_11">
        <div id="cid_11" class="form-input-wide">
          <div id="text_11" class="form-html">
            <p style="text-align:center;"><span style="color:#500050;font-family:arial, sans-serif;font-size:13px;">1. Information relayed is to be of a constructive nature by way of helping to better our culture.</span>
              <br style="color:#500050;font-family:arial, sans-serif;font-size:13px;" /><span style="color:#500050;font-family:arial, sans-serif;font-size:13px;">2. For any emergency, abuse, and/or harassment allegations it is encouraged to meet with Human Resources.</span>
            </p>
          </div>
        </div>
      </li>
      <li style="display:none">
        Should be Empty:
        <input type="text" name="website" value="" />
      </li>
    </ul>
  </div>
  <input type="hidden" id="simple_spc" name="simple_spc" value="40847257563159" />
  <script type="text/javascript">
  document.getElementById("si" + "mple" + "_spc").value = "40847257563159-40847257563159";
  </script>
</form>
<?php 

} 

?> 
</div>
</body>
</html>
