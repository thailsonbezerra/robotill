<style>
	th, tr{
		text-align: center !important;
	}
</style>

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
			<tbody>
				<?php foreach ($tickets as $ticket) : ?>
					<tr>
						<td><?php echo $ticket['Ticket']['cod'] . $ticket['Ticket']['id'] ?></td>
						<td><?php echo $ticket['Robot']['type'] ?></td>
						<td><?php echo $ticket['User']['name'] ?></td>
						<td><?php echo $ticket['Manager']['name_curt'] ?></td>
						<td><?php echo $ticket['Ticket']['open'] ? 'Aberto' : 'Fechado'; ?></td>
						<td><?php echo count($ticket['TicketComment']) ?></td>
						<td><?php echo $ticket['Ticket']['created'] ?></td>
						<td><a class="btn btn-info" href=<?php echo '/tickets/edit/' . $ticket['Ticket']['id'] ?> role="button">
								<?php echo $ticket['Ticket']['open'] ? "Interagir" : "Visualizar"; ?> &raquo;
							</a></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<ul style="display:flex; justify-content: center;" class="pager">
			<li><?= $this->Paginator->prev('Anterior'); ?></li>
			<li><?= $this->Paginator->next('Proximo'); ?></li>
		</ul>

	</div>