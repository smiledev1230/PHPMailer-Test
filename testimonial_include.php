<?php
require_once "connect.php";
$p = new db;
$items = $p->mysql_resultTo2DAssocArray();
?>
<link href="includes/jquery.bxslider.css" rel="stylesheet" />
<link href="includes/rating.css" rel="stylesheet" />
<script src="includes/jquery.bxslider.min.js"></script>
<script src="includes/jquery.rating.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {
    // Optimalisation: Store the references outside the event handler:
    var $window = jQuery(window);

    function checkWidth() {
        var windowsize = $window.width();
        if (windowsize > 850) {
		//if the window is greater than 440px wide then turn on jScrollPane..
		   jQuery('.bxslider').bxSlider({
				slideWidth: 260,
				minSlides: 2,
				maxSlides: 3,
				slideMargin: 10,
				pager: false,
			  });
		} if (windowsize >= 768  && windowsize < 850) {
		//if the window is greater than 440px wide then turn on jScrollPane..
		   jQuery('.bxslider').bxSlider({
				slideWidth: 420,
				minSlides: 1,
				maxSlides: 2,
				slideMargin: 10,
				pager: false,
			  });
		}if (windowsize > 480 && windowsize < 768) {
		//if the window is greater than 440px wide then turn on jScrollPane..
		   jQuery('.bxslider').bxSlider({
				slideWidth: 420,
				minSlides: 1,
				maxSlides: 1,
				slideMargin: 10,
				pager: false,
			  });
		}if (windowsize  < 481) {
		//if the window is greater than 440px wide then turn on jScrollPane..
		   jQuery('.bxslider').bxSlider({
				slideWidth: 280,
				minSlides: 1,
				maxSlides: 1,
				slideMargin: 10,
				pager: false,
			  });
		}
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    jQuery(window).resize(checkWidth);
});
</script>
<!--Testimonials Start-->
<br>
<div align="center" id="testimonials" style="background-color:transparent">
	<div style="font-weight:bold;font-size:16px;clear:both;z-index:1000;padding-bottom:20px">Featured Customer Reviews</div>
	<ul class="bxslider" style="margin-top:-20px;">
		<?php 
		$i = 0;
		$count = count($items);
		foreach($items as $item){
			if($i % 1 == 0){ ?>
				<div class="slide">
					<?php } ?>
					<div class="triangle-div">
						<blockquote class="triangle-obtuse">
						<p><?php echo($item['link'] !="")?"<a href='//".$item['link']."' target='_blank' style='text-decoration:none'>":"";?><?php echo$item['content'];?></a></p>
						<?php if ($item['rate'] > 0){?>
						<span class="rateit" data-rateit-readonly="true" data-rateit-ispreset="true" data-rateit-value="<?php echo $item['rate'];?>" def="<?php echo $item['id'];?>" id="rateid_<?php echo $item['id'];?>"></span>
						<?php } ?>
						</blockquote>
						<p><?php echo($item['link'] !="")?"<a href='//".$item['link']."' target='_blank'>":"";?><?php echo$item['author'];?></a></p>
					<?php if($i%3==0){ ?>
						<br /><br /><br /><br />
						<p class="pt">Actual reviews from: <br />
						Angie's List, Customer Lobby, Facebook, Google & Yelp. </p>
					<?php } ?> 
					</div>       
					<?php   
					if($i % 1 == 0 ) {?>  
				</div>
		<?php } $i++; } ?>
	</ul>
	<!--<p class="pt">Actual reviews from: Angie's List, Customer Lobby, Facebook, Google & Yelp. </p>-->
</div>
 <!--Testimonials End-->
<!-- thumbnail scroller markup end -->