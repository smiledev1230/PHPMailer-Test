
<!-- Beginning of compulsory code below -->


<!-- old top menu !-->
<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />

<link href="css/dropdown/themes/drop/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
<!-- eof old top menu !-->

<!-- new top menu !-->
<link href="css/dropdown/dropdown.linear.columnar.css" media="screen" rel="stylesheet" type="text/css" />
<link href="css/dropdown/themes/lwis.celebrity/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
<!-- eof new top menu !-->


<!--[if lt IE 7]>

<script type="text/javascript" src="js/jquery/jquery.js"></script>

<script type="text/javascript" src="js/jquery/jquery.dropdown.js"></script>

<![endif]-->



<!-- / END -->


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

    	<ul id="nav" class="dropdown dropdown-linear dropdown-columnar"  style="background-color:#878787;margin-left:-20px;width:830px">
        
	<li><a href="./" <? if($menu=="home") echo 'id="active"'; ?>>Home</a></li>
    
	<li class="dir" onmouseover="" ><span  <? if($menu=="pricing") echo 'id="active"'; ?>>Services &amp; Pricing</span>
		<ul style="width:180px">
        
       
           <!-- duplicate this for multiple cols !-->
			<li class="dir"><ul><li><a href="/pricing.php">Pricing Menu</a></li>
				
					<li><a href="/install.php" >Install Services </a></li>
           </ul>
           </li>
       
		</ul>
	</li>
	
	
	<li><a href="/commercial.php?menu=cw"  <? if($menu=="cw") echo 'id="active"'; ?>>COMMERCIAL INSTALLS</a></li>
    
    
    <li class="dir" onmouseover="" ><span <? if($menu=="gc") echo 'id="active"'; ?>>Products</span>
		<ul>
        
           
           <!-- duplicate this for multiple cols !-->
			<li class="dir">
				<ul>
					<li><a href="http://www.honestinstall.com/products-and-installation.php"><span  class="yellowmenu">Product Overview Page</span></a></li>
					<li><a href="/product-internettv.php">AppleTV  </a></li>
                <li><a href="/product-elitetv.php">Elite TVs</a></li>
                <li><a href="/product-epson.php">Epson Projectors</a></li>
                <li><a href="/product-giftidea.php">Featured Products</a></li><li><a href="/product-prepaid.php">Gift Cards</a>
				</li>
					<li><a href="/product-glomount.php">GloMount LED TV Bracket</a></li>
					<li><a href="/product-internetradio.php">Internet Radio</a></li>
                    
				</ul>
			</li>
            
           <!-- eof duplicate this for multiple cols !-->
           
        <!-- duplicate this for multiple cols !-->
			<li class="dir"><ul>
					<li><a href="/product-irkit.php">IR Remote Repeaters </a></li>
                    <li><a href="/product-outcast.php">Outcast Wireless Speaker<br />System</a></li>
					<li><a href="/product-internettv.php">Roku  </a></li>
					<li><a href="/product-securetv.php">Secure/Safety TV Kit  </a></li>
					<li><a href="/product-internettv.php">Streaming Boxes</a></li>
					<li><a href="/product-credenzas.php">TV Stands </a></li>
					<li><a href="/product-universalremote.php">Universal Remotes  </a></li>
					<li><a href="/product-wifibooster.php">Wi-Fi Extenders</a></li></ul>
			</li>
            
           <!-- eof duplicate this for multiple cols !-->
          
		           
		</ul>
	</li>
    
    
    
    <li class="dir" onmouseover="" ><span <? if($menu=="process") echo 'id="active"'; ?>>Our Process</span>
		<ul style="width:180px">
        
        <!-- duplicate this for multiple cols !-->
			<li><ul>
            <li><a href="/process.php">The Honest Way</a></li>
            <li><a href="/fireplace-faqs.php">Fireplace TV FAQs</a></li>
            <li><a href="/install.php#Photos">Photo Gallery</a></li>
            <li><a href="/spotlight.php">Spotlight Page</a></li>
            <li><A onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 

      href="http://www.customerlobby.com/reviews/403/honest-install/" 

      target=_blank>Customer Reviews</a></li>
            <li><a href="/referral.php">Referral Program</a></li>
            <li><a href="/matchmyinstall.php">Price Matching</a></li>
			</ul>
            </li>
		</ul>
	</li>
    
    <li><A onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 

      href="http://www.customerlobby.com/reviews/403/honest-install/" 

      target=_blank class="dir2">Reviews</a></li>
    
    <li class="dir" onmouseover="" ><span <? if($menu=="about") echo 'id="active"'; ?>>About Honest</span>
		<ul style="width:180px">
        
        <!-- duplicate this for multiple cols !-->
			<li class="dir">
				<ul>
		<li><a href="/about.php">About</a></li>
        <li><a href="http://www.honestinstall.blog.com/" target="_blank">Honest Blog</a></li>
        <li><a href="/companynews.php">Company News</a></li>
        <li><a href="/contact.php">Contact Us</a></li> 
				</ul>
			</li>
            
		           
		</ul>
	</li>
    
   <li><a href="/contact.php"   <? if($menu=="contact") echo 'id="active"'; ?>>Contact Us</a></li>
    
