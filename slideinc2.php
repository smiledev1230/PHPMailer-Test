
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>

<script type="text/javascript" src="js/jquery.devrama.slider.min-0.9.4.js"></script> 
<style type="text/css">
            #my-slide {
                color: #808080;
                text-align: left;
				font-family:Arial, Helvetica, sans-serif;
				font-size:12px;
				background-color:#fff;
            }
        </style>

<script src="/scripts/classybox/js/jquery.classybox.min.js"></script>
<script src="/scripts/classybox/js/jwplayer.js"></script>
<script src="/scripts/classybox/js/jwplayer.html5.js"></script>
<link rel="stylesheet" type="text/css" href="/scripts/classybox/css/jquery.classybox.min.css" />
        
<div id="my-slide">
            <!-- Second Slide --------------------------------------------->
          
<div style="background-color:#fff" class="other"><a href="sonosvid.html"  id="frame" ><img src="images/Honest-Feature-SONOS-Clarky.jpg" /></a><br>

<br><strong>SONOS: SO SIMPLE A 3YR OLD CAN USE IT.</strong><br /><br />Want access to all music on earth in your home? SONOS is the answer. SONOS is wireless-capable whole home audio controlled by smart app. Call for details...</div>

   <!-- First Slide --------------------------------------------->
            <div style="background-color:#fff">
               <a href="http://honestinstall.com/blog/index.php/honest-install-of-dallas-tx-makes-offer-to-acquire-nestdropcam-fails-epically/"><img src="images/Honest-Feature-NEST3.jpg" /></a><br><br><strong>HONEST MAKES OFFER TO ACQUIRE NEST LABS: SEE US FAIL - BLOG POST (16 Photos)</strong><br />
<br />
At CEDIA, an industry tradeshow, Honest Install offers to acquire Nest/Dropcam, the 3.2 billion dollar home automation company of Palo Alto, CA. <a href="http://honestinstall.com/blog/index.php/honest-install-of-dallas-tx-makes-offer-to-acquire-nestdropcam-fails-epically/">View Blog Post</a>
            </div>

<div style="background-color:#fff"><a href="http://www.honestinstall.com/commercial.php?menu=cw"><img src="images/Honest-Feature-Commercial-AV.jpg" /></a><br>

<br><strong>COMMERCIAL A/V:</strong><br /><br />Honest Install offers wide range of solutions for all business types across DFW.  <a href="http://www.honestinstall.com/commercial.php?menu=cw">See More </a>
</div>

			
         
			 <div style="background-color:#fff"><a href="http://www.honestinstall.com/customer-profile-tyron-smith.php"><img src="images/honest-feature-tyron-smith2.jpg" /></a><br>

<br><strong>POWERFUL MEDIA ROOMS</strong><br /><br />Tyron Smith, #77 for Americas Team.   <a href="http://www.honestinstall.com/customer-profile-tyron-smith.php"><strong>View Room</strong></a></div>


        </div>
         
        <script type="text/javascript">
			
jQuery.noConflict();
jQuery( document ).ready(function( $ ) {
                $('#my-slide').DrSlider({
                    width: 729, //slide width
    				navigationType: 'circle',
					transition:'slide-right',
					progressColor:'#f8c100','showProgress': false,
					controlBackgroundColor:'#f8c100',
					navigationHighlightColor:'#f8c100',
					navigationHoverColor:'#000',
					navigationColor:'#999999',
                    height: 450  //slide height
                }); //Yes! that's it!
            });
			// The $ variable in the global scope has the prototype.js meaning.
window.onload = function(){
    var mainDiv = $( "main" );
}
        </script>
        
           <script>
                                
jQuery.noConflict();
jQuery( document ).ready(function( $ ) {
                                            $(".gallery a").ClassyBox();
                                            $(".player a").ClassyBox();
                                            $(".video a").ClassyBox({
                                                width: 900,
                                                title: 0
                                            });
                                            $("#frame").ClassyBox({
                                                iframe: 1,
                                                social: 0,
                                                height: 350,
                                                width: 590
                                            });
                                            $("#ajax").ClassyBox({
                                                height: 450,
                                                width: 555,
                                                ajaxSuccess: function(data) {
                                                    $(".classybox-wrap .content").append(data);
                                                }
                                            });
                                            $('a[href*="vimeo"], a[href*="vevo"], a[href*="dailymotion"], a[href*="5min"], a[href*="ustream"], a[href*="metacafe"], a[href*="hell"], a[href*="myspace"]').ClassyBox({
                                                height: 500,
                                                width: 850
                                            });
                                            $(window).ClassyBox({
                                                autoDetect: 1
                                            });
                                        });
                                    </script>

