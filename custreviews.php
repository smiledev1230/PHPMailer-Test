<?php $menu = "angies"; include("header.php"); ?>
	<div id="content"><br /><br />
		<div id="content-logo-left"> </div>
		<div id="content-logo-right">
		   <script type="text/javascript" src="http://www.angieslist.com/webbadge/insertwebbadge.js?bid=0bdf02b1348b15b4661551c36682deea"></script><script type="text/javascript">if (BADGEBOX) BADGEBOX.PlaceBadge();</script><noscript><div id="ssanslnk"><a href="http://www.angieslist.com/companylist/us/tx/richardson/honest-install-reviews-2292250.aspx" title="Angie's List Super Service Award winner">DALLAS/FT. WORTH home theater design</a></div></noscript><br />
		  <small style="color:black"> Super Service Award Winners: 2011, 2012, 2013 & 2014&nbsp;&nbsp;</small><br /><br />
		</div>
		<div class="clear"></div>
		<div id="bar">
			<div id="bar1"></div>
			<div id="bar2"></div>
		</div>
		<div class="clear"></div>
		<!-- angieslist content -->
		<?php
		include 'angies_review.php';
		if(isset($_GET['page'])) {$page = $_GET['page'];}
		else $page='';
		if ($page == '' || $page == 0)
			$page = 0;
		else
			$page -= 1;
		$dataPosition = $page * 5;
		for ($counter = $dataPosition; $counter < ($dataPosition + 5); $counter++) :
			?>
			<div class="content-box">
				<p class="content-box-title" align="left" style="">
					<label class="review"><strong>Review Date: <?php echo $data[$counter]['review_date']; ?></strong></label>
				</p>

				<div class="content-box-left">
					<div class="content-box-right">
						<div class="overall-box">
							<table border="0">
								<tr>
									<td class="overall-box-left overall-title"> Overall </td>
									<td> <?php echo $data[$counter]['overall']; ?> </td>
								</tr>
								<tr>
									<td class="overall-box-left"> Price </td>
									<td> <?php echo $data[$counter]['price']; ?> </td>
								</tr>
								<tr>
									<td class="overall-box-left"> Quality </td>
									<td> <?php echo $data[$counter]['quality']; ?> </td>
								</tr>
								<tr>
									<td class="overall-box-left"> Responsiveness </td>
									<td> <?php echo $data[$counter]['responsiveness']; ?> </td>
								</tr>
								<tr>
									<td class="overall-box-left"> Punctuality </td>
									<td> <?php echo $data[$counter]['punctuality']; ?> </td>
								</tr>
								<tr>
									<td class="overall-box-left"> Professionalism </td>
									<td> <?php echo $data[$counter]['professionalism']; ?> </td>
								</tr>
							</table>
						</div>
					</div>
					<table border="0" style="padding-left:0;width:435px">
						<tr>
							<td class="content-box-left-description"> Company Name: </td>
							<td> <?php echo $data[$counter]['company_name']; ?> </td>
						</tr>
						<tr>
							<td class="content-box-left-description"> Categories: </td>
							<td> 
								<?php echo $data[$counter]['categories']; ?>
							</td>
						</tr>
						<tr>
							<td class="content-box-left-description"> Services Performed: </td>
							<td> <?php echo $data[$counter]['services_performed']; ?> </td>
						</tr>
						<tr>
							<td class="content-box-left-description"> Work Completed Date: </td>
							<td> <?php echo $data[$counter]['work_completed_date']; ?> </td>
						</tr><!--
						<tr>
							<td class="content-box-left-description"> Last Modified Date: </td>
							<td> <?php echo $data[$counter]['last_modified_date']; ?> </td>
						</tr>-->
						<tr>
							<td class="content-box-left-description"> Hire Again: </td>
							<td> <?php echo $data[$counter]['hire_again']; ?> </td>
						</tr>
						<tr>
							<td class="content-box-left-description"> Approximate Cost: </td>
							<td> <?php echo $data[$counter]['approximate_cost']; ?> </td>
						</tr>
						<tr>
							<td class="content-box-left-description"> Home Build Year: </td>
							<td> <?php echo $data[$counter]['home_build_year']; ?> </td>
						</tr>
					</table>
					<table border="0" style="width:100%;padding-left:0px">
						<tr>
							<td class="content-box-left-description" valign="top">  <b>Description of Work:</b> </td>
							<td class="greentxt"><label class="content-box-colspan2"><?php echo $data[$counter]['description_of_work']; ?></label> </td>
						</tr> <tr>
							<td class="content-box-left-description" valign="top">  <b class="review">Client Comments:</b> </td>
							<td class="greentxt"> <label class="content-box-colspan2"><strong class="review"><?php echo $data[$counter]['member_comments']; ?></strong></label></td>
						</tr>
						<tr>
							<td class="content-box-left-description"> Share on Band of Neighbors: </td>
							<td> <?php echo $data[$counter]['share_on_band_of_neighbours']; ?> </td>
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
			$pagination = sizeof($data);
			$pagination /= 5;
			$page++;
			if ($page > 1) :
				?>
				<a href="?page=<?php echo $page - 1; ?>">Previous</a>
			<?php else : ?>
				<span class="disabled"> Previous</span>                    
			<?php endif; ?>
			<?php
			for ($counter = 1; $counter <= $pagination; $counter++):
				if ($page == $counter) :
					?>
					<span class="current"><?php echo $counter; ?></span>
				<?php else : ?>
					<a href="?page=<?php echo $counter; ?>"><?php echo $counter; ?></a>
				<?php endif; endfor; ?>

			<?php
			if ($page < $pagination) :
				?>
				<a href="?page=<?php echo $page + 1; ?>">Next</a>
			<?php else : ?>
				<span class="disabled">Next</span>                    
			<?php endif; ?>
		</div>
		<br />
		<br />

		<p class="bottomText" align="center">
			SCHEDULE SERVICE NOW!
			<strong>&nbsp; <font size=4>972-470-3528<br/><br/></font></strong>
			E-Mail us Directly: <a title="E-Mail Honest Install" href="mailto:info@HonestInstall.com">
				<strong>info@HonestInstall.com</strong>
			</a>
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