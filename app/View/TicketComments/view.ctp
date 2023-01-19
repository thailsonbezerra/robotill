<div class="ticketComments view">
<h2><?php echo __('Ticket Comment'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($ticketComment['TicketComment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Comment'); ?></dt>
		<dd>
			<?php echo h($ticketComment['TicketComment']['comment']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($ticketComment['TicketComment']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($ticketComment['TicketComment']['modified']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ticket'); ?></dt>
		<dd>
			<?php echo $this->Html->link($ticketComment['Ticket']['id'], array('controller' => 'tickets', 'action' => 'view', $ticketComment['Ticket']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ticket Comment'), array('action' => 'edit', $ticketComment['TicketComment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ticket Comment'), array('action' => 'delete', $ticketComment['TicketComment']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $ticketComment['TicketComment']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Ticket Comments'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Comment'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
