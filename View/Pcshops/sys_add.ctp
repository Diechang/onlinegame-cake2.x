<div class="pcshops form">
<?php echo $this->Form->create('Pcshop');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s'), __('Pcshop')); ?></legend>
	<?php
		echo $this->Form->input('public');
		echo $this->Form->input('shop_name');
		echo $this->Form->input('url_str');
		echo $this->Form->input('shop_url');
		echo $this->Form->input('ad_use');
		echo $this->Form->input('ad_text');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Pcshops')), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Pcs')), array('controller' => 'pcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Pc')), array('controller' => 'pcs', 'action' => 'add')); ?> </li>
	</ul>
</div>