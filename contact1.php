<?php $menu="contact"; if(isset($_GET["menu"])) {if($_GET["menu"]!='') $menu=$_GET["menu"];} include("header.php"); ?>
	<style>
	.form{background:none!important}
	</style>

	<div class="mainBG"><br><br>

    <div style="width:510px;background-color:#ececec;margin:0 auto;color:#565656;border:1px solid #fcce19;text-align:left;font-family:'archivo_narrowregular'">
    <div style="font-size:30px;padding:20px;font-weight:bold">Serving Dallas Ft. Worth Since 2007</div>
    <div style="width:40%;float:left;padding-left:20px;font-size:20px;"><strong>Phone:</strong><br>
<a href="tel:9724703528">972-470-3528</a><br>
<br>
<strong>E-mail:</strong><br>

<a href="mailto:info@honestinstall.com">info@honestinstall.com</a></div>
        <div style="width:47%;float:right;font-size:20px;"><strong>Hours:</strong><br>

<br>
Sales - 9am to 6pm (Mon-Sat)<br>
<br>
Installation - Monday-Friday</div>
<div style="clear:both;padding-bottom:20px"></div>
    </div>
		<?php $webpage="Contact Us Page"; include("includes/jf-serviceform1.php"); ?>   
			<div class="clear"></div>
		</div>
        <div class="mainBG"><br>
		<p class="bottomText" align="center">
			<!--Start Customer Lobby-->
			<a onClick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" href="http://www.customerlobby.com/reviews/403/honest-install/" target="_blank">
				<img style="display: none" border=0 alt="Statistics" src="http://www.customerlobby.com/ctrack-403">
				<img border="0" alt="Review of Honest Install" src="http://www.customerlobby.com/img/403/standard/">
			</a><!--End Customer Lobby--> 
			<br><br>SCHEDULE SERVICE NOW!<strong>&nbsp; 972-470-3528<br><br></strong>
			E-Mail us Directly: <a title="E-Mail Honest Install" href="mailto:info@HonestInstall.com"><strong>info@HonestInstall.com</strong></a>
		</p>
		<p class="bottomText" align="center"><a href="contact.php"><strong>Schedule Service/Inquiry Form</strong></a></p>
	
<?php require("footer.php"); ?>
