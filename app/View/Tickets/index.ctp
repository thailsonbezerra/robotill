<div class="tickets index">
	<h2><?php echo __('Tickets'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('title'); ?></th>
			<th><?php echo $this->Paginator->sort('open'); ?></th>
			<th><?php echo $this->Paginator->sort('cod'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('robot_id'); ?></th>
			<th><?php echo $this->Paginator->sort('manager_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($tickets as $ticket): ?>
	<tr>
		<td><?php echo h($ticket['Ticket']['id']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['title']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['open']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['cod']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['created']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['modified']); ?>&nbsp;</td>
		<td><?php echo h($ticket['Ticket']['user_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ticket['Robot']['id'], array('controller' => 'robots', 'action' => 'view', $ticket['Robot']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($ticket['Manager']['name'], array('controller' => 'managers', 'action' => 'view', $ticket['Manager']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ticket['Ticket']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ticket['Ticket']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ticket['Ticket']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticket['Ticket']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ticket'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Robots'), array('controller' => 'robots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Robot'), array('controller' => 'robots', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Managers'), array('controller' => 'managers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manager'), array('controller' => 'managers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ticket Comments'), array('controller' => 'ticket_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Comment'), array('controller' => 'ticket_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
