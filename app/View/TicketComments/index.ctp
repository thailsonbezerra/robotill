<div class="ticketComments index">
	<h2><?php echo __('Ticket Comments'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('comment'); ?></th>
			<th><?php echo $this->Paginator->sort('created'); ?></th>
			<th><?php echo $this->Paginator->sort('modified'); ?></th>
			<th><?php echo $this->Paginator->sort('user_id'); ?></th>
			<th><?php echo $this->Paginator->sort('ticket_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($ticketComments as $ticketComment): ?>
	<tr>
		<td><?php echo h($ticketComment['TicketComment']['id']); ?>&nbsp;</td>
		<td><?php echo h($ticketComment['TicketComment']['comment']); ?>&nbsp;</td>
		<td><?php echo h($ticketComment['TicketComment']['created']); ?>&nbsp;</td>
		<td><?php echo h($ticketComment['TicketComment']['modified']); ?>&nbsp;</td>
		<td><?php echo h($ticketComment['TicketComment']['user_id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($ticketComment['Ticket']['title'], array('controller' => 'tickets', 'action' => 'view', $ticketComment['Ticket']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $ticketComment['TicketComment']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $ticketComment['TicketComment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $ticketComment['TicketComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticketComment['TicketComment']['id']))); ?>
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
		<li><?php echo $this->Html->link(__('New Ticket Comment'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
