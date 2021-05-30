<?php
$this->Html->css('form_style', null, array('inline' => false));
?>

<style>
    #ProductProductimage{
        width: 240px;
    }
</style>

<div class="form2-wrapper">

    <div class="formtitle" style="width: 980px;"><h2>Add New Product</h2></div>
    <?php echo $this->Form->create('Product', array('url' => 'add_new', 'type' => 'file')); ?>
    <?php echo $this->Form->hidden('add_product', array('value' => '1')); ?>

    <div class="input">
        <?php if ((isset($fullname_error)) && ($fullname_error != '')) { ?> <span class="input_error"><?php echo $fullname_error; ?></span><?php } ?>        
        <div class="inputtext">Product Name: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('productname', array('div' => false, 'value' => '', 'label' => false)); ?>
        </div>
    </div>

    <div class="input">
        <div class="inputtext">Belongs To: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('categoris_list', array('div' => false, 'type' => 'select', 'options' => $data_dd_select, 'label' => false)); ?>        
        </div>
    </div>

    <div class="input">
        <?php if ((isset($email_error)) && ($email_error != '')) { ?> <span class="input_error"><?php echo $email_error; ?></span><?php } ?>
        <div class="inputtext">Description: </div>
        <div class="inputcontent" style="height: 150px;">
            <?php echo $this->Form->input('description', array('div' => false, 'value' => '', 'label' => false)); ?>
        </div>
    </div>

    <div class="input">
        <div class="inputtext">Auto Select: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('auto_select', array('div' => false, 'label' => false, 'type' => 'checkbox',)); ?>
        </div>
    </div>

    <div class="input nobottomborder">
        <div class="inputtext">Picture: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('productimage', array('div' => false, 'label' => false, 'type' => 'file')); ?>
        </div>
    </div>

    <div class="buttons" style="width: 320px; background: none repeat scroll 0 0 #FFFFFF; border-top: none;">
        <?php echo $this->Form->button('Back', array('style' => 'float: left;', 'class' => 'orangebutton', 'type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?>
        <input class="orangebutton" type="submit" value="Submit" style="float: left;" />
    </div>
</div>
<?php echo $this->Form->end(); ?>
<br/><br/>
