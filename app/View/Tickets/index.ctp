<style>
	th,
	tr {
		text-align: center !important;
	}

	#TicketIndexForm {
		display: flex;
		gap: 4px;
		background-color: #eee;
		padding: 12px;
		border: #ccc 1px solid;
		border-radius: 4px;
	}

	input[type='date']:after {
		content: attr(placeholder)
	}
</style>

<div class="tickets index">
	<h1><?php echo __('Tickets'); ?></h1>

	<?php
	$filtro = $this->Form->create('Ticket', array(
		'inputDefaults' => array(
			'label' => false,
			'div' => false,
		),
		'class' => 'form-inline',
		'url' => array('action'=> 'index')
	));
	$filtro .= $this->Form->text('start_date', array(
		'placeholder' => 'Início',
		'class' => 'form-control',
		'type' => 'date',
	));
	$filtro .= $this->Form->text('end_date', array(
		'placeholder' => 'Fim',
		'class' => 'form-control',
		'type' => 'date',
	));

	$filtro .= $this->Form->input('title', array(
		'empty' => 'Tipo de Robô',
		'class' => 'form-control',
		'type' => 'text',
		'placeholder' => 'Título',
		'required' => false
	));

	$filtro .= $this->Form->input('type_robot', array(
		'empty' => 'Tipo de Robô',
		'class' => 'form-control',
		'options'=> $tipo,
	));

	$filtro .= $this->Form->input('status', array(
		'empty' => 'Status',
		'class' => 'form-control',
		'type' => 'select',
		'options' => array(true => 'Aberto', false => 'Fechado')
	));

	$filtro .= $this->Form->end(array(
		'label' => 'Consultar',
		'div' => false,
		'class' => 'btn btn-success'
	));

	echo $filtro; ?>

	<hr>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Código</th>
					<th>Tipo do Robô</th>
					<th>Título</th>
					<th>Gestora</th>
					<th>Status</th>
					<th>Interações</th>
					<th>Data Abertura</th>
					<th>Ação</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($tickets as $ticket) : ?>
					<tr>
						<td><?php echo $ticket['Ticket']['cod'] . $ticket['Ticket']['id'] ?></td>
						<td><?php echo $ticket['Robot']['type'] ?></td>
						<td><?php echo $ticket['Ticket']['title'] ?></td>
						<td><?php echo $ticket['Manager']['name_curt'] ?></td>
						<td><?php echo $ticket['Ticket']['open'] ? 'Aberto' : 'Fechado'; ?></td>
						<td><?php echo count($ticket['TicketComment']) ?></td>
						<td><?php echo $ticket['Ticket']['created'] ?></td>
						<td><a class='btn <?= $ticket['Ticket']['open'] ? "btn-primary" : "btn-info" ?>' href=<?php echo '/tickets/edit/' . $ticket['Ticket']['id'] ?> role="button">
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