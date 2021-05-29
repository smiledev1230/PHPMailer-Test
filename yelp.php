<?php $menu = "yelp";include("header.php"); ?>
	<div id="content"><br /><br />
		<div id="content-logo-left">
			<a href="http://www.yelp.com/biz/honest-install-richardson" target="_blank"><img id="yelp" alt="yelp" src="images/yelplogo.jpg"/></a><br>
<div id="yelp-biz-badge-rc-E3RoYQ-p3LHjdS0uzGvAAw" style="text-align:left"><a href="http://yelp.com/biz/honest-install-dallas" target="_blank">Check out Honest Install on Yelp</a></div><script>(function(d, t) {var g = d.createElement(t);var s = d.getElementsByTagName(t)[0];g.id = "yelp-biz-badge-script-rc-E3RoYQ-p3LHjdS0uzGvAAw";g.src = "//yelp.com/biz_badge_js/en_US/rc/E3RoYQ-p3LHjdS0uzGvAAw.js";s.parentNode.insertBefore(g, s);}(document, 'script'));</script>
		</div>
		<div class="clear"></div>
        
		<div id="bar">
        
			<div id="bar1"></div>
		</div>
		<div class="clear"></div>
		<!-- angieslist content -->
		<?php
		include 'yelp_review.php';
		if(isset($_GET['page'])) {$page = $_GET['page'];}
		else $page='';
		if ($page == '' || $page == 0)
			$page = 0;
		else
			$page -= 1;
			$dataPosition = $page * 5;
		echo "<br><h3 align='left' style='padding-left:105px;'>Yelp's List Reviews for Honest Install: <span style='text-decoration:underline'>$pos</span></h3>";
		for ($counter = $dataPosition; $counter < ($dataPosition + 5); $counter++) :
		?>
		<div class="content-box">
			<p class="content-box-title" align="left">
				<strong>Review Date: <?php echo  $data[$counter]['review_date']; ?></strong>
			</p>
			<div class="content-box-left">
				<table border="0" style="width:100%;padding-left:22px">
					<tr>
						<td>
							<?php
								$tot_star= (int)$data[$counter]['tot_star'];
								for($i=0;$i<$tot_star;$i++){
									echo '<img src="images/yelpstar.jpg" alt="Yelp" />';	
								}
							?>
							<BR />
							<?php echo  $data[$counter]['review']; ?> <br />   <br />                              
							<?php echo  $data[$counter]['reviewer']; ?><br />                           
							<?php echo  $data[$counter]['location']; ?>
						</td>
					</tr>
				</table>
			</div>
			<div class="clear"></div>
		</div> <!-- end of angieslist box -->
		<?php endfor; ?>
		<div class="pagination">
			<br />
			<br />
			<?php
			$pagination = $pos;
			$pagination /= 5;
			$page++;
			if ($page > 1) :
			?>
			<a href="?page=<?php echo  $page - 1; ?>">Previous</a>
			<?php else : ?>
			<span class="disabled"> Previous</span>                    
			<?php endif; ?>
			<?php
			for ($counter = 1; $counter <= $pagination; $counter++):
			if ($page == $counter) :
			?>
			<span class="current"><?php echo  $counter; ?></span>
			<?php else : ?>
			<a href="?page=<?php echo  $counter; ?>"><?php echo  $counter; ?></a>
			<?php endif; endfor; ?>
			<?php
			if ($page < $pagination) :
			?>
			<a href="?page=<?php echo  $page + 1; ?>">Next</a>
			<?php else : ?>
			<span class="disabled">Next</span>                    
			<?php endif; ?>
		</div><br /><br />
		<p class="bottomText" align="center">
			SCHEDULE SERVICE NOW!
			<strong>&nbsp; <font size=4>972-470-3528<br/><br/></font></strong>
			E-Mail us Directly: <a title="E-Mail Honest Install" href="mailto:info@HonestInstall.com">
			<strong>info@HonestInstall.com</strong></a>
		</p>
		<p class="bottomText" align="center">
			<a href="contact.php"><strong>Schedule Service/Inquiry Form</strong></a>
		</p>
		<div class="text-center">
			<a style="position: relative; padding-bottom: 0px; padding-left: 0px; width: 150px; padding-right: 0px; display: block; height: 57px; overflow: hidden; padding-top: 0px" id="bbblink" class="rbhzbum" title="Honest Install, Home Theater, Richardson, TX" 
			href="http://www.bbb.org/dallas/business-reviews/home-theater/honest-install-in-richardson-tx-90343905#bbblogo" target=_blank>
				<img style="border-bottom: medium none; border-left: medium none; padding-bottom: 0px; padding-left: 0px; padding-right: 0px; border-top: medium none; border-right: medium none; padding-top: 0px" id="bbblinkimg" alt="Honest Install, Home Theater, Richardson, TX" src="http://seal-dallas.bbb.org/logo/rbhzbum/honest-install-90343905.png" width=300 height=57/>
			</a>
			<script type=text/javascript>var bbbprotocol = (("https:" == document.location.protocol) ? "https://" : "http://");
			document.write(unescape("%3Cscript src='" + bbbprotocol + 'seal-dallas.bbb.org' + unescape('%2Flogo%2Fhonest-install-90343905.js') + "' type='text/javascript'%3E%3C/script%3E"));
			</script>
		</div>
	</div>
<?php require("footer.php"); ?>