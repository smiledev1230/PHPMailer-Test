<h2><?php echo __('Categories');?></h2>

<?php $thecategory['Category'] = $thecategory[0]['Category']; ?>
<?php echo $this->Form->create('Categories', array('url' => 'update')); ?>
<?php echo $this->Form->hidden('edit_submit', array('value' => '1')); ?>
<?php echo $this->Form->hidden('category_id', array('value' => $thecategory['Category']['id'])); ?>
<div id="category_add">
	<div id="category_name">
		<table cellpadding="5" cellspacing="3" border="0">
			<tr>
				<td style="width: 100px;">Category Name</td>
				<td><?php echo $this->Form->input('category_name', array('value' => $thecategory['Category']['name'], 'label' => false)); ?></td>
			</tr>
		</table>
	</div>
	
	<div id="categories_dropdown">
		<table cellpadding="5" cellspacing="3" border="0">
			<tr>
				<td style="width: 100px;">Belongs To:<!--<br /><sub>omit if main category</sub>--></td>
				<td><?php echo $this->Form->input('categoris_list', array('type' => 'select', 'options'=>$data_dd_select, 'label'=>false, 'selected'=>$thecategory['Category']['parent_id'])); ?></td>
			</tr>
			<tr><td colspan="2" style="height: 10px;"></td></tr>
			<tr>
				<td><?php echo $this->Form->button('Back', array('type' => 'button', 'onclick' => 'location.href=\''.$this->webroot.'categories/\'')); ?></td>
				<td><?php echo $this->Form->button('Update Category', array('type' => 'button', 'onclick' => 'document.forms[\'CategoriesEditForm\'].submit()')); ?></td>
			</tr>
		</table>
	</div>
</div>
<?php echo $this->Form->end(); ?>


<div id="catrgories">
	<?php echo $cathtml; ?>
</div>