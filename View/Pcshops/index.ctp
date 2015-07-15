<div class="pcshops index">
	<h2><?php echo __('Pcshops');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('public');?></th>
			<th><?php echo $this->Paginator->sort('shop_name');?></th>
			<th><?php echo $this->Paginator->sort('url_str');?></th>
			<th><?php echo $this->Paginator->sort('shop_url');?></th>
			<th><?php echo $this->Paginator->sort('ad_use');?></th>
			<th><?php echo $this->Paginator->sort('ad_text');?></th>
			<th class="actions"><?php echo __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($pcshops as $pcshop):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $pcshop['Pcshop']['id']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['public']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['shop_name']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['url_str']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['shop_url']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['ad_use']; ?>&nbsp;</td>
		<td><?php echo $pcshop['Pcshop']['ad_text']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $pcshop['Pcshop']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $pcshop['Pcshop']['id'])); ?>
			<?php echo $this->Html->link(__('Delete'), array('action' => 'delete', $pcshop['Pcshop']['id']), null, sprintf(__('Are you sure you want to delete # %s?'), $pcshop['Pcshop']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%')
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous'), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next').' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Pcshop')), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s'), __('Pcs')), array('controller' => 'pcs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s'), __('Pc')), array('controller' => 'pcs', 'action' => 'add')); ?> </li>
	</ul>
</div>