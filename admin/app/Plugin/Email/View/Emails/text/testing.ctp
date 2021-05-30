Appointment Confirmation - <?php echo $date; ?>\r\n\r\n
HonestInstall - Appointment Confirmation\r\n
Subject: <?php echo $subject; ?>\r\n\r\n
This is to let you know, that:\r\n
- on <?php echo $date; ?>\r\n
- from <?php echo $time_in; ?> until <?php echo $time_out; ?>\r\n\r\n
We from HonestInstall will perform <?php echo ($service == 'Install' ? 'an' : 'a') . $service ?> at your place.\r\n

<?php if($comment) : ?>
	NOTE:\r\n
	<?php echo $comment ?>\r\n\r\n
<?php endif; ?>

<?php if(!empty($productstoemail)) : ?>
	Please find below some of our products which we would like to recommend you:\r\n\r\n
	<?php foreach($productstoemail as $product) : ?>
	<?php endforeach; ?>	
<?php endif; ?>
		
Best regards,\r\n
HonestInstall Team.