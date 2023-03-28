<div class="users form">
	
	<legend><?php echo __('Add User'); ?></legend>

	<?php
		$form = $this->Form->create('User'); 
		$form .= $this->Form->input('name', array(
			'label' => 'Nome',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text'
		));
		$form .= $this->Form->input('username', array(
			'label' => 'Usuário',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text'
		));
		$form .= $this->Form->input('password', array(
			'label' => 'Senha',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text'
		));
		$form .= $this->Form->input('role', array(
			'label' => 'Função',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text'
		));
		$form .= $this->Form->input('manager_id', array(
			'label' => 'Gestora',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'select'
		));
		$form .= $this->Form->end(array(
			'label'=>'Salvar',
			'class'=> 'btn btn-block btn-primary')
		);

		echo $form;
	?>
	