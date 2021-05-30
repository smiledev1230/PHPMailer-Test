<h2><?php echo __('Products');?></h2>

<?php echo $this->Form->create('Products', array('url' => 'view_all')); ?>
<?php echo $this->Form->hidden('search_submit', array('value' => '1')); ?>
<div id="home_search">
	<div id="search_name">
		<table cellpadding="5" cellspacing="3" border="0">
			<tr>
				<td><?php echo $this->Form->input('keywords', array('type' => 'text', 'label'=>'')); ?></td>
				<td><?php echo $this->Form->button('Search', array('type' => 'button', 'onclick' => 'document.forms[\'UsersHomeForm\'].submit()')); ?></td>
			</tr>
		</table>
	</div>
</div>
<?php echo $this->Form->end(); ?>

<div id="home_users">
	<?php 
		if((is_object($this->Paginator)) && (!empty($this->Paginator))) { 
			$paginator = $this->Paginator; 
		} else { 
			$paginator = array();
		}
	?>
	<?php var_dump($products); ?>
	<table cellpadding="5" cellspacing="3" border="0">
		<tr>
			<th><?php echo $paginator->sort('id', array('asc' =>'ID ^', 'desc' => 'ID v'));?></th>
			<th><?php echo $paginator->sort('name', array('asc' =>'Full Name ^', 'desc' => 'Full Name v'));?></th>
			<th><?php echo $paginator->sort('description', array('asc' =>'E-Mail ^', 'desc' => 'E-Mail v'));?></th>
			<th><?php echo __('Images');?></th>
			<th colspan="2" align="center"><?php echo __('Actions');?></th>
		</tr>
		<?php foreach($products as $product) { ?>
			<tr>
				<td><?php echo $product['Product']['id']; ?></td>
				<td><?php echo $product['Product']['name']; ?></td>
				<td><?php echo $product['Product']['description']; ?></td>
				<td><?php //echo $this->Html->image("products/".$product['Image']['name'], array( "alt" => $product['Product']['name'])); ?></td>
				<td><?php echo $this->Html->link('Update', '/products/edit/'.$product['Product']['id']); ?></td>
				<td><?php echo $this->Html->link('Delete', '/products/delete/'.$product['Product']['id'], array('onclick' => 'if(confirm(\'Are you sure to delete\nProduct: '.$product['Product']['name'].'\')) { return true; } else { return false; }')); ?></td>
			</tr>
		<?php } ?>
		<tr>
			<td colspan="5">
				<div class="paging">
					<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
					| 	<?php echo $paginator->numbers();?>
					<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class'=>'disabled'));?>
				</div>
			</td>
		</tr>
	</table>
</div>
