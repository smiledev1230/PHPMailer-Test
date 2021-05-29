<?php $menu='home'; include("header.php"); ?>
	<div class="mainBG">
		<div align="center">
			<div class="contents">
				<div id="demo">
					<?php  if(isset($_GET['m'])){  if ($_GET['m'] == 'true') : ?>
						<label style="color: red;">Your request has been submitted. We will evaluate it. Thank you.</label>
						<?php endif; }?>
					<?php include("slideincfade.php"); ?>
					<script type="text/javascript" src="/scripts/jquery.jshowoff.js"></script>
					<link rel="stylesheet" href="/scripts/jshowoff.css" type="text/css" media="screen, projection" />
					<script type="text/javascript">		
						(function($) {
							$(document).ready( function() { $('#features').jshowoff({ speed:8000,hoverPause:false,controls:false});  } );
						} ) ( jQuery );
					</script>
				</div>
				<script type="text/javascript">
					window.onload = function () {
					  if (!/*@cc_on!@*/0) return;

					  // find every element to test
					  var all = document.getElementsByTagName('*'), i = all.length;

					  // fast reverse loop
					  while (i--) {
						// if the scrollWidth (the real width) is greater than
						// the visible width, then apply style changes
						if (all[i].scrollWidth > all[i].offsetWidth) {
						  all[i].style['paddingBottom'] = '20px';
						  all[i].style['overflowY'] = 'hidden';
						}
					  }
					};
				</script>
			</div>
			<!-- thumbnail scroller markup begin -->
			<div id="tS2" class="jThumbnailScroller">
				<div class="jTscrollerContainer">
					<div class="jTscroller">
						<?php
						//random order
						$order=rand(1,2);
						if($order==1){ 
						?>
							<a href="#" style="cursor:default"><img alt="Fireplace FAQs" src="images/Banner-Ad-Fireplaces-sized.jpg"></a>
							<a href="#" style="cursor:default"><img alt="Elite TVs" src="images/Banner-Ad-EliteTV2.jpg"></a>
							<a href="#" style="cursor:default"><img alt="Universal Remotes"  src="images/banner_03.jpg"></a>
							<a href="#" style="cursor:default"><img alt="On-Site Installations" src="images/banner_04.jpg"></a>
							<a href="/pricing-and-services.php"><img src="images/Banner-Ad-Apple-TV-sized.jpg" /></a>
							<a href="http://www.honestinstall.com/product-service-call.php"><img alt="Service Call" src="images/banner_01.jpg"></a>
							<a href="http://www.honestinstall.com//product-universalremote.php"><img alt="GloMount" src="images/banner_02.jpg"></a>
							<a href="/fireplace-faqs.php"><img src="images/Banner-Ad-IR-Kits-sized.jpg" /></a>
						<?php } else { ?>
							<a href="/pricing-and-services.php"><img src="images/Banner-Ad-Apple-TV-sized.jpg" /></a>
							<a href="http://www.honestinstall.com/product-service-call.php"><img alt="Service Call" src="images/banner_01.jpg"></a>
							<a href="http://www.honestinstall.com//product-universalremote.php"><img alt="GloMount" src="images/banner_02.jpg"></a>
							<a href="/fireplace-faqs.php"><img src="images/Banner-Ad-IR-Kits-sized.jpg" /></a>
							<a href="#" style="cursor:default"><img alt="Fireplace FAQs" src="images/Banner-Ad-Fireplaces-sized.jpg"></a>
							<a href="#" style="cursor:default"><img alt="Elite TVs" src="images/Banner-Ad-EliteTV2.jpg"></a>
							<a href="#" style="cursor:default"><img alt="Universal Remotes"  src="images/banner_03.jpg"></a>
							<a href="#" style="cursor:default"><img alt="On-Site Installations" src="images/banner_04.jpg"></a>
						<?php } ?>       
					</div>
				</div>
				<a href="#" class="jTscrollerPrevButton"></a>
				<a href="#" class="jTscrollerNextButton"></a>
			</div>
			<!-- thumbnail scroller markup end -->
			<?php include("testimonial_include.php"); ?>
			<script>
				/* calling thumbnailScroller function with options as parameters */
				jQuery.noConflict(); 
				(function($){
				window.onload=function(){ 
					/* selector can be id, class, tag name etc. */
					$("#tS2").thumbnailScroller({ 
						scrollerType:"clickButtons", 
						scrollerOrientation:"horizontal", 
						scrollSpeed:2, 
						scrollEasing:"easeOutCirc", 
						scrollEasingAmount:600, 
						acceleration:4, 
						scrollSpeed:800, 
						noScrollCenterSpace:10, 
						autoScrolling:0, 
						autoScrollingSpeed:2000, 
						autoScrollingEasing:"easeInOutQuad", 
						autoScrollingDelay:500 
					});
				}
				})(jQuery);
			</script>
			<!-- thumbnailScroller script -->
			<script src="includes/jquery.thumbnailScroller.js"></script>
			<img class="fullscreen" src="images/Silloute-of-Services-croppe.jpg" alt="Home Theatre, TV Install, Automation, Wi-fi & networking, audio/sound, lighting & Cliamate,motorized shades & drapes, pre-wire, security, conferencing, digital signage"/>
			<div align="center;width:730px;display:block">
				<img class="ninetyscreen" src="/images/adcubes.jpg" usemap="#Map" />
				<map name="Map">
				  <area shape="rect" coords="6,15,244,143" href="http://honestinstall.com/pricing-and-services.php#tvinstall">
				  <area shape="rect" coords="489,13,725,142" href="http://honestinstall.com/product-outcast.php">
				</map>
			</div>
			<br />
			<font size=1>
			<a title="Read More of This Featured Review" href="http://www.customerlobby.com/reviews/403/honest-install/review/31198?main_page=2" target=_blank></a>
			<a title="Read More of This Featured Review" href="http://www.customerlobby.com/reviews/403/honest-install/review/11213?main_page=9" target=_blank></a>
			<a title="Read More of This Featured Review" href="http://www.customerlobby.com/reviews/403/honest-install/review/30816?main_page=2" target=_blank></a>
			</font>
		</div>
		<div class="social-home">
			<div class="column-four first">
				<!--Start Customer Lobby-->
				<a class=lobby title="Read Customer Reviews for Honest Install" onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" href="http://www.customerlobby.com/reviews/403/honest-install/" target=_blank>
					<img style="DISPLAY: none" border=0 src="http://www.customerlobby.com/ctrack-403"><img border=0 hspace=0 alt="" src="images/Lobby-image2.jpg" width=127 height=77 style="padding-bottom:1px"><!--End Customer Lobby--><BR>
					<span class=lobby><strong><font color=#4f94b5 size=+0><?php echo "("; echo $total_review; ?> Reviews )</font></strong></span>
				</a>
			</div>
			<div class="column-four">
				<a style="position: relative; pading-BOTTOM: 0px; MARGIN: 0px; pading-LEFT: 0px; WIDTH: 150px; PADDING-RIGHT: 0px; DISPLAY: block; HEIGHT: 57px; OVERFLOW: hidden; PADDING-TOP: 0px" id=bbblink class=rbhzbum title="Honest Install, Home Theater, Richardson, TX" href="http://www.bbb.org/dallas/business-reviews/home-theater/honest-install-in-richardson-tx-90343905#bbblogo" target=_blank>
					<img style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px"id=bbblinkimg alt="Honest Install, Home Theater, Richardson, TX" src="http://seal-dallas.bbb.org/logo/rbhzbum/honest-install-90343905.png" width=300 height=57>
				</a>
				<br/>
				<script type=text/javascript>var bbbprotocol = ( ("https:" == document.location.protocol) ? "https://" : "http://" ); document.write(unescape("%3Cscript src='" + bbbprotocol + 'seal-dallas.bbb.org' + unescape('%2Flogo%2Fhonest-install-90343905.js') + "' type='text/javascript'%3E%3C/script%3E"));</script>
				<div style="display:block;text-align:center;margin-left:-15px">
					<div id="fb-root"></div>

					<script>(function(d, s, id) {

						var js, fjs = d.getElementsByTagName(s)[0];

						if (d.getElementById(id))
							return;

						js = d.createElement(s);
						js.id = id;

						js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=271686419508184";

						fjs.parentNode.insertBefore(js, fjs);

					}(document, 'script', 'facebook-jssdk'));</script>
					<div class="fb-like" data-href="http://www.facebook.com/pages/Honest-Install/122796624447624" data-send="true" data-layout="button_count"  data-show-faces="true" style="padding-left:25px;padding-bottom:6px"></div>
				</div>
			</div>
			<div class="column-four">
				<a href="http://www.angieslist.com/companylist/us/tx/richardson/honest-install-reviews-2292250.htm" target="_blank">
					<img id="angies-review" width="125px" alt="angieslist" border="0" src="images/al-2011-2013.gif" alt="Read Unbiased Consumer Reviews Online at AngiesList.com"/>
				</a>
				<p style="border-bottom: medium none; border-left: medium none; padding-bottom: 7px; padding-left: 7px; padding-right: 7px; font-family: arial, sans-serif; color: black; font-size: 12px; border-top: medium none; border-right: medium none; padding-top: 7px" align=center>
					<a style="color: blue" href="http://www.angieslist.com/companylist/us/tx/richardson/honest-install-reviews-2292250.htm" target="_blank">Angie's List in<br/>Dallas/Ft. Worth</a>
				</p>
			</div>
			<div class="column-four">
				<a href="http://www.houzz.com/pro/honestinstallav/honest-install" target="_blank">
					<img src="images/Houzz.jpg" alt="Houzz" width="93px" style="padding-bottom:5px" />
				</a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php require("footer.php"); ?>