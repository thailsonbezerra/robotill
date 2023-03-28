<div class="managers form">
	
	<legend><?php echo __('Add Manager'); ?></legend>

	<?php 
		$form = $this->Form->create('Manager'); 
		$form .= $this->Form->input('name', array(
			'label' => 'Gestora',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text',
		));
		$form .= $this->Form->input('name_curt', array(
			'label' => 'Sigla Gestora',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text',
		));
		$form .= $this->Form->end(
			array(
				'label' => 'Salvar',
				'class' => 'btn btn-block btn-primary'
			)
		);
		
		echo $form;
	?>
	



