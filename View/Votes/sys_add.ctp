<div class="votes form">
<?php echo $this->Form->create('Vote');?>
	<fieldset>
 		<legend><?php printf(__('Sys Add %s'), __('Vote')); ?></legend>
	<?php
		echo $this->Form->input('public');
		echo $this->Form->input('title_id');
		echo $this->Form->input('item1');
		echo $this->Form->input('item2');
		echo $this->Form->input('item3');
		echo $this->Form->input('item4');
		echo $this->Form->input('item5');
		echo $this->Form->input('item6');
		echo $this->Form->input('item7');
		echo $this->Form->input('item8');
		echo $this->Form->input('item9');
		echo $this->Form->input('item10');
		echo $this->Form->input('poster_name');
		echo $this->Form->input('review');
		echo $this->Form->input('ip');
		echo $this->Form->input('host');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Votes')), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Titles')), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Title')), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>