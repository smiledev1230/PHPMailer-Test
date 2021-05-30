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
<h2><?php echo __('Administrators'); ?></h2>

<div id="home_users">
    <?= $this->Session->flash(); ?>
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th align="center">
                    ID
                </th>
                <th align="center">
                    User Name 
                </th>
                <th align="center">
                    Email
                </th>
                <th align="center"><?php echo __('Actions'); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) :
                ?>
                <tr>
                    <td><?php echo $user['Team']['id']; ?></td>
                    <td><?php echo $user['Team']['username']; ?></td>
                    <td><?php echo $user['Team']['email']; ?></td>
                    <td>
                        <?php
                        echo $this->Html->image("edit-icon.png", array(
                            "alt" => "Edit",
                            "width" => 25,
                            "height" => 25,
                            "title" => "edit user",
                            'url' => array('controller' => 'teams', 'action' => 'edit', $user['Team']['id']),
                        ));
                        ?>
                        &nbsp;&nbsp;&nbsp;
                        <?php
                        echo $this->Html->image("delete.png", array(
                            "alt" => "Edit",
                            "width" => 25,
                            "height" => 25,
                            "title" => "delete user",
                            "onclick" => 'if(confirm(\'Are you sure to delete\nUser Name: ' . $user['Team']['username'] . '\')) { return true; } else { return false; }',
                            'url' => array('controller' => 'teams', 'action' => 'delete', $user['Team']['id']),
                        ));
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
