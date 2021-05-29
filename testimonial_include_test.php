<?php
require_once "connect.php";
$p = new db;
$items = $p->mysql_resultTo2DAssocArray();
?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<link href="includes/jquery.bxslider.css" rel="stylesheet" />
<link href="includes/rating.css" rel="stylesheet" />
<script src="includes/jquery.bxslider.min.js"></script>
<script src="includes/jquery.rating.js"></script>

<script type="text/javascript">
         jQuery(document).ready(function ($) {           
             slider = $('.bxslider').bxSlider({
                 mode: 'fade',
                 slideMargin: 3,
                 auto:true,
				 speed:800,
				 pause:8000,
				 randomStart:true,
				 autoHover:true,
				 pager: false,
                 /*onSliderLoad: function($slideElement, oldIndex, newIndex) {
                    
                    $('.bx-prev').hide();
                 },*/
                 onSlideNext: function($slideElement, oldIndex, newIndex) {
                   /* var count = slider.getSlideCount();
                    $('.bx-prev').show();
                    if((count - newIndex) ==1)
                        $('.bx-next').hide();
                    */
                    var max= 80;
                    var min = 10;
                    var rand = Math.floor(Math.random() * (max - min + 1) + min);
                    var rand1 = Math.floor(Math.random() * (max - min + 1) + min);
                    var rand2 = Math.floor(Math.random() * (max - min + 1) + min);
                    $(".triangle-div:first-child").css("margin-top",rand+"px");
                    $(".triangle-div:nth-child(2)").css("margin-top",rand1+"px");
                    $(".triangle-div:last-child").css("margin-top",rand2+"px");
                },
                onSlidePrev: function($slideElement, oldIndex, newIndex) {
                    /*$('.bx-next').show();
                    if(oldIndex ==1)
                       $('.bx-prev').hide();
                       */
                    var max= 80;
                    var min = 10;
                    var rand = Math.floor(Math.random() * (max - min + 1) + min);
                    var rand1 = Math.floor(Math.random() * (max - min + 1) + min);
                    var rand2 = Math.floor(Math.random() * (max - min + 1) + min);
                    $(".triangle-div:first-child").css("margin-top",rand+"px");
                    $(".triangle-div:nth-child(2)").css("margin-top",rand1+"px");
                    $(".triangle-div:last-child").css("margin-top",rand2+"px");
                }
             });
                         
         });
</script>

      
      <!--Testimonials Start-->

<br>

 <div align="center" id="testimonials" style="background-color:transparent">

<div style="font-weight:bold;font-size:16px;clear:both;z-index:1000;">Featured Customer Reviews</div>

  <ul class="bxslider" style="margin-top:-20px;">
<?php 
 
 $i = 0;
 $count = count($items);

 foreach($items as $item)
 {

  if($i % 3 == 0){
?>
	<li>
    <?php } ?>
        
		<div class="triangle-div">
			<blockquote class="triangle-obtuse">
				<p><?php echo$item['content'];?></p>
                <?php if ($item['rate'] > 0){?>
                <span class="rateit" data-rateit-readonly="true" data-rateit-ispreset="true" data-rateit-value="<?php echo $item['rate'];?>" def="<?php echo $item['id'];?>" id="rateid_<?php echo $item['id'];?>"></span>
                <?php } ?>
            </blockquote>
			<p><?php echo($item['link'] !="")?"<a href='//".$item['link']."' target='_blank'>":"";?><?php echo$item['author'];?></a></p>
            
		</div>
        
   <?php   
	if($i % 3 == 2 || $i >= $count) {?>  
	</li>
<?php   } $i++;} ?>
  </ul>
 <p class="pt">Actual reviews from: Angie's List, Customer Lobby, Facebook, Google & Yelp. </p>
 </div>
 <!--Testimonials End-->
<!-- thumbnail scroller markup end -->