<div class="tickets view">
<h2><?php echo __('Ticket'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Title'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['title']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Open'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['open']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cod'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['cod']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User Id'); ?></dt>
		<dd>
			<?php echo h($ticket['Ticket']['user_id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Robot'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['Robot']['id'], array('controller' => 'robots', 'action' => 'view', $ticket['Robot']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Manager'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticket['Manager']['name'], array('controller' => 'managers', 'action' => 'view', $ticket['Manager']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ticket'), array('action' => 'edit', $ticket['Ticket']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ticket'), array('action' => 'delete', $ticket['Ticket']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticket['Ticket']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Robots'), array('controller' => 'robots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Robot'), array('controller' => 'robots', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Managers'), array('controller' => 'managers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manager'), array('controller' => 'managers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ticket Comments'), array('controller' => 'ticket_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Comment'), array('controller' => 'ticket_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ticket Comments'); ?></h3>
	<?php if (!empty($ticket['TicketComment'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Comment'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('User Id'); ?></th>
		<th><?php echo __('Ticket Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($ticket['TicketComment'] as $ticketComment): ?>
		<tr>
			<td><?php echo $ticketComment['id']; ?></td>
			<td><?php echo $ticketComment['comment']; ?></td>
			<td><?php echo $ticketComment['created']; ?></td>
			<td><?php echo $ticketComment['modified']; ?></td>
			<td><?php echo $ticketComment['user_id']; ?></td>
			<td><?php echo $ticketComment['ticket_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ticket_comments', 'action' => 'view', $ticketComment['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ticket_comments', 'action' => 'edit', $ticketComment['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ticket_comments', 'action' => 'delete', $ticketComment['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticketComment['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ticket Comment'), array('controller' => 'ticket_comments', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
