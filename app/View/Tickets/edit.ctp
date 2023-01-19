<div class="tickets form">
<?php echo $this->Form->create('Ticket'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ticket'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('open');
		echo $this->Form->input('cod');
		echo $this->Form->input('robot_id');
		echo $this->Form->input('manager_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Ticket.id')), array('confirm' => __('Are you sure you want to delete # %s?', $this->Form->value('Ticket.id')))); ?></li>
		<li><?php echo $this->Html->link(__('List Tickets'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Robots'), array('controller' => 'robots', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Robot'), array('controller' => 'robots', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Managers'), array('controller' => 'managers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Manager'), array('controller' => 'managers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ticket Comments'), array('controller' => 'ticket_comments', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ticket Comment'), array('controller' => 'ticket_comments', 'action' => 'add')); ?> </li>
	</ul>
</div>
