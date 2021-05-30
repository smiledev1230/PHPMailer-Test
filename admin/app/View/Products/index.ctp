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

<h2><?php echo __('Products'); ?></h2>

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
                <th>
                    Category
                </th>
                <th>
                    Description
                </th>
                <th><?php echo __('Images'); ?></th>
                <?php if ($this->Session->read('user_type') == 1) : ?>
                    <th align="center"><?php echo __('Actions'); ?></th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?php echo $product['Product']['id']; ?></td>
                    <td><?php echo $product['Product']['name']; ?></td>
                    <td><?php echo $product['Category']['name']; ?></td>
                    <td><?php echo $product['Product']['description']; ?></td>
                    <td><?php echo $this->Html->image("product_thumbs/" . $product["Image"][0]["name"], array("width" => '55', "alt" => $product['Product']['name'])); ?></td>
                    <?php if ($this->Session->read('user_type') == 1) : ?>
                        <td>
                            <?php
                            echo $this->Html->image("edit-icon.png", array(
                                "alt" => "Edit",
                                "width" => 25,
                                "height" => 25,
                                "title" => "edit product",
                                'url' => array('controller' => 'products', 'action' => 'edit', $product['Product']['id']),
                            ));
                            ?>
                            &nbsp;&nbsp;&nbsp;
                            <?php
                            echo $this->Html->image("delete.png", array(
                                "alt" => "Edit",
                                "width" => 25,
                                "height" => 25,
                                "title" => "delete product",
                                "onclick" => 'if(confirm(\'Are you sure to delete\nProduct: ' . $product['Product']['name'] . '\')) { return true; } else { return false; }',
                                'url' => array('controller' => 'products', 'action' => 'delete', $product['Product']['id']),
                            ));
                            ?>
                        </td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>