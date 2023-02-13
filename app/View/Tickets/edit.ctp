<div class="tickets form">
		
		<legend>
			<?php echo ('Nova interação para o Ticket ') . $tickets[0]['Ticket']['cod'] . $tickets[0]['Ticket']['id'];?>
		</legend>
		<?php

		$form = $this->Form->create('Ticket', array(
			'style' => 'margin-bottom:32px'
		));
		$form .= $this->Form->input('title', array(
			'label' => 'Título',
			'placeholder' => 'Título',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'text',
			'readonly'=>'readonly'
		));
		$form .= $this->Form->input('robot_id', array(
			'label' => 'Robô',
			'placeholder' => 'Escolha o Robô',
			'div' => 'form-group',
			'class' => 'form-control',
			'options' => array($tickets[0]['Ticket']['robot_id'] => $tickets[0]['Robot']['type']),
			'readonly' => 'readonly'
		));

		$form .= $this->Form->input('comment', array(
			'label' => 'Descrição',
			'div' => 'form-group',
			'class' => 'form-control',
			'type' => 'textarea',
		));

		$form .= $this->Form->input('open', array(
			'label' => 'Status',
			'div' => 'form-group',
			'class' => 'form-control',
			'default' => 'Interação',
			'options' => array('Fechado','Interação')
		));


		$form .= $this->Form->end(
			array(
				'label' => 'Salvar',
				'class' => 'btn btn-block btn-primary'
			)
		);

		echo $form; ?>

		<legend>Histórico de Interações</legend>

		<?php

		$ticket_comments = $tickets[0]['TicketComment'];
		for ($index = count($ticket_comments); $index > 0; $index--) {
			$user_comment_name;
			foreach ($users_ticket_comments as $users_ticket_comment) :
				if($users_ticket_comment[0]['user_id'] === $ticket_comments[$index - 1]['user_id']){
					$user_comment_name = $users_ticket_comment[0]['name'];
				}
			endforeach;

			echo $this->Form->input('comment', array(
				'label' => 'Interação '.($index).' Realizada em '. $ticket_comments[$index - 1]['created'] . ' por '. $user_comment_name,
				'div' => 'form-group',
				'class' => 'form-control',
				'type' => 'textarea',
				'disabled' => true,
				'value' => $ticket_comments[$index - 1]['comment']
			));
		};?>




</div>