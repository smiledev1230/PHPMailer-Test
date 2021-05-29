<?php include("totalreview.php");
$total_review= "360"; ?>
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
<!--<div style="position:absolute;margin-left:700px;width:100px;border: 0px solid #CCC;height:100px;cursor:pointer" align="center"  onClick="window.open('http://honestinstall.com/livehelp/livehelp.php?department=1','Honest Install - Live Help!','width=550,height=480');"></div>-->
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

		echo "<a href='/'><img src=\"$image_folder/$image_name\" alt=\"$image_name\" /></a></div>"; 

	?>   

    <!-- eof header !-->

    

    <!-- nav !-->

    <div class="nav">

    <div id="nav-wrap">

    	<ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
        
	<li><a href="./" <?php if($menu=="home") echo 'id="active"'; ?>>Home</a></li>
    
   <li class="dir" onmouseover="" ><span <?php if($menu=="process") echo 'id="active"'; ?>>Reviews</span>
		<ul style="width:180px">
        
        <!-- duplicate this for multiple cols !-->
			<li><ul>
            <?php include "angies_review.php"; ?>
            <li><a href="/custreviews.php">AL Reviews (<?php echo $pos; ?>)</a></li>
            <li><A onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" href="http://www.customerlobby.com/reviews/403/honest-install/" target=_blank>Customer Lobby (<?php echo $total_review; ?>)</a></li>

            <?php include "yelp_review.php"; ?>
            <li><a href="/yelp.php">Yelp (<?php echo $pos; ?>)</a></li>
            <li><a href="https://plus.google.com/116147382403336090084/about?hl=en" target="_blank">Google Reviews</a></li>
            <li><a href="http://www.houzz.com/pro/honestinstallav/honest-install" target="_blank">Houzz Reviews</a></li>
			</ul>
            </li>
		</ul>
	</li>
	<li><a href="/pricing-and-services.php"  <?php if($menu=="pricing") echo 'id="active"'; ?>>Services &amp; Pricing</a></li>
     <li><a href="/photogallery.php#top"   <?php if($menu=="photos") echo 'id="active"'; ?>>Photos<img src="/images/new.png" width="15px" style="position:relative;margin-top:-4px;margin-bottom:5px;padding-left:2px"/></a></li>
		<!--<ul style="width:180px">
        
       
			<li class="dir"><ul><li><a href="/pricing.php">Pricing Menu</a></li>
				
					<li><a href="/install.php" >Install Services </a></li>
           </ul>
           </li>
       
		</ul>-->
	
	
	<li><a href="/commercial.php?menu=cw"  <?php if($menu=="cw") echo 'id="active"'; ?>>COMMERCIAL</a></li>
    
    
    <li class="dir" onmouseover="" ><span <?php if($menu=="gc") echo 'id="active"'; ?>>Products</span>
		<ul>
        
           
           <!-- duplicate this for multiple cols !-->
			<li class="dir">
				<ul>
					<li><a href="http://www.honestinstall.com/products-and-installation.php" id="active" >View our Product Partners</a></li>
					<li><a href="/nest.php">Nest Thermostats</a></li>
					<li><a href="/nest.php">Nest Protect - <br />Smoke 
& CO Detector</a></li>
                <li><a href="/product-epson.php">Epson Projectors</a></li>
					<li><a href="http://www.samsung.com/us/video/tvs" target="_blank">Samsung TVs</a></li>
					<li><a href="http://www.sonos.com/system" target="_blank">SONOS - Whole Home Audio</a></li>
					<li><a href="/product-glomount.php">GloMount - LED TV Bracket</a></li>
				</ul>
			</li>
            
           <!-- eof duplicate this for multiple cols !-->
           
        <!-- duplicate this for multiple cols !-->
			<li class="dir"><ul>
					<li><a href="/product-irkit.php">IR Remote Repeaters </a></li>
                    <li><a href="/product-outcast.php">Outcast - <br />
