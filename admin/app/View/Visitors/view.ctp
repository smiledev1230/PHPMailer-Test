<?php
echo $this->Html->script('custom.js', array('inline' => true));
?>

<h2><?php echo __('Visitors Appointment'); ?></h2>

<table cellpadding="3" cellspacing="5" border="0" style="width: 700px;">
    <tr>
        <td>First Name:</td>
        <td> <?php echo $data["Appointment_visitor"]['firstname']; ?></td>
    </tr>
    <tr>
        <td>Last Name:</td>
        <td> <?php echo $data["Appointment_visitor"]['lastname']; ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td> <?php echo $data["Appointment_visitor"]['email']; ?></td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td> <?php echo $data["Appointment_visitor"]['phone']; ?></td>        
    </tr>
    <tr>
        <td>First Preference:</td>
        <td>
            <?php echo $data["Appointment_visitor"]['first_preference_date']; ?>
        </td>
        <td>
            <?php echo $data["Appointment_visitor"]['first_preference_time']; ?>            
        </td>
    </tr>
    <tr>
        <td>Second Preference:</td>
        <td>
            <?php echo $data["Appointment_visitor"]['second_preference_date']; ?>
        </td>
        <td>
            <?php echo $data["Appointment_visitor"]['second_preference_time']; ?>
        </td>
    </tr>
    <tr>
        <td>Comments:</td>
        <td><?php echo $this->Form->textarea('comments', array('rows' => '5', 'cols' => '25', 'label' => false, 'value' => $data["Appointment_visitor"]['comments'])); ?></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>
            <?php echo $this->Form->button('Back', array('type' => 'button', 'onclick' => 'location.href=\'' . $this->webroot . 'index.php/visitors/\'')); ?>       
        </td>
    </tr>
</table>