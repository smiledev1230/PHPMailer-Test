<?php
$this->Html->css('form_style', null, array('inline' => false));
?>

<div class="form2-wrapper">

    <div class="formtitle" style="width: 980px;"><h2>Add New User</h2></div>
    <?php echo $this->Form->create('Users', array('url' => 'add_new')); ?>
    <?php echo $this->Form->hidden('add_user', array('value' => '1')); ?>
    <div class="input">
        <div class="inputtext">Title: </div>
        <div>
            <input type="radio" value="Mr." id="UserTitleMr" name="data[Users][title]" checked="checked">Mr.
            <input type="radio" value="Mrs." id="UserTitleMrs" name="data[Users][title]">Mrs.(married woman)<br/>
            <br/>
            <input type="radio" value="Ms." id="UserTitleMs" name="data[Users][title]">Ms (unmarried/single woman or not sure)                
        </div>
    </div>

    <div class="input">
        <?php if ((isset($firstname_error)) && ($firstname_error != '')) { ?><span class="input_error"><?php echo $firstname_error; ?></span><br /><?php } ?>
        <div class="inputtext">First Name: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('firstname', array('div' => 'false', 'size' => '26', 'label' => false, 'value' => '')); ?>            
        </div>
    </div>

    <div class="input">
        <?php if ((isset($lastname_error)) && ($lastname_error != '')) { ?><span class="input_error"><?php echo $lastname_error; ?></span><br /><?php } ?>
        <div class="inputtext">Last Name: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('lastname', array('div' => 'false', 'size' => '26', 'label' => false, 'value' => '')); ?>
        </div>
    </div>

    <div class="input nobottomborder">
        <?php if ((isset($email_error)) && ($email_error != '')) { ?><span class="input_error"><?php echo $email_error; ?></span><br /><?php } ?>
        <div class="inputtext">Email: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('email', array('div' => 'false', 'size' => '26', 'label' => false, 'value' => '')); ?>
        </div>
    </div>

    <div class="buttons" style="width: 320px; background: none repeat scroll 0 0 #FFFFFF; border-top: none;">
        <?php echo $this->Form->button('Back', array('style' => 'float: left;', 'class' => 'orangebutton', 'type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?>
        <input class="orangebutton" type="submit" value="Submit" style="float: left;" />
    </div>
</div>
<?php echo $this->Form->end(); ?>
<br/><br/>