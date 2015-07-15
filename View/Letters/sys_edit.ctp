<div class="letters form">
<?php echo $this->Form->create('Letter');?>
	<fieldset>
 		<legend><?php printf(__('Sys Edit %s'), __('Letter')); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('name');
		echo $this->Form->input('mail');
		echo $this->Form->input('body');
		echo $this->Form->input('ip');
		echo $this->Form->input('host');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $this->Form->value('Letter.id')), null, sprintf(__('Are you sure you want to delete # %s?'), $this->Form->value('Letter.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Letters')), array('action' => 'index'));?></li>
	</ul>
</div>