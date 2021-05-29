
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

		$file_type = ".png"; 

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

    	<ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
        
	<li><a href="./" <? if($menu=="home") echo 'id="active"'; ?>>Home</a></li>
    
	<li><a href="/pricing-and-services.php"  <? if($menu=="pricing") echo 'id="active"'; ?>>Services &amp; Pricing</a></li>
    
		<!--<ul style="width:180px">
        
       
			<li class="dir"><ul><li><a href="/pricing.php">Pricing Menu</a></li>
				
					<li><a href="/install.php" >Install Services </a></li>
           </ul>
           </li>
       
		</ul>-->
	
	
	<li><a href="/commercial.php?menu=cw"  <? if($menu=="cw") echo 'id="active"'; ?>>COMMERCIAL INSTALLS</a></li>
    
    
    <li class="dir" onmouseover="" ><span <? if($menu=="gc") echo 'id="active"'; ?>>Products</span>
		<ul>
        
           
           <!-- duplicate this for multiple cols !-->
			<li class="dir">
				<ul>
					<li><a href="http://www.honestinstall.com/products-and-installation.php">Products We Carry <sup>NEW!</sup></a></li>
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
					<li><a href="/nest.php">Nest Thermostats</a></li>
					<li><a href="/product-irkit.php">IR Remote Repeaters </a></li>
                    <li><a href="/product-outcast.php">Outcast Wireless Speaker<br />System</a></li>
					<li><a href="/product-internettv.php">Roku  </a></li>
					<li><a href="/product-securetv.php">Secure/Safety TV Kit  </a></li>
					<li><a href="/product-internettv.php">Streaming Boxes</a></li>
					<li><a href="/product-universalremote.php">Universal Remotes  </a></li>
					<li><a href="/product-wifibooster.php">Wi-Fi Extenders</a></li></ul>
			</li>
            
           <!-- eof duplicate this for multiple cols !-->
          
		           
		</ul>
	</li>
    
    
    
    <li class="dir" onmouseover="" ><span <? if($menu=="process") echo 'id="active"'; ?>>LEARN</span>
		<ul style="width:180px">
        
        <!-- duplicate this for multiple cols !-->
			<li><ul>
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
    
   <li class="dir" onmouseover="" ><span <? if($menu=="process") echo 'id="active"'; ?>>Reviews</span>
		<ul style="width:180px">
        
        <!-- duplicate this for multiple cols !-->
			<li><ul>
            <? include "angies_review.php"; ?>
            <li><a href="/angies.php">Angie's List (<? echo $pos; ?>)</a></li>
            <li><A onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" href="http://www.customerlobby.com/reviews/403/honest-install/" target=_blank>Customer Reviews (<? echo $total_review; ?>)</a></li>

            <? include "yelp_review.php"; ?>
            <li><a href="/yelp.php">Yelp (<? echo $pos; ?>)</a></li>
			</ul>
            </li>
		</ul>
	</li>
    <li class="dir" onmouseover="" ><span <? if($menu=="about") echo 'id="active"'; ?>>The Honest Difference</span>
		<ul style="width:180px">
        
        <!-- duplicate this for multiple cols !-->
			<li class="dir">
				<ul>
            <li><a href="/process.php">The Honest Way</a></li>
		<li><a href="/about.php">About</a></li>
        <li><a href="http://www.honestinstall.blog.com/" target="_blank">Honest Blog</a></li>
        
				</ul>
			</li>
            
		           
		</ul>
	</li>
   <li><a href="/careers.php"   <? if($menu=="contact") echo 'id="active"'; ?>>Careers</a></li>
    
   <li><a href="/contact.php"   <? if($menu=="contact") echo 'id="active"'; ?>>Contact Us</a></li>
    
</ul>

    </div>


    <!-- eof nav !-->



</div>

<!-- eof wrapper !-->



<div id="rotator"><span class="schedule"><a href="http://www.honestinstall.com/contact.php">Schedule Service/Request a Quote</a></span><div onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" class="pricing"></div><div onclick="location.href='/product-epson.php';" class="gideabox"></div><div onclick="location.href='/product-epson.php';" class="gideabox"></div><div onclick="location.href='http://honestinstall.com/product-onsiteconsultation.php';" class="prepaidbox"></div></div>

