<html>
    <head>
        <title>Appointment Confirmation - <?php echo $date; ?></title>
    </head>
    <body style="font-family: Verdana, Arial, sans-serif; font-size: 13px;">
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
                                <?php /* have no idea why do other variables aren't apply so just overwritten it
                                  <?php echo $title . ' ' . $lastname ?><br /><br />
                                  Thank you for booking your <?php echo $service; ?> with us.<br /><br />
                                  We have you scheduled for:<br /><br />
                                  <b>DATE: <?php echo $date; ?> ARRIVAL: <?php echo $time_in; ?></b><br /><br />
                                  See you then, if you have any questions please contact us: 972-470-3528<br /><br />
                                  -Honest Install | Service Team. Testing
                                 * 
                                 */ ?>
                                <h2> <? //= $title;  ?> </h2>
                                <?= $title; ?>
                                </font>
                            </td>
                        </tr>
                        <?php if (!empty($productstoemail)) : ?>
                            <tr><td height="20px"></td></tr>
                            <tr>
                                <td>
                                    <form name="" action="<?php echo "$form_url"; ?>" method="post">
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
    </body>
</html>