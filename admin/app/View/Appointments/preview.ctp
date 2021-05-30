<html>
    <head>
        <title>Appointment Confirmation - <?php echo $date; ?></title>
        <script type="text/javascript" src="<?php echo $this->webroot; ?>js/ckeditor/ckeditor.js"/></script>
    <script>
        $(function(){
            $('#AppointmentContent').val($('#edit').val());
        });
    </script>
</head>
<body style="font-family: Verdana, Arial, sans-serif; font-size: 13px;">

    <h2> Email Preview </h2>
    <table cellpadding="0" cellspacing="0" border="0" width="100%">
        <tr><td valign="top">
                <table cellpadding="0" cellspacing="0" border="0" width="710">
                    <tr>
                        <td><img src="https://honestinstall.com/img/mailtemplate/mt_header.jpg" usemap="#mt_header" alt="HonestInstall Appointment Confirmation" />
                            <map name="mt_header" id="mt_footer">
                                <area shape="rect" coords="610,30,700,60" href="http://www.facebook.com" alt="FB" />
                            </map>
                        </td>
                    </tr>
                    <tr><td height="20px"></td></tr>
                    <tr>
                        <td style="padding-left: 15px;">
                            <?= $this->Form->textarea('edit', array('class' => 'ckeditor', 'default' => $content)); ?>
                        </td>
                    </tr>
                    <?php if (!empty($productstoemail)) : ?>
                        <tr><td height="20px"></td></tr>
                        <tr>
                            <td>
                                <input type="hidden" name="uid" value="<?php echo $uid; ?>" />
                                <input type="hidden" name="appointment_id" value="<?= $appointment_id; ?>"/>
                                <input type="hidden" name="key" value="<?= $key; ?>"/>
                                <table cellpadding="0" cellspacing="0" border="0" width="710">
                                    <tr>
                                        <td style="padding-left: 15px;"><font face="Verdana, Arial, Helvetica, sansserif" size="4" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #9B9B9B;">Did you know these are available?</font></td>
                                    </tr>
                                    <tr><td height="10px"></td></tr>
                                    <tr>
                                        <td>
                                            <table cellpadding="0" cellspacing="0" border="0" width="710">
                                                <tr>
                                                    <td><img src="https://honestinstall.com/img/mailtemplate/frame_left_top.jpg" alt="Frame Left Top" height="8" width="9" /></td>
                                                    <td><img src="https://honestinstall.com/img/mailtemplate/frame_center_top.jpg" alt="Frame Center Top" height="8" width="694" /></td>
                                                    <td><img src="https://honestinstall.com/img/mailtemplate/frame_right_top.jpg" alt="Frame Right Top" height="8" width="9" /></td>
                                                </tr>
                                                <tr>
                                                    <td style="background: url('https://honestinstall.com/img/mailtemplate/frame_left_center.jpg') repeat-y; width:9px;"></td>
                                                    <td>
                                                        <table cellpadding="0" cellspacing="0" border="0" width="694">
                                                            <tr><td height="10" colspan="4"></td></tr>
                                                            <tr><td colspan="4" align="center"><input type="submit" name="SubmitTop" value="Submit My Choice" /></td></tr>
                                                            <tr><td height="25" colspan="4"></td></tr>

                                                            <?php foreach ($productstoemail as $catname => $productsarray) : ?>
                                                                <tr>
                                                                    <td style="padding-left: 15px;" colspan="4"><font face="Verdana, Arial, Helvetica, sansserif" size="4" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 12pt; color: #9B9B9B;"><b><?php echo $catname; ?></b></font></td>
                                                                </tr>
                                                                <tr><td height="10" colspan="4"></td></tr>
                                                                <tr>
                                                                    <?php $i = 1; ?>
                                                                    <?php foreach ($productsarray as $product) : ?>
                                                                        <td align="center" valign="top" width="172">
                                                                            <table cellpadding="1" cellspacing="1" border="0" width="172">
                                                                                <tr>
                                                                                    <td align="center"><img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" style="width:120px; border: 0;" /></td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td align="center">
                                                                                        <font face="Verdana, Arial, Helvetica, sansserif" size="1" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: #7f7f7f;"><?php echo $product['name']; ?></font> <input type="checkbox" name="data[product][<?= $product['pid']; ?>]" /><br />
                                                                                        <font face="Verdana, Arial, Helvetica, sansserif" size="1" style="font-family: Verdana, Arial, Helvetica, sans-serif; font-size: 8pt; color: #7f7f7f;"><?php echo ((strlen($product['description']) > 60) ? substr($product['description'], 0, 60) . '...' : $product['description']); ?></font>
                                                                                    </td>
                                                                                </tr>
                                                                            </table>
                                                                        </td>
                                                                        <?php
                                                                        if ($i == 4) {
                                                                            $i = 1;
                                                                            echo '</tr><tr>';
                                                                        } else {
                                                                            $i++;
                                                                        }
                                                                        ?>
                                                                    <?php endforeach; ?>
                                                                </tr>
                                                                <tr><td height="25" colspan="4"></td></tr>
                                                            <?php endforeach; ?>

                                                            <tr><td colspan="4" align="center"><input type="submit" name="SubmitBottom" value="Submit My Choice" /></td></tr>	
                                                            <tr><td height="10" colspan="4"></td></tr>
                                                        </table>
                                                    </td>
                                                    <td style="background: url('https://honestinstall.com/img/mailtemplate/frame_right_center.jpg') repeat-y; width:9px;"></td>
                                                </tr>
                                                <tr>
                                                    <td><img src="https://honestinstall.com/img/mailtemplate/frame_bottom_left.jpg" alt="Frame Bottom Left" height="134" width="9" /></td>
                                                    <td><img src="https://honestinstall.com/img/mailtemplate/frame_bottom_center.jpg" alt="Frame Bottom Center" height="134" width="694" usemap="#mt_ads" />
                                                        <map name="mt_ads" id="mt_ads">
                                                            <area shape="rect" coords="65,5,200,25" href="http://www.customerlobby.com/reviews/403/honest-install/" alt="Customer Reviews" />
                                                            <area shape="rect" coords="220,5,350,25" href="mailto:info@honestinstall.com" alt="Mail To HonestInstall" />
                                                            <area shape="rect" coords="365,5,495,25" href="https://honestinstall.com/" alt="Home HonestInstall" />
                                                        </map>
                                                    </td>
                                                    <td><img src="https://honestinstall.com/img/mailtemplate/frame_bottom_right.jpg" alt="Frame Bottom Right" height="134" width="9" /></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3">
                                                        <a href="https://honestinstall.com/install.php"><img src="https://honestinstall.com/img/mailtemplate/frame_tr_after.jpg" width="710" height="32" alt="TR After" usemap="#mt_footer" /></a>
                                                    </td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    <?php endif; ?>
                </table>
            </td></tr>
    </table>
    click <a href="https://honestinstall.com/admin/app/webroot/index.php/appointments/mail_back/<?= $appointment_id; ?>">here</a> if this email does not belong to you.
    <br/><br/>
    <div style="float: left; width: 200px;">
        <?= $this->Form->button('Back', array('type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?>    
    </div>
    <div style="float: left;">
        <?= $this->Form->create('Appointment', array('url' => 'add_new/' . $uid)); ?>
        <?= $this->Form->hidden('add_appointment', array('value' => '1')); ?>
        <?= $this->Form->hidden('subject', array('label' => false, 'value' => $subject)); ?>
        <?= $this->Form->hidden('email', array('label' => false, 'value' => $email)); ?>
        <?= $this->Form->hidden('bcc_email', array('label' => false, 'value' => $bcc_email)); ?>
        <?= $this->Form->hidden('other_bccs', array('label' => false, 'value' => $other_bccs)); ?>
        <?= $this->Form->hidden('title', array('label' => false, 'value' => $title)); ?>
        <?= $this->Form->hidden('service', array('label' => false, 'value' => $service)); ?>
        <?= $this->Form->hidden('date_appointment', array('label' => false, 'value' => $date_appointment)); ?>
        <input type="hidden" name="time_in" id="time_in" value="<?= $time_in; ?>"/>
        <input type="hidden" name="time_out" id="time_out" value="<?= $time_out; ?>"/>
        <?= $this->Form->hidden('comment', array('label' => false, 'value' => $comment)); ?>
        <?= $this->Form->hidden('email', array('label' => false, 'value' => $email)); ?>
        <?= $this->Form->hidden('content'); ?>
        <?= $this->Form->hidden('preview_products', array('value' => $preview_products)); ?>

        <?php echo $this->Form->submit('Send Email'); ?>

        <?= $this->Form->end(); ?>
    </div>
    <div style="clear:both;"></div>
</body>
</html>