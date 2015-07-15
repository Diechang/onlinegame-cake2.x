<div class="fansites form">
<?php echo $this->Form->create('Fansite');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s'), __('Fansite')); ?></legend>
	<?php
		echo $this->Form->input('public');
		echo $this->Form->input('title_id');
		echo $this->Form->input('type');
		echo $this->Form->input('site_name');
		echo $this->Form->input('site_url');
		echo $this->Form->input('link_url');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Fansites')), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Titles')), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Title')), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>