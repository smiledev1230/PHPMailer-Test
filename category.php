<?php $menu = "photos"; include("header.php");?>
	<div class="mainBG"><br>
		<iframe src="folderslider/index.html" class="gallery-iframe" width="100%" height="570px" frameBorder="0">Browser not compatible.</iframe>
		<div style="text-align:left;padding-left:12px;font-size:12px">Infinity scroll at work, move down for more images to magically appear...</div>
		<div id="gallery" class="final-tiles-gallery effect-zoom effect-fade-out  caption-bottom" style="padding:10px">
			<div class="ftg-items">
				<?php include("category/get-image-by-cat.php"); ?>
			</div>
		</div>
		<br><br>
		<p class="bottomText" align="center"><!--Start Customer Lobby-->
			<a onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, 	height=575,left=570,top=200,screenX=570,screenY=200'); return false;" href="http://www.customerlobby.com/reviews/403/honest-install/" target="_blank">
				<img style="display: none" border=0 alt="Statistics" src="http://www.customerlobby.com/ctrack-403">
				<img border=0 alt="Review of Honest Install" src="http://www.customerlobby.com/img/403/standard/"></a><!--End Customer Lobby--> 
			<br><br>SCHEDULE SERVICE NOW!<strong>&nbsp; 972-470-3528<br><br></strong>E-Mail us Directly: 
			<a title="E-Mail Honest Install" href="mailto:info@HonestInstall.com"><strong>info@HonestInstall.com</strong></a>
		</p>
		<p class="bottomText" align="center">
			<a href="contact.php"><strong>Schedule Service/Inquiry Form</strong></a>
		</p>
	</div>
<?php require("footer.php"); ?>