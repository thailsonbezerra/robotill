<div class="tickets form">

		<legend><?php echo __('Abrir Ticket'); ?></legend>

		<?php

		$form = $this->Form->create('Ticket');
		$form .= $this->Form->input('title', array(
			'label' => 'Título',
			'placeholder' => 'Título',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text'
		));			 
		$form .= $this->Form->input('robot_id',array(
			'label' => 'Robô',
			'placeholder'=> 'Escolha o Robô',
			'div' => 'form-group',
			'class'=> 'form-control'
		));

		$form .= $this->Form->input('comment', array(
			'label' => 'Descrição',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'textarea',
		));
		
		$form .= $this->Form->end(array(
			'label'=>'Salvar',
			'class'=> 'btn btn-block btn-primary')
		);
		
		echo $form;?>
