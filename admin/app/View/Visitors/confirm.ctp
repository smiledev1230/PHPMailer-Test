<?php
echo $this->Html->script('custom.js', array('inline' => true));
?>

<h2>Visitor Appointment Confirmation</h2>
<?php echo $this->Form->create('Appointment', array('url' => 'confirm/' . $user_id)); ?>
<?php echo $this->Form->hidden('add_appointment', array('value' => '1')); ?>
<table cellpadding="3" cellspacing="5" border="0" style="width: 700px;">
    <tr>
        <td>Subject:</td>
        <td>
            <?php if ((isset($subject_error)) && ($subject_error != '')) { ?><span class="input_error"><?php echo $subject_error; ?></span><br /><?php } ?>
            <br/>
            <select name="data[Appointment][subject]" id="AppointmentSubjects">
                <?php foreach ($subjects as $subject) : ?>
                    <option value="<?= $subject; ?>"><?= $subject; ?></option>
                <?php endforeach; ?>
            </select>
        </td>
        <td></td>
        <td></td>
        <td><?php echo $this->Form->checkbox('subscription', array('value' => 'N', 'label' => false, 'hiddenField' => false)); ?> <label for="AppointmentOptPromotion">Opt Out from promotion emails</label></td>
    </tr>

    <tr>
        <td>Bcc:</td>
        <td>
            <?php if ((isset($bcc_email_error)) && ($bcc_email_error != '')) { ?><span class="input_error"><?php echo $bcc_email_error; ?></span><br /><?php } ?>
            <?php echo $this->Form->input('bcc_email', array('size' => '26', 'label' => false)); ?>
        </td>
        <td></td>
        <td>Other Bccs:</td>
        <td>
            <?php if ((isset($bccs_email_error)) && ($bccs_email_error != '')) { ?><span class="input_error"><?php echo $bccs_email_error; ?></span><br /><?php } ?>
            <?php echo $this->Form->input('other_bccs', array('cols' => '26', 'rows' => '1', 'label' => false)); ?>
            <sup><i>(separate multiple emails by comma)</i></sup>
        </td>
    </tr>

    <tr>
        <td>Title:</td>
        <td colspan="4">
            <?php echo $this->Form->radio('title', array('Mr.' => 'Mr. (male)', 'Mrs.' => 'Mrs.(married woman)', 'Ms.' => 'Ms (unmarried/single woman or not sure)'), array('separator' => '&nbsp;&nbsp;&nbsp;&nbsp;', 'legend' => false)); ?>
        </td>
    </tr>

    <tr>
        <td>Type of Service:</td>
        <td colspan="4">
            <?php echo $this->Form->radio('service', array('Install' => 'Install', 'Service Call' => 'Service Call', 'Follow Up' => 'Follow Up'), array('separator' => '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;', 'legend' => false)); ?>
            <?php echo $this->Form->error('service'); ?>
        </td>
    </tr>


    <tr>
        <td>Date</td>
        <td colspan="4">
            <input name="data[Appointment][date_appointment]" id="AppointmentDateAppointment" class="date-pick" readonly="readonly" />
            <?php echo $this->Form->error('date_appointment'); ?>
        </td>
    </tr>

    <tr>
        <td>Time In:</td>
        <td colspan="4">
            <input id="time_in" name="time_in" type="text" value="<?php echo (((isset($this->data['Appointment']['time_in'])) && ($this->data['Appointment']['time_in'] != '')) ? date('g:i a', strtotime($this->data['Appointment']['time_in'])) : ''); ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_in]" id="AppointmentTimeIn" value="<?php echo (((isset($this->data['Appointment']['time_in'])) && ($this->data['Appointment']['time_in'] != '')) ? $this->data['Appointment']['time_in'] : ''); ?>"/>
            <?php echo $this->Form->error('time_in'); ?>
        </td>
    </tr>

    <tr>
        <td>Time Out:</td>
        <td colspan="4">
            <input id="time_out" name="time_out" type="text" value="<?php echo (((isset($this->data['Appointment']['time_out'])) && ($this->data['Appointment']['time_out'] != '')) ? date('g:i a', strtotime($this->data['Appointment']['time_out'])) : ''); ?>" readonly="readonly" /><input type="hidden" name="data[Appointment][time_out]" id="AppointmentTimeOut" value="<?php echo (((isset($this->data['Appointment']['time_out'])) && ($this->data['Appointment']['time_out'] != '')) ? $this->data['Appointment']['time_out'] : ''); ?>"/>
            <?php echo $this->Form->error('time_out'); ?>
        </td>
    </tr>

    <tr>
        <td>Comments:</td>
        <td colspan="4">
            <?php if ((isset($comment_error)) && ($comment_error != '')) { ?><span class="input_error"><?php echo $comment_error; ?></span><br /><?php } ?>
            <?= $this->Form->textarea('comment', array('rows' => '5', 'cols' => '25')); ?>
        </td>
    </tr>

    <tr>
        <td colspan="5">
            <div id="tabs">
                <ul>
                    <?php if ((isset($parent_node)) && (!empty($parent_node))) : ?>
                        <?php foreach ($parent_node as $node) : ?>
                            <li><a href="#tabs-<?php echo $node['Category']['id']; ?>"><?php echo $node['Category']['name']; ?></a></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li><a href="#tabs-nocategories">No Categories</a></li>
                    <?php endif; ?>
                </ul>

                <?php
                $counter = 0;
                if ((isset($parent_node)) && (!empty($parent_node))) :
                    ?>
                    <?php foreach ($parent_node as $node) : ?>
                        <?php $parent_id = $node['Category']['id']; ?>
                        <div id="tabs-<?php echo $parent_id; ?>">
                            <table border="1">
                                <?php foreach ($child_nodes[$parent_id]['ProductList'] as $child_array) : ?>
                                    <?php $i = count($child_array); ?>
                                    <?php foreach ($child_array as $product) : ?>
                                        <?php if ($counter % 3 == 0 or $counter == 0) : ?>
                                            <tr>
                                            <?php endif; ?>
                                            <td>
                                                <input type="checkbox" class="products" name="data[Appointment][products][<?php echo $product['Category']['id'] ?>-<?php echo $product['Product']['id']; ?>]" value="<?php echo $product['Product']['id']; ?>" id="Appointment<?php echo $product['Product']['id'] ?><?php echo $product['Category']['id']; ?>" <?php echo $product['Product']['auto_select'] == '1' ? "checked=\"checked\"" : ""; ?>/>
                                                <?php echo $product['Product']['name']; ?> <br/> 
                                                <?php echo $this->Html->image("products/" . $product['Image']['name'], array("width" => '135', "alt" => $product['Product']['name'])); ?> 
                                            </td>

                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                            </table>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div id="tabs-nocategories">
                        <p>Currently there are no categories</p>
                    </div>
                <?php endif; ?>
            </div>
        </td>
    </tr>

    <tr>
        <td><?php echo $this->Form->button('Back', array('type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?></td>
        <td><?php echo $this->Form->submit(); ?></td>
        <?php echo $this->Form->end(); ?>
        <td>
            <form method="post" action="/admin/app/webroot/index.php/appointments/preview/12">
                <?= $this->Form->hidden('preview_subject'); ?>
                <?= $this->Form->hidden('preview_bcc'); ?>
                <?= $this->Form->hidden('preview_other_bcc'); ?>
                <?= $this->Form->hidden('preview_title'); ?>
                <?= $this->Form->hidden('preview_service'); ?>
                <?= $this->Form->hidden('preview_date'); ?>
                <?= $this->Form->hidden('preview_time_in'); ?>
                <?= $this->Form->hidden('preview_time_out'); ?>
                <?= $this->Form->hidden('preview_comment'); ?>
                <?= $this->Form->hidden('user_id', array('value' => $user_id)); ?>
                <?= $this->Form->hidden('preview_products'); ?>
                <input type="submit" value="Email Preview"/>
            </form>
        </td>
    </tr>
</table>
