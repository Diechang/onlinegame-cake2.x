<div class="services view">
<h2><?php echo __('Service');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $service['Service']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Str'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $service['Service']['str']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Path'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $service['Service']['path']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php echo __('Sort'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $service['Service']['sort']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Edit %s'), __('Service')), array('action' => 'edit', $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Delete %s'), __('Service')), array('action' => 'delete', $service['Service']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $service['Service']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Services')), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Service')), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Titles')), array('controller' => 'titles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Title')), array('controller' => 'titles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php printf(__('Related %s'), __('Titles'));?></h3>
	<?php if (!empty($service['Title'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Public'); ?></th>
		<th><?php echo __('Title Official'); ?></th>
		<th><?php echo __('Title Read'); ?></th>
		<th><?php echo __('Title Sub'); ?></th>
		<th><?php echo __('Title Abbr'); ?></th>
		<th><?php echo __('Url Str'); ?></th>
		<th><?php echo __('Thumb Image'); ?></th>
		<th><?php echo __('Thumb Name'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Service Id'); ?></th>
		<th><?php echo __('Service Start'); ?></th>
		<th><?php echo __('Test Start'); ?></th>
		<th><?php echo __('Test End'); ?></th>
		<th><?php echo __('Category Text'); ?></th>
		<th><?php echo __('Fee Id'); ?></th>
		<th><?php echo __('Fee Text'); ?></th>
		<th><?php echo __('Ad Use'); ?></th>
		<th><?php echo __('Ad Text'); ?></th>
		<th><?php echo __('Ad Banner S'); ?></th>
		<th><?php echo __('Ad Banner M'); ?></th>
		<th><?php echo __('Ad Banner L'); ?></th>
		<th><?php echo __('Official Url'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($service['Title'] as $title):
			$class = null;
			if ($i++ % 2 == 0) {
				$class = ' class="altrow"';
			}
		?>
		<tr<?php echo $class;?>>
			<td><?php echo $title['id'];?></td>
			<td><?php echo $title['public'];?></td>
			<td><?php echo $title['title_official'];?></td>
			<td><?php echo $title['title_read'];?></td>
			<td><?php echo $title['title_sub'];?></td>
			<td><?php echo $title['title_abbr'];?></td>
			<td><?php echo $title['url_str'];?></td>
			<td><?php echo $title['thumb_image'];?></td>
			<td><?php echo $title['thumb_name'];?></td>
			<td><?php echo $title['description'];?></td>
			<td><?php echo $title['service_id'];?></td>
			<td><?php echo $title['service_start'];?></td>
			<td><?php echo $title['test_start'];?></td>
			<td><?php echo $title['test_end'];?></td>
			<td><?php echo $title['category_text'];?></td>
			<td><?php echo $title['fee_id'];?></td>
			<td><?php echo $title['fee_text'];?></td>
			<td><?php echo $title['ad_use'];?></td>
			<td><?php echo $title['ad_text'];?></td>
			<td><?php echo $title['ad_banner_s'];?></td>
			<td><?php echo $title['ad_banner_m'];?></td>
			<td><?php echo $title['ad_banner_l'];?></td>
			<td><?php echo $title['official_url'];?></td>
			<td><?php echo $title['created'];?></td>
			<td><?php echo $title['modified'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'titles', 'action' => 'view', $title['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'titles', 'action' => 'edit', $title['id'])); ?>
				<?php echo $this->Html->link(__('Delete'), array('controller' => 'titles', 'action' => 'delete', $title['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $title['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Title')), array('controller' => 'titles', 'action' => 'add'));?> </li>
		</ul>
	</div>
</div>
