<?php session_start();?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml"><HEAD>

<META content="text/html; charset=iso-8859-1" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="honestinstall.css">

        <link rel="stylesheet" href="assets/futura/stylesheet.css" type="text/css" charset="utf-8" />
<?php include("includes/keywords.php"); ?>


<STYLE type=text/css>
A:link {

	COLOR: #808080

}

A:visited {

	COLOR: #808080

}

A:hover {

	COLOR: #ffcc00

}

</STYLE>





<!-- css !-->

<style type="text/css">

<!--

  @import url(css/style.css);

  -->

</style>

<!-- eof css !-->







<!--	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> 

	<script type="text/javascript" src="/scripts/jquery.jshowoff.js"></script>-->

    

<!--	<link rel="stylesheet" href="/scripts/jshowoff.css" type="text/css" media="screen, projection" />-->

    

<!--[if gte IE 7]>

<!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->

<!--[if IE 8]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->

<!--[if IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css"><![endif]-->


<!-- eof if IE !-->




<meta property="fb:page_id" content="122796624447624" />



<!-- thumbnail scroller stylesheet -->

<link href="includes/jquery.thumbnailScroller.css" rel="stylesheet" />

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<!-- jquery ui custom build (for animation easing) -->

<script src="includes/jquery-ui-1.8.13.custom.min.js"></script>


</HEAD>

<BODY>

<?php $menu="home"; include("includes/menu2.php"); ?>

<TABLE border=0 cellSpacing=0 cellPadding=0 width=850 align=center  >

  <TBODY>

  <TR vAlign=top>

    <TD class=mainBG>

    

      <DIV align=center>

      <TABLE border=0 cellSpacing=0 cellPadding=0 width=730 align=center>

        <TBODY>

        <TR>

          <TD height=45 width=730 colSpan=3 align=center>

            <DIV style="MARGIN: 0px auto; WIDTH: 729px; OVERFLOW: hidden" class=contents>

      <br />


<div id="demo">

<?php  if(isset($_GET['m'])){  if ($_GET['m'] == 'true') : ?>
    <label style="color: red;">Your request has been submitted. We will evaluate it. Thank you.</label>
    <?php endif; }?>


			<div id="features">
<div><a href="http://www.honestinstall.com/nest.php"><img src="images/Honest-Feature-NEST.jpg" /></a><br>

<br><FONT face=Arial color=#808080 size=2><strong>NEST + HONEST:</strong><br /><br /><span style='font-weight:normal'>Nest Learning Thermostats & The Nest Protect are now sold and installed by Honest.   <a href="https://honestinstall.com/nest.php">Learn More & View Pricing </a></span></FONT></div>

<?php /*
<div><a href="https://honestinstall.com/product-outcast.php"><img src="images/Honest-Feature-Outdoor-Liv2.jpg" /></a><br>

<br><FONT face=Arial color=#808080 size=2><strong>IT'S OUTDOOR ENTERTAINMENT TIME:</strong><br /><br /><span style='font-weight:normal'>Summer's here, time for outdoor living, take your entertainment outside with you.  <a href="https://honestinstall.com/pricing-and-services.php">See Pricing Menu</a> <a href="https://honestinstall.com/product-outcast.php"> Outdoor Wireless Speaker System</a></span></FONT></div>
 */
?>

<div><a href="http://www.sonos.com/system" target="_blank"><img src="images/Honest-Feature-SONOS.jpg" /></a><br>

<br><FONT face=Arial color=#808080 size=2><strong>SONOS: SOMETIMES SIMPLICITY IS BEST</strong><br /><br /><span style='font-weight:normal'>The new gen of app-controlled Whole Home Audio and the most popular Soundbar in America.  <a href="http://www.sonos.com/system" target="_blank">See More </a></span></FONT></div>


<div><a href="http://www.honestinstall.com/commercial.php?menu=cw"><img src="images/Honest-Feature-Commercial-AV.jpg" /></a><br>

<br><FONT face=Arial color=#808080 size=2><strong>COMMERCIAL A/V:</strong><br /><br /><span style='font-weight:normal'>Honest Install offers wide range of solutions for all business types across DFW.  <a href="http://www.honestinstall.com/commercial.php?menu=cw">See More </a></span></FONT></div>

			

			 <div><a href="http://www.honestinstall.com/customer-profile-tyron-smith.php"><img src="images/honest-feature-tyron-smith2.jpg" /></a><br>

<br><FONT face=Arial color=#808080 size=2><strong>POWERFUL MEDIA ROOMS</strong><br /><br /><span style='font-weight:normal'>Tyron Smith, #77 for Americas Team.   <a href="http://www.honestinstall.com/customer-profile-tyron-smith.php"><strong>View Room</strong></a></span></FONT></div>



				

			
           </div>


	<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script> -->

	<script type="text/javascript" src="/scripts/jquery.jshowoff.js"></script>
   
	<link rel="stylesheet" href="/scripts/jshowoff.css" type="text/css" media="screen, projection" />

			<script type="text/javascript">		

( function($) {
        $(document).ready( function() { $('#features').jshowoff({ speed:8000,hoverPause:false,controls:false});  } );
    } ) ( jQuery );

			</script>

			

</div>



<script type="text/javascript">

// fix pre overflow in IE

(function ($) {

	$.fn.fixOverflow = function () {

		if ($.browser.msie) {

			return this.each(function () {

				if (this.scrollWidth > this.offsetWidth) {

					$(this).css({ 'padding-bottom' : '20px', 'overflow-y' : 'hidden' });

				}

			});

		} else {

			return this;

		}

	};

})(jQuery);

$('pre').fixOverflow();

</script>



      </DIV></TD></TR></TBODY></TABLE>

      
<!-- thumbnail scroller markup begin -->

<div id="tS2" class="jThumbnailScroller">

	<div class="jTscrollerContainer">

		<div class="jTscroller">
<?php
//random order
$order=rand(1,2);
if($order==1){
	echo '<A href="#" style="cursor:default"><IMG alt="Fireplace FAQs" src="images/Banner-Ad-Fireplaces-sized.jpg"></A><A href="#" style="cursor:default"><IMG alt="Elite TVs" src="images/Banner-Ad-EliteTV2.jpg"></A><A href="#" style="cursor:default"><IMG alt="Universal Remotes"  src="images/banner_03.jpg"></A><A href="#" style="cursor:default"><IMG alt="On-Site Installations" src="images/banner_04.jpg"></A><a href="/pricing-and-services.php"><img src="images/Banner-Ad-Apple-TV-sized.jpg" /></a><A href="http://www.honestinstall.com/product-service-call.php"><IMG alt="Service Call" src="images/banner_01.jpg"></A><A href="http://www.honestinstall.com//product-universalremote.php"><IMG alt=GloMount src="images/banner_02.jpg"></A><a href="/fireplace-faqs.php"><img src="images/Banner-Ad-IR-Kits-sized.jpg" /></a>';
	} else
	echo '<a href="/pricing-and-services.php"><img src="images/Banner-Ad-Apple-TV-sized.jpg" /></a><A href="http://www.honestinstall.com/product-service-call.php"><IMG alt="Service Call" src="images/banner_01.jpg"></A><A href="http://www.honestinstall.com//product-universalremote.php"><IMG alt=GloMount src="images/banner_02.jpg"></A><a href="/fireplace-faqs.php"><img src="images/Banner-Ad-IR-Kits-sized.jpg" /></a><A href="#" style="cursor:default"><IMG alt="Fireplace FAQs" src="images/Banner-Ad-Fireplaces-sized.jpg"></A><A href="#" style="cursor:default"><IMG alt="Elite TVs" src="images/Banner-Ad-EliteTV2.jpg"></A><A href="#" style="cursor:default"><IMG alt="Universal Remotes"  src="images/banner_03.jpg"></A><A href="#" style="cursor:default"><IMG alt="On-Site Installations" src="images/banner_04.jpg"></A>';
?>        
        
        

		</div>

	</div>

	<a href="#" class="jTscrollerPrevButton"></a>

	<a href="#" class="jTscrollerNextButton"></a>

</div>

<div style="float:right;position:relative;top:-25px;padding-right:45px"><small>Click arrows for more&nbsp;&nbsp;&nbsp;&nbsp;</div>
<!-- thumbnail scroller markup end -->

<?php include("testimonial_include.php"); ?>

<script>


/* jQuery.noConflict() for using the plugin along with other libraries. 

   You can remove it if you won't use other libraries (e.g. prototype, scriptaculous etc.) or 

   if you include jQuery before other libraries in yourdocument's head tag. 

   [more info: http://docs.jquery.com/Using_jQuery_with_Other_Libraries] */

jQuery.noConflict(); 

/* calling thumbnailScroller function with options as parameters */

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



<img src="images/Silloute-of-Services-croppe.jpg" />

     
     
<div align="center;width:730px;display:block">
<img src="/images/adcubes.jpg" usemap="#Map" />
<map name="Map">
  <area shape="rect" coords="6,15,244,143" href="https://honestinstall.com/pricing-and-services.php#tvinstall">
  <area shape="rect" coords="489,13,725,142" href="https://honestinstall.com/product-outcast.php">
</map>

</div><br />
<br /> <FONT size=1><A 

      title="Read More of This Featured Review" 

      href="http://www.customerlobby.com/reviews/403/honest-install/review/31198?main_page=2" 

      target=_blank></A><A title="Read More of This Featured Review" 

      href="http://www.customerlobby.com/reviews/403/honest-install/review/11213?main_page=9" 

      target=_blank></A><A title="Read More of This Featured Review" 

      href="http://www.customerlobby.com/reviews/403/honest-install/review/30816?main_page=2" 

      target=_blank></A></FONT></P></FONT>

      <TABLE border=0 cellPadding=10 align=center>

        <TBODY>

        <TR>

          <TD><FONT color=#808080>

            <DIV align=center><!--Start Customer Lobby--><A class=lobby 

            title="Read Customer Reviews for Honest Install" 

            onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" 

            href="http://www.customerlobby.com/reviews/403/honest-install/" 

            target=_blank><IMG style="DISPLAY: none" border=0 

            src="http://www.customerlobby.com/ctrack-403"><IMG border=0 hspace=0 

            alt="" src="images/Lobby-image2.jpg" width=127 height=77><!--End Customer Lobby--><BR>

            <SPAN 

            class=lobby><STRONG><FONT color=#4f94b5 size=+0><?php echo "("; echo $total_review; ?> Reviews )</FONT></STRONG></SPAN></A></DIV></FONT></TD>

       <td>
<A style="POSITION: relative; PADDING-BOTTOM: 0px; MARGIN: 0px; PADDING-LEFT: 0px; WIDTH: 150px; PADDING-RIGHT: 0px; DISPLAY: block; HEIGHT: 57px; OVERFLOW: hidden; PADDING-TOP: 0px" id=bbblink class=rbhzbum title="Honest Install, Home Theater, Richardson, TX" href="http://www.bbb.org/dallas/business-reviews/home-theater/honest-install-in-richardson-tx-90343905#bbblogo" target=_blank><IMG style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; PADDING-RIGHT: 0px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 0px"id=bbblinkimg alt="Honest Install, Home Theater, Richardson, TX" src="http://seal-dallas.bbb.org/logo/rbhzbum/honest-install-90343905.png" width=300 height=57></A>

      <SCRIPT type=text/javascript>var bbbprotocol = ( ("https:" == document.location.protocol) ? "https://" : "http://" ); document.write(unescape("%3Cscript src='" + bbbprotocol + 'seal-dallas.bbb.org' + unescape('%2Flogo%2Fhonest-install-90343905.js') + "' type='text/javascript'%3E%3C/script%3E"));</SCRIPT><br />
  <div style="display:block;text-align:center">
                        <div id="fb-root"></div>

                        <script>(function(d, s, id) {

                            var js, fjs = d.getElementsByTagName(s)[0];

                            if (d.getElementById(id))
                                return;

                            js = d.createElement(s);
                            js.id = id;

                            js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=271686419508184";

                            fjs.parentNode.insertBefore(js, fjs);

                        }(document, 'script', 'facebook-jssdk'));</script><div class="fb-like" data-href="http://www.facebook.com/pages/Honest-Install/122796624447624" data-send="true" data-layout="button_count"  data-show-faces="true" style="padding-left:25px"></div></td>

          <TD>

            <DIV align=center>

            <TABLE style="BACKGROUND-COLOR: white; WIDTH: 133px; COLOR: black" 

            cellSpacing=0 cellPadding=0>

              <TBODY>

              <TR>

                <td><a href="http://www.angieslist.com/companylist/us/tx/richardson/honest-install-reviews-2292250.htm" target="_blank">
                        <img id="angies-review" alt="angieslist" border="0" src="images/al-2011-2013.gif" alt="Read Unbiased Consumer Reviews Online at AngiesList.com"/>

                    </a>
                </td></TR>

              <TR>

                <TD style="BORDER-BOTTOM: medium none; BORDER-LEFT: medium none; PADDING-BOTTOM: 7px; PADDING-LEFT: 7px; PADDING-RIGHT: 7px; FONT-FAMILY: arial, sans-serif; COLOR: black; FONT-SIZE: 12px; BORDER-TOP: medium none; BORDER-RIGHT: medium none; PADDING-TOP: 7px" 

                align=center><A style="COLOR: blue" 

                  href="http://www.angieslist.com/companylist/us/tx/richardson/honest-install-reviews-2292250.htm" target="_blank">Angie's 

                  List in Dallas/Ft. 

        Worth</A></TD></TR></TBODY></TABLE></DIV></TD></TR></TBODY></TABLE>
      
<br />
<br />
<br />

            </TD></TR></TBODY></TABLE><?php require("footernew.php"); ?><?php require("footerNav.php");?>

</BODY></HTML>