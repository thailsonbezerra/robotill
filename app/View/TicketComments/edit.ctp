<div class="ticketComments form">
<?php echo $this->Form->create('TicketComment'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ticket Comment'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('comment');
		echo $this->Form->input('user_id');
		echo $this->Form->input('ticket_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('TicketComment.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('TicketComment.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Ticket Comments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
