<div class="robots view">
	<h2><?php echo __('Robo'); ?></h2>

	<h3 class="featurette-heading"><?= $robot['Robot']['type'] ?>, <span class="text-muted"><?= $robot['Robot']['type_curt'] ?></span></h3>
	<p class="lead"><?= $robot['Robot']['description'] ?> </p>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Tickets Relacionados</h4>
		</div>
		<?php if (!empty($robot['Ticket'])) : ?>
			<table class='table'>
				<tr>
					<th>Codigo</th>
					<th>Titulo</th>
					<th>Gestora</th>
				</tr>
				<?php foreach ($robot['Ticket'] as $ticket) : ?>
					<tr>
						<td><?= $this->Html->link(
								$ticket['cod'] . $ticket['id'],
								'../tickets/edit/' . $ticket['id'],
								array('class' =>  $ticket['open'] ? 'btn btn-primary' : 'btn btn-info')
							);
							?></td>
						<td><?php echo $ticket['title']; ?></td>
						<td><?php echo $managers[$ticket['manager_id']]; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
			</table>
			<ul style="display:flex; justify-content: center;" class="pager">
				<li><?= $this->Paginator->prev('Anterior'); ?></li>
				<li><?= $this->Paginator->next('Proximo'); ?></li>
			</ul>

	</div>