Wireless Outdoor Speaker</a></li>
					<li><a href="/product-universalremote.php">Universal Remotes  </a></li>
					<li><a href="/product-internettv.php">AppleTV/Roku  </a></li>
                    <li><a href="/product-prepaid.php">Gift Cards</a></li>
					<li><a href="http://www.honestinstall.com/products-and-installation.php"><small>WE CARRY THOUSAND OF<br /> 
PRODUCTS - 
CALL FOR <br />DETAILS</small> </a></li>
                    </ul>
			</li>
            
           <!-- eof duplicate this for multiple cols !-->
          
		           
		</ul>
	</li>
    
    
    
    <li class="dir" onmouseover="" ><span <?php if($menu=="process") echo 'id="active"'; ?>>LEARN</span>
		<ul style="width:180px">
        
        <!-- duplicate this for multiple cols !-->
			<li><ul>
            <li><a href="/fireplace-faqs.php">Fireplace TV FAQs</a></li>
            <!--<li><a href="/install.php#Photos">Photos</a></li>-->
            <!--<li><a href="/spotlight.php">Spotlight Page</a></li>-->
            
            <li><a href="http://www.honestinstall.com/customer-profile-tyron-smith.php">Customer Profiles</a></li>
            
            <!--
            <li><A onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 

      href="http://www.customerlobby.com/reviews/403/honest-install/" 

      target=_blank>Customer Reviews</a></li>
            <li><a href="/referral.php">Referral Program</a></li>
            <li><a href="/matchmyinstall.php">Price Matching</a></li>-->
			</ul>
            </li>
		</ul>
	</li>
    
  <!-- <li><a href="/blog"   <?php if($menu=="blog") echo 'id="active"'; ?> target="_blank">Blog</a></li>-->
    <li class="dir" onmouseover="" ><span <?php if($menu=="about") echo 'id="active"'; ?>>Company</span>
		<ul style="width:180px">
        
        <!-- duplicate this for multiple cols !-->
			<li class="dir">
				<ul>
            <li><a href="/process.php">The Honest Way</a></li>
		<li><a href="/about.php">About Us</a></li><!--
        <li><a href="http://www.honestinstall.blog.com/" target="_blank">Honest Blog</a></li>-->
				</ul>
			</li>
            
		           
		</ul>
	</li>
  <!-- <li><a href="/careers.php"   <?php if($menu=="contact") echo 'id="active"'; ?>>Careers</a></li>-->
    
   <li><a href="/contact.php"   <?php if($menu=="contact") echo 'id="active"'; ?>>Contact</a></li>
    
</ul>

    </div>

    <!-- eof nav !-->



</div>

<!-- eof wrapper !-->



<!--<div id="rotator"><span class="schedule"><a href="http://www.honestinstall.com/contact.php">Schedule Service/Request a Quote</a></span><div onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" class="pricing"></div><div onclick="location.href='http://honestinstall.com/mediaroom.php?utm_source=web&utm_medium=direct&utm_campaign=mediabanner';" class="gideabox"></div><div onclick="location.href='/product-epson.php';" class="gideabox"></div><div onclick="location.href='http://honestinstall.com/product-onsiteconsultation.php';" class="prepaidbox"></div></div>-->

<div id="rotator"><div onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" class="pricing"></div><div onclick="location.href='http://honestinstall.com/customer-profile-tyron-smith.php';" class="gideabox"></div><div onclick="location.href='http://www.honestinstall.com//contact.php';" class="prepaidbox"></div></div>

<TABLE border=0 cellSpacing=0 cellPadding=0 width=850 align=center   >

  <TBODY>

  <TR vAlign=top>

    <TD class=mainBG align="center">
    <div align="right" style="padding-right:57px;padding-bottom:10px">
    <a href="/blog">Blog</a>&nbsp;&nbsp; <a href="/careers.php">Careers</a>
    </div>
<div style="text-align:center"> 
    <strong>Honest Install | Home Entertainment - Smart Home Automation - Commercial Audio/Video | <a href="mailto:info@honestInstall.com">info@honestInstall.com</a> | 972-470-3528

<br />
<br />

</div>
</TD></TR></TBODY></TABLE>