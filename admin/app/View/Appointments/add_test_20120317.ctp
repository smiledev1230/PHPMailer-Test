
		<div style="width: 600px;">
			<h2>HonestInstall - Appointment Confirmation</h2>
			<p><strong>Subject: </strong> <?php echo $subject; ?></p>
			<p>This is to let you know, that:<br />
			- <strong>on</strong> <?php echo $date; ?><br />
			- <strong>from</strong> <?php echo $time_in; ?> until <?php echo $time_out; ?><br /><br />
			<strong>We from HonestInstall</strong> will perform &quot;<i><b><?php echo ($service == 'Install' ? 'an ' : 'a ') . $service ?></b></i>&quot; at your place.</p>
			<?php if($comment) : ?>
				<p><strong>NOTE:</strong><br /><?php echo $comment ?></p>
			<?php endif; ?>
			
			<?php if(!empty($productstoemail)) : ?>
				<div style="padding:15px 0; text-align: left;">
					<form name="" action="<?php echo $form_url; ?>" method="post">
					<input type="hidden" name="uid" value="<?php echo $uid; ?>" />
					<p>Please <strong>find below</strong> some of our products which we would like to recommend to you:</p>
					<table cellpadding="1" cellspacing="7" border="0" style="width:585px;">
						<tr>
							<?php $i=1; ?>
							<?php foreach($productstoemail as $product) : ?>
								<td align="center" valign="top" style="padding: 0 0 15px 0; width: 185px; height:190px; border: 1px solid darkblue;">
									<table cellpadding="1" cellspacing="1" border="0" style="width:175px; height:190px;">
										<tr>
											<td style="width: 185px;">
												<table cellpadding="1" cellspacing="1" border="0" style="width: 175px;">
													<tr>
														<td align="left" style="padding:0 0 0 4px; width: 155px; font-size: 12px; font-weight: bold;"><a href="<?php echo $product['url']; ?>" style="text-decoration: none; color: gray;"><?php echo $product['name']; ?></a></td>
														<td align="center" style="width:20px;"><input type="checkbox" name="product_<?php echo $product['cid'].'-'.$product['pid']; ?>" /></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr><td align="center"><a href="<?php echo $product['url']; ?>"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width:120px; border: 0;" /></a></td></tr>
										<tr><td align="center" style="font-size: 11px; color: gray; font-style: italic;"><?php echo ((strlen($product['description']) > 60) ? substr($product['description'], 0, 60).'...' : $product['description']); ?></td></tr>
									</table>
								</td>
								<?php if($i==3) { $i=1; echo '</tr><tr>'; } else { $i++; } ?>
							<?php endforeach; ?>
						</tr>
					</table>
					<center style="padding: 10px 0;"><input type="submit" value="I'm interested of the selected product(s)" name="formsubmit" style="height: 40px; font-size: 15px;" /></center>
					</form>
				</div>
			<?php endif; ?>
			
			<p style="font-family: 'Comic Sans MS', sans-serif; font-size: 11px;">Best regards,<br />
			HonestInstall Team.</p>
		</div>