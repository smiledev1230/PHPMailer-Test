<?php
$this->Html->css('datatable/demo_page', null, array('inline' => false));
$this->Html->css('datatable/demo_table_jui', null, array('inline' => false));
$this->Html->css('datatable/themes/smoothness/jquery-ui-1.8.4.custom', null, array('inline' => false));

$this->Html->script('custom.js', array('inline' => false));
$this->Html->script('datatable/js/jquery.dataTables', array('inline' => false));
?>

<script type = "text/javascript" charset = "utf-8">
    $(document).ready(function() {
        oTable = $('#dataTable').dataTable({
            "bJQueryUI": true,
            "sPaginationType": "full_numbers"
        });
    } );
</script>

<style>
    #home_users{
        width: 1000px;
    }
</style>

<h2><?php echo __('Appointments'); ?></h2>

<div id="home_users">
    <?= $this->Session->flash(); ?>
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th><?php echo __('Email'); ?></th>
                <th><?php echo __('Subject'); ?></th>
                <th><?php echo __('Service'); ?></th>
                <th>Date Appointment</th>
                <th><?php echo __('Time In'); ?></th>
                <th>Date Email</th>
                <th align="center"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment) : ?>
                <tr>
                    <td style="text-align: right; padding: 0 2px 0 0;"><?php echo $appointment['Appointment']['id']; ?></td>
                    <?php if ($appointment['User']['mo_firstname']) : ?>
                        <td onmouseover="ddrivetip('<?php echo $appointment['User']['mo_firstname']; ?>', '#F4EFD1', '200');" onmouseout="hideddrivetip();"><?php echo $appointment['User']['firstname']; ?></td>
                    <?php else : ?>
                        <td><?php echo $appointment['User']['firstname']; ?></td>
                    <?php endif; ?>
                    <?php if ($appointment['User']['mo_lastname']) : ?>
                        <td onmouseover="ddrivetip('<?php echo $appointment['User']['mo_lastname']; ?>', '#F4EFD1', '200');" onmouseout="hideddrivetip();"><?php echo $appointment['User']['lastname']; ?></td>
                    <?php else : ?>
                        <td><?php echo $appointment['User']['lastname']; ?></td>
                    <?php endif; ?>
                    <td><?php echo $appointment['Appointment']['email']; ?></td>
                    <?php if ($appointment['Appointment']['mo_subject']) : ?>
                        <td onmouseover="ddrivetip('<?php echo $appointment['Appointment']['mo_subject']; ?>', '#F4EFD1', '200');" onmouseout="hideddrivetip();"><?php echo $appointment['Appointment']['subject']; ?></td>
                    <?php else : ?>
                        <td><?php echo $appointment['Appointment']['subject']; ?></td>
                    <?php endif; ?>
                    <td style="width: 65px; text-align: center;"><?php echo $appointment['Appointment']['service']; ?></td>
                    <td style="width: 65px; text-align: right;"><?php echo date('n/j/y', strtotime($appointment['Appointment']['date_appointment'])); ?></td>
                    <td style="width: 45px; text-align: right;"><?php echo date('g:i a', strtotime($appointment['Appointment']['time_in'])); ?></td>
                    <td style="width: 65px; text-align: right;"><?php echo date('n/j/y', strtotime($appointment['Appointment']['date_added'])); ?></td>
                    <td align="center"><?php echo $this->Html->link('View', '/appointments/view/' . $appointment['Appointment']['id']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>