<h2>Edit User: <?php echo $theuser['User']['title'].' '.$theuser['User']['firstname'].' '.$theuser['User']['lastname']; ?></h2>

<?php echo $this->Form->create('Users', array('url' => 'update')); ?>
<?php echo $this->Form->hidden('edit_user', array('value' => '1')); ?>
<?php echo $this->Form->hidden('id', array('value' => $theuser['User']['id'])); ?>
<table cellpadding="3" cellspacing="5" border="0">
	<tr>
		<td>Title</td>
		<td><?php echo $this->Form->radio('title', array('Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms'), array('value' => $theuser['User']['title'],'between' => '&nbsp;&nbsp;', 'legend' => false)); ?></td>
		<td><?php if((isset($title_error)) && ($title_error != '')) { ?> <span class="input_error"><?php echo $title_error; ?></span><?php } ?></td>
	</tr>
	<tr>
		<td>First Name</td>
		<td><?php echo $this->Form->input('firstname', array('value' => $theuser['User']['firstname'], 'label' => false)); ?></td>
		<td><?php if((isset($firstname_error)) && ($firstname_error != '')) { ?> <span class="input_error"><?php echo $firstname_error; ?></span><?php } ?></td>
	</tr>
	<tr>
		<td>Last Name</td>
		<td><?php echo $this->Form->input('lastname', array('value' => $theuser['User']['lastname'], 'label' => false)); ?></td>
		<td><?php if((isset($lastname_error)) && ($lastname_error != '')) { ?> <span class="input_error"><?php echo $lastname_error; ?></span><?php } ?></td>
	</tr>
	<tr>
		<td>E-Mail</td>
		<td><?php echo $this->Form->input('email', array('value' => $theuser['User']['email'], 'label' => false)); ?></td>
		<td><?php if((isset($email_error)) && ($email_error != '')) { ?> <span class="input_error"><?php echo $email_error; ?></span><?php } ?></td>
	</tr>
	<tr>
		<td><?php echo $this->Form->button('Back', array('type' => 'button', 'onclick' => 'javascript: history.go(-1)')); ?></td>
		<td><?php echo $this->Form->submit(); ?></td>
	</tr>
</table>