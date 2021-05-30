<?php
$this->Html->css('login', null, array('inline' => false));
$this->Html->css('form_style', null, array('inline' => false));
?>

<div class="wrapper_login">
    <?php echo $this->Form->create('team', array('id' => 'TeamsLogin', 'class' => 'form1', 'action' => '/login', 'name' => 'formcheck')); ?>
    <div class="formtitle">Welcome To Honest Install Admin System</div>

    <div class="input">
        <div class="inputtext">Username: </div>
        <div class="inputcontent">
            <input name="username" type="text" class="pop_form_4_log" id="textfield2" value="" />
        </div>
    </div>

    <div class="input nobottomborder">
        <div class="inputtext">Password: </div>
        <div class="inputcontent">
            <input name="password" type="password" class="pop_form_4_log" id="textfield3" value="" />
        </div>
    </div>

    <div class="buttons">
        <input class="orangebutton" type="submit" value="Login" />
    </div>
    <?php echo $this->Form->end(); ?>
</div>