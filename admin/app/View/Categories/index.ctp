<?php
$this->Html->css('form_style', null, array('inline' => false));
?>

<style>
    #catrgories{
        margin-left: -160px;
    }

    .buttons{
        width: 430px;
    }
</style>

<script>
    $(function(){
        $('.action_icons').hide();
    });
</script>

<div style="width: 1000px;">
    <div id="categories_dropdown">
        <div class="login">
            <?php echo $this->Form->create('Categories', array('url' => 'add_new')); ?>
            <?php echo $this->Form->hidden('addnew_submit', array('value' => '1')); ?>
            <div class="formtitle">Add New Category</div>

            <div class="input">
                <div class="inputtext">Category Name: </div>
                <div class="inputcontent">
                    <?php echo $this->Form->input('category_name', array('div' => false, 'type' => 'text', 'label' => '')); ?>
                </div>
            </div>

            <div class="input nobottomborder">
                <div class="inputtext">Belongs To: </div>
                <div class="inputcontent">
                    <?php echo $this->Form->input('categoris_list', array('div' => false, 'type' => 'select', 'options' => $data_dd_select, 'label' => false)); ?>                
                </div>
            </div>

            <div class="buttons">
                <?php echo $this->Form->button('Add New Category', array('class' => 'orangebutton', 'type' => 'button', 'onclick' => 'document.forms[\'CategoriesIndexForm\'].submit()')); ?>
                <?php echo $this->Form->end(); ?>
            </div>
        </div>
    </div>

    <div id="catrgories">
        <?php echo $cathtml; ?>
    </div>
    <div style="clear: both;"></div>
</div>

<!--
<h2><?php echo __('Categories'); ?></h2>

<?php echo $this->Form->create('Categories', array('url' => 'add_new')); ?>
<?php echo $this->Form->hidden('addnew_submit', array('value' => '1')); ?>
<div id="category_add">
    <div id="category_name">
        <table cellpadding="5" cellspacing="3" border="0">
            <tr>
                <td style="width: 100px;">Category Name</td>
                <td><?php echo $this->Form->input('category_name', array('type' => 'text', 'label' => '')); ?></td>
                <td><?php if ((isset($email_error)) && ($email_error != '')) { ?> <span class="input_error"><?php echo $email_error; ?></span><?php } ?></td>
            </tr>
        </table>
    </div>

    <div id="categories_dropdown">
        <table cellpadding="5" cellspacing="3" border="0">
            <tr>
                    <td style="width: 100px;">Belongs To:</td>
                <td><?php echo $this->Form->input('categoris_list', array('type' => 'select', 'options' => $data_dd_select, 'label' => false)); ?></td>
            </tr>
            <tr><td colspan="2" style="height: 10px;"></td></tr>
            <tr>
                <td></td>
                <td><?php echo $this->Form->button('Add New Category', array('type' => 'button', 'onclick' => 'document.forms[\'CategoriesIndexForm\'].submit()')); ?></td>
            </tr>
        </table>
    </div>
</div>
<?php echo $this->Form->end(); ?>


<div id="catrgories">
<?php echo $cathtml; ?>
</div>
-->