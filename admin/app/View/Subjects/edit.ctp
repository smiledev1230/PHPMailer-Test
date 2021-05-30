<?php
$this->Html->css('form_style', null, array('inline' => false));
?>

<div class="form2-wrapper">

    <div class="formtitle" style="width: 980px;"><h2>Edit Subject</h2></div>
    <?php echo $this->Form->create('Subjects', array('url' => 'add_new')); ?>
    <?php echo $this->Form->hidden('id', array('value' => $subject['Subject']['id'])); ?>

    <div class="input nobottomborder">
        <?php if ((isset($name_error)) && ($name_error != '')) { ?> <span class="input_error"><?php echo $name_error; ?></span><?php } ?>
        <div class="inputtext">Subject Name: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('name', array('div' => false, 'label' => false, 'value' => $subject['Subject']['name'])); ?>
        </div>
    </div>

    <div class="buttons" style="width: 320px; background: none repeat scroll 0 0 #FFFFFF; border-top: none;">
        <?php echo $this->Form->button('Back', array('style' => 'float: left;', 'class' => 'orangebutton', 'type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?>
        <input class="orangebutton" type="submit" value="Submit" style="float: left;" />
    </div>
</div>
<?php echo $this->Form->end(); ?>
<br/><br/>