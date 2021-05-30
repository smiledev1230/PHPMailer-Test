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

<h2><?php echo __('Subjects'); ?></h2>

<div id="home_users">
    <?= $this->Session->flash(); ?>
    <table id="dataTable" class="display">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Product
                </th>
                <?php if ($this->Session->read('user_type') == 1): ?>
                    <th align="center"><?php echo __('Actions'); ?></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($subjects as $subject) : ?>
                <tr>
                    <td><?php echo $subject['Subject']['id']; ?></td>
                    <td><?php echo $subject['Subject']['name']; ?></td>
                    <?php if ($this->Session->read('user_type') == 1): ?>
                        <td>
                            <?php
                            echo $this->Html->image("edit-icon.png", array(
                                "alt" => "Edit",
                                "width" => 25,
                                "height" => 25,
                                "title" => "edit subject",
                                'url' => array('controller' => 'subjects', 'action' => 'edit', $subject['Subject']['id']),
                            ));
                            ?>
                            &nbsp;&nbsp;&nbsp;
                            <?php
                            echo $this->Html->image("delete.png", array(
                                "alt" => "Edit",
                                "width" => 25,
                                "height" => 25,
                                "title" => "delete subject",
                                "onclick" => 'if(confirm(\'Are you sure to delete\nSubject: ' . $subject['Subject']['name'] . '\')) { return true; } else { return false; }',
                                'url' => array('controller' => 'subjects', 'action' => 'delete', $subject['Subject']['id']),
                            ));
                            ?>
                        </td>                        
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>