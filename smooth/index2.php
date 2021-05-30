<!DOCTYPE html>
<html>
    <head>
        <title>Scroll</title>
        <link rel="stylesheet" type="text/css" href="js/fancy/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
        <link rel="stylesheet" type="text/css" href="js/fancy/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
        <link rel="stylesheet" type="text/css" href="js/fancy/jquery.fancybox.css?v=2.1.4" media="screen" />

        <!-- the CSS for Smooth Div Scroll -->
        <link rel="Stylesheet" type="text/css" href="css/smoothDivScroll.css" />

        <!-- Styles for my specific scrolling content -->
        <style type="text/css">
            body{
                margin: 0;
            }

            #scrollingText div.scrollableArea p
            {
	display: block;
	float: left;
	font-family: Times, 'Times New Roman', Georgia, Serif;
	font-size:18px;
	background-color: #fff;
	color: #000;
	white-space: nowrap;
	margin-left: 10px;
	padding-top: 0px;
	padding-right: 0px;
	padding-bottom: 20px;
	padding-left: 5px;
            }

            .shadow {
                -moz-box-shadow: 5px 5px 6px #ccc;
                -webkit-box-shadow: 5px 5px 6px #ccc;
                box-shadow: 5px 5px 6px #ccc;
                /* For IE 8 */
                -ms-filter: "progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#ccc')";
                /* For IE 5.5 - 7 */
                filter: progid:DXImageTransform.Microsoft.Shadow(Strength=4, Direction=135, Color='#ccc');
            }

            .shadow-bringer {
	background: #FAFAFA;
	margin-top: 0px;
	margin-right: auto;
	margin-bottom: 0px;
	margin-left: auto;
	padding-top: 5px;
	padding-right: 5px;
	padding-bottom: 5px;
	padding-left: 5px;
                border-radius: 5px;
            }	

        </style>

        <style>
            label { 
                display: block; 
                min-width: 100px;
                padding: 0 15px 0 15px;
            }

            .bubble
            {
                position: relative;
                text-align: left;
                background-color: #FFCC01;
                border: 1px solid #FFCC01;
                -webkit-border-radius: 10px;
                -moz-border-radius: 10px;
                border-radius: 5px;
                -moz-box-shadow: 5px 5px 6px #ccc;
                -webkit-box-shadow: 5px 5px 6px #ccc;
                box-shadow: 5px 5px 6px #ccc;
                min-width: 100px;
				color:#fff;
            }

            .bubble:before
            {
                content: ' ';
                position: absolute;
                width: 0;
                height: 0;
                left: 36px;
                bottom: -13px;
                border: 6px solid;
                border-color: #FFCC01 transparent transparent #FFCC01;
            }

            .bubble:after
            {
                content: ' ';
                position: absolute;
                width: 0;
                height: 0;
                left: 38px;
                bottom: -10px;
                border: 5px solid;
                border-color: #FFCC01 transparent transparent #FFCC01;
            }
			
.bubblehead{font-family: 'archivo_narrowregular', sans-serif;font-size:18px;font-weight:bold;color:#fff;}
        </style>
        
    <link rel="stylesheet" href="/assets/futura/stylesheet.css" type="text/css" charset="utf-8" />

    </head>

    <body>
        <div id="scrollingText" >
            <div class="scrollingHotSpotLeft" style="display: none;"></div>
            <div class="scrollingHotSpotRight" style="display: none;"></div>
            <div class="scrollWrapper" style="background-color: #FFF;">
                <div class="scrollableArea" style="width: 4039px;">
                    <!-- repeat 2 times for 100% width scroll -->
                    <?php for ($counter = 0; $counter < 3; $counter++) : ?>
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

                      
                    <?php endfor; ?>
                </div>
            </div>
        </div>

        <script src="js/jquery.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui-1.8.23.custom.min.js" type="text/javascript"></script>
        <script src="js/jquery.mousewheel.min.js" type="text/javascript"></script>
        <script src="js/jquery.kinetic.js" type="text/javascript"></script>
        <script src="js/jquery.smoothdivscroll-1.3-min.js" type="text/javascript"></script>

        <script type="text/javascript" src="js/fancy/jquery.fancybox.js?v=2.1.4"></script>
        <script type="text/javascript" src="js/fancy/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="js/fancy/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
        <script type="text/javascript" src="js/fancy/helpers/jquery.fancybox-media.js?v=1.0.5"></script>


        <script type="text/javascript">
            $(document).ready(function () {
                $("#scrollingText").smoothDivScroll({
                    autoScrollingMode: "always", 
                    autoScrollingDirection: "endlessLoopRight", 
                    autoScrollingStep: 1, 
                    autoScrollingInterval: 10   
                });
                            
                $("#scrollingText").bind("mouseover", function() {
                    $(this).smoothDivScroll("stopAutoScrolling");
                }).bind("mouseout", function() {
                    $(this).smoothDivScroll("startAutoScrolling");
                });

                $('.fancybox').fancybox({
                    arrows    : false,
                    nextClick : false
                });

            });
        </script>
    </body>
</html>
