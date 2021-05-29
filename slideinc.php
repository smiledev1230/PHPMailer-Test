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
	<div id="my-slide" style="font-size:1.2em;font-family: 'archivo_narrowregular'">
		<div style="background-color:#fff" class="other"><a href="sonosvid33.html"  id="frame" >
			<img src="images/Honest-Feature-SONOS-Clarky.jpg" /></a><br>
			<br><strong>SONOS: SO SIMPLE A 3YR OLD CAN USE IT.</strong><br /><br />Want access to all music on earth in your home? SONOS is the answer. SONOS is wireless-capable whole home audio controlled by smart app. Call for details...
		</div>
		<div style="background-color:#fff">
			<a href="http://www.honestinstall.com/commercial.php?menu=cw"><img src="images/Honest-Feature-Commercial-AV.jpg" /></a><br>
			<br><strong>COMMERCIAL A/V:</strong><br /><br />Honest Install offers wide range of solutions for all business types across DFW.  <a href="http://www.honestinstall.com/commercial.php?menu=cw">See More </a>
		</div>
		<div style="background-color:#fff">
			<a href="http://www.honestinstall.com/customer-profile-tyron-smith.php"><img src="images/honest-feature-tyron-smith2.jpg" /></a><br>
			<br><strong>POWERFUL MEDIA ROOMS</strong><br /><br />Tyron Smith, #77 for Americas Team.   <a href="http://www.honestinstall.com/customer-profile-tyron-smith.php"><strong>View Room</strong></a>
		</div>
	</div>
	<script type="text/javascript">		
		jQuery(document).ready(function() {
			// Optimalisation: Store the references outside the event handler:
			var $window = jQuery(window);

			function checkWidth() {
				var windowsize = $window.width();
				if (windowsize > 850) {
				//if the window is greater than 440px wide then turn on jScrollPane..
				   jQuery('#my-slide').DrSlider({
						width: 729, //slide width
						navigationType: 'circle',
						duration: 6000,
						transition:'slide-right',
						progressColor:'#f8c100','showProgress': false,
						controlBackgroundColor:'#f8c100',
						navigationHighlightColor:'#f8c100',
						navigationHoverColor:'#000',
						navigationColor:'#999999',
						height: 470  //slide height
					}); //Yes! that's it!
				} if (windowsize >= 768 && windowsize < 850) {
				//if the window is greater than 440px wide then turn on jScrollPane..
				   jQuery('#my-slide').DrSlider({
						width: 686, //slide width
						navigationType: 'circle',
						duration: 6000,
						transition:'slide-right',
						progressColor:'#f8c100','showProgress': false,
						controlBackgroundColor:'#f8c100',
						navigationHighlightColor:'#f8c100',
						navigationHoverColor:'#000',
						navigationColor:'#999999',
						height: 470  //slide height
					}); //Yes! that's it!
				}if (windowsize > 480 && windowsize < 768) {
				//if the window is greater than 440px wide then turn on jScrollPane..
				   jQuery('#my-slide').DrSlider({
						width: 378, //slide width
						navigationType: 'circle',
						duration: 6000,
						transition:'slide-right',
						progressColor:'#f8c100','showProgress': false,
						controlBackgroundColor:'#f8c100',
						navigationHighlightColor:'#f8c100',
						navigationHoverColor:'#000',
						navigationColor:'#999999',
						height: 300  //slide height
					}); //Yes! that's it!
				}if (windowsize < 480) {
				//if the window is greater than 440px wide then turn on jScrollPane..
				   jQuery('#my-slide').DrSlider({
						width: 278, //slide width
						navigationType: 'circle',
						duration: 6000,
						transition:'slide-right',
						progressColor:'#f8c100','showProgress': false,
						controlBackgroundColor:'#f8c100',
						navigationHighlightColor:'#f8c100',
						navigationHoverColor:'#000',
						navigationColor:'#999999',
						height: 300  //slide height
					}); //Yes! that's it!
				}
			}
			// Execute on load
			checkWidth();
			// Bind event listener
			jQuery(window).resize(checkWidth);
		});
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
			height: 460,
			width: 810
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