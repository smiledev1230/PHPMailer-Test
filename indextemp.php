<?php $menu='home'; include("header.php"); ?>

<!-- css !-->
<style type="text/css">
.banner-homepage{
	width: 855px;
	float: left;
	margin: 25px 0px 25px 0px;
	}

.banner-homepage .box{
	width: 33%;
	float: left;
 }

.banner-homepage .box p{
	width: 100%;
	float: left;
	text-align: center;
	font-size: 13px;
}

.banner-homepage .box p strong{
	font-size: 15px;
	line-height:35px;
}

 
</style>
<!-- eof css !-->

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
			
			
			<!-- banner homepage !-->
						<div class="banner-homepage">
							
							<!-- box !-->
							<div class="box">
								<img src="images/bannerhomepage/landscapeaudio.png">
								<p><strong>Rock the Backyard</strong><br>

 unleash a symphony in your<br>
backyard or by the pool</p>
							</div>
							<!-- eof box !-->
							
							<!-- box !-->
							<div class="box">
								<a href="http://honestinstall.com/sonos.php"><img src="images/bannerhomepage/multiroomadio.png"></a>
								<p><strong>Imagine Concealed Music</strong><br>
throughout your home or business<br>
controlled by your phone</p>
								
							</div>
							<!-- eof box !-->
							
							<!-- box !-->
							<div class="box">
								<img src="images/bannerhomepage/smartshades.png">
								<p><strong>Custom Electronic Shades</strong><br>
that can be installed<br>
without wires</p>
							</div>
							<!-- eof box !-->
							
						</div>
						<!-- eof banner homepage !-->

			
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
			
			<!-- banner homepage !-->
						<div class="banner-homepage">
							
							<!-- box !-->
							<div class="box">
								<a href="http://honestinstall.com/commercial.php?menu=cw"><img src="images/bannerhomepage/businessestrusthonest.png"></a>
								<p><strong>Commercial A/V</strong><br>	
from conference rooms to<br>
structured wiring - we do it all</p>
							</div>
							<!-- eof box !-->
							
							<!-- box !-->
							<div class="box">
								<img src="images/bannerhomepage/oneapp.png">
								<p><strong>Whole Home Control</strong><br>
one app to control all aspects of<br>
your Super Smart Home&trade;</p>
								
							</div>
							<!-- eof box !-->
							
							<!-- box !-->
							<div class="box">
								<img src="images/bannerhomepage/outdoortv.png">
								<p><strong>Outdoor Video</strong><br>
take your fav programs<br>
and movies outside</p>
							</div>
							<!-- eof box !-->
			
		
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
				<p style="border-bottom: medium none; border-left: medium none; padding-bottom: 7px; padding-left: 7px; padding-right: 7px; font-family: arial, sans-serif; color: black; font-size: 12px; border-top: medium none; border-right: medium none; padding-top: 0px" align=center>
					<a style="color: blue;position:relative;top:-5px" href="http://www.angieslist.com/companylist/us/tx/richardson/honest-install-reviews-2292250.htm" target="_blank">Angie's List in<br/>Dallas/Ft. Worth</a>
				</p>
			</div>
			<div class="column-four" style="text-align:left">
            
				<a href="http://www.yelp.com/biz/honest-install-dallas" target="_blank"><img src="images/Honest-Yelp-New-Badge-2016.jpg" alt="yelp" /></a>
				
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php require("footertemp.php"); ?>