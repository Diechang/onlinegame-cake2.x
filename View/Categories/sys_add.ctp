<div class="categories form">
<?php echo $this->Form->create('Category');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s'), __('Category')); ?></legend>
	<?php
		echo $this->Form->input('str');
		echo $this->Form->input('path');
		echo $this->Form->input('sort');
		echo $this->Form->input('Title');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Categories')), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Titles')), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Title')), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>