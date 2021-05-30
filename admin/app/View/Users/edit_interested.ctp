<link rel="stylesheet" type="text/css" href="/admin/app/webroot/css/ui-lightness/jquery.ui.all.css" />
<style type="text/css">
    .ui-tabs-nav { height: 33px !important; float: left; position: relative; width: 680px; }
</style>
<script type="text/javascript" src="/admin/app/webroot/js/jquery.ui.widget.js"></script>
<script type="text/javascript" src="/admin/app/webroot/js/jquery.ui.tabs.js"></script>

<h2>Edit Your Interest</h2>
Please check products which interest you and click submit.
<?php echo $this->Form->create('User', array('url' => "editInterested/$id")); ?>
<?php echo $this->Form->hidden('edit_interest', array('value' => '1')); ?>
<?php echo $this->Form->hidden('appointment_id', array('value' => $id)); ?>
<input type="hidden" name="key" value="<?= $key;?>"/>

<table cellpadding="3" cellspacing="5" border="0" style="width: 700px;">
    <tr>
        <td colspan="5">
            <div id="tabs">
                <ul>
                    <?php if ((isset($parent_node)) && (!empty($parent_node))) : ?>
                        <?php foreach ($parent_node as $node) : ?>
                            <li><a href="#tabs-<?php echo $node['Category']['id']; ?>"><?php echo $node['Category']['name']; ?></a></li>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li><a href="#tabs-nocategories">No Categories</a></li>
                    <?php endif; ?>
                </ul>

                <?php
                $counter = 0;
                if ((isset($parent_node)) && (!empty($parent_node))) :
                    ?>
                    <?php foreach ($parent_node as $node) : ?>
                        <?php $parent_id = $node['Category']['id']; ?>
                        <div id="tabs-<?php echo $parent_id; ?>">
                            <table border="1">
                                <?php foreach ($child_nodes[$parent_id]['ProductList'] as $child_array) : ?>
                                    <?php $i = count($child_array); ?>
                                    <?php foreach ($child_array as $product) : ?>
                                        <?php if ($counter % 3 == 0 or $counter == 0) : ?>
                                            <tr>
                                            <?php endif; ?>
                                            <td>
                                                <input type="checkbox" name="data[Appointment][products][<?php echo $product['Category']['id'] ?>-<?php echo $product['Product']['id']; ?>]" value="<?php echo $product['Product']['id']; ?>" id="Appointment<?php echo $product['Product']['id'] ?><?php echo $product['Category']['id']; ?>" 
                                                <?php echo (isset($product['Product']['checked']) && $product['Product']['checked']) == '1' ? "checked=\"checked\"" : ""; ?>/>
                                                <?php echo $product['Product']['name']; ?> <br/> 
                                                <?php echo $this->Html->image("products/" . $product['Image']['name'], array("width" => '135', "alt" => $product['Product']['name'])); ?> 
                                            </td>

                                            <?php $counter++; ?>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                            </table>
                            </ul>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div id="tabs-nocategories">
                        <p>Currently there are no categories</p>
                    </div>
                <?php endif; ?>
            </div>
        </td>
    </tr>
</table>
<?php echo $this->Form->end('Submit'); ?>