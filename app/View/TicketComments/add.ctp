<div class="ticketComments form">
<?php echo $this->Form->create('TicketComment'); ?>
	<fieldset>
		<legend><?php echo __('Add Ticket Comment'); ?></legend>
	<?php
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

		<li><?php echo $this->Html->link(__('List Ticket Comments'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('controller' => 'tickets', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket'), array('controller' => 'tickets', 'action' => 'add')); ?> </li>
	</ul>
</div>
