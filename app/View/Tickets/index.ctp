<div class="tickets index">
	<h1><?php echo __('Tickets'); ?></h1>
	<hr>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Código</th>
					<th>Tipo do Robô</th>
					<th>Solicitante</th>
					<th>Gestora</th>
					<th>Status</th>
					<th>Interações</th>
					<th>Data</th>
					<th>Ação</th>
				</tr>
			</thead>

			<?php foreach ($tickets as $ticket) : ?>
				<tbody>
					<tr>
						<td><?php echo $ticket['Ticket']['cod'] . $ticket['Ticket']['id'] ?></td>
						<td><?php echo $ticket['Robot']['type'] ?></td>
						<td><?php echo $ticket['User']['name'] ?></td>
						<td><?php echo $ticket['Manager']['name_curt'] ?></td>
						<td><?php echo $ticket['Ticket']['open'] ?></td>
						<td><?php echo count($ticket['TicketComment']) ?></td>
						<td><?php echo $ticket['Ticket']['created'] ?></td>
						<td><a class="btn btn-info" href=<?php echo '/tickets/edit/' . $ticket['Ticket']['id'] ?> role="button">Interagir &raquo;</a></td>
					</tr>
				</tbody>
			<?php endforeach; ?>
		</table>
	</div>
	<hr>