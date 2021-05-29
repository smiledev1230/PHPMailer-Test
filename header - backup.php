<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta content="text/html; charset=iso-8859-1" http-equiv="Content-Type">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title><?php include('includes/title.php'); ?></title>
		<meta NAME="Description" CONTENT="Provider of Home Entertainment Products & Installation and Commercial Audio/Video Installation for residents and businesses of Dallas/Ft. Worth">
		<meta name="keywords" content="TV Install, TV Installation, TV Mounting, TV Wall Mounting, Home Entertainment Installation , Home Theater Install, Home Theatre Installation, Projector & Screen Installation, Projector Install, Low Voltage Wiring, Prewiring, Pre-Wiring, Low Volt, TV Wiring, In Wall Wire Concealment, Speaker Installation, Universal Remote Control Programming, Surround Sound Installation & Setup, Electronics Recycling, Universal Remotes & Programming, Electronics Hookup Configuration, Media Room, Whole House Audio, Cable Installation, Cable Drop, Cabling">
		<meta property="fb:page_id" content="122796624447624" />
		<link rel="stylesheet" type="text/css" href="honestinstall.css">
		<link rel="stylesheet" href="assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
		<style type="text/css">
			a:link {
				color: #808080
			}
			a:visited {
				color: #808080
			}
			a:hover {
				color: #ffcc00
			}
		</style>
		<!--[if gte IE 7]>
		<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
		<!--[if IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
		<!--[if IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css"><![endif]-->
		<!-- eof if IE !-->
		<style type="text/css">
			<!--
			@import url(css/style.css);
		  -->
		</style>
		<link href="includes/jquery.thumbnailScroller.css" rel="stylesheet" />
		<link href="css/dropdown/dropdown.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="css/dropdown/themes/drop/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="css/dropdown/dropdown.linear.columnar.css" media="screen" rel="stylesheet" type="text/css" />
		<link href="css/dropdown/themes/lwis.celebrity/default.advanced.css" media="screen" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="/scripts/jshowoff.css" type="text/css" media="screen, projection" />
		<link href="includes/jquery.thumbnailScroller.css" rel="stylesheet" />
		<link href="css/angies_style.css" rel="stylesheet" type="text/css"/>
		<link href="css/pagination.css" rel="stylesheet" type="text/css"/>
		<link href="css/yelp_style.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="/assets/nivo/nivo-slider.css" type="text/css"  />
		<link rel="stylesheet" href="/assets/nivo/themes/default/default.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="/assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
		<?php if ($menu == 'nest') { ?>
		<link rel="stylesheet" type="text/css" href="images/nest/style.css"/>
		<?php } ?>
		<link rel="stylesheet" href="scripts/jquery.simplyscroll.css" media="all" type="text/css">
		<?php if ($menu == 'epson') { ?>
			<link rel="stylesheet" type="text/css" href="images/epson/style.css"/>
		<?php } ?>
		<link rel="stylesheet" type="text/css" href="/scripts/jquery.ad-gallery.css">
		<link rel="stylesheet" type="text/css" href="scripts/orangebox.css">
		<link rel="stylesheet" href="/assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
		<link rel="stylesheet" href="assets/ppgallery/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
		<link rel="stylesheet" href="css/lightbox2.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">        
        <link rel="stylesheet" href="css/finaltilesgallery.css">
		<link rel="stylesheet" href="css/meanmenu.css">
		<link href="css/reponsive.css" rel="stylesheet" type="text/css"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
		<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="includes/jquery-ui-1.8.13.custom.min.js"></script>
		<script type="text/javascript" src="/scripts/jquery.jshowoff.js"></script>
		<script src="/assets/nivo/jquery.nivo.slider.pack.js" type="text/javascript"></script>
		<script type="text/javascript" src="/scripts/jquery.ad-gallery.js"></script>
		<script type="text/javascript" src="/scripts/orangebox.min.js"></script>
		<script src="assets/ppgallery/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
        <script src="js/jquery.finaltilesgallery.js"></script>
	    <script src="js/lightbox2.js"></script>
		<script src="js/jquery.meanmenu.js"></script>
		<script>
			$j(document).ready(function ($) {
				$('#nav-wrap').meanmenu();
			});
		</script>
		<script>
	        $j(function () {
				$j(".final-tiles-gallery").finalTilesGallery({
					//autoLoadURL: "photos/get-img.php",
					autoLoadOffset: 1000
				});
	        });
	    </script>
		<script type="text/javascript" charset="utf-8">
			$j(document).ready(function(){
				$j("area[rel^='prettyPhoto']").prettyPhoto();
				
				$j(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
				$j(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
		
				$j("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
					custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
					changepicturecallback: function(){ initialize(); }
				});

				$j("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
					custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
					changepicturecallback: function(){ _bsap.exec(); }
				});
			});
		</script>
		<script type="text/javascript">
			$j(function() {
				var galleries = $j('.ad-gallery').adGallery();
				$j('#switch-effect').change(
					function() {
						galleries[0].settings.effect = $j(this).val();
						return false;
					}
				);
				$j('#toggle-slideshow').click(
					function() {
						galleries[0].slideshow.toggle();
						return false;
					}
				);
				$j('#toggle-description').click(
					function() {
						if(!galleries[0].settings.description_wrapper) {
						  galleries[0].settings.description_wrapper = $j('#descriptions');
						} else {
						  galleries[0].settings.description_wrapper = false;
						}
						return false;
					}
				);
			});
		</script>
		<script type="text/javascript">		
			( function($) {
				$(document).ready( function() { $('#slider').nivoSlider({ effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
						slices: 15, // For slice animations
						boxCols: 8, // For box animations
						boxRows: 4, // For box animations
						animSpeed: 400, // Slide transition speed
						pauseTime: 3000, // How long each slide will show
						startSlide: 0, // Set starting Slide (0 index)
						directionNav: true, // Next & Prev navigation
						controlNav: true, // 1,2,3... navigation
						controlNavThumbs: false, // Use thumbnails for Control Nav
						pauseOnHover: true, // Stop animation while hovering
						manualAdvance: false, // Force manual transitions
						prevText: 'Prev', // Prev directionNav text
						nextText: 'Next', // Next directionNav text
						randomStart: false, // Start on a random slide
						beforeChange: function(){}, // Triggers before a slide transition
						afterChange: function(){}, // Triggers after a slide transition
						slideshowEnd: function(){}, // Triggers after all slides have been shown
						lastSlide: function(){}, // Triggers when last slide is shown
						afterLoad: function(){}});  } );
			} ) ( jQuery );
		</script>
		<script type="text/javascript">		
			( function($) {
				$(document).ready( function() { $('#slider2').nivoSlider({ effect: 'fade', // Specify sets like: 'fold,fade,sliceDown'
						slices: 15, // For slice animations
						boxCols: 8, // For box animations
						boxRows: 4, // For box animations
						animSpeed: 400, // Slide transition speed
						pauseTime: 3000, // How long each slide will show
						startSlide: 0, // Set starting Slide (0 index)
						directionNav: true, // Next & Prev navigation
						controlNav: true, // 1,2,3... navigation
						controlNavThumbs: false, // Use thumbnails for Control Nav
						pauseOnHover: true, // Stop animation while hovering
						manualAdvance: false, // Force manual transitions
						prevText: 'Prev', // Prev directionNav text
						nextText: 'Next', // Next directionNav text
						randomStart: false, // Start on a random slide
						beforeChange: function(){}, // Triggers before a slide transition
						afterChange: function(){}, // Triggers after a slide transition
						slideshowEnd: function(){}, // Triggers after all slides have been shown
						lastSlide: function(){}, // Triggers when last slide is shown
						afterLoad: function(){}});  } );
			} ) ( jQuery );
		</script>
		<script type="text/javascript" src="scripts/jquery.simplyscroll.js"></script>
		<script type="text/javascript">
			(function($) {
				$(function() {
					$("#scroller").simplyScroll({			
						startOnLoad:true,auto:true,speed:1,frameRate:100
					});
				});
			})(jQuery);
		</script>
        <!-- Facebook Conversion Code for Outdoor Theater -->
<script>(function() {
var _fbq = window._fbq || (window._fbq = []);
if (!_fbq.loaded) {
var fbds = document.createElement('script');
fbds.async = true;
fbds.src = '//connect.facebook.net/en_US/fbds.js';
var s = document.getElementsByTagName('script')[0];
s.parentNode.insertBefore(fbds, s);
_fbq.loaded = true;
}
})();
window._fbq = window._fbq || [];
window._fbq.push(['track', '6026429354853', {'value':'0.01','currency':'USD'}]);
</script>
<noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6026429354853&amp;cd[value]=0.01&amp;cd[currency]=USD&amp;noscript=1" /></noscript>
	</head>
	<body>
		<?php include("totalreview.php");
		$total_review= "360"; ?>
		<!--[if lt IE 7]>
		<script type="text/javascript" src="js/jquery/jquery.js"></script>
		<script type="text/javascript" src="js/jquery/jquery.dropdown.js"></script>
		<![endif]-->
		<!-- / END -->
		<div align="center">
		<!-- wrapper !-->
			<div id="wrapper">
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
					echo "<a href='/'><img src=\"$image_folder/$image_name\" alt=\"$image_name\" alt='A real and local company: serving dallas/ft. worth since 2007. Free on-site consultations'/></a>"; 
					?>   
				</div>
				<div class="nav">
					<div id="nav-wrap">
						<ul id="nav" class="dropdown dropdown-linear dropdown-columnar">
							<li><a href="./" <?php if($menu=="home") echo 'id="active"'; ?>>Home</a></li>
							<li class="dir" onmouseover="" >
								<a class="no-padding" <?php if($menu=="angies" || $menu=="yelp") echo 'id="active"'; ?>>Reviews</a>
								<ul>
									<?php include "angies_review.php"; ?>
									<li><a href="custreviews.php">AL Reviews (<?php echo $pos; ?>)</a></li>
									<li><a onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" href="http://www.customerlobby.com/reviews/403/honest-install/" target=_blank>Customer Lobby (<?php echo $total_review; ?>)</a></li>
									<?php include "yelp_review.php"; ?>
									<li><a href="yelp.php">Yelp (<?php echo $pos; ?>)</a></li>
            <li><a href="https://plus.google.com/116147382403336090084/about?hl=en" target="_blank">Google Reviews</a></li>
									<li><a href="http://www.houzz.com/pro/honestinstallav/honest-install" target="_blank">Houzz Reviews</a></li>
								</ul>
							</li>
							<li>
								<a href="pricing-and-services.php"  <?php if($menu=="pricing") echo 'id="active"'; ?>>Services &amp; Pricing</a>
							</li>
							<li>
								<a href="categories.php"   <?php if($menu=="photos") echo 'id="active"'; ?>>Photos<img src="/images/new.png" width="15px" style="position:relative;margin-top:-4px;margin-bottom:5px;padding-left:2px"/></a>
							</li>
							<li>
								<a href="commercial.php?menu=cw"  <?php if($menu=="cw") echo 'id="active"'; ?>>COMMERCIAL</a>
							</li>
							<li class="dir product" onmouseover="" >
								<a class="no-padding" <?php if($menu=="productsandinstall" || $menu=="nest" || $menu=="epson" || $menu=="glomount" || $menu=="irkit" || $menu=="outcast" || $menu=="universalremote" || $menu=="internettv" || $menu=="gc") echo 'id="active"'; ?>>Products</a>
								<ul>
									<li class="dir">
										<ul>
											<li><a href="products-and-installation.php">View our Product Partners</a></li>
											<li><a href="nest.php">Nest Thermostats</a></li>
											<li><a href="nest.php">Nest Protect - <br />Smoke & CO Detector</a></li>
											<li><a href="product-epson.php">Epson Projectors</a></li>
											<li><a href="http://www.samsung.com/us/video/tvs" target="_blank">Samsung TVs</a></li>
											<li><a href="/sonos.php">SONOS - Whole Home Audio</a></li>
											<li><a href="product-glomount.php">GloMount - LED TV Bracket</a></li>
										</ul>
									</li>
									<li class="dir">
										<ul>
											<li><a href="product-irkit.php">IR Remote Repeaters </a></li>
											<li><a href="product-outcast.php">Outcast - <br />Wireless Outdoor Speaker</a></li>
											<li><a href="product-universalremote.php">Universal Remotes  </a></li>
											<li><a href="product-internettv.php">AppleTV/Roku  </a></li>
											<li><a href="product-prepaid.php">Gift Cards</a></li>
											<li><a href="products-and-installation.php"><small>WE CARRY THOUSAND OF<br /> PRODUCTS - CALL FOR <br />DETAILS</small> </a></li>
										</ul>
									</li>     
								</ul>
							</li>
							<li class="dir" onmouseover="" >
								<a class="no-padding" <?php if($menu=="faqs" || $menu=="spolight" || $menu=="tyronsmith") echo 'id="active"'; ?>>LEARN</a>
								<ul>
									<li><a href="fireplace-faqs.php">Fireplace TV FAQs</a></li>
									<!--<li><a href="spotlight.php">Spotlight Page</a></li>-->
									<li><a href="customer-profile-tyron-smith.php">Customer Profiles</a></li>
								</ul>
							</li>
							<li class="dir" onmouseover="" >
								<a class="no-padding" <?php if($menu=="about" || $menu=="process") echo 'id="active"'; ?>>Company</a>
								<ul>
									<li><a href="process.php">The Honest Way</a></li>
									<li><a href="about.php">About Us</a></li>
								</ul>
							</li> 
							<li><a href="contact.php" <?php if($menu=="contact") echo 'id="active"'; ?>>Contact</a></li>
						</ul>
					</div>
					<!-- eof nav !-->
				</div>
				<div id="rotator">
					<div onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" class="pricing"></div>
					<!--<div onclick="location.href='http://honestinstall.com/customer-profile-tyron-smith.php';" class="gideabox"></div>-->
					<div onclick="location.href='http://www.honestinstall.com/contact.php';" class="prepaidbox"></div>
				</div>
				<div class="mainBG" align="center">
					
                    <div class="heading-menu">
						<!--<a href="/blog">Blog</a>&nbsp;&nbsp; <a href="/careers.php">Careers</a>-->
                        Call Today: <b><a href="tel:972-470-3528">972-470-3528</a></b> Award Winning Service: <b><a href="contact.php">Hire Honest</a></b>
					</div>
                    
                    <?php if($menu!="home") echo '
					<div class="heading-text" style="text-align:center"> 
						<strong>Honest Install | Home Entertainment - Smart Home Automation - Commercial Audio/Video | <a href="mailto:info@honestInstall.com">info@honestInstall.com</a> | 972-470-3528</strong>
						<br />
						<br />
					</div>
					'; ?>
				</div>