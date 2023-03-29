<div class="robots form">
	<legend><?php echo __('Adicionar Robô'); ?></legend>

	<?php
		$form = $this->Form->create('Robot'); 
		$form .= $this->Form->input('type', array(
			'label' => 'Tipo',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text',
			'placeholder' => 'Nome Robô'
		));
		$form .= $this->Form->input('type_curt', array(
			'label' => 'Sigla Tipo',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text',
			'placeholder' => 'NR'

			
		));
		$form .= $this->Form->input('description', array(
			'label' => 'Descrição',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'textarea'
		));

		$form .= $this->Form->end(
			array(
				'label' => 'Salvar',
				'class' => 'btn btn-block btn-primary'
			)
		);
	
		echo $form
	?>

