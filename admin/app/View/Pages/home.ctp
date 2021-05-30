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

<h2><?php echo __('Users'); ?></h2>

<div id="home_users">
    <?= $this->Session->flash(); ?>
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th align="center">
                    <?php echo __('ID'); ?>
                </th>
                <th align="center"><?php echo __('Title'); ?></th>
                <th align="center">
                    First Name
                </th>
                <th align="center">
                    Last Name
                </th>
                <th align="center">
                    Email
                </th>
                <?php if ($this->Session->read('user_type') == 1) : ?>
                    <th>
                        Actions
                    </th>
                <?php endif; ?>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) :
                ?>
                <tr>
                    <td><?php echo $user['User']['id']; ?></td>
                    <td><?php echo $user['User']['title']; ?></td>
                    <td><?php echo $user['User']['firstname']; ?></td>
                    <td><?php echo $user['User']['lastname']; ?></td>
                    <td><?php echo $user['User']['email']; ?></td>
                    <?php if ($this->Session->read('user_type') == 1) : ?>
                        <td>
                            <?php
                            echo $this->Html->image("edit-icon.png", array(
                                "alt" => "Edit",
                                "width" => 25,
                                "height" => 25,
                                "title" => "edit user",
                                'url' => array('controller' => 'users', 'action' => 'edit', $user['User']['id']),
                            ));
                            ?>
                            &nbsp;&nbsp;&nbsp;
                            <?php
                            echo $this->Html->image("delete.png", array(
                                "alt" => "Edit",
                                "width" => 25,
                                "height" => 25,
                                "title" => "delete user",
                                "onclick" => 'if(confirm(\'Are you sure to delete\nFull Name: ' . $user['User']['firstname'] . ' ' . $user['User']['lastname'] . '\nE-Mail: ' . $user['User']['email'] . '\')) { return true; } else { return false; }',
                                'url' => array('controller' => 'users', 'action' => 'delete', $user['User']['id']),
                            ));
                            ?>
                        </td>
                    <?php endif; ?>
                    <td><?php echo $this->Html->link('Add New Appoinment', '/appointments/add_new/' . $user['User']['id']); ?></td>
                    <td><?php echo $this->Html->link('View Appoinments', '/appointments/index/' . $user['User']['id']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <br/><br/>
</div>
