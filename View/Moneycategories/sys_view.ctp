<div class="moneycategories view">
<h2><?php echo __('Moneycategory');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneycategory['Moneycategory']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Str'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneycategory['Moneycategory']['str']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneycategory['Moneycategory']['path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Summary'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneycategory['Moneycategory']['summary']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Body'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneycategory['Moneycategory']['body']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Sort'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneycategory['Moneycategory']['sort']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Created'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneycategory['Moneycategory']['created']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Modified'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $moneycategory['Moneycategory']['modified']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Edit %s'), __('Moneycategory')), array('action' => 'edit', $moneycategory['Moneycategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Delete %s'), __('Moneycategory')), array('action' => 'delete', $moneycategory['Moneycategory']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $moneycategory['Moneycategory']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Moneycategories')), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Moneycategory')), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Monies')), array('controller' => 'monies', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Money')), array('controller' => 'monies', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php printf(__('Related %s'), __('Monies'));?></h3>
	<?php if (!empty($moneycategory['Money'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Title'); ?></th>
		<th><?php echo __('Url Str'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Moneycategory Id'); ?></th>
		<th><?php echo __('Ad Use'); ?></th>
		<th><?php echo __('Ad Text'); ?></th>
		<th><?php echo __('Ad Banner'); ?></th>
		<th><?php echo __('Official Url'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($moneycategory['Money'] as $money):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $money['id'];?></td>
			<td><?php echo $money['title'];?></td>
			<td><?php echo $money['url_str'];?></td>
			<td><?php echo $money['description'];?></td>
			<td><?php echo $money['moneycategory_id'];?></td>
			<td><?php echo $money['ad_use'];?></td>
			<td><?php echo $money['ad_text'];?></td>
			<td><?php echo $money['ad_banner'];?></td>
			<td><?php echo $money['official_url'];?></td>
			<td><?php echo $money['created'];?></td>
			<td><?php echo $money['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'monies', 'action' => 'view', $money['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'monies', 'action' => 'edit', $money['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'monies', 'action' => 'delete', $money['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $money['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Money')), array('controller' => 'monies', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
