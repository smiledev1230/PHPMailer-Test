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
            "sPaginationType": "full_numbers",
            "bAutoWidth": false,
            "aoColumns": [
                {"sWidth": "5%"}, 
                {"sWidth": "9%"}, 
                {"sWidth": "9%"},
                {"sWidth": "9%"}, 
                {"sWidth": "9%"}, 
                {"sWidth": "9%"},
                {"sWidth": "9%"}, 
                {"sWidth": "9%"}, 
                {"sWidth": "9%"},
                {"sWidth": "9%"}, 
                {"sWidth": "12%"}
            ]
        });
    });
</script>

<style>
    #home_users{
        width: 1000px;
    }

    #dataTable_wrapper {
        width: 105% !Important;
        margin-left: -25px;
    }

    #entry_time{
        width: 10%;
    }
</style>

<h2><?php echo __('Visitors'); ?></h2>
<?= $this->Session->flash(); ?>

<div id="appointment_index">
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th><?php echo __('ID'); ?></th>
                <th><?php echo __('Firstname'); ?></th>
                <th><?php echo __('Lastname'); ?></th>
                <th><?php echo __('Email'); ?></th>
                <th><?php echo __('Phone'); ?></th>
                <th><?php echo __('Pref. Date 1'); ?></th>
                <th><?php echo __('Pref. Time 1'); ?></th>
                <th><?php echo __('Pref. Date 2'); ?></th>
                <th><?php echo __('Pref. Time 2'); ?></th>
                <th id="entry_time"><?php echo __('Submit Date'); ?></th>
                <th><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($appointments as $appointment) : ?>
                <tr>
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
                    <td><?php echo date('m/d/Y', $appointment['Appointment_visitor']['input_time']); ?></td>        
                    <td align="center">
                        <?php if ($appointment['Appointment_visitor']['status_confirm'] == 0) : ?>
                            <?php echo $this->Html->link('Confirm', '/appointments/confirm/' . $appointment['Appointment_visitor']['id']) ?>
                        <?php else: ?>
                            <?php echo $this->Html->link('View', '/appointments/confirm/' . $appointment['Appointment_visitor']['id']); ?>
                        <?php endif; ?>
                        &nbsp;&nbsp;&nbsp;
                        <?php
                        echo $this->Html->image("delete.png", array(
                            "alt" => "Edit",
                            "width" => 25,
                            "height" => 25,
                            "title" => "Delete visitor",
                            "onclick" => 'if(confirm(\'Are you sure to delete\n Appointment visitor ' . $appointment['Appointment_visitor']['firstname'] . ' ' . $appointment['Appointment_visitor']['lastname'] . '\')) { return true; } else { return false; }',
                            'url' => array('controller' => 'appointments', 'action' => 'deletevisitor', $appointment['Appointment_visitor']['id']),
                        ));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>