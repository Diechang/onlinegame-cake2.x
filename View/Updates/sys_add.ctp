<div class="updates form">
<?php echo $this->Form->create('Update');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s'), __('Update')); ?></legend>
	<?php
		echo $this->Form->input('text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Updates')), array('action' => 'index'));?></li>
	</ul>
</div>