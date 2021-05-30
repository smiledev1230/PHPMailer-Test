<html>
	<head>
		<title>Appointment Confirmation - <?php echo $date; ?></title>
	</head>
	<body>
		<center>
			<h2>HonestInstall - Appointment Confirmation</h2>
			<p><strong>Subject: </strong> <?php echo $subject; ?></p><br />
			<p>This is to let you know, that:<br />
			- on <?php echo $date; ?><br />
			- from <?php echo $time_in; ?> until <?php echo $time_out; ?><br />
			We from HonestInstall will perform <?php echo ($service == 'Install' ? 'an ' : 'a ') . $service ?> at your place.</p><br /><br />		
			<?php if($comment) : ?>
				<p><strong>NOTE:</strong><br /><?php echo $comment ?><br /><br /></p>
			<?php endif; ?>
			
			<?php if(!empty($productstoemail)) : ?>
				<div style="padding:15px; text-align: left;">
					<p>Please find below some of our products which we would like to recommend you:</p>
					<table cellpadding="0" cellspacing="0" border="0" style="width:385px;">
						<tr>
							<?php $i=1; ?>
							<?php foreach($productstoemail as $product) : ?>
								<td align="center">
									<table cellpadding="2" cellspacing="1" border="0" style="width:380px;">
										<tr><td align="center"><a href="<?php echo $product['url']; ?>"><?php echo $product['name']; ?></a></td></tr>
										<tr><td align="center"><a href="<?php echo $product['url']; ?>"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width:120px; border: 0;" /></a></td></tr>
										<tr><td align="center"><?php echo $product['description']; ?></td></tr>
									</table>
								</td>
								<?php if($i==3) { $i=1; echo '</tr><tr>'; } else { $i++; } ?>
							<?php endforeach; ?>
						</tr>
					</table>
				</div>
			<?php endif; ?>
			
			<p>Best regards,<br />
			HonestInstall Team.</p>
		</center>
	</body>
</html>