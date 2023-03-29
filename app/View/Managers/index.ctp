<style>
	th,
	tr {
		text-align: center !important;
	}

	input[type='date']:after {
		content: attr(placeholder)
	}
</style>

<div class="managers index">
	<h2><?php echo __('Gestoras'); ?></h2>

	<hr>
	<div class="table-responsive">
		<table class="table table-striped">

			<thead>
				<tr>
					<th>Nome</th>
					<th>Sigla</th>
					<th>Data</th>
					<th>Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($managers as $manager) : ?>
					<tr>
						<td><?= $manager['Manager']['name']; ?></td>
						<td><?= $manager['Manager']['name_curt']; ?></td>
						<td><?= $manager['Manager']['created']; ?></td>
						<td class="actions">
							<?= $this->Html->link(__('Detalhes'), array('action' => 'view', $manager['Manager']['id'])); ?>
							<?= $this->Html->link(__('Editar'), array('action' => 'edit', $manager['Manager']['id'])); ?>
							<?= $this->Form->postLink(__('Deletar'), array('action' => 'delete', $manager['Manager']['id']), array('confirm' => __('Tem certeza de que deseja excluir a gestora %s?', $manager['Manager']['name']))); ?>
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