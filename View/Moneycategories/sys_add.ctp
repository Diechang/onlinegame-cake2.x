<div class="moneycategories form">
<?php echo $this->Form->create('Moneycategory');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s'), __('Moneycategory')); ?></legend>
	<?php
		echo $this->Form->input('str');
		echo $this->Form->input('path');
		echo $this->Form->input('summary');
		echo $this->Form->input('body');
		echo $this->Form->input('sort');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Moneycategories')), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Monies')), array('controller' => 'monies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Money')), array('controller' => 'monies', 'action' => 'add')); ?> </li>
	</ul>
</div>