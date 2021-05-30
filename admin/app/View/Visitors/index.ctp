<h2><?php echo __('Visitors'); ?></h2>

<?php echo $this->Form->create('Appointments'); ?>
<?php echo $this->Form->hidden('search_submit', array('value' => '1')); ?>
<div id="appoint_search">
    <div id="appoint_name">
        <table cellpadding="5" cellspacing="3" border="0">
            <tr>
                <td><?php echo $this->Form->input('appointment', array('type' => 'text', 'label' => '')); ?></td>
                <td><?php echo $this->Form->button('Search', array('type' => 'button', 'onclick' => 'document.forms[\'AppointmentsIndexForm\'].submit()')); ?></td>
            </tr>
        </table>
    </div>
</div>
<?php echo $this->Form->end(); ?>

<div id="appointment_index">
    <?php
    if ((is_object($this->Paginator)) && (!empty($this->Paginator))) {
        $paginator = $this->Paginator;
    } else {
        $paginator = array();
    }
    ?>    
    <?php if (isset($appointments)) : ?>
        <table cellpadding="3" cellspacing="3" border="0" style="width: 765px;">
            <tr>
                <th style="width:30px;"><?php echo __('ID'); ?></th>
                <th style="width:70px;"><?php echo __('Firstname'); ?></th>
                <th style="width:70px;"><?php echo __('Lastname'); ?></th>
                <th style="width: 185px;"><?php echo __('Email'); ?></th>
                <th style="width:50px;"><?php echo __('Phone'); ?></th>
                <th style="width:70px;"><?php echo __('Preference Date 1'); ?></th>
                <th style="width:70px;"><?php echo __('Preference Time 1'); ?></th>
                <th style="width:70px;"><?php echo __('Preference_date 2'); ?></th>
                <th style="width:70px;"><?php echo __('Preference_time 2'); ?></th>
                <th style="width:50px;"><?php echo __('Comments'); ?></th>
                <th style="width:40px" align="center"><?php echo __('Actions'); ?></th>
            </tr>
            <?php
            $bgcolor = 'EFFFFF';
            $x = 0;
            ?>
            <?php foreach ($appointments as $appointment) : ?>
                <tr style="background-color: #<?php echo $bgcolor; ?>;">
                    <td style="text-align: right; padding: 0 2px 0 0;">
                        <?php echo $appointment['Appointment_visitor']['id']; ?>
                    </td>
                    <td><?php echo $appointment['Appointment_visitor']['firstname']; ?></td>                                                            
                    <td><?php echo $appointment['Appointment_visitor']['lastname']; ?></td>
                    <td><?php echo $appointment['Appointment_visitor']['email']; ?></td>
                    <td><?php echo $appointment['Appointment_visitor']['phone']; ?></td>
                    <td><?php echo $appointment['Appointment_visitor']['first_preference_date']; ?></td>
                    <td><?php echo $appointment['Appointment_visitor']['first_preference_time']; ?></td>
                    <td><?php echo $appointment['Appointment_visitor']['second_preference_date']; ?></td>
                    <td><?php echo $appointment['Appointment_visitor']['second_preference_time']; ?></td>
                    <td><?php echo $appointment['Appointment_visitor']['comments']; ?></td>        
                    <td align="center">
                        <?php if ($appointment['Appointment_visitor']['status_confirm'] == 0) : ?>
                            <?php echo $this->Html->link('Confirm', '/visitors/confirm/' . $appointment['Appointment_visitor']['id']); ?>
                        <?php else: ?>
                            <?php echo $this->Html->link('View', '/visitors/view/' . $appointment['Appointment_visitor']['id']); ?>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php
                if ($x > 0) {
                    $x = 0;
                    $bgcolor = 'EFFFFF';
                } else {
                    $x++;
                    $bgcolor = 'F4EFFF';
                }
                ?>
            <?php endforeach; ?>

        </table>
    <?php else : ?>
        <h2> No appointment found.</h2>
    <?php endif; ?>
</div>