</ul>

    </div>

    <!-- eof nav !-->



</div>
</div>
</div>
<!-- eof wrapper !-->


    <div id="logoParade" style="height: 500px; cursor:pointer;">
        <div class="scrollableArea" style="width: 1400px;">
            <p>
                <a class="fancybox" href="/images/crawler/slide1.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/slide1.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a><br>


                <a class="fancybox" href="/images/crawler/e2.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/e2.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a>
            </p>

            <p>

                <a class="fancybox" href="/images/crawler/3.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/3.jpg" width="400" alt="" style="margin-top: 70px;"  class="shadow-bringer shadow"/></a>                
            </p>

            <p><br>
                <br>

                <label class="bubble">
                    <br>

                    <span class="bubblehead	">TV & Video</span><br>

                    <span class="futuratxt">
                        Apple	<br>
                        Bose	<br>
                        Elite	<br>
                        Panasonic	<br>
                        Samsung	<br>
                        Sharp	<br>
                        Sony	<br>
                        Roku	<br>
                        Toshiba	<br>
                        <a href="http://www.honestinstall.com/products-and-installation.php">View more...</a><br>
                        <br>

                    </span>
                </label>
            </p>
            <p>

                <a class="fancybox" href="/images/crawler/e2.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/e2.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a><br>
                <a class="fancybox" href="/images/crawler/slide1.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/slide1.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a>

            </p>

            <p>

                <a class="fancybox" href="/images/crawler/3.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/3.jpg" width="400" alt="" style="margin-top: 70px;"  class="shadow-bringer shadow"/></a>                
            </p>

            <p><br>
                <br>

                <label class="bubble">
                    <br>

                    <span class="bubblehead	">We Specialize in the Following Services:</span><br>

                    <span class="futuratxt">

                        FOR RESIDENTIAL & COMMERCIAL<br><br>

                        -TV Mounting & TV Setup<br>
                        -Electronics Hookup & Configuration<br>
                        -Projector & Screen Installation<br>
                        -Surround Sound & Speaker Install<br>
                        -Wiring Cleanup & In-Wall Wire Concealment<br>
                        -Universal Remote Controls & Programming<br>
                        -Home Theater System Troubleshooting<br>
                        -TV De-Installation & Move Services<br>
                        -Electronics Removal & Recycling<br>
                        <a href="http://www.honestinstall.com/products-and-installation.php">View more...</a><br>
                        <br>

                    </span>
                </label>
            </p>   <p>
                <br>
                <label class="bubble">
                    <br>

                    <span class="bubblehead	">WI-FI Extenders:</span><br>

                    <span class="futuratxt">



                        Did you know that Honest can help you extend or "boost" your wireless signal <br>
                        throughout your home or business? If you're tired of having poor signal quality <br>
                        in any part of your Wi-Fi world call us, we can help. <a href="http://www.honestinstall.com/product-wifibooster.php">See More</a><br>
                        <br>

                    </span>
                </label><br>
                <br>

                <label class="bubble">
                    <br>

                    <span class="bubblehead	">PREPAID INSTALLATION SERVICES</span><br>

                    <span class="futuratxt">


                        Introducing the Honest Install Prepaid Installation Program. <br>
                        Gift cards are now available for install packages or custom <br>
                        amounts starting as low as $85.00.<br><br>

                        <a href="http://www.honestinstall.com/product-prepaid.php">Visit our Prepaid Installs Page</a><br>
                        <br>

                    </span>
                </label>
            </p><p>
                <a class="fancybox" href="/images/crawler/slide1.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/slide1.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a><br>


                <a class="fancybox" href="/images/crawler/e2.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/e2.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a>
            </p>

            <p>

                <a class="fancybox" href="/images/crawler/3.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/3.jpg" width="400" alt="" style="margin-top: 70px;"  class="shadow-bringer shadow"/></a>                
            </p>

            <p>
                <a class="fancybox" href="/images/crawler/slide1.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/slide1.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a><br>


                <a class="fancybox" href="/images/crawler/e2.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/e2.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a>
            </p>
            <p><br>
                <br>

                <label class="bubble">
                    <br>

                    <span class="bubblehead	">TV & Video</span><br>

                    <span class="futuratxt">
                        Apple	<br>
                        Bose	<br>
                        Elite	<br>
                        Panasonic	<br>
                        Samsung	<br>
                        Sharp	<br>
                        Sony	<br>
                        Roku	<br>
                        Toshiba	<br>
                        <a href="http://www.honestinstall.com/products-and-installation.php">View more...</a><br>
                        <br>

                    </span>
                </label>
            </p>  
            <p>

                <a class="fancybox" href="/images/crawler/3.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/3.jpg" width="400" alt="" style="margin-top: 70px;"  class="shadow-bringer shadow"/></a>                
            </p>

            <p><br>
                <br>

                <label class="bubble">
                    <br>

                    <span class="bubblehead	">TV & Video</span><br>

                    <span class="futuratxt">
                        Apple	<br>
                        Bose	<br>
                        Elite	<br>
                        Panasonic	<br>
                        Samsung	<br>
                        Sharp	<br>
                        Sony	<br>
                        Roku	<br>
                        Toshiba	<br>
                        <a href="http://www.honestinstall.com/products-and-installation.php">View more...</a><br>
                        <br>

                    </span>
                </label>
            </p>
            <p>

                <a class="fancybox" href="/images/crawler/3.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/3.jpg" width="400" alt="" style="margin-top: 70px;"  class="shadow-bringer shadow"/></a>                
            </p>
            <p>
                <a class="fancybox" href="/images/crawler/slide1.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/slide1.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a><br>


                <a class="fancybox" href="/images/crawler/e2.jpg" data-fancybox-group="gallery" title=""><img src="/images/crawler/e2.jpg" width="180" alt="" style="margin-top: 10px;"  class="shadow-bringer shadow"/></a>
            </p>
        </div>
    </div>

    <script src="smooth/js/jquery.min.js" type="text/javascript"></script>
    <script src="smooth/js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
    <script src="smooth/js/jquery.mousewheel.min.js" type="text/javascript"></script>
    <script src="smooth/js/jquery.kinetic.js" type="text/javascript"></script>
    <script src="smooth/js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>

    <script type="text/javascript" src="smooth/js/fancy/jquery.fancybox.js?v=2.1.4"></script>
    <script type="text/javascript" src="smooth/js/fancy/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="smooth/js/fancy/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
    <script type="text/javascript" src="smooth/js/fancy/helpers/jquery.fancybox-media.js?v=1.0.5"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            var status = false;
            var fancyClick = false;

            $('.fancybox').fancybox({
                arrows    : false,
                nextClick : false
            });
                
            $("#logoParade").smoothDivScroll({ 
                autoScrollingMode: "always", 
                autoScrollingDirection: "endlessLoopRight", 
                autoScrollingStep: 1, 
                autoScrollingInterval: 50
            });
                
            $("#logoParade").bind("click", function() {
                if (status == false && fancyClick == false)
                    status = true;
                else if (fancyClick == false)
                    status = false;
                else if (status == false && fancyClick == true)
                    status = false;                    
            
                if (status && fancyClick != true)
                    $(this).smoothDivScroll("stopAutoScrolling");
                else
                    $(this).smoothDivScroll("startAutoScrolling");
                fancyClick = false;
            });
                
            $('.fancybox').bind('click', function(){
                if (status == true)
                    status = false;
                fancyClick = true;
            });
                
        });
    </script>
    
<div align="center" style="border-top:#333;border-top-width: 1px;border-top-style: solid;border-top-color: #666;width:850px;margin:0 auto;">
<div id="rotator"><span class="schedule"><a href="http://www.honestinstall.com/contact.php">Schedule Service/Request a Quote</a></span><div onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" class="pricing"></div><div onclick="location.href='/product-epson.php';" class="gideabox"></div><div onclick="location.href='/product-epson.php';" class="gideabox"></div><div onclick="location.href='/product-prepaid.php';" class="prepaidbox"></div></div>

<TABLE border=0 cellSpacing=0 cellPadding=0 width=850 align=center >

  <TBODY>

  <TR vAlign=top>

    <TD class=mainBG align="center"><br />
<div style="text-align:center">
    <strong>Honest Install - TV INSTALLATION, HOME THEATER & AUDIO/VIDEO - Dallas, Texas | <a href="mailto:info@honestinstall.com">info@honestinstall.com</a>

<? 
if($menu=="home") {
	echo " | 972-470-3528";
}
?>
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

</div>
</TD></TR></TBODY></TABLE>