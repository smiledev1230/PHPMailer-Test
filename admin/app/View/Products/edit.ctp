<?php
$this->Html->css('form_style', null, array('inline' => false));
?>

<style>
    #ProductProductimage{
        width: 240px;
    }
</style>

<div class="form2-wrapper">

    <div class="formtitle" style="width: 980px;"><h2>Edit <?php echo $theproduct['Product']['name'] ?></h2></div>
    <?php echo $this->Form->create('Product', array('url' => 'edit', 'type' => 'file')); ?>
    <?php echo $this->Form->hidden('edit_product', array('value' => '1')); ?>
    <?php echo $this->Form->hidden('product_id', array('value' => $theproduct['Product']['id'])); ?>
    <?php echo $this->Form->hidden('image_id', array('value' => $theproduct['Image']['id'])); ?>

    <div class="input">
        <?php if ((isset($fullname_error)) && ($fullname_error != '')) { ?> <span class="input_error"><?php echo $fullname_error; ?></span><?php } ?>        
        <div class="inputtext">Product Name: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('productname', array('div' => false, 'value' => $theproduct['Product']['name'], 'label' => false)); ?>
        </div>
    </div>

    <div class="input">
        <div class="inputtext">Belongs To: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('categoris_list', array('div' => false, 'type' => 'select', 'options' => $data_dd_select, 'label' => false, 'selected' => $theproduct['Product']['category_id'])); ?>        
        </div>
    </div>

    <div class="input">
        <?php if ((isset($email_error)) && ($email_error != '')) { ?> <span class="input_error"><?php echo $email_error; ?></span><?php } ?>
        <div class="inputtext">Description: </div>
        <div class="inputcontent" style="height: 150px;">
            <?php echo $this->Form->input('description', array('div' => false, 'value' => $theproduct['Product']['description'], 'label' => false)); ?>
        </div>
    </div>

    <div class="input nobottomborder">
        <div class="inputtext">Picture: </div>
        <div class="inputcontent" style="height: 150px;">
            <?php echo $this->Form->input('productimage', array('div' => false, 'label' => false, 'between' => '<br />', 'type' => 'file')); ?>
            <br /><br/>
            <?php echo $this->Html->image("product_thumbs/" . $theproduct['Image']['name'], array("width" => '200', "alt" => $theproduct['Product']['name'])); ?>
        </div>
    </div>

    <div class="buttons" style="width: 320px; background: none repeat scroll 0 0 #FFFFFF; border-top: none;">
        <?php echo $this->Form->button('Back', array('style' => 'float: left;', 'class' => 'orangebutton', 'type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?>
        <input class="orangebutton" type="submit" value="Submit" style="float: left;" />
    </div>
</div>
<?php echo $this->Form->end(); ?>
<br/><br/>