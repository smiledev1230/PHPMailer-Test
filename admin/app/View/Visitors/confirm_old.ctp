<?php
echo $this->Html->script('custom.js', array('inline' => true));
?>

<h2><?php echo __('Visitors Appointment'); ?></h2>

<?php echo $this->Form->create('Appointment', array('url' => 'save_confirm')); ?>
<input type="hidden" name="confirm_appointment" value="<?php echo $data["Appointment_visitor"]['id']; ?>" >
<table cellpadding="3" cellspacing="5" border="0" style="width: 700px;">
    <tr>
        <td>First Name:</td>
        <td><?php echo $this->Form->input('firstname', array('size' => '26', 'label' => false, 'value' => $data["Appointment_visitor"]['firstname'])); ?></td>
        <td><?php echo $this->Form->error('firstname'); ?></td>
    </tr>
    <tr>
        <td>Last Name:</td>
        <td><?php echo $this->Form->input('lastname', array('size' => '26', 'label' => false, 'value' => $data["Appointment_visitor"]['lastname'])); ?></td>
        <td><?php echo $this->Form->error('lastname'); ?></td>
    </tr>
    <tr>
        <td>Email:</td>
        <td><?php echo $this->Form->input('email', array('size' => '26', 'label' => false, 'value' => $data["Appointment_visitor"]['email'])); ?></td>
        <td><?php echo $this->Form->error('email'); ?></td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td><?php echo $this->Form->input('phone', array('size' => '26', 'label' => false, 'value' => $data["Appointment_visitor"]['phone'])); ?></td>
        <td> <?php echo $this->Form->error('phone'); ?></td>
    </tr>
    <tr>
        <td>First Preference:</td>
        <td>
            <input name="data[Appointment][first_preference_date]" id="first_preference_date" class="date-pick" value="<?php echo $data["Appointment_visitor"]['first_preference_date']; ?>" />            
            <?php echo $this->Form->error('first_preference_date'); ?>
        </td>
        <td>
            <select name="data[Appointment][first_preference_time]" >
                <option value="<?php echo $data["Appointment_visitor"]['first_preference_time']; ?>" selected="selected"><?php echo $data["Appointment_visitor"]['first_preference_time']; ?></option>
                <option value="06:00 AM">
                    06:00 AM
                </option>
                <option value="06:30 AM">
                    06:30 AM
                </option>
                <option value="07:00 AM">
                    07:00 AM
                </option>
                <option value="07:30 AM">
                    07:30 AM
                </option>
                <option value="08:00 AM">
                    08:00 AM
                </option>
                <option value="08:30 AM">
                    08:30 AM
                </option>
                <option value="09:00 AM">
                    09:00 AM
                </option>
                <option value="09:30 AM">
                    09:30 AM
                </option>
                <option value="10:00 AM">
                    10:00 AM
                </option>
                <option value="11:30 AM">
                    11:30 AM
                </option>
                <option value="12:00 AM">
                    12:00 AM
                </option>
                <option value="12:30 PM">
                    12:30 PM
                </option>
                <option value="01:00 PM">
                    01:00 PM
                </option>
                <option value="01:30 PM">
                    01:30 PM
                </option>
                <option value="02:00 PM">
                    02:00 PM
                </option>
                <option value="02:30 PM">
                    02:30 PM
                </option>
                <option value="03:00 PM">
                    03:00 PM
                </option>
                <option value="03:30 PM">
                    03:30 PM
                </option>
                <option value="04:00 PM">
                    04:00 PM
                </option>
                <option value="04:30 PM">
                    04:30 PM
                </option>
                <option value="05:00 PM">
                    05:00 PM
                </option>
                <option value="05:30 PM">
                    05:30 PM
                </option>
                <option value="06:00 PM">
                    06:00 PM
                </option>
                <option value="06:30 PM">
                    06:30 PM
                </option>
                <option value="07:00 PM">
                    07:00 PM
                </option>
                <option value="07:30 PM">
                    07:30 PM
                </option>
                <option value="08:00 PM">
                    08:00 PM
                </option>
                <option value="08:30 PM">
                    08:30 PM
                </option>
            </select>
            <?php echo $this->Form->error('first_preference_time'); ?>
        </td>
    </tr>
    <tr>
        <td>Second Preference:</td>
        <td>
            <input name="data[Appointment][second_preference_date]" id="second_preference_date" class="date-pick" value="<?php echo $data["Appointment_visitor"]['second_preference_date']; ?>" />
            <?php echo $this->Form->error('second_preference_date'); ?>
        </td>
        <td>
            <select name="data[Appointment][second_preference_time]" >
                <option value="<?php echo $data["Appointment_visitor"]['second_preference_time']; ?>" selected="selected"><?php echo $data["Appointment_visitor"]['second_preference_time']; ?></option>
                <option value="06:00 AM">
                    06:00 AM
                </option>
                <option value="06:30 AM">
                    06:30 AM
                </option>
                <option value="07:00 AM">
                    07:00 AM
                </option>
                <option value="07:30 AM">
                    07:30 AM
                </option>
                <option value="08:00 AM">
                    08:00 AM
                </option>
                <option value="08:30 AM">
                    08:30 AM
                </option>
                <option value="09:00 AM">
                    09:00 AM
                </option>
                <option value="09:30 AM">
                    09:30 AM
                </option>
                <option value="10:00 AM">
                    10:00 AM
                </option>
                <option value="11:30 AM">
                    11:30 AM
                </option>
                <option value="12:00 AM">
                    12:00 AM
                </option>
                <option value="12:30 PM">
                    12:30 PM
                </option>
                <option value="01:00 PM">
                    01:00 PM
                </option>
                <option value="01:30 PM">
                    01:30 PM
                </option>
                <option value="02:00 PM">
                    02:00 PM
                </option>
                <option value="02:30 PM">
                    02:30 PM
                </option>
                <option value="03:00 PM">
                    03:00 PM
                </option>
                <option value="03:30 PM">
                    03:30 PM
                </option>
                <option value="04:00 PM">
                    04:00 PM
                </option>
                <option value="04:30 PM">
                    04:30 PM
                </option>
                <option value="05:00 PM">
                    05:00 PM
                </option>
                <option value="05:30 PM">
                    05:30 PM
                </option>
                <option value="06:00 PM">
                    06:00 PM
                </option>
                <option value="06:30 PM">
                    06:30 PM
                </option>
                <option value="07:00 PM">
                    07:00 PM
                </option>
                <option value="07:30 PM">
                    07:30 PM
                </option>
                <option value="08:00 PM">
                    08:00 PM
                </option>
                <option value="08:30 PM">
                    08:30 PM
                </option>
            </select>
            <?php echo $this->Form->error('second_preference_time'); ?>
        </td>
    </tr>
    <tr>
        <td>Comments:</td>
        <td><?php echo $this->Form->textarea('comments', array('rows' => '5', 'cols' => '25', 'label' => false, 'value' => $data["Appointment_visitor"]['comments'])); ?></td>
        <td></td>
    </tr>
    <tr>
        <td>Confirm:</td>
        <td><input type="checkbox" name="status_confirm" value="1" <?php echo ($data["Appointment_visitor"]['status_confirm'] == 1) ? 'checked' : ''; ?>>Accept</td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td>
            <?php echo $this->Form->button('Back', array('type' => 'button', 'onclick' => 'location.href=\'' . $this->webroot . 'index.php/visitors/\'')); ?>
        </td>
        <td>
            <?php echo $this->Form->submit('Submit', array('style' => 'text-align: left;')); ?>
        </td>
    </tr>
</table>
<?php echo $this->Form->end(); ?>