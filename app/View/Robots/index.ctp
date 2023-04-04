<?php $currentRole = intval($this->Session->read('Auth.User.role')); ?>

<style>
	th,
	tr {
		text-align: center !important;
	}

	input[type='date']:after {
		content: attr(placeholder)
	}
</style>

<div class="robots index">
	<h2><?php echo __('Robos'); ?></h2>

	<hr>
	<div class="table-responsive">
		<table class="table table-striped">

			<thead>
				<tr>
					<th>Tipo</th>
					<th>Sigla</th>
					<th>Ações</th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($robots as $robot) : ?>
					<tr>
						<td><?= $robot['Robot']['type']; ?></td>
						<td><?= $robot['Robot']['type_curt']; ?></td>
						<td class="actions">
							<?= $this->Html->link(('Detalhes'), array('action' => 'view', $robot['Robot']['id'])); ?>

							<?php if ($currentRole === 0) : ?>
								<?= $this->Html->link(('Editar'), array('action' => 'edit', $robot['Robot']['id'])); ?>
								<?= $this->Form->postLink(('Deletar'), array('action' => 'delete', $robot['Robot']['id']), array('confirm' => __('Tem certeza de que deseja excluir o robô de %s?', $robot['Robot']['type']))); ?>
							<?php endif ?>
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