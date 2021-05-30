<?php
$this->Html->css('form_style', null, array('inline' => false));
?>

<div class="form2-wrapper">

    <div class="formtitle" style="width: 980px;"><h2>Add New User For Team</h2></div>
    <?php echo $this->Form->create('Teams', array('url' => 'add_user')); ?>

    <div class="input">
        <?php if ((isset($username_error)) && ($username_error != '')) { ?> <span class="input_error"><?php echo $username_error; ?></span><?php } ?>
        <div class="inputtext">Username: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('username', array('div' => false, 'label' => false, 'value' => '')); ?>
        </div>
    </div>

    <div class="input">
        <?php if ((isset($password_error)) && ($password_error != '')) { ?> <span class="input_error"><?php echo $password_error; ?></span><?php } ?>   
        <div class="inputtext">Password: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('password', array('div' => false, 'label' => false)); ?>
        </div>
    </div>

    <div class="input">
        <?php if ((isset($email_error)) && ($email_error != '')) { ?> <span class="input_error"><?php echo $email_error; ?></span><?php } ?>
        <div class="inputtext">Email: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('email', array('div' => false, 'label' => false, 'value' => '')); ?>
        </div>
    </div>

    <div class="input nobottomborder">
        <?php if ((isset($user_type_error)) && ($user_type_error != '')) { ?> <span class="input_error"><?php echo $user_type_error; ?></span><?php } ?>
        <div class="inputtext">User Type: </div>
        <div class="inputcontent">
            <?php echo $this->Form->input('user_type', array('div' => false, 'label' => false, 'type' => 'select', 'options' => $userType)); ?>
        </div>
    </div>

    <div class="buttons" style="width: 320px; background: none repeat scroll 0 0 #FFFFFF; border-top: none;">
        <?php echo $this->Form->button('Back', array('style' => 'float: left;', 'class' => 'orangebutton', 'type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?>
        <input class="orangebutton" type="submit" value="Submit" style="float: left;" />
    </div>
</div>
<?php echo $this->Form->end(); ?>
<br/><br/>