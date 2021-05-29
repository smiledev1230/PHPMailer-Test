<div align="center">
<!-- wrapper !-->
<div id="wrapper">
	
    <!-- header !-->
    <div class="header">
    <?php  // display random image
		// Change this to the total number of images in the folder 
		$total = "2"; 
		// Change to the type of files to use eg. .jpg or .gif 
		$file_type = ".jpg"; 
		// Change to the location of the folder containing the images 
		$image_folder = "images/random"; 
		// You do not need to edit below this line 
		$start = "1"; 
		$random = mt_rand($start, $total); 
		$image_name = $random . $file_type; 
		echo "<img src=\"$image_folder/$image_name\" alt=\"$image_name\" /></div>"; 
	?>   
    <!-- eof header !-->
    
    <!-- nav !-->
    <div class="nav">
    <div id="nav-wrap">
    	<ul class="dropdown dropdown-horizontal">
        <li><a href="./" class="dir2" <? if($menu=="home") echo 'id="active"'; ?>>Home</a></li>
       <!--<a href="./" class="dir2">Service &amp; Pricing</a> to show drop down arrow--> 
	<li><a href="/pricing.php" class="dir" <? if($menu=="pricing") echo 'id="active"'; ?>>Services &amp; Pricing</a>
		<ul>
			<li><a href="/pricing.php">Pricing Menu</a></li>
            <li><a href="/install.php">Install Services </a></li>
		</ul>
	</li>
    
    <li><a href="/commercial.php?menu=cw" class="dir2" <? if($menu=="cw") echo 'id="active"'; ?>>Commercial</a></li>
    <!--
    <li><a href="/product-giftidea.php" class="dir2" <? if($menu=="products") echo 'id="active"'; ?>>Products &amp; Equip</a>
		<ul>
			<li><a href="./">Brackets</a></li>
            <li><a href="./">Audio</a></li>
            <li><a href="./">Glo-Mount</a></li>
            <li><a href="./">Bundles</a></li>
            <li><a href="./">Etc</a></li>
		</ul>
	</li>-->
	
      <li><a href="/product-prepaid.php" class="dir" <? if($menu=="gc") echo 'id="active"'; ?>>Products & Gift Ideas</a>
      	<ul>
			<li><a href="/product-prepaid.php">Prepaid Install Cards</a></li>
            <li><a href="/product-giftidea.php">Featured Products</a></li>
		</ul>
      </li>
      
      <li><a href="/process.php" class="dir" <? if($menu=="process") echo 'id="active"'; ?>>Our Process</a>
		<ul>
			<li><a href="/process.php">The Honest Way</a></li>
            <li><a href="/install.php#Photos">Photo Gallery</a></li>
            <li><a href="/spotlight.php">Spotlight Page</a></li>
            <li><A onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 
      href="http://www.customerlobby.com/reviews/403/honest-install/" 
      target=_blank>Customer Reviews</a></li>
            <li><a href="/referral.php">Referral Program</a></li>
            <li><a href="/matchmyinstall.php">Price Matching</a></li>
		</ul>
	</li>
    
      <li><A onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 
      href="http://www.customerlobby.com/reviews/403/honest-install/" 
      target=_blank class="dir2">Reviews</a></li>
     <li><a href="/about.php" class="dir" <? if($menu=="about") echo 'id="active"'; ?>>About Honest</a>
       <ul>
        <li><a href="/about.php">About</a></li>
        <li><a href="/companynews.php">Company News</a></li>
        <li><a href="/contact.php">Contact Us</a></li> 
       </ul>
    </li>
	<li><a href="/contact.php" class="dir2" <? if($menu=="contact") echo 'id="active"'; ?>>Contact Us</a></li>

</ul>
</div>
    </div>
    <!-- eof nav !-->

</div>
<!-- eof wrapper !-->

<div id="rotator"><span class="schedule"><a href="http://www.honestinstall.com/contact.php">Schedule Service/Request a Quote</a></span><div onclick="location.href='/product-gameday.php';" class="gideabox"></div><div onclick="location.href='/product-prepaid.php';" class="prepaidbox"></div></div>
<TABLE border=0 cellSpacing=0 cellPadding=0 width=850 align=center >
  <TBODY>
  <TR vAlign=top>
    <TD class=mainBG align="center"><br />
    <strong>Honest Install - TV INSTALLATION, HOME THEATER & AUDIO/VIDEO - Dallas, Texas | <a href="mailto:info@honestinstall.com">info@honestinstall.com</a>, 972-470-3528
</strong>
<? if($menu!="home") {
echo
<<<ENDH
<FONT size=2><BR></FONT><A 
      href="http://www.honestinstall.com/"><FONT size=2 
      face=Arial><STRONG>www.HonestInstall.com</STRONG></FONT></A><FONT 
      color=#808080><STRONG><FONT size=2 face=Arial>&nbsp; |&nbsp; <FONT 
      size=3>972-470-3528</FONT>&nbsp; |&nbsp; </FONT></STRONG></FONT><A 
      href="mailto:info@honestInstall.com"><STRONG><FONT size=2 
      face=Arial>info@honestInstall.com</FONT></STRONG></A>

ENDH;
}
?>
</TD></TR></TBODY></TABLE>