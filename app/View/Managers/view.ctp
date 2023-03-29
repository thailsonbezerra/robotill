<div class="managers view">
	<h2><?= ('Gestora'); ?></h2>

	<?php
	$created_split = str_split($manager['Manager']['created']);
	$created_data = $created_split[8] . $created_split[9] . '/' . $created_split[5] . $created_split[6] . '/' . $created_split[0] . $created_split[1] . $created_split[2] . $created_split[3];
	$created_hora = $created_split[11] . $created_split[12] . ':' . $created_split[14] . $created_split[5] . ':' . $created_split[17] . $created_split[18];
	?>

	<h3 class="featurette-heading"><?= $manager['Manager']['name'] ?>, <span class="text-muted"><?= $manager['Manager']['name_curt'] ?></span></h3>
	<p class="lead">Com o id <?= $manager['Manager']['id'] ?> a Gestora <?= $manager['Manager']['name'] ?> começou a utilizar o sistema em <?= $created_data ?> às <?= $created_hora ?> e hoje possui <?= count($manager['User']) ?> usuários e <?= count($manager['Ticket']) ?> Tickets cadastrados no sistema.</p>

	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Tickets Relacionados</h4>
		</div>
		<?php if (!empty($manager['Ticket'])) : ?>
			<table class="table">
				<tr>
					<th>Codigo</th>
					<th>Titulo</th>
					<th>Robo</th>
				</tr>
				<?php foreach ($manager['Ticket'] as $ticket) : ?>
					<tr>
						<td><?= $this->Html->link(
								$ticket['cod'].$ticket['id'],
								'../tickets/edit/' . $ticket['id'],
								array('class' =>  $ticket['open'] ? 'btn btn-primary' : 'btn btn-info')
							);
							?></td>
						<td><?= $ticket['title']; ?></td>
						<td><?= $robots[$ticket['robot_id']]; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
		</table>

		<ul style="display:flex; justify-content: center;" class="pager">
			<li><?= $this->Paginator->prev('Anterior'); ?></li>
			<li><?= $this->Paginator->next('Proximo'); ?></li>
		</ul>

	</div>