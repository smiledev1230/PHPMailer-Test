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

<h2><?php echo __('Customer Interests'); ?></h2>

<div id="home_users">

    <?= $this->Session->flash(); ?>
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th style="width:70px;">
                    Appointment ID
                </th>
                <th style="width:70px;">
                    First Name
                </th>
                <th style="width:70px;">
                    Email
                </th>
                <th style="width:70px;">
                    Product
                </th>
                <th style="width:70px;">
                    Image
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($interests as $userInterest) : ?>
                <tr>
                    <td> <?= $userInterest["User_interest"]["appointment_id"]; ?> </td>
                    <td> <?= $userInterest["User"]["firstname"]; ?> </td>
                    <td> <?= $userInterest["User"]["email"]; ?> </td>
                    <td> <?= $userInterest["Product"]["name"]; ?> </td>
                    <td> <?php echo $this->Html->image("product_thumbs/" . $userInterest['Image']['name'], array("width" => '55', "alt" => $userInterest['Product']['name'])); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>