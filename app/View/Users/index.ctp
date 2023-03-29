<style>
	th,
	tr {
		text-align: center !important;
	}

	input[type='date']:after {
		content: attr(placeholder)
	}
</style>

<div class="users index">
	<h2><?php echo __('Usuários'); ?></h2>

	<hr>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Username</th>
					<th>Função</th>
					<th>Data</th>
					<th>Gestora</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($users as $user) : ?>
					<tr>
						<td><?php echo h($user['User']['name']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['username']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['role']); ?>&nbsp;</td>
						<td><?php echo h($user['User']['created']); ?>&nbsp;</td>
						<td>
							<?php echo $this->Html->link($user['Manager']['name'], array('controller' => 'managers', 'action' => 'view', $user['Manager']['id'])); ?>
						</td>
						<td class="actions">
							<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $user['User']['id'])); ?>
							<?php echo $this->Form->postLink(__('Deletar'), array('action' => 'delete', $user['User']['id']), array('confirm' => __('Tem certeza de que deseja excluir %s?', $user['User']['name']))); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>

		<ul style="display:flex; justify-content: center;" class="pager">
			<li><?= $this->Paginator->prev('Anterior'); ?></li>
			<li><?= $this->Paginator->next('Proximo'); ?></li>
		</ul>

	</div>