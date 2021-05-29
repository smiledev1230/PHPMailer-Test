	<script type="text/javascript" src="js/jquery.devrama.slider.min-0.9.4.js"></script> 

	<style type="text/css">

				#my-slide {

					color: #808080;

					text-align: left;

					font-family:Arial, Helvetica, sans-serif;

					font-size:12px;

					background-color:#fff;

                    padding-bottom: 30px !important;

				}

                .navigation.devrama-slider {

                    margin-top: 15px !important;

                }

			</style>

	<script src="/scripts/classybox/js/jquery.classybox.min.js"></script>

	<script src="/scripts/classybox/js/jwplayer.js"></script>

	<script src="/scripts/classybox/js/jwplayer.html5.js"></script>

	<link rel="stylesheet" type="text/css" href="/scripts/classybox/css/jquery.classybox.min.css" />

	<div id="my-slide" style="font-size:1.2em;font-family: 'archivo_narrowregular';">

    	

            <div style="background-image: url('http://honestinstall.com/images/Honest-Feature-PlayBox-Prim.jpg'); background-size: cover;">

                <div data-pos="['0%', '0%']" data-duration="900" data-delay="400" data-effect="fadein">

                   <a href="http://thenos.us" target="_blank"> 

                      <img alt="The wall-box for your Sonos® Play:1™. A beautiful aesthetic to match beautiful sound." data-lazy-src="images/Honest-Feature-PlayBox-Seco.jpg"/>

                   </a>

                </div>

            </div> 

           

            <div style="background-image: url('http://honestinstall.com/images/banner/3.jpg'); background-size: cover;">

                <div data-pos="['0%', '0%']" data-duration="900" data-delay="400" data-effect="fadein">

                    <a href="http://honestinstall.com/sonos.php">

                        <img alt="The best streaming options throughout your home or business on your smart device." data-lazy-src="images/banner/4.jpg"/>

                    </a>

                </div>

            </div> 

            <div style="background-image: url('http://honestinstall.com/images/banner/5.jpg'); background-size: cover;">

                <div data-pos="['0%', '0%']" data-duration="900" data-delay="400" data-effect="fadein">

                    <img alt="For simplified Smart Home Automation consult Honest." data-lazy-src="images/banner/6.jpg"/>

                </div>

            </div> 

            <div style="background-image: url('http://honestinstall.com/images/banner/7.jpg'); background-size: cover;">

                <div data-pos="['0%', '0%']" data-duration="900" data-delay="400" data-effect="fadein">

                    <img alt="You dream it - we build it. The neighbors will be sooooo jealous." data-lazy-src="images/banner/8.jpg"/>

                </div>

            </div> 

            <div style="background-image: url('http://honestinstall.com/images/banner/9.jpg'); background-size: cover;">

                <div data-pos="['0%', '0%']" data-duration="900" data-delay="400" data-effect="fadein">

                    <a href="http://honestinstall.com/customer-profile-tyron-smith.php">

                        <img alt="These aren't your father's old-style theater rooms..." data-lazy-src="images/banner/10.jpg"/>

                    </a>

                </div>

            </div> 

            <div style="background-image: url('http://honestinstall.com/images/banner/11.jpg'); background-size: cover;">

                <div data-pos="['0%', '0%']" data-duration="900" data-delay="400" data-effect="fadein">

                    <a  onclick="window.open('http://www.customerlobby.com/reviews/403/honest-install/' ,'ReviewPage', 'statusbar=no,menubar=no,toolbar=no,scrollbars=yes,resizable=yes,width=540, height=575,left=570,top=200,screenX=570,screenY=200'); return false;" href="http://www.customerlobby.com/reviews/403/honest-install/" target=_blank>

                        <img alt="We provide solutions: Products + Installation. Read our reviews." data-lazy-src="images/banner/12.jpg"/>

                    </a>

                </div>

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

						transition:'fade',

						progressColor:'#f8c100','showProgress': false,

						controlBackgroundColor:'#f8c100',

						navigationHighlightColor:'#f8c100',

						navigationHoverColor:'#000',

						navigationColor:'#999999',

						height: 369  //slide height

					}); //Yes! that's it!

				} if (windowsize >= 768 && windowsize < 850) {

				//if the window is greater than 440px wide then turn on jScrollPane..

				   jQuery('#my-slide').DrSlider({

						width: 686, //slide width

						navigationType: 'circle',

						duration: 6000,

						transition:'fade',

						progressColor:'#f8c100','showProgress': false,

						controlBackgroundColor:'#f8c100',

						navigationHighlightColor:'#f8c100',

						navigationHoverColor:'#000',

						navigationColor:'#999999',

						height: 369  //slide height

					}); //Yes! that's it!

				}if (windowsize > 480 && windowsize < 768) {

				//if the window is greater than 440px wide then turn on jScrollPane..

				   jQuery('#my-slide').DrSlider({

						width: 378, //slide width

						navigationType: 'circle',

						duration: 6000,

						transition:'fade',

						progressColor:'#f8c100','showProgress': false,

						controlBackgroundColor:'#f8c100',

						navigationHighlightColor:'#f8c100',

						navigationHoverColor:'#000',

						navigationColor:'#999999',

						height: 400  //slide height

					}); //Yes! that's it!

				}if (windowsize < 480) {

				//if the window is greater than 440px wide then turn on jScrollPane..

				   jQuery('#my-slide').DrSlider({

						width: 278, //slide width

						navigationType: 'circle',

						duration: 6000,

						transition:'fade',

						progressColor:'#f8c100','showProgress': false,

						controlBackgroundColor:'#f8c100',

						navigationHighlightColor:'#f8c100',

						navigationHoverColor:'#000',

						navigationColor:'#999999',

						height: 150  //slide height

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

            $('#my-slide').DrSlider({

                'transition': 'fade'

            });

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